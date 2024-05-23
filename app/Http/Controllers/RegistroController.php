<?php
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'correo_cliente' => 'required|email|unique:clientes',
            'password' => 'required|min:6|confirmed',
        ]);

        $cliente = new Cliente();
        $cliente->correo_cliente = $request->correo_cliente;
        $cliente->clave_cliente = Hash::make($request->password); // Encriptar contraseña
        $cliente->save();

        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
    }
}
