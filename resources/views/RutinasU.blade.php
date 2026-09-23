<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Mi Rutina Diaria</title>

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

        /* Day Selector Tabs */
        .day-tab {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
            padding: 12px 20px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            min-width: 100px;
        }

        .day-tab.active {
            background: var(--gl-primary);
            color: #ffffff;
            box-shadow: 0 6px 18px rgba(13, 110, 253, 0.4);
            border-color: var(--gl-primary);
        }

        .day-tab:hover:not(.active) {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* Exercise Card Item */
        .exercise-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 16px;
            transition: border-color 0.3s ease;
        }

        .exercise-card.completed {
            border-color: rgba(25, 135, 84, 0.5);
            background: rgba(25, 135, 84, 0.08);
        }

        /* CORRECCIÓN CLAVE: ELIMINA EL FONDO BLANCO DE LAS TABLAS DE BOOTSTRAP */
        .table-sets, 
        .table-sets > :not(caption) > * > * {
            background-color: transparent !important;
            box-shadow: none !important;
            color: #f8fafc !important;
            border-bottom-color: rgba(255, 255, 255, 0.08) !important;
        }

        .table-sets th {
            color: #94a3b8 !important;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding-bottom: 12px;
        }

        .table-sets td {
            color: #cbd5e1 !important;
            vertical-align: middle;
            padding: 10px 8px;
        }

        /* Estilos para los Inputs de Series */
        .set-input {
            background-color: #0f172a !important;
            border: 1px solid #475569 !important;
            color: #ffffff !important;
            border-radius: 10px;
            padding: 6px 10px;
            width: 75px;
            text-align: center;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .set-input:focus {
            outline: none;
            background-color: #1e293b !important;
            border-color: var(--gl-primary) !important;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
        }

        .set-input:disabled {
            background-color: rgba(15, 23, 42, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.08) !important;
            color: #94a3b8 !important;
        }

        /* Checkboxes oscuros integrados */
        .form-check-input {
            background-color: #0f172a !important;
            border: 1px solid #475569 !important;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--gl-primary) !important;
            border-color: var(--gl-primary) !important;
        }

        /* Ocultar flechas de incremento en inputs number */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }

        /* Form Controls y Selects generales */
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

        .form-control:focus, .form-select:focus {
            background-color: #0f172a !important;
            border-color: var(--gl-primary) !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.35);
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

    <!-- SIDEBAR DE NAVEGACIÓN COMPLETO -->
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-calendar-day text-primary me-2"></i>Gestión de Rutina Diaria</h2>
                <small style="color: #cbd5e1;">Revisa, registra y completa tu plan de entrenamiento</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary fw-bold rounded-3 d-flex align-items-center gap-2" id="startTimerBtn">
                    <i class="fa-solid fa-stopwatch"></i> <span id="timerDisplay">Descanso: 01:30</span>
                </button>

                <div class="text-end d-none d-sm-block ms-2">
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

        <!-- SELECTOR DE DÍAS DE LA SEMANA -->
        <div class="d-flex gap-2 mb-4 overflow-x-auto pb-2">
            <a href="#" class="day-tab active">
                <span>LUN</span>
                <small style="color: #cbd5e1;">Pierna / Core</small>
            </a>
            <a href="#" class="day-tab">
                <span>MAR</span>
                <small style="color: #cbd5e1;">Pecho / Tríceps</small>
            </a>
            <a href="#" class="day-tab">
                <span>MIÉ</span>
                <small style="color: #cbd5e1;">Espalda / Bíceps</small>
            </a>
            <a href="#" class="day-tab">
                <span>JUE</span>
                <small style="color: #cbd5e1;">Hombro / Abdomen</small>
            </a>
            <a href="#" class="day-tab">
                <span>VIE</span>
                <small style="color: #cbd5e1;">Full Body</small>
            </a>
            <a href="#" class="day-tab opacity-50">
                <span>SÁB</span>
                <small style="color: #cbd5e1;">Descanso</small>
            </a>
        </div>

        <!-- RESUMEN Y BARRA DE PROGRESO DE LA SESIÓN -->
        <div class="glass-card mb-4">
            <div class="row align-items-center g-3">
                <div class="col-md-4">
                    <h4 class="fw-bold text-white mb-1">Día 1: Hipertrofia de Pierna</h4>
                    <p class="small mb-0" style="color: #cbd5e1;"><i class="fa-solid fa-user-gear text-primary me-1"></i> Asignada por: <strong class="text-white">Coach Camilo</strong></p>
                </div>

                <div class="col-md-5">
                    <div class="d-flex justify-content-between text-sm mb-1">
                        <span class="small fw-semibold" style="color: #cbd5e1;">Progreso de la sesión</span>
                        <span class="small text-primary fw-bold">50% Completado</span>
                    </div>
                    <div class="progress bg-dark" style="height: 10px; border-radius: 10px;">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;"></div>
                    </div>
                </div>

                <div class="col-md-3 text-md-end">
                    <button class="btn btn-success fw-bold px-4 rounded-3 d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> Finalizar Entrenamiento
                    </button>
                </div>
            </div>
        </div>

        <!-- LISTADO DE EJERCICIOS DE LA RUTINA -->
        <div class="row g-4">
            <div class="col-lg-8">
                <h5 class="fw-bold text-white mb-3 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-list-ol text-primary"></i> Ejercicios Programados (4)
                </h5>

                <!-- Ejercicio 1 (Completado) -->
                <div class="exercise-card completed">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle mb-1"><i class="fa-solid fa-check me-1"></i>Completado</span>
                            <h5 class="fw-bold text-white mb-0">1. Sentadilla Libre (Squat)</h5>
                            <small style="color: #cbd5e1;">Enfoque: Cuádriceps y Glúteos | RIR 2</small>
                        </div>
                        <span class="small" style="color: #cbd5e1;"><i class="fa-solid fa-clock me-1"></i>Descanso: 90s</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sets">
                            <thead>
                                <tr>
                                    <th>Serie</th>
                                    <th>Objetivo</th>
                                    <th>Peso (kg)</th>
                                    <th>Reps</th>
                                    <th class="text-end">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge border border-secondary border-opacity-50" style="background-color: #0f172a; color: #cbd5e1;">1</span></td>
                                    <td style="color: #cbd5e1;">10 reps x 75kg</td>
                                    <td><input type="number" class="set-input" value="75" disabled></td>
                                    <td><input type="number" class="set-input" value="10" disabled></td>
                                    <td class="text-end"><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="badge border border-secondary border-opacity-50" style="background-color: #0f172a; color: #cbd5e1;">2</span></td>
                                    <td style="color: #cbd5e1;">10 reps x 80kg</td>
                                    <td><input type="number" class="set-input" value="80" disabled></td>
                                    <td><input type="number" class="set-input" value="10" disabled></td>
                                    <td class="text-end"><i class="fa-solid fa-circle-check text-success fs-5"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ejercicio 2 (En Progreso) -->
                <div class="exercise-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle mb-1"><i class="fa-solid fa-dumbbell me-1"></i>En Curso</span>
                            <h5 class="fw-bold text-white mb-0">2. Prensa de Piernas 45°</h5>
                            <small style="color: #cbd5e1;">Enfoque: Cuádriceps | Cadencia 2-0-2</small>
                        </div>
                        <span class="small" style="color: #cbd5e1;"><i class="fa-solid fa-clock me-1"></i>Descanso: 60s</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sets">
                            <thead>
                                <tr>
                                    <th>Serie</th>
                                    <th>Objetivo</th>
                                    <th>Peso (kg)</th>
                                    <th>Reps Realizadas</th>
                                    <th class="text-end">Completar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge border border-secondary border-opacity-50" style="background-color: #0f172a; color: #cbd5e1;">1</span></td>
                                    <td style="color: #cbd5e1;">12 reps x 120kg</td>
                                    <td><input type="number" class="set-input" value="120"></td>
                                    <td><input type="number" class="set-input" value="12"></td>
                                    <td class="text-end"><input class="form-check-input fs-5" type="checkbox" checked></td>
                                </tr>
                                <tr>
                                    <td><span class="badge border border-secondary border-opacity-50" style="background-color: #0f172a; color: #cbd5e1;">2</span></td>
                                    <td style="color: #cbd5e1;">12 reps x 125kg</td>
                                    <td><input type="number" class="set-input" value="125"></td>
                                    <td><input type="number" class="set-input" placeholder="0"></td>
                                    <td class="text-end"><input class="form-check-input fs-5" type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td><span class="badge border border-secondary border-opacity-50" style="background-color: #0f172a; color: #cbd5e1;">3</span></td>
                                    <td style="color: #cbd5e1;">10 reps x 130kg</td>
                                    <td><input type="number" class="set-input" value="130"></td>
                                    <td><input type="number" class="set-input" placeholder="0"></td>
                                    <td class="text-end"><input class="form-check-input fs-5" type="checkbox"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ejercicio 3 (Pendiente) -->
                <div class="exercise-card">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="badge border border-secondary border-opacity-50 mb-1" style="background-color: #0f172a; color: #cbd5e1;">Pendiente</span>
                            <h5 class="fw-bold text-white mb-0">3. Peso Muerto Rumano</h5>
                            <small style="color: #cbd5e1;">Enfoque: Isquiotibiales y Glúteos</small>
                        </div>
                        <span class="small" style="color: #cbd5e1;"><i class="fa-solid fa-clock me-1"></i>3 Series x 10 reps</span>
                    </div>
                </div>
            </div>

            <!-- PANEL LATERAL: INFORMACIÓN ADICIONAL Y NOTAS -->
            <div class="col-lg-4">
                <!-- Tarjeta de Recomendaciones del Coach -->
                <div class="glass-card mb-4">
                    <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-lightbulb text-warning me-2"></i>Indicaciones del Entrenador</h6>
                    <p class="small" style="color: #cbd5e1;">
                        "En el Peso Muerto Rumano mantén el abdomen activo y la barra pegada a los muslos durante todo el recorrido. Si sientes molestia lumbar, reduce 5kg."
                    </p>
                    <hr class="border-secondary opacity-25">
                    <div class="d-flex align-items-center gap-2">
                        <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 36px; height: 36px; font-size: 0.8rem;">
                            CC
                        </div>
                        <small class="text-white fw-semibold">Coach Camilo</small>
                    </div>
                </div>

                <!-- Tarjeta de Registro de Sensaciones / Feedback -->
                <div class="glass-card">
                    <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-comment-dots text-primary me-2"></i>Notas de tu Sesión</h6>
                    <div class="mb-3">
                        <label class="form-label small" style="color: #cbd5e1;">Nivel de Esfuerzo Percibido (RPE)</label>
                        <select class="form-select">
                            <option value="8">8 / 10 - Exigente pero controlado</option>
                            <option value="9">9 / 10 - Casi al fallo</option>
                            <option value="10">10 / 10 - Esfuerzo Máximo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small" style="color: #cbd5e1;">Comentario para tu Coach</label>
                        <textarea class="form-control" rows="3" placeholder="¿Cómo te sentiste hoy con los pesos?"></textarea>
                    </div>
                    <button class="btn btn-outline-primary w-100 fw-bold"><i class="fa-solid fa-floppy-disk me-1"></i> Guardar Notas</button>
                </div>
            </div>
        </div>

    </main>

    <!-- JS PARA EL CRONÓMETRO DE DESCANSO -->
    <script>
        let timerSeconds = 90;
        let timerInterval = null;
        const timerDisplay = document.getElementById('timerDisplay');
        const startTimerBtn = document.getElementById('startTimerBtn');

        function updateTimerText() {
            const minutes = Math.floor(timerSeconds / 60);
            const seconds = timerSeconds % 60;
            timerDisplay.textContent = `Descanso: ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        startTimerBtn.addEventListener('click', () => {
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
                timerSeconds = 90;
                updateTimerText();
                startTimerBtn.classList.replace('btn-warning', 'btn-primary');
            } else {
                startTimerBtn.classList.replace('btn-primary', 'btn-warning');
                timerInterval = setInterval(() => {
                    if (timerSeconds > 0) {
                        timerSeconds--;
                        updateTimerText();
                    } else {
                        clearInterval(timerInterval);
                        timerInterval = null;
                        alert('¡Tiempo de descanso finalizado! Inicia la siguiente serie.');
                        timerSeconds = 90;
                        updateTimerText();
                        startTimerBtn.classList.replace('btn-warning', 'btn-primary');
                    }
                }, 1000);
            }
        });
    </script>
</body>
</html>