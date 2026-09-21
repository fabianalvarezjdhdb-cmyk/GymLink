<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Iniciar Sesión</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">

    <style>
    :root {
        --gl-primary: #0d6efd;
        --gl-dark: #0f172a;
    }

    body, html {
        height: 100%;
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

    /* Panel Izquierdo: Ocupa exactamente el 50% */
    .brand-panel {
        flex: 1;
        width: 50%;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(13, 110, 253, 0.85)), 
                    url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 60px;
        color: #ffffff;
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
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .brand-features {
        display: flex;
        gap: 20px;
        margin-top: 30px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    /* Panel Derecho: Ocupa exactamente el otro 50% */
    .form-panel {
        flex: 1;
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px;
        background-color: #ffffff;
    }

    .login-box {
        width: 100%;
        max-width: 400px;
    }

    .login-box h2 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--gl-dark);
        margin-bottom: 8px;
    }

    .login-box .subtitle {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 30px;
    }

    /* Inputs Personalizados */
    .input-group-custom {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group-custom i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
        width: 100%;
        padding: 14px 16px 14px 48px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        background-color: #f8fafc;
        font-size: 0.95rem;
        font-weight: 500;
        color: #1e293b;
        outline: none;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .login-box input[type="email"]:focus,
    .login-box input[type="password"]:focus {
        border-color: var(--gl-primary);
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.12);
    }

    .login-box input:focus + i {
        color: var(--gl-primary);
    }

    /* Botón de Envio */
    .login-box button[type="submit"] {
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
        margin-top: 5px;
    }

    .login-box button[type="submit"]:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(13, 110, 253, 0.4);
    }

    /* Enlaces de pie de formulario */
    .login-footer {
        margin-top: 30px;
        text-align: center;
    }

    .login-footer p {
        font-size: 0.92rem;
        color: #64748b;
        margin-bottom: 12px;
    }

    .login-footer p a {
        color: var(--gl-primary);
        font-weight: 700;
        text-decoration: none;
    }

    .login-footer p a:hover {
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

    /* Ocultar panel lateral en dispositivos móviles */
    @media (max-width: 991px) {
        .brand-panel {
            display: none;
        }
        .form-panel {
            width: 100%;
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
                <h1>Tu evolución fitness <br><span class="text-primary">empieza aquí.</span></h1>
                <p class="lead opacity-75">Gestiona tus rutinas, monitorea tus avances y conecta con la comunidad.</p>
                
                <div class="brand-features">
                    <div class="feature-item">
                        <i class="fa-solid fa-bolt text-primary"></i> Control de Rutinas
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-chart-line text-primary"></i> Métricas en Vivo
                    </div>
                </div>
            </div>

            <div class="small opacity-50">
                &copy; {{ date('Y') }} GymLink. Todos los derechos reservados.
            </div>
        </div>

        <!-- LADO DERECHO: Formulario de Login -->
        <div class="form-panel">
            <div class="login-box">

                <h2>Iniciar Sesión</h2>
                <p class="subtitle">Ingresa tus datos para acceder a tu panel de GymLink</p>

                <form action="{{ url('/login') }}" method="POST">
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

                    <div class="input-group-custom">
                        <input
                            type="email"
                            name="email"
                            placeholder="Correo electrónico"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="input-group-custom">
                        <input
                            type="password"
                            name="password"
                            placeholder="Contraseña"
                            required
                        >
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <button type="submit">
                        Ingresar <i class="fa-solid fa-arrow-right ms-2"></i>
                    </button>

                </form>

                <div class="login-footer">
                    <p>
                        ¿No tienes cuenta?
                        <a href="{{ url('/registro') }}">Registrarse</a>
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