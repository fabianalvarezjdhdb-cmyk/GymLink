<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Configuración de la Cuenta</title>

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
            margin-bottom: 20px;
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

        /* CORRECCIÓN DE ESTILOS DE FORMULARIO CON ALTO CONTRASTE */
        .form-control, .form-select {
            background-color: rgba(15, 23, 42, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
            border-radius: 12px;
            padding: 10px 14px;
            font-weight: 500;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a !important;
            border-color: var(--gl-primary) !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.35);
            color: #ffffff !important;
        }

        /* Placeholders legibles con tono plateado brillante */
        .form-control::placeholder {
            color: #94a3b8 !important;
            opacity: 1 !important;
        }

        .form-check-input {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .form-check-input:checked {
            background-color: var(--gl-primary);
            border-color: var(--gl-primary);
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
                    <i class="fa-solid fa-user"></i> Perfil
                </a>
                <a href="{{ url('/configuracion') }}" class="nav-link-custom {{ request()->is('configuracion*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gear text-primary"></i> Configuración
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-gear text-primary me-2"></i>Ajustes & Configuración</h2>
                <small class="text-white">Personaliza la seguridad de tu cuenta, notificaciones y preferencias</small>
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

        <div class="row g-4">

            <!-- COLUMNA IZQUIERDA: DATOS DE PERFIL Y SEGURIDAD -->
            <div class="col-lg-7">

                <!-- PANEL 1: ACTUALIZAR DATOS DE CUENTA -->
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-user-gear text-primary me-2"></i>Datos de la Cuenta</h5>

                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Nombre</label>
                                <input type="text" class="form-control" value="{{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Apellido</label>
                                <input type="text" class="form-control" value="{{ session('usuario_apellido', Auth::user()->apellido ?? '') }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Correo Electrónico</label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email ?? 'atleta@gymlink.com' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Teléfono</label>
                                <input type="text" class="form-control" placeholder="+57 300 123 4567">
                            </div>
                        </div>

                        <div class="text-end pt-2">
                            <button type="button" class="btn btn-primary fw-bold px-4">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>

                <!-- PANEL 2: CAMBIAR CONTRASEÑA -->
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-shield-halved text-warning me-2"></i>Seguridad & Contraseña</h5>

                    <form>
                        <div class="mb-3">
                            <label class="form-label text-white small fw-semibold">Contraseña Actual</label>
                            <input type="password" class="form-control" placeholder="••••••••">
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Nueva Contraseña</label>
                                <input type="password" class="form-control" placeholder="Mínimo 8 caracteres">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-semibold">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" placeholder="Repite la contraseña">
                            </div>
                        </div>

                        <div class="text-end pt-2">
                            <button type="button" class="btn btn-warning fw-bold text-dark px-4">
                                <i class="fa-solid fa-key me-1"></i> Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- COLUMNA DERECHA: NOTIFICACIONES Y PRIVACIDAD -->
            <div class="col-lg-5">

                <!-- PANEL 3: NOTIFICACIONES -->
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-bell text-info me-2"></i>Notificaciones</h5>

                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                        <div>
                            <h6 class="fw-bold text-white mb-0 small">Recordatorios de Entrenamiento</h6>
                            <small class="text-slate-400 d-block" style="color: #cbd5e1;">Avisos antes de tu rutina diaria.</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                        <div>
                            <h6 class="fw-bold text-white mb-0 small">Mensajes de tu Coach</h6>
                            <small class="text-slate-400 d-block" style="color: #cbd5e1;">Notificaciones cuando tu entrenador responda.</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="fw-bold text-white mb-0 small">Resumen Semanal por Email</h6>
                            <small class="text-slate-400 d-block" style="color: #cbd5e1;">Recibe tu reporte de volumen e hitos.</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </div>
                </div>

                <!-- PANEL 4: PRIVACIDAD Y COMUNIDAD -->
                <div class="glass-card">
                    <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-lock text-success me-2"></i>Privacidad</h5>

                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                        <div>
                            <h6 class="fw-bold text-white mb-0 small">Perfil Público en la Comunidad</h6>
                            <small class="text-slate-400 d-block" style="color: #cbd5e1;">Permite que otros atletas vean tus logros.</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="fw-bold text-white mb-0 small">Aparecer en el Ranking Semanal</h6>
                            <small class="text-slate-400 d-block" style="color: #cbd5e1;">Muestra tus puntos de XP en la tabla.</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>