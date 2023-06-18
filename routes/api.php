<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/recyclebin', [PostsController::class, 'trash']);
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::post('/posts/create', [PostsController::class, 'store']);
Route::patch('/posts/edit/{id}', [PostsController::class, 'update']);
Route::delete('/posts/recyclebin/{id}/permanent', [PostsController::class, 'permanent']);
Route::delete('/posts/{id}/delete', [PostsController::class, 'destroy']);
Route::post('/posts/{id}/undo', [PostsController::class, 'undo']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
