<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('index');
});



Route::post('/cart/add/{productId}', [CarritoController::class, 'addToCart'])->name('cart.add');
Route::get('/Carrito/cart', [CarritoController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove/{productId}', [CarritoController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/total', [CarritoController::class, 'calculateTotal'])->name('cart.total');
