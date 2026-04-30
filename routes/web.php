<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Contact Routes
Route::get('/contact', [ProductController::class, 'contact'])->name('contact');
Route::post('/contact', [ProductController::class, 'storeContact'])->name('contacts.store');