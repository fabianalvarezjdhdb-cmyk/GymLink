<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Gestión de Rutinas</title>

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
            padding: 12px 16px;
            color: #94a3b8;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
            transition: all 0.3s ease;
            margin-bottom: 6px;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background-color: var(--gl-primary);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(13, 110, 253, 0.35);
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
            margin-bottom: 30px;
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
            transform: translateY(-2px);
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

        /* Inputs & Selects */
        .form-control-dark, .form-select-dark {
            background-color: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f8fafc;
            border-radius: 12px;
        }

        .form-control-dark:focus, .form-select-dark:focus {
            background-color: rgba(15, 23, 42, 0.95);
            border-color: var(--gl-primary);
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Nav Pills Custom */
        .nav-pills .nav-link {
            color: #94a3b8;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            background: rgba(15, 23, 42, 0.6);
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: var(--gl-primary);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(13, 110, 253, 0.35);
        }

        /* Exercise Cards */
        .exercise-item {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 16px 20px;
            transition: all 0.2s ease;
        }

        .exercise-item:hover {
            border-color: rgba(13, 110, 253, 0.4);
            background: rgba(15, 23, 42, 0.85);
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

    <!-- SIDEBAR DE NAVEGACIÓN -->
    <aside class="sidebar">
        <div>
            <a href="{{ url('/') }}" class="brand-logo mb-4">
                <i class="fa-solid fa-dumbbell text-primary"></i> GymLink
                <span class="badge bg-primary text-white fs-6 ms-1">Coach</span>
            </a>
            <hr class="border-secondary opacity-25 mb-4">

            <nav>
                <a href="{{ url('/coach/dashboard') }}" class="nav-link-custom">
                    <i class="fa-solid fa-chart-pie"></i> Panel Principal
                </a>
                <a href="{{ url('/coach/clientes') }}" class="nav-link-custom">
                    <i class="fa-solid fa-users"></i> Mis Clientes
                </a>
                <a href="{{ url('/coach/rutinas') }}" class="nav-link-custom active">
                    <i class="fa-solid fa-dumbbell"></i> Gestión de Rutinas
                </a>
                <a href="{{ url('/coach/dashboard') }}#chat-section" class="nav-link-custom">
                    <i class="fa-solid fa-comments"></i> Chat con Clientes
                </a>
            </nav>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger w-100 rounded-3 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </a>
        </div>
    </aside>

    <!-- ÁREA PRINCIPAL -->
    <main class="main-content">

        <!-- HEADER BAR -->
        <header class="header-bar">
            <div>
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-sliders me-2 text-primary"></i>Gestión e Ingeniería de Rutinas</h2>
                <small class="text-muted">Diseña, asigna y ajusta las cargas de entrenamiento para cada atleta</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <span class="d-block fw-bold text-white small">Coach Camilo</span>
                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">Head Coach</span>
                </div>
                <div class="stat-icon bg-primary text-white fw-bold">
                    CC
                </div>
            </div>
        </header>

        <!-- BANNER DE PLANTILLAS Y SELECCIÓN -->
        <div class="glass-card mb-4">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-5">
                    <label class="form-label small text-muted fw-semibold mb-1"><i class="fa-solid fa-user me-1 text-primary"></i>Seleccionar Atleta a Programar</label>
                    <select class="form-select form-select-dark fw-semibold">
                        <option value="1" selected>Daniel Zubieta — Hipertrofia & Fuerza</option>
                        <option value="2">Fabián Álvarez — Recomposición</option>
                        <option value="3">Laura Martínez — Fuerza Resistencia</option>
                    </select>
                </div>

                <div class="col-md-7 text-md-end d-flex gap-2 justify-content-md-end align-items-end">
                    <button class="btn btn-outline-primary fw-bold px-3 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#templateModal">
                        <i class="fa-solid fa-folder-plus me-1"></i> Cargar Plantilla
                    </button>
                    <button class="btn btn-primary fw-bold px-4 py-2 rounded-3 shadow-lg">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Plan Completo
                    </button>
                </div>
            </div>
        </div>

        <!-- LAYOUT PRINCIPAL (FORMULARIO A LA IZQ / VISTA DE DÍAS A LA DER) -->
        <div class="row g-4">
            
            <!-- PANEL IZQUIERDO: AGREGAR EJERCICIO -->
            <div class="col-lg-4">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3 border-bottom border-secondary border-opacity-25 pb-3">
                        <i class="fa-solid fa-plus-circle text-primary me-2"></i>Agregar Ejercicio
                    </h5>

                    <form>
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-semibold">Día de Entrenamiento</label>
                            <select class="form-select form-select-dark">
                                <option>Lunes — Pecho & Tríceps</option>
                                <option>Martes — Espalda & Bíceps</option>
                                <option>Miércoles — Pierna Completa</option>
                                <option>Jueves — Hombro & Core</option>
                                <option>Viernes — Full Body / Torso</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-muted fw-semibold">Nombre del Ejercicio</label>
                            <input type="text" class="form-control form-control-dark" placeholder="Ej. Press Inclinado con Mancuernas">
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">Series</label>
                                <input type="number" class="form-control form-control-dark" placeholder="4">
                            </div>
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">Rango Reps</label>
                                <input type="text" class="form-control form-control-dark" placeholder="10-12">
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">RIR / RPE</label>
                                <input type="text" class="form-control form-control-dark" placeholder="RIR 2">
                            </div>
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">Descanso (Seg)</label>
                                <input type="number" class="form-control form-control-dark" placeholder="90">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small text-muted fw-semibold">Notas de Técnica / RIR</label>
                            <textarea class="form-control form-control-dark" rows="2" placeholder="Ej. Controlar excéntrica 3 segundos..."></textarea>
                        </div>

                        <button type="button" class="btn btn-primary w-100 fw-bold py-2.5 rounded-3 shadow">
                            <i class="fa-solid fa-plus me-1"></i> Añadir a la Rutina
                        </button>
                    </form>
                </div>
            </div>

            <!-- PANEL DERECHO: VISTA POR DÍAS -->
            <div class="col-lg-8">
                <div class="glass-card">
                    <!-- TABS NAVEGABLES POR DÍA -->
                    <ul class="nav nav-pills mb-4 gap-2 border-bottom border-secondary border-opacity-25 pb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-lunes-tab" data-bs-toggle="pill" data-bs-target="#pills-lunes" type="button" role="tab"><i class="fa-solid fa-calendar-day me-1"></i>Lunes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-martes-tab" data-bs-toggle="pill" data-bs-target="#pills-martes" type="button" role="tab">Martes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-miercoles-tab" data-bs-toggle="pill" data-bs-target="#pills-miercoles" type="button" role="tab">Miércoles</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-jueves-tab" data-bs-toggle="pill" data-bs-target="#pills-jueves" type="button" role="tab">Jueves</button>
                        </li>
                    </ul>

                    <!-- CONTENIDO DE LAS PESTAÑAS -->
                    <div class="tab-content" id="pills-tabContent">
                        
                        <!-- TAB LUNES -->
                        <div class="tab-pane fade show active" id="pills-lunes" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold text-white mb-0">Sesión Programada: <span class="text-primary">Pecho & Tríceps</span></h6>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">4 Ejercicios</span>
                            </div>

                            <div class="d-flex flex-column gap-3">
                                <!-- Ejercicio 1 -->
                                <div class="exercise-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-primary">Pecho</span>
                                            <h6 class="fw-bold text-white mb-0">Press de Banca Plano con Barra</h6>
                                        </div>
                                        <small class="text-muted">4 Series × 10 Reps · RIR 2 · Descanso: 90s</small>
                                        <p class="text-info small mb-0 mt-1"><i class="fa-solid fa-circle-info me-1"></i>Pausa de 1 segundo en el pecho.</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-secondary text-white" title="Editar"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Ejercicio 2 -->
                                <div class="exercise-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-primary">Pecho</span>
                                            <h6 class="fw-bold text-white mb-0">Aperturas Inclinadas con Mancuernas</h6>
                                        </div>
                                        <small class="text-muted">3 Series × 12 Reps · RIR 1 · Descanso: 60s</small>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-secondary text-white" title="Editar"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Ejercicio 3 -->
                                <div class="exercise-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-info text-dark fw-bold">Tríceps</span>
                                            <h6 class="fw-bold text-white mb-0">Extensiones en Polea Alta con Cuerda</h6>
                                        </div>
                                        <small class="text-muted">4 Series × 15 Reps · RIR 0 (Fallo) · Descanso: 60s</small>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-secondary text-white" title="Editar"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB MARTES -->
                        <div class="tab-pane fade" id="pills-martes" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold text-white mb-0">Sesión Programada: <span class="text-primary">Espalda & Bíceps</span></h6>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">3 Ejercicios</span>
                            </div>

                            <div class="exercise-item d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="badge bg-success">Espalda</span>
                                        <h6 class="fw-bold text-white mb-0">Dominadas Pronadas Agarre Ancho</h6>
                                    </div>
                                    <small class="text-muted">4 Series × Al fallo · Descanso: 120s</small>
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-secondary text-white"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- MODAL DE PLANTILLAS DE RUTINA -->
    <div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border border-secondary border-opacity-25 rounded-4 p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-folder-open text-primary me-2"></i>Plantillas Predefinidas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small">Selecciona una estructura base para cargarla directamente al atleta actual:</p>
                    <div class="d-flex flex-column gap-2">
                        <button class="btn btn-outline-secondary text-start p-3 rounded-3 text-white">
                            <div class="fw-bold text-primary">Rutina Hipertrofia 4 Días (Push-Pull-Legs)</div>
                            <small class="text-muted">Ideal para usuarios intermedios enfocados en volumen muscular.</small>
                        </button>
                        <button class="btn btn-outline-secondary text-start p-3 rounded-3 text-white">
                            <div class="fw-bold text-info">Rutina de Fuerza 3 Días (Full Body)</div>
                            <small class="text-muted">Enfoque en básicos: Sentadilla, Press de Banca y Peso Muerto.</small>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>
</body>
</html>