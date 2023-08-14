<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('categories', CategoryController::class)
    ->only(['index', 'store', 'update', 'destroy']);
Route::resource('articles', ArticleController::class)
    ->only(['index', 'store', 'update', 'destroy']);
