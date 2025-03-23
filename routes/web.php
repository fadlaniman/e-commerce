<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/{id}', 'show')->name('products.show');
    Route::post('/products', 'store')->name('products.store');
    Route::post('/products/{id}', 'update')->name('products.update');
    Route::post('/products/{id}', 'destroy')->name('products.destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', action: 'index')->name('categories.index');
});
