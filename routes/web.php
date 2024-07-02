<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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
Route::get('/home', function() {
    return redirect('/');
});

Route::middleware(['guest'])->group(function() {
    Route::get('/auth/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/auth/signup', [AuthController::class, 'signupPost'])->name('signupPost');

    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'loginPost'])->name('loginPost');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/sendposts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/{username}/{id}', [PostsController::class, 'getPost'])->where('id', '[0-9]+')->name('posts.getPost');
    Route::post('/liked', [PostsController::class, 'likes'])->name('posts.likes');

    Route::get('/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/{username}/likes', [ProfileController::class, 'likes'])->name('profile.likes');

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});





