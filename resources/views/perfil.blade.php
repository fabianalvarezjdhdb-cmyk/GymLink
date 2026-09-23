<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Mi Perfil</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --gl-primary: #0d6efd;
            --gl-dark: #0f172a;
            --gl-card-bg: #1e293b;
            --gl-accent: #06b6d4;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b0f19;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background-color: #07090e;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 25px 20px;
            position: fixed;
            height: 100vh;
            z-index: 100;
            overflow-y: auto;
        }

        .sidebar .brand-logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            color: #94a3b8;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.90rem;
            transition: all 0.3s ease;
            margin-bottom: 4px;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background-color: var(--gl-primary);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(13, 110, 253, 0.35);
        }

        .sidebar-section-title {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            font-weight: 700;
            margin-top: 18px;
            margin-bottom: 8px;
            padding-left: 12px;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 30px;
            width: calc(100% - 280px);
        }

        /* Header Bar */
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            padding: 16px 28px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            margin-bottom: 24px;
        }

        /* Glassmorphism Cards */
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 24px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        /* Profile Header Banner */
        .profile-banner {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.25) 0%, rgba(15, 23, 42, 0.9) 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-avatar-xl {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gl-primary);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.4);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .info-label {
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .info-value {
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
        }

        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 18px;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR DE NAVEGACIÓN CLIENTE -->
    <aside class="sidebar">
        <div>
            <a href="{{ url('/') }}" class="brand-logo mb-3">
                <i class="fa-solid fa-dumbbell text-primary"></i> GymLink
            </a>
            <hr class="border-secondary opacity-25 mb-3">

            <nav>
                <div class="sidebar-section-title">Entrenamiento</div>
                
                <a href="{{ url('/dashboard') }}" class="nav-link-custom {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ url('/rutinas') }}" class="nav-link-custom {{ request()->is('rutinas*') ? 'active' : '' }}">
                    <i class="fa-solid fa-list-check"></i> Mi Rutina Diaria
                </a>
                <a href="{{ url('/chat') }}" class="nav-link-custom {{ request()->is('chat*') ? 'active' : '' }}">
                    <i class="fa-solid fa-comments"></i> Chat con Coach
                </a>
                <a href="{{ url('/progreso') }}" class="nav-link-custom {{ request()->is('progreso*') ? 'active' : '' }}">
                    <i class="fa-solid fa-fire"></i> Mi Progreso
                </a>
                <a href="{{ url('/logros') }}" class="nav-link-custom {{ request()->is('logros*') ? 'active' : '' }}">
                    <i class="fa-solid fa-trophy"></i> Logros
                </a>

                <div class="sidebar-section-title">Explorar & Social</div>

                <a href="{{ url('/gimnasios') }}" class="nav-link-custom {{ request()->is('gimnasios*') ? 'active' : '' }}">
                    <i class="fa-solid fa-location-dot"></i> Gimnasios
                </a>
                <a href="{{ url('/comunidad') }}" class="nav-link-custom {{ request()->is('comunidad*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i> Comunidad
                </a>

                <div class="sidebar-section-title">Cuenta</div>

                <a href="{{ url('/perfil') }}" class="nav-link-custom {{ request()->is('perfil*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user text-primary"></i> Perfil
                </a>
                <a href="{{ url('/configuracion') }}" class="nav-link-custom {{ request()->is('configuracion*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gear"></i> Configuración
                </a>
            </nav>
        </div>

        <div class="pt-3 border-top border-secondary border-opacity-25 mt-3">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger w-100 rounded-3 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </a>
        </div>
    </aside>

    <!-- ÁREA PRINCIPAL -->
    <main class="main-content">

        <!-- HEADER BAR DINÁMICO CLIENTE -->
        <header class="header-bar">
            <div>
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-id-card text-primary me-2"></i>Perfil del Atleta</h2>
                <small class="text-white">Gestiona tu información personal, estadísticas físicas y estado de membresía</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <span class="d-block fw-bold text-white small">
                        {{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }} 
                        {{ session('usuario_apellido', Auth::user()->apellido ?? '') }}
                    </span>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill text-capitalize">
                        {{ session('rol', Auth::user()->rol ?? 'Atleta GymLink') }}
                    </span>
                </div>

                <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.95rem;">
                    {{ strtoupper(substr(session('usuario_nombre', Auth::user()->nombre ?? 'A'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', Auth::user()->apellido ?? 'T'), 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- BANNER PRINCIPAL DEL ATLETA -->
        <div class="profile-banner mb-4">
            <div class="d-flex align-items-center gap-4">
                <div class="profile-avatar-xl">
                    {{ strtoupper(substr(session('usuario_nombre', Auth::user()->nombre ?? 'A'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', Auth::user()->apellido ?? 'T'), 0, 1)) }}
                </div>
                <div>
                    <h3 class="fw-bold text-white mb-1">
                        {{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }} 
                        {{ session('usuario_apellido', Auth::user()->apellido ?? 'GymLink') }}
                    </h3>
                    <p class="text-muted mb-2"><i class="fa-solid fa-envelope me-1"></i>{{ Auth::user()->email ?? 'atleta@gymlink.com' }}</p>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="badge bg-primary px-3 py-1">Atleta Nivel 5</span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1"><i class="fa-solid fa-circle me-1" style="font-size: 0.5rem;"></i>Membresía Activa</span>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ url('/configuracion') }}" class="btn btn-outline-light fw-bold rounded-3">
                    <i class="fa-solid fa-user-pen me-1"></i> Editar Perfil
                </a>
            </div>
        </div>

        <!-- SECCIÓN EN 2 COLUMNAS (DATOS Y CARNET DIGITAL) -->
        <div class="row g-4">

            <!-- COLUMNA IZQUIERDA: INFORMACIÓN PERSONAL Y DETALLES -->
            <div class="col-lg-8">
                <div class="glass-card mb-4">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-circle-info text-primary me-2"></i>Información Personal</h5>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                                <span class="info-label d-block">Nombre Completo</span>
                                <span class="info-value">{{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }} {{ session('usuario_apellido', Auth::user()->apellido ?? '') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                                <span class="info-label d-block">Correo Electrónico</span>
                                <span class="info-value">{{ Auth::user()->email ?? 'atleta@gymlink.com' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                                <span class="info-label d-block">Teléfono / Móvil</span>
                                <span class="info-value">+57 300 123 4567</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                                <span class="info-label d-block">Entrenador Asignado</span>
                                <span class="info-value text-primary"><i class="fa-solid fa-user-gear me-1"></i>Coach Camilo</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RESUMEN DE MÉTRICAS FÍSICAS -->
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-heart-pulse text-danger me-2"></i>Expediente Físico Actual</h5>
                    
                    <div class="row g-3">
                        <div class="col-md-4 col-sm-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 text-center">
                                <span class="info-label d-block mb-1">Peso Corporal</span>
                                <h4 class="fw-bold text-white mb-0">74.5 kg</h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 text-center">
                                <span class="info-label d-block mb-1">Estatura</span>
                                <h4 class="fw-bold text-white mb-0">1.78 m</h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 text-center">
                                <span class="info-label d-block mb-1">% Grasa Estimado</span>
                                <h4 class="fw-bold text-info mb-0">14.8%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA: CARNET / MEMBRESÍA DIGITAL Y QR -->
            <div class="col-lg-4">
                <div class="glass-card text-center">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-qrcode text-primary me-2"></i>Carnet Digital GymLink</h5>
                    <p class="text-muted small mb-3">Muestra este código para ingresar a cualquiera de las sedes afiliadas.</p>

                    <div class="p-3 bg-white d-inline-block rounded-4 mb-3">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=GYMLINK-USER-MEMBER-2026" alt="QR Perfil" class="img-fluid">
                    </div>

                    <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 text-start mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted small">Plan de Membresía:</span>
                            <span class="fw-bold text-primary small">Pro Black Pass</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small">Estado:</span>
                            <span class="text-success fw-bold small"><i class="fa-solid fa-check me-1"></i>Al día</span>
                        </div>
                    </div>

                    <a href="{{ url('/gimnasios') }}" class="btn btn-outline-primary w-100 fw-bold">
                        <i class="fa-solid fa-location-dot me-1"></i> Explorar Sedes
                    </a>
                </div>
            </div>

        </div>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>