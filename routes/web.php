<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{product}', [CartController::class, 'add']);
Route::post('/cart/update/{product}', [CartController::class, 'update']);
Route::post('/cart/remove/{product}', [CartController::class, 'remove']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'store']);
