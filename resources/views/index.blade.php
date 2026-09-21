<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink | Ecosistema Digital Fitness</title>

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
            --gl-light: #f8fafc;
            --gl-accent: #00f2fe;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            background-color: var(--gl-light);
            overflow-x: hidden;
        }

        /* Glassmorphism Navbar */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(13, 110, 253, 0.85)), 
                        url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80') center/cover no-repeat;
            padding: 160px 0 100px;
            color: #fff;
            clip-path: polygon(0 0, 100% 0, 100% 95%, 0 100%);
        }

        /* Modern Cards with Hover Animation */
        .custom-card {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .custom-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(13, 110, 253, 0.15);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .badge-level {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        footer {
            background-color: var(--gl-dark);
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <!-- Header & Nav -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4" href="{{ url('/') }}">
                    <i class="fa-solid fa-dumbbell text-primary"></i>
                    <span>Gym<span class="text-primary">Link</span></span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-ul ms-auto navbar-nav align-items-lg-center gap-lg-3">
                        <li class="nav-item"><a class="nav-link active" href="#inicio">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#nosotros">¿Qué es?</a></li>
                        <li class="nav-item"><a class="nav-link" href="#gimnasios">Sedes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#niveles">Niveles</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                        <li class="nav-item ms-lg-2">
                            <a href="{{ route('login') }}" class="btn btn-primary px-4 rounded-pill fw-semibold shadow-sm">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>Iniciar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="inicio" class="hero-section text-center text-lg-start d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-7">
                        <span class="badge bg-primary bg-opacity-20 text-white border border-primary border-opacity-20 px-3 py-2 rounded-pill mb-3">
                            <i class="fa-solid fa-bolt me-1"></i> Plataforma Fitness de Nueva Generación
                        </span>
                        <h1 class="display-3 fw-extrabold mb-4 lh-base">
                            Conecta tu entrenamiento con <span class="text-primary">GymLink</span>
                        </h1>
                        <p class="lead text-light text-opacity-75 mb-4 pe-lg-5">
                            Encuentra gimnasios, administra tus rutinas, realiza seguimiento a tu progreso y alcanza tus objetivos fitness desde un solo ecosistema digital.
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                            <a href="#gimnasios" class="btn btn-primary btn-lg px-4 rounded-pill fw-semibold">
                                Explorar Gimnasios <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                            <a href="#nosotros" class="btn btn-outline-light btn-lg px-4 rounded-pill fw-semibold">
                                Saber Más
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Qué es GymLink -->
        <section id="nosotros" class="py-5 my-5">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6">
                        <div class="p-4 bg-primary bg-opacity-10 rounded-4 border border-primary border-opacity-10 text-center p-5">
                            <i class="fa-solid fa-network-wired text-primary display-1 mb-3"></i>
                            <h3 class="fw-bold text-dark">Ecosistema Integrado</h3>
                            <p class="text-muted mb-0">Tecnología de punta orientada al rendimiento deportivo y la gestión eficiente.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <h2 class="fw-bold display-6 text-dark mb-3">¿Qué es GymLink?</h2>
                        <p class="text-secondary lead fs-6 mb-4">
                            GymLink es una plataforma tecnológica que conecta usuarios, entrenadores y gimnasios en un mismo ecosistema digital. 
                        </p>
                        <p class="text-secondary">
                            Nuestro objetivo es facilitar el acceso al entrenamiento físico mediante herramientas modernas para la gestión de rutinas, gamificación, seguimiento de progreso y comunicación activa entre la comunidad fitness.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Sedes Disponibles -->
        <section id="gimnasios" class="py-5 bg-white">
            <div class="container">
                <div class="text-center max-w-2xl mx-auto mb-5">
                    <h2 class="fw-bold display-6 text-dark">Nuestras Sedes Disponibles</h2>
                    <p class="text-muted">Encuentra la sede más cercana y comienza a entrenar hoy mismo.</p>
                </div>

                <div class="row g-4">
                    <!-- Sede 1 -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary mb-3">
                                <i class="fa-solid fa-dumbbell"></i>
                            </div>
                            <h3 class="h5 fw-bold text-dark">Gym Power</h3>
                            <hr class="my-3 opacity-25">
                            <ul class="list-unstyled text-secondary d-flex flex-column gap-2 mb-0">
                                <li><i class="fa-solid fa-location-dot text-primary me-2"></i>Calle 123</li>
                                <li><i class="fa-solid fa-phone text-primary me-2"></i>+57 300 111 1111</li>
                                <li><i class="fa-solid fa-envelope text-primary me-2"></i>power@gym.com</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sede 2 -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary mb-3">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <h3 class="h5 fw-bold text-dark">Fitness Center</h3>
                            <hr class="my-3 opacity-25">
                            <ul class="list-unstyled text-secondary d-flex flex-column gap-2 mb-0">
                                <li><i class="fa-solid fa-location-dot text-primary me-2"></i>Carrera 10</li>
                                <li><i class="fa-solid fa-phone text-primary me-2"></i>+57 300 222 2222</li>
                                <li><i class="fa-solid fa-envelope text-primary me-2"></i>fitness@gym.com</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sede 3 -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary mb-3">
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                            <h3 class="h5 fw-bold text-dark">Elite Gym</h3>
                            <hr class="my-3 opacity-25">
                            <ul class="list-unstyled text-secondary d-flex flex-column gap-2 mb-0">
                                <li><i class="fa-solid fa-location-dot text-primary me-2"></i>Av 68</li>
                                <li><i class="fa-solid fa-phone text-primary me-2"></i>+57 300 333 3333</li>
                                <li><i class="fa-solid fa-envelope text-primary me-2"></i>elite@gym.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Niveles de Entrenamiento -->
        <section id="niveles" class="py-5">
            <div class="container my-4">
                <div class="text-center max-w-2xl mx-auto mb-5">
                    <h2 class="fw-bold display-6 text-dark">Niveles de Entrenamiento</h2>
                    <p class="text-muted">Planes adaptados a la etapa en la que te encuentras.</p>
                </div>

                <div class="row g-4">
                    <!-- Principiante -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4 border-start border-4 border-success">
                            <span class="badge bg-success bg-opacity-10 text-success badge-level mb-2 w-fit-content">Nivel 1</span>
                            <h3 class="h5 fw-bold text-dark">Principiante</h3>
                            <p class="text-secondary mt-2 mb-0">Diseñado para quienes inician su camino fitness. Enfoque en técnica y movilidad básica.</p>
                        </div>
                    </div>

                    <!-- Intermedio -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4 border-start border-4 border-warning">
                            <span class="badge bg-warning bg-opacity-10 text-warning badge-level mb-2 w-fit-content">Nivel 2</span>
                            <h3 class="h5 fw-bold text-dark">Intermedio</h3>
                            <p class="text-secondary mt-2 mb-0">Enfocado en mejorar la resistencia muscular, fuerza progresiva y acondicionamiento general.</p>
                        </div>
                    </div>

                    <!-- Avanzado -->
                    <div class="col-md-4">
                        <div class="custom-card card h-100 p-4 border-start border-4 border-danger">
                            <span class="badge bg-danger bg-opacity-10 text-danger badge-level mb-2 w-fit-content">Nivel 3</span>
                            <h3 class="h5 fw-bold text-dark">Avanzado</h3>
                            <p class="text-secondary mt-2 mb-0">Programas de alta exigencia diseñados para atletas y practicantes de alto rendimiento.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contacto" class="pt-5 pb-4 border-top border-secondary border-opacity-20">
        <div class="container">
            <div class="row gy-4 mb-4">
                <div class="col-lg-5">
                    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4 text-white mb-3" href="#">
                        <i class="fa-solid fa-dumbbell text-primary"></i>
                        <span>Gym<span class="text-primary">Link</span></span>
                    </a>
                    <p class="text-secondary pe-lg-4">Conectando la comunidad fitness con tecnología eficiente e innovadora.</p>
                </div>

                <div class="col-lg-7">
                    <h5 class="text-white fw-bold mb-3">Contacto General</h5>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <small class="d-block text-secondary">Correo</small>
                            <span class="text-white small">contacto@gymlink.com</span>
                        </div>
                        <div class="col-sm-4">
                            <small class="d-block text-secondary">Teléfono</small>
                            <span class="text-white small">+57 300 000 0000</span>
                        </div>
                        <div class="col-sm-4">
                            <small class="d-block text-secondary">Ubicación</small>
                            <span class="text-white small">Bogotá, Colombia</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-secondary opacity-25 my-4">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-secondary">
                <p class="mb-0">&copy; {{ date('Y') }} GymLink. Todos los derechos reservados.</p>
                <div class="d-flex gap-3 mt-2 mt-sm-0">
                    <a href="#" class="text-secondary text-decoration-none"><i class="fa-brands fa-instagram fs-5"></i></a>
                    <a href="#" class="text-secondary text-decoration-none"><i class="fa-brands fa-facebook fs-5"></i></a>
                    <a href="#" class="text-secondary text-decoration-none"><i class="fa-brands fa-x-twitter fs-5"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>