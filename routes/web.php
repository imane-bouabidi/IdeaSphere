<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PosteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Routes d'authentification
Route::get('/loginiew', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('registerUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [AuthController::class, 'index'])->name('home');

Route::post('/create', [PosteController::class, 'store'])->name('create');
Route::post('/addComment', [PosteController::class, 'addComment'])->name('addComment');
Route::post('/follow_tag', [PosteController::class, 'follow_tag'])->name('follow_tag');
