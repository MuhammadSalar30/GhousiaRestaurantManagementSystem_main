<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSection;

class MenuSectionController extends Controller
{
    public function destroy($id)
    {
        $section = MenuSection::find($id);
        if ($section) {
            $section->delete();
        }
        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('status', 'Category deleted');
    }
}


