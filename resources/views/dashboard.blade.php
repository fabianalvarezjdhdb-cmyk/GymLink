<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Dashboard de Entrenamiento</title>

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

        /* Routine Checklist */
        .routine-item {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        /* Chat Window */
        .chat-container {
            height: 380px;
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
            </a>
            <hr class="border-secondary opacity-25 mb-4">

            <nav>
                 <a href="{{ url('/dashboard') }}" class="nav-link-custom {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ url('/rutinas') }}" class="nav-link-custom {{ request()->is('rutinas*') ? 'active' : '' }}">
                    <i class="fa-solid fa-list-check"></i> Mi Rutina Diaria
                </a>
                <a href="#chat-section" class="nav-link-custom">
                    <i class="fa-solid fa-comments"></i> Chat con Coach
                </a>
                <a href="#" class="nav-link-custom">
                    <i class="fa-solid fa-fire"></i> Mi Progreso
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
                <h2 class="h5 fw-bold mb-0 text-white">Panel de Entrenamiento</h2>
                <small class="text-muted">¡A darle con toda a la sesión de hoy!</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <span class="d-block fw-bold text-white small">Daniel Zubieta</span>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill">Atleta GymLink</span>
                </div>
                <div class="stat-icon bg-primary text-white fw-bold">
                    DZ
                </div>
            </div>
        </header>

        <!-- TARJETAS DE MÉTRICAS RÁPIDAS -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Racha de Días</span>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">12 Días</h3>
                    <small class="text-success"><i class="fa-solid fa-arrow-trend-up"></i> ¡Tu mejor marca!</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Volumen Movido</span>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-weight-hanging"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">4,850 kg</h3>
                    <small class="text-primary">+15% vs. semana pasada</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Calorías Quemadas</span>
                        <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">650 kcal</h3>
                    <small class="text-muted">Meta diaria: 700 kcal</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Tiempo Activo</span>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">1h 15m</h3>
                    <small class="text-info">Sesión de hoy completada</small>
                </div>
            </div>
        </div>

        <!-- GRÁFICOS DE RENDIMIENTO -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-chart-area me-2 text-primary"></i>Progreso de Cargas (Peso Muerto & Sentadilla)</h5>
                        <span class="badge bg-secondary">Últimas 6 Semanas</span>
                    </div>
                    <div style="height: 280px;">
                        <canvas id="progressChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-calendar-check me-2 text-primary"></i>Asistencia Semanal</h5>
                    <p class="text-muted small mb-4">Registro de sesiones completadas este ciclo</p>
                    <div style="height: 220px;" class="d-flex justify-content-center">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCIÓN DE RUTINA DEL DÍA Y CHAT INTEGRADO -->
        <div class="row g-4">
            <!-- Checklist de Rutina -->
            <div class="col-lg-6">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-person-running me-2 text-primary"></i>Rutina de Hoy: Leg Day & Core</h5>
                        <span class="badge bg-success">En Progreso</span>
                    </div>

                    <div class="routine-list mt-3">
                        <div class="routine-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked id="ex1">
                                <label class="form-check-label text-white fw-semibold" for="ex1">Sentadilla Libre</label>
                            </div>
                            <span class="text-muted small">4 series x 10 reps (80kg)</span>
                        </div>

                        <div class="routine-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked id="ex2">
                                <label class="form-check-label text-white fw-semibold" for="ex2">Prensa de Piernas</label>
                            </div>
                            <span class="text-muted small">3 series x 12 reps (120kg)</span>
                        </div>

                        <div class="routine-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ex3">
                                <label class="form-check-label text-white fw-semibold" for="ex3">Peso Muerto Rumano</label>
                            </div>
                            <span class="text-muted small">4 series x 8 reps (70kg)</span>
                        </div>

                        <div class="routine-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ex4">
                                <label class="form-check-label text-white fw-semibold" for="ex4">Elevación de Talones</label>
                            </div>
                            <span class="text-muted small">3 series x 15 reps</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Directo con el Coach -->
            <div class="col-lg-6" id="chat-section">
                <div class="glass-card chat-container">
                    <div class="d-flex align-items-center gap-2 pb-3 border-bottom border-secondary border-opacity-25">
                        <div class="stat-icon bg-info text-white fw-bold rounded-circle" style="width: 40px; height: 40px; font-size: 0.9rem;">
                            CO
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Entrenador Asignado</h6>
                            <small class="text-success"><i class="fa-solid fa-circle me-1" style="font-size: 0.5rem;"></i>En línea</small>
                        </div>
                    </div>

                    <div class="chat-messages my-3">
                        <div class="msg-bubble msg-received">
                            ¡Hola Daniel! Recuérdame mantener la espalda recta en la última serie de peso muerto.
                        </div>
                        <div class="msg-bubble msg-sent">
                            ¡Entendido Profe! Ya completé la sentadilla con 80kg sintiéndome muy cómodo.
                        </div>
                        <div class="msg-bubble msg-received">
                            ¡Excelente trabajo! Vamos con toda por el remate de pierna.
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Escribe a tu entrenador...">
                        <button class="btn btn-primary fw-bold" type="button"><i class="fa-solid fa-paper-plane me-1"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- SCRIPTS DE CONFIGURACIÓN DE GRÁFICOS CHART.JS -->
    <script>
        // Gráfico 1: Progreso de Cargas
        const ctxProgress = document.getElementById('progressChart').getContext('2d');
        new Chart(ctxProgress, {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
                datasets: [
                    {
                        label: 'Sentadilla (kg)',
                        data: [60, 65, 70, 75, 75, 80],
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.15)',
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: 'Peso Muerto (kg)',
                        data: [70, 75, 80, 85, 90, 95],
                        borderColor: '#06b6d4',
                        backgroundColor: 'rgba(6, 182, 212, 0.05)',
                        fill: true,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#94a3b8' } }
                },
                scales: {
                    x: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                    y: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(255,255,255,0.05)' } }
                }
            }
        });

        // Gráfico 2: Asistencia Semanal (Doughnut)
        const ctxAttendance = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctxAttendance, {
            type: 'doughnut',
            data: {
                labels: ['Completados', 'Pendientes'],
                datasets: [{
                    data: [4, 1],
                    backgroundColor: ['#0d6efd', '#334155'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#94a3b8' } }
                }
            }
        });
    </script>
</body>
</html>