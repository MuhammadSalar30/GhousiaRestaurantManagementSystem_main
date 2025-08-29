<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\MenuSection;

class RoutingController extends Controller
{

    public function __construct()
    {
        // $this->
        // middleware('auth')->
        // except('index');
    }

    /**
     * Get menu sections with items for the navbar
     */
    private function getMenuSections()
    {
        return MenuSection::with(['items' => function($query) {
            $query->select('id', 'name', 'menu_section_id');
        }])->orderBy('name')->get();
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        if (Auth::user()) {
            // Get menu sections for navbar
            $menuSections = $this->getMenuSections();

            return view('index', compact('menuSections'));
        } else {
            return redirect('/login');
        }
    }

    /**
     * Display a view based on first route param
     *
     *
     */
    public function root(Request $request, $first)
    {
        if ($first == "style.css.map")
            return redirect('/home');

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view($first, compact('menuSections'));
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        // Handle admin orders routes - redirect to proper admin routes
        if ($first === 'orders' && $second === 'list') {
            return redirect()->route('admin.orders.index');
        }

        if ($first === 'orders' && $second === 'details') {
            // If there's an order ID in the request, redirect to admin order details
            if ($request->has('id')) {
                return redirect()->route('admin.orders.show', $request->get('id'));
            }
            return redirect()->route('admin.orders.index');
        }

        // Redirect client checkout to dedicated controller route so cart data exists
        if ($first === 'client' && $second === 'checkout') {
            return redirect()->route('checkout.index');
        }

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        if ($first === 'client' && $second === 'product-list') {
            // Support category + price range filtering (same behavior as product grid)
            $categories = MenuSection::orderBy('name')->get(['id','name','discount']);

            // Read selected categories from query string
            $selectedCats = collect(explode(',', (string) $request->query('categories', '')))
                ->filter(fn($v) => strlen(trim($v)) > 0)
                ->map(fn($v) => (int) $v)
                ->values()
                ->all();

            $min = (int) $request->query('min_price', 0);
            $max = (int) $request->query('max_price', 5000);
            $q = trim((string) $request->query('q', ''));

            $query = MenuItem::with('section');
            if (!empty($selectedCats)) {
                $query->whereIn('menu_section_id', $selectedCats);
            }
            if ($q !== '') {
                $query->where(function($sub) use ($q) {
                    $sub->where('name', 'like', "%$q%")
                        ->orWhere('description', 'like', "%$q%");
                });
            }
            // Sorting
            $sort = (string) $request->query('sort', 'latest');
            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'rating':
                    // Approximation: no ratings aggregate on MenuItem; fallback to updated_at desc
                    $query->orderBy('updated_at', 'desc');
                    break;
                case 'latest':
                default:
                    $query->orderBy('created_at', 'desc');
            }

            $raw = $query->get();
            $wishlistIds = [];
            if (Auth::check()) {
                $wishlistIds = \App\Models\Wishlist::where('user_id', Auth::id())
                    ->pluck('menu_item_id')->toArray();
            }

            $items = $raw->groupBy('name')->map(function ($group) {
                $firstItem = $group->sortByDesc('updated_at')->first();
                $sizes = [];
                foreach ($group as $g) {
                    if ($g->size) { $sizes[$g->size] = $g->price; }
                }
                // Determine display price: prefer 'Full' size (case-insensitive); fallback to max price
                $displayPrice = $group->max('price');
                foreach ($sizes as $k => $v) {
                    if (strtolower((string) $k) === 'full') { $displayPrice = $v; break; }
                }

                return (object) [
                    'id' => $firstItem->id,
                    'name' => $firstItem->name,
                    'description' => $firstItem->description,
                    'image' => $firstItem->image,
                    'section' => $firstItem->section,
                    'sizes' => $sizes,
                    'display_price' => $displayPrice,
                    'min_price' => $group->min('price'),
                    'max_price' => $group->max('price'),
                    'has_multiple_sizes' => count($sizes) > 1,
                ];
            })
            // Filter by the display price so the slider matches what users see
            ->filter(function ($item) use ($min, $max) {
                return ($item->display_price >= $min && $item->display_price <= $max);
            })
            ->values();

            // Simple pagination: 12 items per page
            $page = max(1, (int) $request->query('page', 1));
            $perPage = 12;
            $total = $items->count();
            $pages = (int) ceil($total / $perPage);
            $pagedItems = $items->forPage($page, $perPage)->values();

            return view($first . '.' . $second, [
                'categories' => $categories,
                'items' => $pagedItems,
                'min_price' => $min,
                'max_price' => $max,
                'selected_categories' => $selectedCats,
                'sort' => $sort,
                'q' => $q,
                'page' => $page,
                'pages' => $pages,
                'wishlist_ids' => $wishlistIds,
                'menuSections' => $menuSections,
            ]);
        }

