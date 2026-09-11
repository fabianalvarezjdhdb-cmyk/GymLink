<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GymLink</title>
    <link rel="stylesheet" href="{{ asset('CSS/registro.css') }}">
</head>
<body>

    <div class="registro-container">
        <h2>Crear Cuenta</h2>

        <form action="{{ url('/registro') }}" method="POST">
            @csrf

            @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>

            <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>

            <input type="text" name="documento" placeholder="Número de Documento" value="{{ old('documento') }}" required>

            <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>

            <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">

            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit">Registrarse</button>
        </form>

        <p>
            ¿Ya tienes cuenta? 
            <a href="{{ url('/login') }}">Iniciar Sesión</a>
        </p>
    </div>

</body>
</html>