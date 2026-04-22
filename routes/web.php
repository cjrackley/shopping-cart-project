<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{product}', [CartController::class, 'add']);
Route::get('/cart/update/{product}', [CartController::class, 'update']);
Route::get('/cart/remove/{product}', [CartController::class, 'remove']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/checkout', [OrderController::class, 'store']);
