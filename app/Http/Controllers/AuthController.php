<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

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

        // 2. Buscar al usuario en la base de datos
        $usuario = Usuario::where('email', $request->email)->first();

        // 3. Verificar si existe y la contraseña coincide
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ])->withInput();
        }

        // 4. Guardar datos en la sesión (Incluyendo Nombre y Apellido)
        session([
            'usuario_id' => $usuario->id,
            'usuario_nombre' => $usuario->nombre,
            'usuario_apellido' => $usuario->apellido,
            'rol' => $usuario->rol
        ]);

        // 5. Redirigir al dashboard correspondiente según el rol
        return $this->redirectUserByRole($usuario->rol);
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
            'documento' => 'required|string|unique:App\Models\Usuario,documento',
            'email' => 'required|email|unique:App\Models\Usuario,email',
            'telefono' => 'nullable|string',
            'rol' => 'required|in:coach,cliente',
            'password' => 'required|min:6',
        ], [
            'documento.unique' => 'Este número de documento ya está registrado.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'rol.required' => 'Debe seleccionar un rol.',
            'rol.in' => 'El rol seleccionado no es válido.',
        ]);

        // 2. Crear el nuevo registro en la base de datos
        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        // 3. Redirigir al login después de registrarse exitosamente
        return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
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
        
        $request->session()->forget(['usuario_id', 'usuario_nombre', 'usuario_apellido', 'rol']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}