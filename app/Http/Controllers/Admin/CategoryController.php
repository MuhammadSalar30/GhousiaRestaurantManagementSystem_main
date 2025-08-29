<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuSection;
use App\Models\MenuItem;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = MenuSection::withCount('items')->orderBy('name')->get();
        return view('products.categorylist', compact('categories'));
    }

    public function create()
    {
        $categories = MenuSection::withCount('items')->orderBy('name')->get();
        return view('products.categorysetup', compact('categories'));
    }

    public function edit($id)
    {
        $category = MenuSection::findOrFail($id);
        $categories = MenuSection::withCount('items')->orderBy('name')->get();
        return view('products.categorysetup', compact('category', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image',
        ]);

        $category = new MenuSection();
        $category->name = $validated['name'];
        $category->discount = $validated['discount'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'category_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->image = 'images/categories/' . $imageName;
        }

        $category->save();

        return back()->with('status', 'Category created');
    }

    public function update(Request $request, $id)
    {
        $category = MenuSection::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image',
        ]);

        $category->name = $validated['name'];
        $category->discount = $validated['discount'] ?? 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $image = $request->file('image');
            $imageName = 'category_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->image = 'images/categories/' . $imageName;
        }

        $category->save();

        return back()->with('status', 'Category updated');
    }

    public function destroy(Request $request, $id)
    {
        $category = MenuSection::findOrFail($id);

        // Delete associated image if exists
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        // If you need to handle items, you can move/delete here. For now, just delete the category.
        $category->delete();
        return response()->json(['success' => true]);
    }
}

