<?php

use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {

    $postData = [
        "name" => "Ferdiyansyah",
        "age" => "18 years old",
        "img" => "img.jpg"
    ];

    return view('about', [
        "title" => "About",
        "post" => $postData
    ]);
});

Route::get('/posts', [PostsController::class, "index"]);

Route::get("/posts/{posts:slug}", [PostsController::class, "show"]);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',  [LoginController::class, 'authenticate']);

// Registration
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// Logout
Route::post('/logout',  [LoginController::class, 'logout']);


// Dashboard user
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
->middleware('auth');   
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

