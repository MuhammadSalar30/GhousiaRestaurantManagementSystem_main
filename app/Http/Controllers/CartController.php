<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\MenuItem;
use App\Models\MenuSection;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function index()
    {
        $cartItems = Auth::user()->cart()->with('menuItem')->get();
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view('client.cart', compact('cartItems', 'total', 'menuSections'));
    }

    /**
     * Render side cart drawer content (partial view)
     */
    public function side()
    {
        $cartItems = Auth::user()->cart()->with('menuItem')->get();
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        return view('client.partials.side-cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
        ]);

        $menuItem = MenuItem::findOrFail($request->menu_item_id);

        // Determine price based on size
        $price = $menuItem->price;
        if ($request->size && isset($menuItem->sizes[$request->size])) {
            $price = $menuItem->sizes[$request->size];
        }

        // Check if item already exists in cart
        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('menu_item_id', $request->menu_item_id)
            ->where('size', $request->size)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'menu_item_id' => $request->menu_item_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'price' => $price
            ]);
        }

        $cartCount = Auth::user()->cart()->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart successfully',
            'cart_count' => $cartCount
        ]);
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'subtotal' => $cartItem->price * $request->quantity
        ]);
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart successfully'
        ]);
    }

    public function clearCart()
    {
        Auth::user()->cart()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully'
        ]);
    }

    public function getCartCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $count = Auth::user()->cart()->sum('quantity');
        return response()->json(['count' => $count]);
    }

    /**
     * Debug method to check cart functionality
     */
    public function debug()
    {
        $user = Auth::user();
        $cartItems = $user->cart()->with('menuItem')->get();

        $debug = [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'cart_items_count' => $cartItems->count(),
            'cart_items' => $cartItems->toArray(),
            'all_cart_items_in_db' => \App\Models\Cart::all()->toArray(),
            'auth_check' => Auth::check(),
            'auth_id' => Auth::id(),
        ];

        return response()->json($debug);
    }
}
