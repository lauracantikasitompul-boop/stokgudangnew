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

Route::get('/contact', function () {
    return view('contact');
});

// Gunakan controller untuk product (hapus yang view langsung)
Route::get('/product', [ProductController::class, 'index']);