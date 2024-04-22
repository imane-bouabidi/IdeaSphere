<?php

use App\Http\Controllers\AminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\UserController;
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
Route::post('/follow_category', [PosteController::class, 'follow_category'])->name('follow_category');



//admin  


Route::get('/admin', [AuthController::class, 'admin'])->name('admin');

//hashtags
Route::get('/hashtags', [AminController::class, 'hashtags'])->name('hashtags');
Route::post('/Edit_Hashtag', [HashtagController::class, 'Edit_Hashtag'])->name('Edit_Hashtag');
Route::get('/delete_Hashtag/{id}', [HashtagController::class, 'delete_Hashtag'])->name('delete_Hashtag');
Route::post('/addHashtag', [HashtagController::class, 'addHashtag'])->name('addHashtag');

//category
Route::get('/categories', [AminController::class, 'categories'])->name('categories');
Route::post('/addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('/Edit_category', [CategoryController::class, 'Edit_category'])->name('Edit_category');
Route::get('/delete_Category/{id}', [CategoryController::class, 'delete_Category'])->name('delete_Category');


//postes
Route::get('/postes', [PosteController::class, 'postes'])->name('postes');
Route::post('/addPoste', [PosteController::class, 'addPoste'])->name('addPoste');
Route::post('/Edit_Poste', [PosteController::class, 'Edit_Poste'])->name('Edit_Poste');
Route::get('/delete_Poste/{id}', [PosteController::class, 'delete_Poste'])->name('delete_Poste');
Route::get('/hide_poste/{id}', [PosteController::class, 'hide_poste'])->name('hide_poste');
Route::get('/show_poste/{id}', [PosteController::class, 'show_poste'])->name('show_poste');

Route::get('/poste_details/{id}', [PosteController::class, 'poste_details'])->name('poste_details');

//users for admin

Route::get('/users', [AminController::class, 'users'])->name('users');
Route::get('/users', [AminController::class, 'users'])->name('users');
Route::get('/banner_user/{id}', [AminController::class, 'banner_user'])->name('banner_user');
Route::get('/debanner_user/{id}', [AminController::class, 'debanner_user'])->name('debanner_user');


//User
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

