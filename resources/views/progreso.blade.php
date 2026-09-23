<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Mi Progreso</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js para estadísticas avanzadas -->
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

        /* PR Badges & Cards */
        .pr-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .pr-card:hover {
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
                <a href="{{ url('/chat') }}#chat-section" class="nav-link-custom">
                    <i class="fa-solid fa-comments"></i> Chat con Coach
                </a>
                <a href="{{ url('/progreso') }}" class="nav-link-custom {{ request()->is('progreso*') ? 'active' : '' }}">
                    <i class="fa-solid fa-fire text-warning"></i> Mi Progreso
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-arrow-trend-up text-primary me-2"></i>Análisis de Progreso</h2>
                <small class="text-white">Monitorea tus marcas históricas, evolución corporal y rendimiento general</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary fw-bold rounded-3 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalRegistroMetricas">
                    <i class="fa-solid fa-plus"></i> Registrar Peso / Medidas
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

        <!-- TARJETAS DE MÉTRICAS CORPORALES -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Peso Actual</span>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-weight-scale"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">74.5 kg</h3>
                    <small class="text-success"><i class="fa-solid fa-arrow-down me-1"></i>-1.2 kg este mes</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">% Grasa Estimado</span>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-percent"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">14.8%</h3>
                    <small class="text-info"><i class="fa-solid fa-bullseye me-1"></i>Meta: 12.0%</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Masa Muscular</span>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-child-reaching"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">38.2 kg</h3>
                    <small class="text-success"><i class="fa-solid fa-arrow-up me-1"></i>+0.8 kg ganados</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Récords Personales (PR)</span>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">6 PRs</h3>
                    <small class="text-warning"><i class="fa-solid fa-star me-1"></i>Último: Sentadilla 100kg</small>
                </div>
            </div>
        </div>

        <!-- GRÁFICOS PRINCIPALES DE PROGRESO -->
        <div class="row g-4 mb-4">
            <!-- Gráfico de Evolución de Peso y Composición Corporal -->
            <div class="col-lg-7">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-chart-line text-primary me-2"></i>Evolución de Peso & % Grasa</h5>
                        <span class="badge bg-secondary">Últimos 3 Meses</span>
                    </div>
                    <div style="height: 300px;">
                        <canvas id="weightProgressChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gráfico de Cargas Máximas Estimadas (1RM) -->
            <div class="col-lg-5">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-dumbbell text-info me-2"></i>Progreso de Cargas (1RM)</h5>
                        <span class="badge bg-info bg-opacity-25 text-info">Kg Máximos</span>
                    </div>
                    <div style="height: 300px;">
                        <canvas id="rmRadarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- MARCAS PERSONALES (PRs) Y TABLA DE REVISION -->
        <div class="row g-4 mb-4">
            <!-- Récords en Ejercicios Principales -->
            <div class="col-lg-6">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-award text-warning me-2"></i>Marcas Personales (PRs)</h5>
                    
                    <div class="d-flex flex-column gap-3">
                        <div class="pr-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-primary bg-opacity-25 text-primary rounded-circle" style="width: 44px; height: 44px;">
                                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Sentadilla Libre</h6>
                                    <small class="text-secondary">Fecha: 15 Sep 2026</small>
                                </div>
                            </div>
                            <span class="badge bg-primary fs-6 px-3 py-2 fw-bold">100 kg × 5 reps</span>
                        </div>

                        <div class="pr-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-info bg-opacity-25 text-info rounded-circle" style="width: 44px; height: 44px;">
                                    <i class="fa-solid fa-weight-hanging"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Peso Muerto Rumano</h6>
                                    <small class="text-secondary">Fecha: 18 Sep 2026</small>
                                </div>
                            </div>
                            <span class="badge bg-info text-dark fs-6 px-3 py-2 fw-bold">115 kg × 6 reps</span>
                        </div>

                        <div class="pr-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon bg-success bg-opacity-25 text-success rounded-circle" style="width: 44px; height: 44px;">
                                    <i class="fa-solid fa-dumbbell"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-0">Press de Banca Plano</h6>
                                    <small class="text-secondary">Fecha: 10 Sep 2026</small>
                                </div>
                            </div>
                            <span class="badge bg-success fs-6 px-3 py-2 fw-bold">85 kg × 8 reps</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historial de Registros Físicos -->
            <div class="col-lg-6">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-clipboard-list text-primary me-2"></i>Historial de Pesajes</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-dark table-hover bg-transparent text-white align-middle mb-0" style="border-color: rgba(255,255,255,0.08);">
                            <thead>
                                <tr class="text-muted small text-uppercase">
                                    <th>Fecha</th>
                                    <th>Peso</th>
                                    <th>% Grasa</th>
                                    <th>Cintura</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">21 Sep 2026</td>
                                    <td>74.5 kg</td>
                                    <td>14.8%</td>
                                    <td>81 cm</td>
                                    <td><span class="badge bg-success-subtle text-success border border-success-subtle">Excelente</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">07 Sep 2026</td>
                                    <td>75.1 kg</td>
                                    <td>15.2%</td>
                                    <td>82 cm</td>
                                    <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">En Progreso</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">24 Ago 2026</td>
                                    <td>75.7 kg</td>
                                    <td>15.6%</td>
                                    <td>83 cm</td>
                                    <td><span class="badge bg-secondary">Inicial</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- MODAL DE REGISTRO RÁPIDO DE MÉTRICAS -->
    <div class="modal fade" id="modalRegistroMetricas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border border-secondary border-opacity-25" style="border-radius: 20px;">
                <div class="modal-header border-bottom border-secondary border-opacity-25">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus-circle text-primary me-2"></i>Registrar Métrica Física</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">Peso Corporal (kg)</label>
                            <input type="number" step="0.1" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. 74.5" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">% Grasa Estimado (Opcional)</label>
                            <input type="number" step="0.1" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. 14.8">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-semibold">Cintura (cm) (Opcional)</label>
                            <input type="number" step="0.1" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. 81">
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top border-secondary border-opacity-25">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary fw-bold px-4" data-bs-dismiss="modal">Guardar Registro</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>

    <!-- SCRIPTS DE GRÁFICOS CHART.JS -->
    <script>
        // Gráfico 1: Evolución de Peso & % Grasa
        const ctxWeight = document.getElementById('weightProgressChart').getContext('2d');
        new Chart(ctxWeight, {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
                datasets: [
                    {
                        label: 'Peso Corporal (kg)',
                        data: [76.5, 76.0, 75.7, 75.1, 74.8, 74.5],
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.15)',
                        fill: true,
                        tension: 0.35,
                        yAxisID: 'y'
                    },
                    {
                        label: '% Grasa Corporal',
                        data: [16.2, 15.9, 15.6, 15.2, 15.0, 14.8],
                        borderColor: '#06b6d4',
                        backgroundColor: 'transparent',
                        borderDash: [5, 5],
                        tension: 0.35,
                        yAxisID: 'y1'
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
                    y: { 
                        ticks: { color: '#94a3b8' }, 
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        title: { display: true, text: 'Kg', color: '#0d6efd' }
                    },
                    y1: { 
                        position: 'right',
                        ticks: { color: '#94a3b8' }, 
                        grid: { display: false },
                        title: { display: true, text: '%', color: '#06b6d4' }
                    }
                }
            }
        });

        // Gráfico 2: Radar de Cargas Máximas
        const ctxRM = document.getElementById('rmRadarChart').getContext('2d');
        new Chart(ctxRM, {
            type: 'radar',
            data: {
                labels: ['Sentadilla', 'Peso Muerto', 'Press Banca', 'Press Militar', 'Dominadas (Llastre)'],
                datasets: [{
                    label: 'Carga Máxima Estimada (kg)',
                    data: [100, 115, 85, 55, 20],
                    backgroundColor: 'rgba(6, 182, 212, 0.25)',
                    borderColor: '#06b6d4',
                    pointBackgroundColor: '#06b6d4',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#94a3b8' } }
                },
                scales: {
                    r: {
                        angleLines: { color: 'rgba(255, 255, 255, 0.1)' },
                        grid: { color: 'rgba(255, 255, 255, 0.1)' },
                        pointLabels: { color: '#94a3b8', font: { size: 11, weight: 'bold' } },
                        ticks: { backdropColor: 'transparent', color: '#64748b' }
                    }
                }
            }
        });
    </script>
</body>
</html>