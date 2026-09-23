<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Gimnasios & Sedes Afiliadas</title>

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

        /* Gym Card Specifics */
        .gym-card {
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .gym-card:hover {
            border-color: rgba(13, 110, 253, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.5);
        }

        .gym-banner {
            height: 160px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .gym-banner-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 1) 0%, transparent 80%);
        }

        .amenity-chip {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
        }

        /* CORRECCIÓN DE ESTILOS DE BUSCADOR Y FILTROS */
        .form-control, .form-select {
            background-color: #1e293b !important;
            border: 1px solid #475569 !important;
            color: #ffffff !important;
            border-radius: 12px;
            padding: 10px 14px;
        }

        .form-control::placeholder {
            color: #cbd5e1 !important;
            opacity: 1 !important;
        }

        .input-group-text {
            background-color: #0f172a !important;
            border: 1px solid #475569 !important;
            border-right: none !important;
            color: #cbd5e1 !important;
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
                    <i class="fa-solid fa-location-dot text-primary"></i> Gimnasios
                </a>
                <a href="{{ url('/comunidad') }}" class="nav-link-custom {{ request()->is('comunidad*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i> Comunidad
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-building-circle-check text-primary me-2"></i>Red de Gimnasios Afiliados</h2>
                <small style="color: #cbd5e1;">Encuentra sedes disponibles con tu membresía GymLink y revisa aforo en vivo</small>
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

        <!-- BUSCADOR Y FILTROS CORREGIDOS -->
        <div class="glass-card mb-4">
            <div class="row g-3">
                <div class="col-lg-5 col-md-6">
                    <label class="form-label text-white small fw-semibold">Buscar por Nombre o Zona</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control" placeholder="Ej. Titan Gym, Chapinero, Poblado...">
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                    <label class="form-label text-white small fw-semibold">Especialidad / Tipo</label>
                    <select class="form-select">
                        <option value="">Todas las Especialidades</option>
                        <option value="powerlifting">Powerlifting & Cargas</option>
                        <option value="crossfit">CrossFit & Funcional</option>
                        <option value="247">Abierto 24/7</option>
                        <option value="calistenia">Calistenia & OCR</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-3">
                    <label class="form-label text-white small fw-semibold">Estado Aforo</label>
                    <select class="form-select">
                        <option value="">Cualquier Aforo</option>
                        <option value="bajo">Poco Concurrido</option>
                        <option value="medio">Moderado</option>
                    </select>
                </div>

                <div class="col-lg-2 col-12 d-flex align-items-end">
                    <button class="btn btn-primary w-100 fw-bold py-2"><i class="fa-solid fa-filter me-1"></i> Filtrar</button>
                </div>
            </div>
        </div>

        <!-- REJILLA DE GIMNASIOS -->
        <div class="row g-4">

            <!-- Gimnasio 1: Titan Performance Center -->
            <div class="col-lg-4 col-md-6">
                <div class="gym-card">
                    <div class="gym-banner" style="background-image: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=600&q=80');">
                        <div class="gym-banner-overlay"></div>
                        <span class="badge bg-success position-absolute top-0 end-0 m-3 fw-bold"><i class="fa-solid fa-door-open me-1"></i>Abierto Ahora</span>
                    </div>
                    <div class="p-4 pt-2 position-relative">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="fw-bold text-white mb-0">Titan Performance Center</h5>
                                <small class="text-muted"><i class="fa-solid fa-location-dot text-primary me-1"></i>Zona Norte · Calle 127 #15-30</small>
                            </div>
                            <span class="badge bg-warning text-dark font-weight-bold"><i class="fa-solid fa-star me-1"></i>4.9</span>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small"><i class="fa-solid fa-users me-1"></i>Aforo 35% (Tranquilo)</span>
                        </div>

                        <div class="d-flex flex-wrap gap-1 mb-4">
                            <span class="amenity-chip"><i class="fa-solid fa-dumbbell text-primary me-1"></i>Eleiko Racks</span>
                            <span class="amenity-chip"><i class="fa-solid fa-shower me-1"></i>Vestidores</span>
                            <span class="amenity-chip"><i class="fa-solid fa-square-parking me-1"></i>Parqueadero</span>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modalPaseGimnasio">
                                <i class="fa-solid fa-qrcode me-1"></i> Generar Pase
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gimnasio 2: Iron Vault Powerhouse -->
            <div class="col-lg-4 col-md-6">
                <div class="gym-card">
                    <div class="gym-banner" style="background-image: url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=600&q=80');">
                        <div class="gym-banner-overlay"></div>
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 fw-bold"><i class="fa-solid fa-clock me-1"></i>Abierto 24/7</span>
                    </div>
                    <div class="p-4 pt-2 position-relative">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="fw-bold text-white mb-0">Iron Vault Powerhouse</h5>
                                <small class="text-muted"><i class="fa-solid fa-location-dot text-primary me-1"></i>Zona Chapinero · Cra 7 #58-12</small>
                            </div>
                            <span class="badge bg-warning text-dark font-weight-bold"><i class="fa-solid fa-star me-1"></i>4.8</span>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill small"><i class="fa-solid fa-users me-1"></i>Aforo 70% (Moderado)</span>
                        </div>

                        <div class="d-flex flex-wrap gap-1 mb-4">
                            <span class="amenity-chip"><i class="fa-solid fa-weight-hanging text-info me-1"></i>Powerlifting</span>
                            <span class="amenity-chip"><i class="fa-solid fa-wifi me-1"></i>Wi-Fi Alta Velocidad</span>
                            <span class="amenity-chip"><i class="fa-solid fa-box me-1"></i>Lockers</span>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modalPaseGimnasio">
                                <i class="fa-solid fa-qrcode me-1"></i> Generar Pase
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gimnasio 3: Olympus Athletic Club -->
            <div class="col-lg-4 col-md-6">
                <div class="gym-card">
                    <div class="gym-banner" style="background-image: url('https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&fit=crop&w=600&q=80');">
                        <div class="gym-banner-overlay"></div>
                        <span class="badge bg-success position-absolute top-0 end-0 m-3 fw-bold"><i class="fa-solid fa-door-open me-1"></i>Abierto Ahora</span>
                    </div>
                    <div class="p-4 pt-2 position-relative">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="fw-bold text-white mb-0">Olympus Athletic Club</h5>
                                <small class="text-muted"><i class="fa-solid fa-location-dot text-primary me-1"></i>Zona Salitre · Av. El Dorado #68-90</small>
                            </div>
                            <span class="badge bg-warning text-dark font-weight-bold"><i class="fa-solid fa-star me-1"></i>4.7</span>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small"><i class="fa-solid fa-users me-1"></i>Aforo 20% (Muy Libre)</span>
                        </div>

                        <div class="d-flex flex-wrap gap-1 mb-4">
                            <span class="amenity-chip"><i class="fa-solid fa-person-swimming text-primary me-1"></i>Piscina Semiolímpica</span>
                            <span class="amenity-chip"><i class="fa-solid fa-hot-tub-person me-1"></i>Sauna</span>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modalPaseGimnasio">
                                <i class="fa-solid fa-qrcode me-1"></i> Generar Pase
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gimnasio 4: Nexus Functional Box -->
            <div class="col-lg-4 col-md-6">
                <div class="gym-card">
                    <div class="gym-banner" style="background-image: url('https://images.unsplash.com/photo-1574680096145-d05b474e2155?auto=format&fit=crop&w=600&q=80');">
                        <div class="gym-banner-overlay"></div>
                        <span class="badge bg-danger position-absolute top-0 end-0 m-3 fw-bold"><i class="fa-solid fa-fire me-1"></i>Clase en Curso</span>
                    </div>
                    <div class="p-4 pt-2 position-relative">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="fw-bold text-white mb-0">Nexus Functional Box</h5>
                                <small class="text-muted"><i class="fa-solid fa-location-dot text-primary me-1"></i>Zona Cedritos · Calle 140 #11-45</small>
                            </div>
                            <span class="badge bg-warning text-dark font-weight-bold"><i class="fa-solid fa-star me-1"></i>4.9</span>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill small"><i class="fa-solid fa-users me-1"></i>Aforo 85% (Lleno)</span>
                        </div>

                        <div class="d-flex flex-wrap gap-1 mb-4">
                            <span class="amenity-chip"><i class="fa-solid fa-stopwatch text-warning me-1"></i>CrossFit WODs</span>
                            <span class="amenity-chip"><i class="fa-solid fa-bottle-water me-1"></i>Bar de Proteína</span>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modalPaseGimnasio">
                                <i class="fa-solid fa-qrcode me-1"></i> Generar Pase
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- MODAL PARA MOSTRAR CÓDIGO QR Y PASE DE ACCESO -->
    <div class="modal fade" id="modalPaseGimnasio" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border border-secondary border-opacity-25" style="border-radius: 20px;">
                <div class="modal-header border-bottom border-secondary border-opacity-25">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-qrcode text-primary me-2"></i>Pase Digital de Acceso</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="p-3 bg-white d-inline-block rounded-3 mb-3">
                        <!-- Código QR Generado dinámicamente -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=GYMLINK-PASS-USER-2026" alt="QR Acceso" class="img-fluid">
                    </div>
                    <h6 class="fw-bold text-white mb-1">Membresía Activa GymLink</h6>
                    <small class="text-muted d-block mb-3">Escanea este código en el torniquete o recepción de la sede.</small>

                    <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25 text-start">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted small">Atleta:</span>
                            <span class="fw-bold text-white small">{{ session('usuario_nombre', Auth::user()->nombre ?? 'Atleta') }} {{ session('usuario_apellido', Auth::user()->apellido ?? '') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small">Válido hasta:</span>
                            <span class="text-success fw-bold small">23 de Octubre, 2026</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary border-opacity-25">
                    <button type="button" class="btn btn-outline-secondary w-100 fw-bold" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>