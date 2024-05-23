<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Maneja la autenticación de usuarios
    public function check(Request $request)
    {
        $credentials = $request->only('correo_cliente', 'password');

        if (Auth::attempt(['correo_cliente' => $credentials['correo_cliente'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirige a la página principal si la autenticación es exitosa
        }

        return back()->withErrors([
            'correo_cliente' => 'Los datos son incorrectos, por favor vuelva a intentarlo.',
        ])->onlyInput('correo_cliente');
    }

    // Maneja el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
