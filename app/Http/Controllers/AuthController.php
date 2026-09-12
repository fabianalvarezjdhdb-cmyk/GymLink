<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente; // Asegúrate de tener o crear el Modelo Cliente

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Buscar al cliente en la base de datos por su correo
        $cliente = \App\Models\Cliente::on('mysql')->where('email', $request->email)->first();

        // 3. Verificar si existe y si la contraseña coincide
        if (!$cliente || !Hash::check($request->password, $cliente->password)) {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ])->withInput();
        }

        // 4. Iniciar sesión manualmente o registrar en sesión el rol
        // (Asumiendo que guardas el estado de sesión o usas Auth de Laravel)
        session(['cliente_id' => $cliente->id, 'rol' => $cliente->rol]);

        // 5. Redirigir al dashboard correspondiente según el rol
        switch ($cliente->rol) {
            case 'admin':
                return redirect('/admin/dashboard');
            case 'coach':
                return redirect('/coach/dashboard');
            default:
                return redirect('/dashboard');
        }
    }

    // Mostrar la vista de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar y guardar el registro
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento' => 'required|string|unique:clientes,documento',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required|min:6',
        ], [
            'documento.unique' => 'Este número de documento ya está registrado.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        \App\Models\Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'rol' => 'cliente', // Por defecto se registran como clientes normales
        ]);

        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}
