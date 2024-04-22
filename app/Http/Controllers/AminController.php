<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
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
    public function users()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function banner_user($id)
    {
        $user = user::find($id);
        $user->blocked = 1;
        $user->save();
        return redirect()->route('users');
    }
    public function debanner_user($id)
    {
        $user = user::find($id);
        $user->blocked = 0;
        $user->save();
        return redirect()->route('users');
    }
}
