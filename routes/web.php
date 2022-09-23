<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
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

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

// Post
//      Like
Route::post('/post/{post}/like', [LikeController::class, "store"])->name('post.like');
Route::delete('/post/{post}/like', [LikeController::class, "destroy"]);
//      Editing
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::get('/post/create', [PostController::class, 'index'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.create');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/upload', [UploadController::class, 'store'])->name('upload');
Route::post('/upload/{user:name}', [UploadController::class, 'update'])->name('upload.user');

// Follows
Route::post('/{user:name}/follow', [FollowController::class, 'store'])->name('follow');
Route::delete('/{user:name}/follow', [FollowController::class, 'destroy'])->name('unfollow');


// Profile
Route::get('/myprofile', [ProfileController::class, 'index'])->name('profile');
Route::post('/myprofile', [ProfileController::class, 'store']);
Route::get('/myprofile/delete', [ProfileController::class, 'show'])->name('profile.delete');
Route::delete('/myprofile/delete', [ProfileController::class, 'destroy']);


// Dashboard
Route::get('/{user:name}', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'home'])->name('index');