        // Inject categories and price bounds for client/product-grid
        if ($first === 'client' && $second === 'product-grid') {
            $categories = MenuSection::orderBy('name')->get(['id','name','discount']);

            // Read filters from query
            $selectedCats = collect(explode(',', (string) $request->query('categories', '')))
                ->filter(fn($v) => strlen(trim($v)) > 0)
                ->map(fn($v) => (int) $v)
                ->values()
                ->all();
            $min = (int) $request->query('min_price', 0);
            $max = (int) $request->query('max_price', 5000);

            $query = MenuItem::with('section');
            if (!empty($selectedCats)) {
                $query->whereIn('menu_section_id', $selectedCats);
            }
            // We fetch all then compute display price per grouped product; price filter will be applied to display price
            $raw = $query->get();

            $items = $raw->groupBy('name')->map(function ($group) {
                $firstItem = $group->sortByDesc('updated_at')->first();
                $sizes = [];
                foreach ($group as $g) {
                    if ($g->size) { $sizes[$g->size] = $g->price; }
                }
                // Determine display price: prefer 'Full' size; fallback to max price
                $displayPrice = $group->max('price');
                foreach ($sizes as $k => $v) {
                    if (strtolower((string) $k) === 'full') { $displayPrice = $v; break; }
                }

                return (object) [
                    'id' => $firstItem->id,
                    'name' => $firstItem->name,
                    'description' => $firstItem->description,
                    'image' => $firstItem->image,
                    'section' => $firstItem->section,
                    'sizes' => $sizes,
                    'display_price' => $displayPrice,
                    'min_price' => $group->min('price'),
                    'max_price' => $group->max('price'),
                    'has_multiple_sizes' => count($sizes) > 1,
                ];
            })
            // Apply price range filter against display price
            ->filter(function ($item) use ($min, $max) {
                return ($item->display_price >= $min && $item->display_price <= $max);
            })
            ->values();

            return view($first . '.' . $second, [
                'categories' => $categories,
                'items' => $items,
                'min_price' => $min,
                'max_price' => $max,
                'selected_categories' => $selectedCats,
                'menuSections' => $menuSections,
            ]);
        }

        return view($first . '.' . $second, compact('menuSections'));
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        $data = null;
        $recommendations = [];
        if ($third) {
            if ($first === 'client' && $second === 'product-detail') {
                $data = MenuItem::find($third);
                if ($data) {
                    $recommendations = MenuItem::where('menu_section_id', $data->menu_section_id)
                        ->where('id', '!=', $data->id)
                        ->latest('id')
                        ->take(3)
                        ->get();

                    // Collect size options for this product (grouped by name)
                    $siblings = MenuItem::where('name', $data->name)->get();
                    $sizes = [];
                    foreach ($siblings as $s) {
                        if ($s->size) { $sizes[$s->size] = $s->price; }
                    }
                    $data->sizes = $sizes;
                    $data->min_price = $siblings->min('price');
                }
            } elseif ($first === 'products') {
                $data = MenuItem::find($third);
            }
        }

        // Check if current item is wishlisted (for product detail page)
        $isWishlisted = false;
        if ($data && Auth::check() && $first === 'client' && $second === 'product-detail') {
            $isWishlisted = \App\Models\Wishlist::where('user_id', Auth::id())
                ->where('menu_item_id', $data->id)
                ->exists();
        }

        return view($first . '.' . $second , [
            'data' => $data,
            'recommendations' => $recommendations,
            'menuSections' => $menuSections,
            'isWishlisted' => $isWishlisted,
        ]);
    }
}
