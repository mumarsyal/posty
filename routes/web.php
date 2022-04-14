<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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
	return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
	->name('dashboard')
	->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])
	->name('register')
	->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])
	->name('login')
	->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'detail'])->name('posts.detail');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostController::class, 'like'])
	->name('posts.likes')
	->middleware('auth');

Route::delete('/posts/{post}/likes', [PostController::class, 'unlike']);

Route::get('/users/{user}/posts', [UserProfileController::class, 'index'])
	->name('users.posts')
	->middleware('auth');
