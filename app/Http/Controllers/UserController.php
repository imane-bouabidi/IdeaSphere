<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idee;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $authUser = User::find(Auth::user()->id);
        $user = User::find($id);
        $postes = Idee::where('user_id', $user->id)->paginate(3);
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.profile', compact(['user', 'postes', 'authUser', 'categories', 'tags']));
    }
    public function edit_description(Request $request)
    {
        $user = User::find($request->user_id);
        if($request->description){
            $user->description = $request->description;
        }else{
            $user->description = "";
        }
        $user->save();
        return back();
    }
    public function edit_bio(Request $request)
    {
        $user = User::find($request->user_id);
        if ($request->bio) {
            $user->bio = $request->bio;
        } else {
            $user->bio = "";
        }
        if ($request->UserName) {
            $user->name = $request->UserName;
        }
        $user->save();
        return back();
    }
}
