<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

// Página de inicio
Route::get('/', [IndexController::class, 'index'])->name('index');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/check', [LoginController::class, 'check'])->name('login.check');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CarritoController::class, 'addToCart'])->name('cart.add');
    Route::get('/Carrito/cart', [CarritoController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/remove/{productId}', [CarritoController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/total', [CarritoController::class, 'calculateTotal'])->name('cart.total');
    Route::resource('pago', PagoController::class);
    Route::resource('usuario', UsuarioController::class);
});

Route::resource('categorias', CategoriaController::class);
Route::resource('producto', ProductoController::class);
Route::resource('registro', RegistroController::class);
