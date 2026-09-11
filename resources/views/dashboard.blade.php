<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink Dashboard</title>
    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">
</head>

<body>

    <div class="sidebar">

        <h2>🏋️ GymLink</h2>

        <ul>
            <li><a href="#inicio">🏠 Inicio</a></li>
            <li><a href="#usuarios">👥 Usuarios</a></li>
            <li><a href="#coaches">💪 Coaches</a></li>
            <li><a href="#rutinas">📋 Rutinas</a></li>
            <li><a href="#gamificacion">🏆 Logros</a></li>
            <li><a href="mi perfil">🎛️Mi perfil </a></li>
            <li><a href="ajustes">⚙️ Ajustes</a></li>
            <li><a href="{{ url('/index') }}">🚪 Salir</a></li>
        </ul>

    </div>

    <div class="contenido">

        <section id="inicio">

            <h1>Dashboard GymLink</h1>

            <div class="cards">

                <div class="card">
                    <h3>Total Usuarios</h3>
                    <p>10</p>
                </div>

                <div class="card">
                    <h3>Coaches Activos</h3>
                    <p>5</p>
                </div>

                <div class="card">
                    <h3>Rutinas Creadas</h3>
                    <p>10</p>
                </div>

                <div class="card">
                    <h3>Sedes Activas</h3>
                    <p>3</p>
                </div>

            </div>

        </section>

        <section id="usuarios">

            <h1>Usuarios Registrados</h1>

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Nacimiento</th>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Perez</td>
                    <td>juan1@gmail.com</td>
                    <td>3000000001</td>
                    <td>2000-01-01</td>
                </tr>
                <tr>
                    <td>Maria</td>
                    <td>Lopez</td>
                    <td>maria2@gmail.com</td>
                    <td>3000000002</td>
                    <td>1999-02-02</td>
                </tr>
                <tr>
                    <td>Pedro</td>
                    <td>Sanchez</td>
                    <td>pedro3@gmail.com</td>
                    <td>3000000003</td>
                    <td>2001-03-03</td>
                </tr>
                <tr>
                    <td>Laura</td>
                    <td>Diaz</td>
                    <td>laura4@gmail.com</td>
                    <td>3000000004</td>
                    <td>1998-04-04</td>
                </tr>
                <tr>
                    <td>Andres</td>
                    <td>Gomez</td>
                    <td>andres5@gmail.com</td>
                    <td>3000000005</td>
                    <td>2002-05-05</td>
                </tr>
            </table>

        </section>

        <section id="coaches">

            <h1>Nuestros Coaches</h1>

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Experiencia</th>
                    <th>Contacto</th>
                </tr>
                <tr>
                    <td>Carlos</td>
                    <td>Ruiz</td>
                    <td>Fuerza</td>
                    <td>5 años</td>
                    <td>carlos@gym.com</td>
                </tr>
                <tr>
                    <td>Ana</td>
                    <td>Torres</td>
                    <td>Cardio</td>
                    <td>3 años</td>
                    <td>ana@gym.com</td>
                </tr>
                <tr>
                    <td>Luis</td>
                    <td>Gomez</td>
                    <td>Crossfit</td>
                    <td>7 años</td>
                    <td>luis@gym.com</td>
                </tr>
                <tr>
                    <td>Marta</td>
                    <td>Lopez</td>
                    <td>Yoga</td>
                    <td>4 años</td>
                    <td>marta@gym.com</td>
                </tr>
                <tr>
                    <td>Pedro</td>
                    <td>Diaz</td>
                    <td>HIIT</td>
                    <td>6 años</td>
                    <td>pedro@gym.com</td>
                </tr>
            </table>

        </section>

        <section id="rutinas">

            <h1>Planes de Rutinas</h1>

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Duración (min)</th>
                    <th>Calorías (kcal)</th>
                </tr>
                <tr>
                    <td>Rutina 1</td>
                    <td>Basica</td>
                    <td>60</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>Rutina 2</td>
                    <td>Cardio</td>
                    <td>45</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>Rutina 3</td>
                    <td>Avanzada</td>
                    <td>90</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>Rutina 4</td>
                    <td>Ligera</td>
                    <td>50</td>
                    <td>180</td>
                </tr>
                <tr>
                    <td>Rutina 5</td>
                    <td>Resistencia</td>
                    <td>70</td>
                    <td>350</td>
                </tr>
            </table>

        </section>

        <section id="gamificacion">

            <h1>Sistema de Logros y Recompensas</h1>

            <table>
                <tr>
                    <th>Logro</th>
                    <th>Descripción</th>
                    <th>Puntos Otorgados</th>
                </tr>
                <tr>
                    <td>Primer paso</td>
                    <td>Primera sesión</td>
                    <td>50 pts</td>
                </tr>
                <tr>
                    <td>Constante</td>
                    <td>3 días seguidos</td>
                    <td>80 pts</td>
                </tr>
                <tr>
                    <td>Disciplinado</td>
                    <td>7 días seguidos</td>
                    <td>150 pts</td>
                </tr>
                <tr>
                    <td>Calorías altas</td>
                    <td>500 calorías</td>
                    <td>120 pts</td>
                </tr>
                <tr>
                    <td>Fuerza total</td>
                    <td>Rutina avanzada</td>
                    <td>200 pts</td>
                </tr>
            </table>

        </section>

    </div>

</body>

</html>