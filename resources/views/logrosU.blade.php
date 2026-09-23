<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Mis Logros y Puntos</title>

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
            --gl-gold: #f59e0b;
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
            transform: translateY(-3px);
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

        /* Achievement Cards */
        .achievement-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 20px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .achievement-card.unlocked {
            border-color: rgba(245, 158, 11, 0.4);
            background: rgba(245, 158, 11, 0.05);
        }

        .achievement-card.locked {
            opacity: 0.55;
            filter: grayscale(80%);
        }

        .achievement-icon-box {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            flex-shrink: 0;
        }

        .badge-xp {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
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
                    <i class="fa-solid fa-trophy text-warning"></i> Logros
                </a>

                <div class="sidebar-section-title">Explorar & Social</div>

                <a href="{{ url('/gimnasios') }}" class="nav-link-custom {{ request()->is('gimnasios*') ? 'active' : '' }}">
                    <i class="fa-solid fa-location-dot"></i> Gimnasios
                </a>
                <a href="{{ url('/comunidad') }}" class="nav-link-custom {{ request()->is('comunidad*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users text-primary"></i> Comunidad
                </a>

                <div class="sidebar-section-title">Cuenta</div>

                <a href="{{ url('/perfil') }}" class="nav-link-custom {{ request()->is('perfil*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i> Perfil
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-trophy text-warning me-2"></i>Salón de Trofeos & Recompensas</h2>
                <small class="text-white">Desbloquea insignias, acumula puntos XP y sube de rango en tu gimnasio</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <span class="d-block fw-bold text-white small">
                        {{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }} 
                        {{ session('usuario_apellido', Auth::user()->apellido ?? '') }}
                    </span>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill text-capitalize">
                        Nivel 5 · Bestia de Carga
                    </span>
                </div>

                <div class="stat-icon bg-warning text-dark fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.95rem;">
                    {{ strtoupper(substr(session('usuario_nombre', Auth::user()->nombre ?? 'A'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', Auth::user()->apellido ?? 'T'), 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- RESUMEN DE GAMIFICACIÓN (PUNTOS Y NIVEL) -->
        <div class="glass-card mb-4" style="background: linear-gradient(135deg, rgba(30,41,59,0.9) 0%, rgba(15,23,42,0.95) 100%);">
            <div class="row align-items-center g-4">
                <div class="col-lg-3 col-md-6 text-center border-end border-secondary border-opacity-25">
                    <div class="stat-icon bg-warning bg-opacity-25 text-warning mx-auto mb-2" style="width: 60px; height: 60px; font-size: 1.8rem;">
                        <i class="fa-solid fa-crown"></i>
                    </div>
                    <span class="text-muted small text-uppercase fw-bold d-block mb-1">Nivel Actual</span>
                    <h2 class="fw-extrabold text-white mb-0">Nivel 5</h2>
                    <small class="text-warning fw-semibold">"Bestia de Carga"</small>
                </div>

                <div class="col-lg-3 col-md-6 text-center border-end border-secondary border-opacity-25">
                    <div class="stat-icon bg-primary bg-opacity-25 text-primary mx-auto mb-2" style="width: 60px; height: 60px; font-size: 1.8rem;">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <span class="text-muted small text-uppercase fw-bold d-block mb-1">Experiencia Total</span>
                    <h2 class="fw-extrabold text-white mb-0">3,450 XP</h2>
                    <small class="text-primary">+350 XP esta semana</small>
                </div>

                <div class="col-lg-3 col-md-6 text-center border-end border-secondary border-opacity-25">
                    <div class="stat-icon bg-success bg-opacity-25 text-success mx-auto mb-2" style="width: 60px; height: 60px; font-size: 1.8rem;">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <span class="text-muted small text-uppercase fw-bold d-block mb-1">Puntos GymCoins</span>
                    <h2 class="fw-extrabold text-white mb-0">1,200 pts</h2>
                    <small class="text-success"><i class="fa-solid fa-gift me-1"></i>Canjeables en tienda</small>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-bold text-white">Progreso a Nivel 6</span>
                        <span class="small text-warning fw-bold">3,450 / 4,000 XP</span>
                    </div>
                    <div class="progress bg-dark" style="height: 12px; border-radius: 10px;">
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 86%;"></div>
                    </div>
                    <small class="text-muted d-block mt-2 text-center">Faltan <strong>550 XP</strong> para desbloquear "Titán del Acero"</small>
                </div>
            </div>
        </div>

        <!-- REJILLA DE LOGROS / MEDALLAS -->
        <div class="row g-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-medal text-warning me-2"></i>Catálogo de Logros</h5>
                    <span class="badge bg-secondary">6 de 12 Desbloqueados</span>
                </div>
            </div>

            <!-- Logro 1 (Desbloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card unlocked">
                    <div class="achievement-icon-box bg-warning text-dark">
                        <i class="fa-solid fa-fire-flame-curved"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Imparable</h6>
                            <span class="badge-xp">+200 XP</span>
                        </div>
                        <p class="text-white small mb-2">Asiste 12 días consecutivos al gimnasio sin faltar.</p>
                        <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="fa-solid fa-check me-1"></i>Completado</span>
                    </div>
                </div>
            </div>

            <!-- Logro 2 (Desbloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card unlocked">
                    <div class="achievement-icon-box bg-primary text-white">
                        <i class="fa-solid fa-dumbbell"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Club de los 100 kg</h6>
                            <span class="badge-xp">+500 XP</span>
                        </div>
                        <p class="text-white small mb-2">Realiza una repetición válida de Sentadilla con 100 kg o más.</p>
                        <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="fa-solid fa-check me-1"></i>Completado</span>
                    </div>
                </div>
            </div>

            <!-- Logro 3 (Desbloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card unlocked">
                    <div class="achievement-icon-box bg-info text-white">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Comunicación Fluida</h6>
                            <span class="badge-xp">+100 XP</span>
                        </div>
                        <p class="text-white small mb-2">Envía 10 mensajes y feedback técnico a tu entrenador.</p>
                        <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="fa-solid fa-check me-1"></i>Completado</span>
                    </div>
                </div>
            </div>

            <!-- Logro 4 (En Progreso / Bloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card locked">
                    <div class="achievement-icon-box bg-secondary text-white">
                        <i class="fa-solid fa-weight-hanging"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Levantador Maestro</h6>
                            <span class="badge-xp">+600 XP</span>
                        </div>
                        <p class="text-white small mb-2">Mueve un volumen total de 10,000 kg en una sola semana.</p>
                        <small class="text-warning fw-semibold"><i class="fa-solid fa-spinner me-1"></i>Progreso: 4,850 / 10,000 kg</small>
                    </div>
                </div>
            </div>

            <!-- Logro 5 (Bloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card locked">
                    <div class="achievement-icon-box bg-secondary text-white">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Disciplina de Acero</h6>
                            <span class="badge-xp">+1,000 XP</span>
                        </div>
                        <p class="text-white small mb-2">Completa el 100% de tus rutinas durante un mes entero.</p>
                        <small class="text-muted"><i class="fa-solid fa-lock me-1"></i>Bloqueado</small>
                    </div>
                </div>
            </div>

            <!-- Logro 6 (Bloqueado) -->
            <div class="col-lg-4 col-md-6">
                <div class="achievement-card locked">
                    <div class="achievement-icon-box bg-secondary text-white">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-white mb-0">Líder Comunitario</h6>
                            <span class="badge-xp">+300 XP</span>
                        </div>
                        <p class="text-white small mb-2">Publica 5 fotos de progreso o consejos en el muro de Comunidad.</p>
                        <small class="text-muted"><i class="fa-solid fa-lock me-1"></i>Bloqueado</small>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>