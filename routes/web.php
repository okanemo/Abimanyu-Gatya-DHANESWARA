<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SubCategoryController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::resource('/categories', CategoryController::class, ['names' => 'category']);
        Route::resource('/sub-categories', SubCategoryController::class, ['names' => 'sub-category']);
    });
    Route::resource('/items', ItemController::class, ['names' => 'item']);
    Route::post('/items/sub-categories', [\App\Http\Controllers\ItemController::class, 'subCategory'])->name('item.sub-category');
});