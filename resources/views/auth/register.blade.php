<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GymLink</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('CSS/registro.css') }}">

    <style>
        :root {
            --gl-primary: #0d6efd;
            --gl-dark: #0f172a;
        }

        body, html {
            min-height: 100vh;
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
        }

        /* Layout Split Screen 50% / 50% */
        .split-container {
            min-height: 100vh;
            display: flex;
            width: 100%;
        }

        /* Panel Izquierdo: Ocupa el 50% */
        .brand-panel {
            flex: 1;
            width: 50%;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(13, 110, 253, 0.85)), 
                        url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 60px;
            color: #ffffff;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand-panel .logo-brand {
            font-size: 2rem;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-panel .logo-brand i {
            color: var(--gl-primary);
        }

        .brand-hero-text h1 {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .brand-features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 0.88rem;
            font-weight: 600;
        }

        /* Panel Derecho: Ocupa el otro 50% */
        .form-panel {
            flex: 1;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 40px;
            background-color: #ffffff;
            overflow-y: auto;
        }

        .registro-box {
            width: 100%;
            max-width: 460px;
        }

        .registro-box h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gl-dark);
            margin-bottom: 6px;
        }

        .registro-box .subtitle {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 25px;
        }

        /* Inputs Personalizados */
        .input-group-custom {
            position: relative;
            margin-bottom: 16px;
        }

        .input-group-custom i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.05rem;
            transition: color 0.3s;
            pointer-events: none;
        }

        .registro-box input[type="text"],
        .registro-box input[type="email"],
        .registro-box input[type="password"],
        .registro-box select {
            width: 100%;
            padding: 13px 16px 13px 46px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            background-color: #f8fafc;
            font-size: 0.92rem;
            font-weight: 500;
            color: #1e293b;
            outline: none;
            transition: all 0.3s ease;
            box-sizing: border-box;
            appearance: none;
        }

        .registro-box input:focus,
        .registro-box select:focus {
            border-color: var(--gl-primary);
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.12);
        }

        .registro-box input:focus + i,
        .registro-box select:focus + i {
            color: var(--gl-primary);
        }

        /* Botón de Envio */
        .registro-box button[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background-color: var(--gl-primary);
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(13, 110, 253, 0.3);
            margin-top: 10px;
        }

        .registro-box button[type="submit"]:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(13, 110, 253, 0.4);
        }

        /* Enlaces de pie de formulario */
        .registro-footer {
            margin-top: 25px;
            text-align: center;
        }

        .registro-footer p {
            font-size: 0.92rem;
            color: #64748b;
            margin-bottom: 12px;
        }

        .registro-footer p a {
            color: var(--gl-primary);
            font-weight: 700;
            text-decoration: none;
        }

        .registro-footer p a:hover {
            text-decoration: underline;
        }

        .volver {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.88rem;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .volver:hover {
            color: var(--gl-primary);
        }

        /* Alertas de error */
        .error-alert {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 12px;
            font-size: 0.88rem;
        }

        .error-alert ul {
            margin: 0;
            padding-left: 18px;
        }

        /* Ocultar panel lateral en dispositivos móviles */
        @media (max-width: 991px) {
            .brand-panel {
                display: none;
            }
            .form-panel {
                width: 100%;
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="split-container">

        <!-- LADO IZQUIERDO: Marca y Banner -->
        <div class="brand-panel">
            <a href="{{ url('/') }}" class="logo-brand">
                <i class="fa-solid fa-dumbbell"></i> GymLink
            </a>

            <div class="brand-hero-text">
                <h1>Únete a la nueva <br><span class="text-primary">era fitness.</span></h1>
                <p class="lead opacity-75">Crea tu cuenta en minutos para acceder a rutinas personalizadas y hacer seguimiento a tu progreso.</p>
                
                <div class="brand-features">
                    <div class="feature-item">
                        <i class="fa-solid fa-user-check text-primary"></i> Perfil Personalizado
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-shield-halved text-primary"></i> Acceso Seguro
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-users text-primary"></i> Comunidad Activa
                    </div>
                </div>
            </div>

            <div class="small opacity-50">
                &copy; {{ date('Y') }} GymLink. Todos los derechos reservados.
            </div>
        </div>

        <!-- LADO DERECHO: Formulario de Registro -->
        <div class="form-panel">
            <div class="registro-box">

                <h2>Crear Cuenta</h2>
                <p class="subtitle">Completa tus datos para registrarte en GymLink</p>

                <form action="{{ url('/registro') }}" method="POST">
                    @csrf
                    
                    @if ($errors->any())
                    <div class="error-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Filas en 2 Columnas para mejor organización -->
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="input-group-custom">
                                <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required autofocus>
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group-custom">
                                <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>
                                <i class="fa-solid fa-user-tag"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group-custom">
                        <input type="text" name="documento" placeholder="Número de Documento" value="{{ old('documento') }}" required>
                        <i class="fa-solid fa-id-card"></i>
                    </div>

                    <div class="input-group-custom">
                        <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="input-group-custom">
                        <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <!-- Selector de Rol con Icono -->
                    <div class="input-group-custom">
                        <select name="rol" id="rol" required>
                            <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                            <option value="coach" {{ old('rol') == 'coach' ? 'selected' : '' }}>Coach</option>
                        </select>
                        <i class="fa-solid fa-user-gear"></i>
                    </div>

                    <div class="input-group-custom">
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <button type="submit">
                        Registrarse <i class="fa-solid fa-user-plus ms-2"></i>
                    </button>

                </form>

                <div class="registro-footer">
                    <p>
                        ¿Ya tienes cuenta? 
                        <a href="{{ url('/login') }}">Iniciar Sesión</a>
                    </p>

                    <a href="{{ url('/') }}" class="volver">
                        <i class="fa-solid fa-arrow-left"></i> Volver al inicio
                    </a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>