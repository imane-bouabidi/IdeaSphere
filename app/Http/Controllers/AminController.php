<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class AminController extends Controller
{
    public function hashtags()
    {
        $Hashtags = Tag::all();
        return view('admin.hashtags',compact('Hashtags'));
    }
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories',compact('categories'));
    }
}
