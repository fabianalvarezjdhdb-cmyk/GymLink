<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Panel de Entrenador</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js para estadísticas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* Client Item List */
        .client-item {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            transition: all 0.2s ease;
        }

        .client-item:hover {
            border-color: rgba(13, 110, 253, 0.4);
            background: rgba(15, 23, 42, 0.8);
        }

        /* Chat Styling */
        .chat-container {
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chat-messages {
            overflow-y: auto;
            padding-right: 10px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .msg-bubble {
            max-width: 75%;
            padding: 10px 16px;
            border-radius: 14px;
            font-size: 0.88rem;
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
                <a href="{{ url('/coach/dashboard') }}" class="nav-link-custom active">
                    <i class="fa-solid fa-chart-pie"></i> Panel Principal
                </a>
                <a href="{{ url('/coach/clientes') }}" class="nav-link-custom">
                    <i class="fa-solid fa-users"></i> Mis Clientes
                </a>
                <a href="{{ url('/coach/rutinas') }}" class="nav-link-custom">
                    <i class="fa-solid fa-dumbbell"></i> Gestión de Rutinas
                </a>
                <a href="#chat-section" class="nav-link-custom">
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

        <!-- HEADER BAR DINÁMICO -->
        <header class="header-bar">
            <div>
                <h2 class="h5 fw-bold mb-0 text-white">Panel de Control del Entrenador</h2>
                <small class="text-muted">Supervisa el rendimiento y progreso de tus atletas</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <!-- Nombre y Apellido dinámicos desde la sesión -->
                    <span class="d-block fw-bold text-white small">
                        {{ session('usuario_nombre', 'Coach') }} {{ session('usuario_apellido', '') }}
                    </span>
                    <!-- Rol del usuario -->
                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill text-capitalize">
                        {{ session('rol', 'Coach') }}
                    </span>
                </div>

                <!-- Avatar con las Iniciales Dinámicas -->
                <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.95rem;">
                    {{ strtoupper(substr(session('usuario_nombre', 'C'), 0, 1)) }}{{ strtoupper(substr(session('usuario_apellido', 'O'), 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- TARJETAS DE MÉTRICAS DEL COACH -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Atletas Asignados</span>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">18</h3>
                    <small class="text-success"><i class="fa-solid fa-user-plus me-1"></i>+2 este mes</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Rutinas Activas</span>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">42</h3>
                    <small class="text-info">Planes en seguimiento</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Cumplimiento General</span>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">87%</h3>
                    <small class="text-success"><i class="fa-solid fa-arrow-trend-up me-1"></i>+4% esta semana</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Mensajes Pendientes</span>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">3</h3>
                    <small class="text-warning">Requieren respuesta</small>
                </div>
            </div>
        </div>

        <!-- GRÁFICOS OPERATIVOS DEL COACH -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-chart-bar me-2 text-primary"></i>Asistencia Semanal de Atletas</h5>
                        <span class="badge bg-secondary">Últimos 7 días</span>
                    </div>
                    <div style="height: 280px;">
                        <canvas id="coachAttendanceChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-pie-chart me-2 text-primary"></i>Distribución de Objetivos</h5>
                    <p class="text-muted small mb-3">Metas principales de tus clientes</p>
                    <div style="height: 220px;" class="d-flex justify-content-center">
                        <canvas id="goalsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- LISTA DE ATLETAS DESTACADOS Y CHAT -->
        <div class="row g-4">
            <!-- Atletas bajo supervisión -->
            <div class="col-lg-6">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-user-check me-2 text-primary"></i>Actividad de Clientes</h5>
                        <a href="{{ url('/coach/clientes') }}" class="btn btn-sm btn-outline-primary fw-semibold">Ver Todos</a>
                    </div>

                    <div class="client-list mt-3">
                        <div class="client-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.9rem;">
                                    DZ
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Daniel Zubieta</h6>
                                    <small class="text-muted">Rutina de Pierna · <span class="text-success">Completado Hoy</span></small>
                                </div>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle">95% RIR</span>
                        </div>

                        <div class="client-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-purple bg-opacity-25 text-purple fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.9rem; background-color: #8b5cf6;">
                                    FA
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Fabián Álvarez</h6>
                                    <small class="text-muted">Rutina de Torso · <span class="text-warning">Pendiente</span></small>
                                </div>
                            </div>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Revisar</span>
                        </div>

                        <div class="client-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-info text-white fw-bold rounded-circle" style="width: 42px; height: 42px; font-size: 0.9rem;">
                                    LM
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Laura Martínez</h6>
                                    <small class="text-muted">Cardio & Hipertrofia · <span class="text-success">Completado Hoy</span></small>
                                </div>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle">100% RIR</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat en Vivo con Atletas -->
            <div class="col-lg-6" id="chat-section">
                <div class="glass-card chat-container">
                    <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-secondary border-opacity-25">
                        <div class="d-flex align-items-center gap-2">
                            <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 40px; height: 40px; font-size: 0.9rem;">
                                DZ
                            </div>
                            <div>
                                <h6 class="fw-bold text-white mb-0">Daniel Zubieta</h6>
                                <small class="text-success"><i class="fa-solid fa-circle me-1" style="font-size: 0.5rem;"></i>En línea</small>
                            </div>
                        </div>
                        <span class="badge bg-primary">Atleta Asignado</span>
                    </div>

                    <div class="chat-messages my-3">
                        <div class="msg-bubble msg-received">
                            Hola profe, ¿cómo hago el peso muerto correctamente sin lastimarme la espalda?
                        </div>
                        <div class="msg-bubble msg-sent">
                            ¡Hola Daniel! Mantén la barra pegada a las espinillas, saca el pecho y activa el dorsal antes de levantar.
                        </div>
                        <div class="msg-bubble msg-received">
                            ¡Entendido Profe! Probaré en la siguiente serie.
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Responder a Daniel...">
                        <button class="btn btn-primary fw-bold" type="button"><i class="fa-solid fa-paper-plane me-1"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- SCRIPTS DE CONFIGURACIÓN CHART.JS -->
    <script>
        // Gráfico 1: Asistencia Semanal de Atletas
        const ctxCoachAttendance = document.getElementById('coachAttendanceChart').getContext('2d');
        new Chart(ctxCoachAttendance, {
            type: 'bar',
            data: {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Sesiones Completadas',
                    data: [16, 18, 14, 17, 15, 10, 6],
                    backgroundColor: '#0d6efd',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#94a3b8' } }
                },
                scales: {
                    x: { ticks: { color: '#94a3b8' }, grid: { display: false } },
                    y: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(255,255,255,0.05)' } }
                }
            }
        });

        // Gráfico 2: Objetivos de los Atletas
        const ctxGoals = document.getElementById('goalsChart').getContext('2d');
        new Chart(ctxGoals, {
            type: 'doughnut',
            data: {
                labels: ['Hipertrofia', 'Pérdida de Grasa', 'Fuerza', 'Rehabilitación'],
                datasets: [{
                    data: [10, 5, 2, 1],
                    backgroundColor: ['#0d6efd', '#06b6d4', '#8b5cf6', '#64748b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#94a3b8', font: { size: 11 } } }
                }
            }
        });
    </script>
</body>
</html>