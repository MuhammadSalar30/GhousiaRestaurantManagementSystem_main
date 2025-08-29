<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function storeMenuItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'menu_section_id' => 'required|exists:menu_sections,id',
            'price' => 'required|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'OrderType' => 'nullable|in:delivery,pickup,dine-in',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'additional_image_1' => 'nullable|image',
            'additional_image_2' => 'nullable|image',
            'size' => 'nullable|in:full,half,quarter',
        ]);

        // Sanitize description to plain text (no HTML tags)
        if ($request->filled('description')) {
            $validated['description'] = trim(strip_tags($request->input('description')));
        }

        $data = $validated;
        unset($data['image'], $data['additional_image_1'], $data['additional_image_2']);

        $menuItem = new MenuItem();
        $allowed = ['name','menu_section_id','price','description','size'];
        $menuItem->fill(array_intersect_key($data, array_flip($allowed)));
        $menuItem->save();

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'menu_item_' . $menuItem->id . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->image = 'images/' . $imageName;
        }

        // Handle additional image 1
        if ($request->hasFile('additional_image_1')) {
            $image = $request->file('additional_image_1');
            $imageName = 'menu_item_' . $menuItem->id . '_additional_1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->additional_image_1 = 'images/' . $imageName;
        }

        // Handle additional image 2
        if ($request->hasFile('additional_image_2')) {
            $image = $request->file('additional_image_2');
            $imageName = 'menu_item_' . $menuItem->id . '_additional_2.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->additional_image_2 = 'images/' . $imageName;
        }

        $menuItem->save();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'id' => $menuItem->id]);
        }

        return redirect()->route('second', ['products', 'list'])->with('status', 'Product created successfully');
    }

    public function updateMenuItem(Request $request, $id)
    {
        // dd($request->all());
        $menuItem = MenuItem::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'menu_section_id' => 'required|exists:menu_sections,id',
            'price' => 'required|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'OrderType' => 'nullable|in:delivery,pickup,dine-in',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'additional_image_1' => 'nullable|image',
            'additional_image_2' => 'nullable|image',
            'size' => 'nullable|in:full,half,quarter',
        ]);

        // Sanitize description to plain text (no HTML tags)
        if ($request->filled('description')) {
            $validated['description'] = trim(strip_tags($request->input('description')));
        }

        // Only fill columns that exist in the DB
        $allowed = ['name','menu_section_id','price','description','size'];
        $menuItem->fill(array_intersect_key($validated, array_flip($allowed)));

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'menu_item_'.$menuItem->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->image = 'images/'.$imageName;
        }

        // Handle additional image 1
        if ($request->hasFile('additional_image_1')) {
            $image = $request->file('additional_image_1');
            $imageName = 'menu_item_' . $menuItem->id . '_additional_1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->additional_image_1 = 'images/' . $imageName;
        }

        // Handle additional image 2
        if ($request->hasFile('additional_image_2')) {
            $image = $request->file('additional_image_2');
            $imageName = 'menu_item_' . $menuItem->id . '_additional_2.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $menuItem->additional_image_2 = 'images/' . $imageName;
        }

        $menuItem->save();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'id' => $menuItem->id]);
        }

        return redirect()->route('second', ['products', 'list'])->with('status', 'Product updated successfully');
    }

    public function deleteMenuItem($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        if ($menuItem->image) {
            $path = public_path('/' . ltrim($menuItem->image, '/'));
            if (file_exists($path)) @unlink($path);
        }
        $menuItem->delete();
        return response()->json(['success' => true]);
    }

}
