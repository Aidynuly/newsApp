<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::group(['prefix' => '/'], function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/detail/{id}', [HomeController::class, 'detail']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/saveComment/{slug}/{id}', [HomeController::class, 'saveComment']);
    Route::get('/post', [HomeController::class, 'savePost']);
    Route::post('/storePost', [HomeController::class, 'storePost']);
    Route::get('/logout', [HomeController::class, 'logout']);
});

Route::group(['prefix' => '/admin'], function() {
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'submit_login']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/category/{id}/delete', [CategoryController::class, 'destroy']);
    Route::resource('/category',CategoryController::class);
    Route::get('/post/{id}/delete', [\App\Http\Controllers\PostController::class, 'destroy']);
    Route::resource('/post', \App\Http\Controllers\PostController::class);
});

