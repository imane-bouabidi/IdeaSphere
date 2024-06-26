<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Idee;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            
            $followedCategoriesIds = $user->followedCategories->pluck('id');
            $followedTagsIds = $user->followedTags->pluck('id');
            
            $tags = Tag::whereNotIn('id', $followedTagsIds)->get();
            $categories = Category::whereNotIn('id', $followedCategoriesIds)->get();

            $FollowedPostes = Idee::whereHas('category', function ($query) use ($followedCategoriesIds) {
                $query->whereIn('id', $followedCategoriesIds);
            })
                ->orWhereHas('tags', function ($query) use ($followedTagsIds) {
                    $query->whereIn('tags.id', $followedTagsIds);
                })
                ->orderBy('created_at', 'desc')
                ->distinct()
                ->paginate(3);

                if (!$FollowedPostes->isEmpty()) {
                    $postes = $FollowedPostes;
                }else{
                    $postes = Idee::orderBy('created_at', 'desc')->paginate(3);
                }
            return view('home', compact(['categories', 'postes', 'tags', 'user']));
        } else {
            return redirect()->route('login');
        }
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function admin()
    {
        $postes = Idee::all()->count();
        $users = User::all()->count();
        $categories = Category::all()->count();
        $hashtags = Tag::all()->count();
        return view('admin.dashboard', compact(['postes', 'users', 'categories', 'hashtags']));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended('home');
            }
        } else {
            return back()->withErrors(['email' => 'Les informations d\'identification fournies sont incorrectes.'])->withInput();
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'blocked' => 0,
            'image' => 'user.jpg',
            'back_image' => '',
            'description' => '',
            'bio' => '',
        ]);
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Veuillez vous connecter.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
