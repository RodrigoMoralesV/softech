<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function check(Request $request)
    {
        $credentials = $request->only('correo_cliente', 'password');

        if (Auth::guard('web')->attempt(['correo_cliente' => $credentials['correo_cliente'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'correo_cliente' => 'Los datos son incorrectos, por favor vuelva a intentarlo.',
        ])->onlyInput('correo_cliente');
    }
}

