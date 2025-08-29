<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\MenuItem;
use App\Models\MenuSection;

class RatingController extends Controller
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

    public function store(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        // Check if user has already rated this item
        $existingRating = Rating::where('user_id', Auth::id())
            ->where('menu_item_id', $request->menu_item_id)
            ->first();

        if ($existingRating) {
            $existingRating->update([
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
        } else {
            Rating::create([
                'user_id' => Auth::id(),
                'menu_item_id' => $request->menu_item_id,
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Rating submitted successfully'
        ]);
    }

    public function getItemRatings($menuItemId)
    {
        $ratings = Rating::where('menu_item_id', $menuItemId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $averageRating = $ratings->avg('rating') ?? 0;
        $totalRatings = $ratings->count();

        return response()->json([
            'ratings' => $ratings,
            'average_rating' => round($averageRating, 1),
            'total_ratings' => $totalRatings
        ]);
    }

    public function getUserRating($menuItemId)
    {
        $rating = Rating::where('user_id', Auth::id())
            ->where('menu_item_id', $menuItemId)
            ->first();

        return response()->json([
            'rating' => $rating ? $rating->rating : 0,
            'comment' => $rating ? $rating->comment : ''
        ]);
    }
}
