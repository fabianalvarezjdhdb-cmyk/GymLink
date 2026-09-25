<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Análisis de Progreso</title>

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
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
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
            <a href="{{ url('/') }}" class="brand-logo mb-3">
                <i class="fa-solid fa-dumbbell text-primary"></i> GymLink
            </a>
            <hr class="border-secondary opacity-25 mb-3">

            <nav>
                <div class="sidebar-section-title">Entrenamiento</div>
                
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

        <!-- ALERTA DE ÉXITO AL GUARDAR -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- HEADER BAR CON BOTÓN FUNCIONAL DE REGISTRAR PESO / MEDIDAS -->
        <header class="header-bar">
            <div>
                <h2 class="h5 fw-bold mb-0 text-white">Análisis de Progreso</h2>
                <small class="text-white">Monitorea tus marcas históricas, evolución corporal y rendimiento general</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <!-- Botón que activa el Modal -->
                <button type="button" class="btn btn-primary fw-bold rounded-pill px-4 shadow" data-bs-toggle="modal" data-bs-target="#modalRegistrarPeso">
                    <i class="fa-solid fa-plus me-2"></i> Registrar Peso / Medidas
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

        <!-- TARJETAS DE MÉTRICAS -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Peso Actual</span>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-weight-scale"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">74.5 kg</h3>
                    <small class="text-success"><i class="fa-solid fa-arrow-trend-down"></i> -1.2 kg este mes</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">% Grasa Corporal</span>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-percent"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">14.8%</h3>
                    <small class="text-muted">Meta: 12.0%</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Masa Muscular</span>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">38.2 kg</h3>
                    <small class="text-success">+0.8 kg ganados</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Récords Personales</span>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">6 PRs</h3>
                    <small class="text-warning">Último: Sentadilla 100kg</small>
                </div>
            </div>
        </div>

        <!-- GRÁFICOS DE PROGRESO -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="glass-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-chart-line me-2 text-primary"></i>Evolución de Peso & % Grasa</h5>
                        <span class="badge bg-secondary">Últimos 3 Meses</span>
                    </div>
                    <div style="height: 280px;">
                        <canvas id="evolutionChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card h-100">
                    <h5 class="fw-bold text-white mb-3"><i class="fa-solid fa-radar me-2 text-primary"></i>Progreso de Cargas (1RM)</h5>
                    <p class="text-muted small mb-3">Capacidad de fuerza máxima estimada</p>
                    <div style="height: 220px;" class="d-flex justify-content-center">
                        <canvas id="loadsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- MODAL PARA REGISTRAR PESO Y MEDIDAS CON EMOJIS -->
    <div class="modal fade" id="modalRegistrarPeso" tabindex="-1" aria-labelledby="modalRegistrarPesoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: rgba(30, 41, 59, 0.95); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 20px; color: #f8fafc;">
                
                <div class="modal-header border-bottom border-secondary border-opacity-25">
                    <h5 class="modal-title fw-bold text-white" id="modalRegistrarPesoLabel">
                        📸 Nuevo Registro de Progreso
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Formulario -->
                <form action="{{ url('/progreso/guardar') }}" method="POST">
                    @csrf
                    <div class="modal-body py-4">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Peso Corporal (kg)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white border-secondary border-opacity-25">🛍️</span>
                                <input type="number" step="0.1" name="peso" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. 74.5" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">% Grasa Corporal (Opcional)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white border-secondary border-opacity-25">📊</span>
                                <input type="number" step="0.1" name="grasa" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Ej. 14.8">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Notas de la medición</label>
                            <textarea name="notas" class="form-control bg-dark text-white border-secondary border-opacity-25" rows="2" placeholder="Ej. En ayunas, sintiendo gran evolución..."></textarea>
                        </div>

                    </div>

                    <div class="modal-footer border-top border-secondary border-opacity-25">
                        <button type="button" class="btn btn-outline-secondary rounded-3 px-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary fw-bold rounded-3 px-4">Guardar Registro</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SCRIPTS DE BOOTSTRAP Y CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gráfico de Evolución
        const ctxEvolution = document.getElementById('evolutionChart').getContext('2d');
        new Chart(ctxEvolution, {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
                datasets: [{
                    label: 'Peso Corporal (kg)',
                    data: [76.5, 76.0, 75.5, 75.2, 74.8, 74.5],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { labels: { color: '#94a3b8' } } },
                scales: {
                    x: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                    y: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(255,255,255,0.05)' } }
                }
            }
        });

        // Gráfico de Cargas
        const ctxLoads = document.getElementById('loadsChart').getContext('2d');
        new Chart(ctxLoads, {
            type: 'radar',
            data: {
                labels: ['Sentadilla', 'Peso Muerto', 'Press Banca', 'Press Militar', 'Dominadas'],
                datasets: [{
                    label: 'Carga Máxima (kg)',
                    data: [100, 120, 85, 60, 25],
                    borderColor: '#06b6d4',
                    backgroundColor: 'rgba(6, 182, 212, 0.2)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    r: {
                        grid: { color: 'rgba(255,255,255,0.1)' },
                        angleLines: { color: 'rgba(255,255,255,0.1)' },
                        ticks: { display: false }
                    }
                }
            }
        });
    </script>
</body>
</html>