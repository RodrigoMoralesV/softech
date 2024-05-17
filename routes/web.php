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

Route::get('/', function () {
    if (Auth::check())
        return redirect('index');
    return view('login');
});
Route::get('/login', function () {
    if (Auth::check())
        return redirect('index');
    return view('login/login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/register', function () {
    return view('register');
});





