<?php

use App\Http\Controllers\dashboardPostController;
use App\Http\Controllers\dashboardCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', function() {
    return view('home',[
        "title" => " ",
        "active"=>"home"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
    
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('/konsultasi', function(){
    return view('konsultasi', [
        "title" => "konsultasi",
        "active"=>"konsultasi"
    ]);
});

Route::get('/kontak', function(){
    return view('kontak', [
        "title" => "kontak",
        "active"=>"kontak"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [dashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('dashboard/posts', dashboardPostController::class)->middleware('auth');



Route::get('/dashboard/categories/checkSlug', [dashboardCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('dashboard/categories', dashboardCategoryController::class)->middleware('auth');
