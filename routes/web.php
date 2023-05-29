<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'authorization']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/create-post', [PostController::class, 'index'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::delete('/posts/{post:slug}', [PostController::class, 'destroy']);
Route::put('/posts/{post:slug}', [PostController::class, 'update']);

Route::get('/update-post/{post:slug}', [PostController::class, 'updatePage'])->middleware('auth');

Route::get('/my-post', [MyPostController::class, 'index'])->middleware('auth');