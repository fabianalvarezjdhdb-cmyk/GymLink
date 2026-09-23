<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink - Gestión de Clientes</title>

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

        /* Table Design */
        .table-custom {
            color: #e2e8f0;
            vertical-align: middle;
        }

        .table-custom tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: background-color 0.2s ease;
        }

        .table-custom tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.03);
        }

        /* Custom Inputs */
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
                <a href="{{ url('/coach/clientes') }}" class="nav-link-custom active">
                    <i class="fa-solid fa-users"></i> Mis Clientes
                </a>
                <a href="{{ url('/coach/rutinas') }}" class="nav-link-custom">
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
                <h2 class="h5 fw-bold mb-0 text-white"><i class="fa-solid fa-users-gear me-2 text-primary"></i>Gestión de Atletas</h2>
                <small class="text-muted">Monitorea los objetivos y el progreso físico de tus clientes asignados</small>
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

        <!-- TARJETAS INFORMATIVAS -->
        <div class="row g-4 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Total Atletas</span>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">18</h3>
                    <small class="text-success"><i class="fa-solid fa-check me-1"></i>100% Asignados</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">En Hipertrofia</span>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-child-reaching"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">10</h3>
                    <small class="text-info">55% del grupo</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Cumplimiento Medio</span>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">84%</h3>
                    <small class="text-success">+2% vs mes pasado</small>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="glass-card">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Planes por Revistar</span>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">4</h3>
                    <small class="text-warning">Actualización pendiente</small>
                </div>
            </div>
        </div>

        <!-- BANNER DE ACCIÓN Y BUSCADOR -->
        <div class="glass-card mb-4">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary border-opacity-25 text-muted">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" id="searchClient" class="form-control form-control-dark" placeholder="Buscar cliente por nombre...">
                    </div>
                </div>

                <div class="col-md-4">
                    <select class="form-select form-select-dark">
                        <option value="all" selected>Todos los Objetivos</option>
                        <option value="hipertrofia">Hipertrofia y Volumen</option>
                        <option value="fuerza">Ganancia de Fuerza</option>
                        <option value="definicion">Definición y Pérdida de Grasa</option>
                    </select>
                </div>

                <div class="col-md-4 text-md-end">
                    <button class="btn btn-primary fw-bold px-4 rounded-3 py-2 shadow-lg" data-bs-toggle="modal" data-bs-target="#newClientModal">
                        <i class="fa-solid fa-user-plus me-2"></i>Asignar Nuevo Cliente
                    </button>
                </div>
            </div>
        </div>

        <!-- TABLA DE CLIENTES -->
        <div class="glass-card p-0 overflow-hidden">
            <div class="p-4 border-b border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-list-check me-2 text-primary"></i>Listado Activo de Atletas</h5>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">18 Registrados</span>
            </div>

            <div class="table-responsive">
                <table class="table table-custom mb-0">
                    <thead class="bg-dark bg-opacity-50 text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3">Cliente</th>
                            <th class="py-3">Objetivo Principal</th>
                            <th class="py-3">Progreso del Plan</th>
                            <th class="py-3">Estado</th>
                            <th class="pe-4 py-3 text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="clientTableBody">
                        <!-- Cliente 1 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon bg-primary text-white fw-bold rounded-circle" style="width: 40px; height: 40px; font-size: 0.85rem;">
                                        DZ
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-white mb-0">Daniel Zubieta</h6>
                                        <small class="text-muted">daniel@gymlink.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">Hipertrofia y Volumen</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2" style="max-width: 180px;">
                                    <div class="progress w-100 bg-dark" style="height: 8px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                                    </div>
                                    <small class="fw-bold text-white">75%</small>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="fa-solid fa-circle me-1" style="font-size: 0.4rem;"></i>Al día</span>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <a href="{{ url('/coach/rutinas') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver / Asignar Rutina">
                                    <i class="fa-solid fa-dumbbell me-1"></i> Rutina
                                </a>
                                <a href="{{ url('/coach/dashboard') }}#chat-section" class="btn btn-sm btn-outline-info" title="Mensaje Directo">
                                    <i class="fa-solid fa-comment"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Cliente 2 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon text-white fw-bold rounded-circle" style="width: 40px; height: 40px; font-size: 0.85rem; background-color: #8b5cf6;">
                                        FA
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-white mb-0">Fabián Álvarez</h6>
                                        <small class="text-muted">fabian@gymlink.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">Pérdida de Grasa</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2" style="max-width: 180px;">
                                    <div class="progress w-100 bg-dark" style="height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"></div>
                                    </div>
                                    <small class="fw-bold text-white">40%</small>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle"><i class="fa-solid fa-clock me-1"></i>Revisar</span>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <a href="{{ url('/coach/rutinas') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver / Asignar Rutina">
                                    <i class="fa-solid fa-dumbbell me-1"></i> Rutina
                                </a>
                                <a href="{{ url('/coach/dashboard') }}#chat-section" class="btn btn-sm btn-outline-info" title="Mensaje Directo">
                                    <i class="fa-solid fa-comment"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Cliente 3 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stat-icon bg-success text-white fw-bold rounded-circle" style="width: 40px; height: 40px; font-size: 0.85rem;">
                                        LM
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-white mb-0">Laura Martínez</h6>
                                        <small class="text-muted">laura@gymlink.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Ganancia de Fuerza</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-2" style="max-width: 180px;">
                                    <div class="progress w-100 bg-dark" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 90%"></div>
                                    </div>
                                    <small class="fw-bold text-white">90%</small>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="fa-solid fa-circle me-1" style="font-size: 0.4rem;"></i>Al día</span>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <a href="{{ url('/coach/rutinas') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver / Asignar Rutina">
                                    <i class="fa-solid fa-dumbbell me-1"></i> Rutina
                                </a>
                                <a href="{{ url('/coach/dashboard') }}#chat-section" class="btn btn-sm btn-outline-info" title="Mensaje Directo">
                                    <i class="fa-solid fa-comment"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- MODAL PARA ASIGNAR CLIENTE -->
    <div class="modal fade" id="newClientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border border-secondary border-opacity-25 rounded-4 p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-user-plus text-primary me-2"></i>Asignar Nuevo Cliente</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-semibold">Nombre Completo del Atleta</label>
                            <input type="text" class="form-control form-control-dark" placeholder="Ej. Carlos Mendoza">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-semibold">Correo Electrónico</label>
                            <input type="email" class="form-control form-control-dark" placeholder="atleta@gymlink.com">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">Objetivo Principal</label>
                                <select class="form-select form-select-dark">
                                    <option>Hipertrofia</option>
                                    <option>Fuerza</option>
                                    <option>Pérdida de Grasa</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label small text-muted fw-semibold">Nivel Inicial</label>
                                <select class="form-select form-select-dark">
                                    <option>Principiante</option>
                                    <option>Intermedio</option>
                                    <option>Avanzado</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary fw-bold rounded-3">Guardar y Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.bundle.min.js"></script>

    <!-- Script de Búsqueda Interactiva -->
    <script>
        document.getElementById('searchClient').addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('#clientTableBody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    </script>
</body>
</html>