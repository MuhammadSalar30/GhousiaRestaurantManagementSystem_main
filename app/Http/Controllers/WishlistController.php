<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\MenuItem;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|integer',
        ]);

        $userId = Auth::id();
        $menuItemId = (int) $request->menu_item_id;

        // Get the menu item to get its name
        $menuItem = MenuItem::find($menuItemId);
        if (!$menuItem) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }

        $existing = Wishlist::where('user_id', $userId)->where('menu_item_id', $menuItemId)->first();
        if ($existing) {
            $existing->delete();
            return response()->json([
                'success' => true,
                'wishlisted' => false,
                'message' => $menuItem->name . ' removed from wishlist',
                'item_name' => $menuItem->name
            ]);
        }

        Wishlist::create([
            'user_id' => $userId,
            'menu_item_id' => $menuItemId,
            'item_name' => $menuItem->name
        ]);

        return response()->json([
            'success' => true,
            'wishlisted' => true,
            'message' => $menuItem->name . ' added to wishlist',
            'item_name' => $menuItem->name
        ]);
    }

    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())
            ->with('menuItem')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('client.wishlist', compact('wishlistItems'));
    }
}


