<?php

use App\Http\Controllers\AdoptionsController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('/login/destroy', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/sales/create/{productId}', [SalesController::class, 'create'])->name('sales.create');
Route::post('/sales/store', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales/history', [SalesController::class, 'history'])->name('sales.history');

Route::get('/pets', [PetController::class, 'index'])->name('pets');

Route::get('/adoptions/create/{petId}', [AdoptionsController::class, 'create'])->name('adoptions.create');
Route::post('/adoptions/store', [AdoptionsController::class, 'store'])->name('adoptions.store');
Route::get('/adoptions/history', [AdoptionsController::class, 'history'])->name('adoptions.history');
