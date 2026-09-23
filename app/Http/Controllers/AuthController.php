<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class AuthController extends Controller
{
    // Mostrar la vista de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar Inicio de Sesión
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

        // 2. Buscar al cliente en la base de datos
        $cliente = Cliente::where('email', $request->email)->first();

        // 3. Verificar si existe y la contraseña coincide
        if (!$cliente || !Hash::check($request->password, $cliente->password)) {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ])->withInput();
        }

        // 4. Guardar datos en la sesión
        session([
            'cliente_id' => $cliente->id,
            'rol' => $cliente->rol
        ]);

        // 5. Redirigir al dashboard correspondiente según el rol
        return $this->redirectUserByRole($cliente->rol);
    }

    // Mostrar la vista de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar y guardar el registro
    public function register(Request $request)
    {
        // 1. Validar datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento' => 'required|string|unique:clientes,documento',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string',
            'rol' => 'required|in:coach,cliente', // Solo roles públicos
            'password' => 'required|min:6',
        ], [
            'documento.unique' => 'Este número de documento ya está registrado.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'rol.required' => 'Debe seleccionar un rol.',
            'rol.in' => 'El rol seleccionado no es válido.',
        ]);

        // 2. Crear el nuevo registro en la base de datos
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        // 3. Iniciar sesión automáticamente tras el registro
        session([
            'cliente_id' => $cliente->id,
            'rol' => $cliente->rol
        ]);

        // 4. Redirigir directamente al dashboard según su rol
        return $this->redirectUserByRole($cliente->rol);
    }

    // Función auxiliar para redirigir según el rol
    private function redirectUserByRole($rol)
    {
        switch ($rol) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'coach':
                return redirect()->route('coach.dashboard');
            default:
                return redirect()->to('/dashboard');
        }
    }

    // Método para Cerrar Sesión
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->forget(['cliente_id', 'rol']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}