<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Muro de la Comunidad</title>

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

        /* Feed Post Cards */
        .post-card {
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post-img {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            border-radius: 16px;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .action-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #94a3b8;
            border-radius: 12px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .action-btn:hover, .action-btn.active {
            background: rgba(13, 110, 253, 0.2);
            color: #ffffff;
            border-color: rgba(13, 110, 253, 0.4);
        }

        .pr-tag-badge {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff;
            font-weight: 800;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .leaderboard-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            margin-bottom: 8px;
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
        /* Forzar color claro y visible para el texto de sugerencia */
        .placeholder-light::placeholder {
            color: #94a3b8 !important; /* Gris claro / Plateado brillante */
            opacity: 1 !important;     /* Garantiza opacidad total */
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-users text-primary me-2"></i>Comunidad & Feed de Atletas</h2>
                <small class="text-white">Comparte tus marcas personales, motiva a tus compañeros y sube en el ranking</small>
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

        <!-- CONTENIDO EN 2 COLUMNAS (FEED PRINCIPAL + LEADERBOARD) -->
        <div class="row g-4">

            <!-- COLUMNA IZQUIERDA: CREAR POST + FEED DE PUBLICACIONES -->
            <div class="col-lg-8">

                <!-- CREAR NUEVA PUBLICACIÓN -->
                <div class="glass-card mb-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 44px; height: 44px; font-size: 0.95rem;">
                            {{ strtoupper(substr(session('usuario_nombre', Auth::user()->nombre ?? 'A'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', Auth::user()->apellido ?? 'T'), 0, 1)) }}
                        </div>
                        <!-- CAMBIO: Se ajusta el campo de texto con la clase placeholder-custom para garantizar alto contraste -->
                        <input type="text" class="form-control bg-dark text-white border-secondary border-opacity-50 rounded-3 py-2 placeholder-light" placeholder="¿Qué entrenaste hoy? Comparte tus sensaciones o un nuevo récord..." data-bs-toggle="modal" data-bs-target="#modalNuevoPost">
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2 border-top border-secondary border-opacity-25">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-secondary text-white rounded-3" data-bs-toggle="modal" data-bs-target="#modalNuevoPost">
                                <i class="fa-solid fa-image text-success me-1"></i> Foto / Video
                            </button>
                            <button class="btn btn-sm btn-outline-secondary text-white rounded-3" data-bs-toggle="modal" data-bs-target="#modalNuevoPost">
                                <i class="fa-solid fa-trophy text-warning me-1"></i> Nuevo PR
                            </button>
                        </div>
                        <button class="btn btn-primary fw-bold px-4 btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoPost">
                            <i class="fa-solid fa-paper-plane me-1"></i> Publicar
                        </button>
                    </div>
                </div>

                <!-- PUBLICACIÓN 1: RÉCORD DE SENTADILLA -->
                <div class="post-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon bg-info text-white fw-bold rounded-circle" style="width: 44px; height: 44px; font-size: 0.9rem;">
                                FA
                            </div>
                            <div>
                                <h6 class="fw-bold text-white mb-0">Fabián Álvarez</h6>
                                <small class="text-muted">Sede Titan Performance · Hace 2 horas</small>
                            </div>
                        </div>
                        <span class="pr-tag-badge"><i class="fa-solid fa-fire me-1"></i>NUEVO PR: 140 KG</span>
                    </div>

                    <p class="text-white mb-2">
                        ¡Por fin rompí la barrera de los 140 kg en Sentadilla Libre! 🏋️‍♂️ Gracias al profe Camilo por ajustar la técnica de la cadera. ¡Seguimos sumando!
                    </p>

                    <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=800&q=80" alt="Post Entrenamiento" class="post-img">

                    <div class="d-flex align-items-center justify-content-between pt-2">
                        <div class="d-flex gap-2">
                            <button class="action-btn active"><i class="fa-solid fa-fire text-warning me-1"></i> 24 Fuego</button>
                            <button class="action-btn"><i class="fa-solid fa-hands-clapping text-primary me-1"></i> 18 Aplausos</button>
                        </div>
                        <small class="text-muted">5 Comentarios</small>
                    </div>
                </div>

                <!-- PUBLICACIÓN 2: LOGRO DE CONSTANCIA -->
                <div class="post-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon bg-success text-white fw-bold rounded-circle" style="width: 44px; height: 44px; font-size: 0.9rem;">
                                LM
                            </div>
                            <div>
                                <h6 class="fw-bold text-white mb-0">Laura Martínez</h6>
                                <small class="text-muted">Sede Olympus Athletic · Hace 5 horas</small>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold"><i class="fa-solid fa-medal me-1"></i>Racha 30 Días</span>
                    </div>

                    <p class="text-white mb-2">
                        Mes completado al 100% sin faltar un solo día. La disciplina le gana a la motivación siempre. 🔥 💪
                    </p>

                    <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary border-opacity-25 mt-3">
                        <div class="d-flex gap-2">
                            <button class="action-btn"><i class="fa-solid fa-heart text-danger me-1"></i> 32 Me gusta</button>
                        </div>
                        <small class="text-muted">2 Comentarios</small>
                    </div>
                </div>

            </div>

            <!-- COLUMNA DERECHA: LEADERBOARD & ATLETAS DESTACADOS -->
            <div class="col-lg-4">

                <!-- TABLA DE CLASIFICACIÓN SEMANAL (LEADERBOARD) -->
                <div class="glass-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-white mb-0"><i class="fa-solid fa-crown text-warning me-2"></i>Ranking Semanal XP</h6>
                        <span class="badge bg-secondary">Top Atletas</span>
                    </div>

                    <div class="leaderboard-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-warning" style="width: 20px;">#1</span>
                            <div class="stat-icon bg-warning text-dark fw-bold rounded-circle" style="width: 34px; height: 34px; font-size: 0.8rem;">
                                FA
                            </div>
                            <div>
                                <span class="d-block text-white fw-bold small">Fabián Álvarez</span>
                                <small class="text-warning" style="font-size: 0.72rem;">1,250 XP esta semana</small>
                            </div>
                        </div>
                        <i class="fa-solid fa-trophy text-warning"></i>
                    </div>

                    <div class="leaderboard-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-light" style="width: 20px;">#2</span>
                            <div class="stat-icon bg-secondary text-white fw-bold rounded-circle" style="width: 34px; height: 34px; font-size: 0.8rem;">
                                LM
                            </div>
                            <div>
                                <span class="d-block text-white fw-bold small">Laura Martínez</span>
                                <small class="text-secundary" style="font-size: 0.72rem;">980 XP esta semana</small>
                            </div>
                        </div>
                        <i class="fa-solid fa-medal text-secondary"></i>
                    </div>

                    <div class="leaderboard-item">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-warning-subtle" style="width: 20px;">#3</span>
                            <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 34px; height: 34px; font-size: 0.8rem;">
                                {{ strtoupper(substr(session('usuario_nombre', Auth::user()->nombre ?? 'A'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', Auth::user()->apellido ?? 'T'), 0, 1)) }}
                            </div>
                            <div>
                                <span class="d-block text-white fw-bold small">Tú ({{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }})</span>
                                <small class="text-primary" style="font-size: 0.72rem;">850 XP esta semana</small>
                            </div>
                        </div>
                        <i class="fa-solid fa-award text-primary"></i>
                    </div>
                </div>

                <!-- DESAFÍO COMUNITARIO ACTIVO -->
                <div class="glass-card">
                    <h6 class="fw-bold text-white mb-2"><i class="fa-solid fa-bullseye text-danger me-2"></i>Reto del Mes</h6>
                    <p class="text-muted small mb-3">
                        "Acumula 50,000 kg movidos entre toda la comunidad antes de fin de mes."
                    </p>
                    <div class="d-flex justify-content-between text-sm mb-1">
                        <span class="small text-muted">Progreso Global</span>
                        <span class="small text-danger fw-bold">38,400 / 50,000 kg</span>
                    </div>
                    <div class="progress bg-dark mb-3" style="height: 10px; border-radius: 10px;">
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 76%;"></div>
                    </div>
                    <small class="text-white fw-semibold d-block text-center"><i class="fa-solid fa-gift text-warning me-1"></i> Recompensa: 500 GymCoins para todos</small>
                </div>

            </div>

        </div>

    </main>

    <!-- MODAL PARA PUBLICAR EN EL MURO -->
    <div class="modal fade" id="modalNuevoPost" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border border-secondary border-opacity-25" style="border-radius: 20px;">
                <div class="modal-header border-bottom border-secondary border-opacity-25">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-primary me-2"></i>Crear Publicación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">Mensaje</label>
                            <textarea class="form-control bg-dark text-white border-secondary border-opacity-25" rows="4" placeholder="Escribe sobre tu entrenamiento, marcas o dale ánimos al equipo..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">Marca Personal / PR (Opcional)</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. Sentadilla 140kg x 3 reps">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">Adjuntar Imagen</label>
                            <input type="file" class="form-control bg-dark text-white border-secondary border-opacity-25">
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top border-secondary border-opacity-25">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary fw-bold px-4" data-bs-dismiss="modal">Publicar en el Muro</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>