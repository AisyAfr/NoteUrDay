<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostsWebController;
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

Route::get('/', [PostsWebController::class, 'index']);
Route::get('/{id}/detail', [PostsWebController::class, 'show']);
