<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function register(request $datos){

        $usuario['nombre'] = ucwords(strtolower( $datos-> get('nombre')));
        $usuario['email'] = strtolower( $datos-> get('email'));
        $usuario['password'] = Hash::make( $datos-> get('password'));
        User::create( $usuario);
        return redirect('/login');
    }

    public function check (Request $datos){
        
        if (Auth::attempt($datos->except('_token'))){
            $datos->session()->regenerate();

            return redirect()->intended('home');
        }

        return back ()->withErrors([
            'email' => 'Los datos son incorrectos, porfavor vuelva a intentarlo.',
        ])->onlyInput('email');
    }

}
