<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
</head>
<body>

    <div class="login-container">

        <h1 class="logo">GymLink</h1>

        <h2>Iniciar Sesión</h2>

        <form action="{{ url('/login') }}" method="POST">
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

            <input
                type="email"
                name="email"
                placeholder="Correo electrónico"
                value="{{ old('email') }}"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Contraseña"
                required
            >

            <button type="submit">
                Ingresar
            </button>

        </form>

        <p>
            ¿No tienes cuenta?
            <a href="{{ url('/registro') }}">Registrarse</a>
        </p>

        <a href="{{ url('/') }}" class="volver">
            ← Volver al inicio
        </a>

    </div>

</body>
</html>