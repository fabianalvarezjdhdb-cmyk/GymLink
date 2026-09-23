<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Chat con mi Coach</title>

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

        /* Chat Container Layout */
        .chat-layout {
            display: flex;
            gap: 20px;
            height: calc(100vh - 170px);
            min-height: 550px;
        }

        .chat-main-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .coach-info-panel {
            width: 300px;
            display: flex;
            flex-direction: column;
        }

        .chat-messages-area {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .msg-bubble {
            max-width: 75%;
            padding: 12px 18px;
            border-radius: 16px;
            font-size: 0.9rem;
            line-height: 1.45;
        }

        .msg-received {
            background: rgba(255, 255, 255, 0.08);
            color: #e2e8f0;
            align-self: flex-start;
            border-bottom-left-radius: 2px;
        }

        .msg-sent {
            background: var(--gl-primary);
            color: #ffffff;
            align-self: flex-end;
            border-bottom-right-radius: 2px;
        }

        /* CORRECCIÓN ESPECÍFICA PARA EL INPUT DEL CHAT */
        .chat-input-field {
            background-color: #1e293b !important;
            border: 1px solid #475569 !important;
            color: #ffffff !important;
        }

        .chat-input-field::placeholder {
            color: #cbd5e1 !important;
            opacity: 1 !important;
        }

        .chat-input-field:focus {
            background-color: #0f172a !important;
            border-color: var(--gl-primary) !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.35);
        }

        @media (max-width: 1100px) {
            .coach-info-panel {
                display: none;
            }
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
                    <i class="fa-solid fa-comments text-primary"></i> Chat con Coach
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-comments text-primary me-2"></i>Contacto Directo con Entrenador</h2>
                <small style="color: #cbd5e1;">Resuelve dudas sobre tu técnica, pesos o nutrición</small>
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

        <!-- LAYOUT DE CHAT DEL CLIENTE -->
        <div class="chat-layout">

            <!-- ÁREA DE CHAT PRINCIPAL -->
            <div class="glass-card chat-main-panel p-3">
                <!-- Header del Chat con el Coach -->
                <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-secondary border-opacity-25">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon bg-info text-white fw-bold rounded-circle" style="width: 44px; height: 44px; font-size: 0.95rem;">
                            CC
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Coach Camilo</h6>
                            <small class="text-success"><i class="fa-solid fa-circle me-1" style="font-size: 0.5rem;"></i>En línea · Entrenador Personal</small>
                        </div>
                    </div>
                    <div>
                        <span class="badge border border-secondary border-opacity-50" style="background-color: #1e293b; color: #cbd5e1;"><i class="fa-solid fa-clock me-1"></i>Responde rápido</span>                    </div>
                </div>

                <!-- Historial de Mensajes -->
                <div class="chat-messages-area my-2">
                    <div class="text-center my-2">
                        <span class="badge bg-dark text-muted fw-normal px-3 py-1">Hoy</span>
                    </div>

                    <div class="msg-bubble msg-received">
                        ¡Hola! Recuerda mantener la espalda recta en la última serie de peso muerto para prevenir molestias.
                        <div class="text-end mt-1 opacity-50" style="font-size: 0.7rem;">10:38 AM</div>
                    </div>

                    <div class="msg-bubble msg-sent">
                        ¡Entendido Profe! Ya completé la sentadilla con 80kg sintiéndome muy cómodo.
                        <div class="text-end mt-1 opacity-75" style="font-size: 0.7rem;">10:40 AM <i class="fa-solid fa-check-double ms-1"></i></div>
                    </div>

                    <div class="msg-bubble msg-received">
                        ¡Excelente trabajo! Vamos con toda por el remate de pierna.
                        <div class="text-end mt-1 opacity-50" style="font-size: 0.7rem;">10:42 AM</div>
                    </div>
                </div>

                <!-- Campo de Entrada de Texto Corregido -->
                <div class="pt-3 border-top border-secondary border-opacity-25">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary text-white" type="button"><i class="fa-solid fa-paperclip"></i></button>
                        <input type="text" class="form-control chat-input-field py-2" placeholder="Escribe a tu entrenador...">
                        <button class="btn btn-primary fw-bold px-4" type="button"><i class="fa-solid fa-paper-plane me-1"></i> Enviar</button>
                    </div>
                </div>
            </div>

            <!-- FICHA LATERAL DEL COACH -->
            <div class="glass-card coach-info-panel p-3">
                <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-user-ninja text-primary me-2"></i>Tu Entrenador</h6>

                <div class="text-center mb-3">
                    <div class="stat-icon bg-info text-white fw-bold rounded-circle mx-auto mb-2" style="width: 56px; height: 56px; font-size: 1.2rem;">
                        CC
                    </div>
                    <h6 class="fw-bold text-white mb-0">Coach Camilo</h6>
                    <small class="text-muted">Especialista en Hipertrofia</small>
                </div>

                <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 mb-3">
                    <small class="text-white d-block fw-semibold mb-1">Horario de Atención</small>
                    <span class="text-secundary fw-bold d-block small">Lun - Vie: 6:00 AM - 8:00 PM</span>
                </div>

                <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 mb-3">
                    <small class="text-secondary d-block fw-semibold mb-1">Plan Asignado</small>
                    <span class="text-primary fw-bold d-block">Hipertrofia 4 Días</span>
                </div>
            </div>

        </div>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>