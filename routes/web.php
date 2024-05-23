<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/registro',function (){
    return view('registro/registro');
});

// Devuelve la vista de index por defecto
Route::get('/', function () {
    return view('index');
});

// Se asegura que una persona logueada no pueda volver al login
Route::get('/login', function () {
    if (Auth::check())
        return redirect('index');
    return view('login/login');
})->name('login');

// Recurso encargado de gestionar el login
Route::resource('login',LoginController::class);

// Recurso encargado de gestionar el registro
// Route::resource('registro',RegistroController::class);

// Recurso encargado de gestionar el index
Route::resource('index',IndexController::class);

// Recurso encargado de gestionar las categorias de los productos
Route::resource('categorias',CategoriaController::class);

// Recurso encargado de gestionar los productos
Route::resource('producto',ProductoController::class);

// Rutas protegidas, las cuales solo se pueden acceder si el usuario esta logueado
Route::middleware(['auth'])->group(function () {

    Route::post('/cart/add/{productId}', [CarritoController::class, 'addToCart'])->name('cart.add');
    Route::get('/Carrito/cart', [CarritoController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/remove/{productId}', [CarritoController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/total', [CarritoController::class, 'calculateTotal'])->name('cart.total');
    
    Route::resource('pago',PagoController::class);

    Route::resource('usuario',UsuarioController::class);
});
