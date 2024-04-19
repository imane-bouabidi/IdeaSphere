<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        Category::create([
            'Nom'=>$request->CategoryInput,
        ]);
        return redirect()->route('categories');
    }
    public function Edit_category(Request $request)
    {
        $category = Category::find($request->id);
        $category->Nom = $request->CategoryName;
        $category->save();
        return redirect()->route('categories');
    }
    public function delete_Category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories');
    }
}
