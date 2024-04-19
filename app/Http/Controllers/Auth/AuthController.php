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
        $tags = Tag::all();
        $categories = Category::all();
        $postes = Idee::all();


        // $user = Auth::user();
        // $followedTags = $user ? $user->followedTags : collect(); 
        // $ideaIds = [];
        // if ($followedTags->isNotEmpty()) {
        //     $ideaIds = $followedTags->pluck('id')->toArray();
        //     $postes = Idee::whereIn('id', $ideaIds)->latest()->paginate(10); 
        // } else {
        //     $postes = Idee::all();
        // }

        return view('home', compact(['categories', 'postes', 'tags']));
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
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
        ]);
        $user->assignRole('user');
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Veuillez vous connecter.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
