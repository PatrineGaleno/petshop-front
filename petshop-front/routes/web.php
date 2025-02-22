<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/products', [ProductsController::class, 'index'])->name('products');
