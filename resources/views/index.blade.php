<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <h1>GymLink</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#gimnasios">Gimnasios Affiliados</a></li>
                <li><a href="#niveles">Niveles</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="inicio" class="hero">
            <h2>Conecta tu entrenamiento con GymLink</h2>
            <p>
                Encuentra gimnasios, administra tus rutinas,
                realiza seguimiento a tu progreso y alcanza tus
                objetivos fitness desde una sola plataforma.
            </p>
            <a href="#gimnasios" class="btn">Explorar Gimnasios</a>
        </section>
        <section id="gimnasios" class="servicios">
            <h2>Nuestras Sedes Disponibles</h2>
            <div class="contenedor-servicios">
                <article class="card">
                    <h3>Gym Power</h3>
                    <p>📍 Calle 123<br>📞 3001111111<br>📧 power@gym.com</p>
                </article>
                <article class="card">
                    <h3>Fitness Center</h3>
                    <p>📍 Carrera 10<br>📞 3002222222<br>📧 fitness@gym.com</p>
                </article>
                <article class="card">
                    <h3>Elite Gym</h3>
                    <p>📍 Av 68<br>📞 3003333333<br>📧 elite@gym.com</p>
                </article>
            </div>
        </section>
        <section id="niveles" class="nosotros">
            <h2>Niveles de Entrenamiento</h2>
            <div class="contenedor-servicios">
                <article class="card">
                    <h3>Principiante</h3>
                    <p>Nivel básico para quienes inician su camino fitness.</p>
                </article>
                <article class="card">
                    <h3>Intermedio</h3>
                    <p>Nivel medio enfocado en mejorar la resistencia y fuerza.</p>
                </article>
                <article class="card">
                    <h3>Avanzado</h3>
                    <p>Nivel alto diseñado para atletas de alto rendimiento.</p>
                </article>
            </div>
        </section>
        <section class="nosotros">
            <h2>¿Qué es GymLink?</h2>
            <p>
                GymLink es una plataforma tecnológica que conecta
                usuarios, entrenadores y gimnasios en un mismo
                ecosistema digital. Nuestro objetivo es facilitar
                el acceso al entrenamiento físico mediante herramientas
                modernas para la gestión de rutinas, gamificación,
                seguimiento de progreso y comunicación entre la
                comunidad fitness.
            </p>
        </section>
    </main>
    <footer id="contacto">
        <h2>Contacto General</h2>
        <p>📧 contacto@gymlink.com</p>
        <p>📞 +57 300 000 0000</p>
        <p>📍 Bogotá, Colombia</p>
        <br>
        <p>2026 GymLink. Todos los derechos reservados.</p>
    </footer>
</body>
</html>