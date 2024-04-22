<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $authUser = User::find(Auth::user()->id);
        $user = User::find($id);
        $postes = Idee::where('user_id',$user->id)->get();
        return view('user.profile',compact(['user','postes','authUser']));
    }
}
