<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/supplier', function () {
    return view('supplier');
})->name('supplier.index');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');