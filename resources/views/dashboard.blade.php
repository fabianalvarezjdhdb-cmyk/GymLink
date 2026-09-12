<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymLink Dashboard</title>
    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">
    <!-- Estilos adicionales para integrar la sección de chat sin romper tu diseño -->
    <style>
        .chat-layout {
            display: flex;
            background: #1e293b;
            border-radius: 8px;
            overflow: hidden;
            height: 450px;
            border: 1px solid #334155;
            margin-top: 20px;
        }
        .chat-sidebar {
            width: 30%;
            border-right: 1px solid #334155;
            display: flex;
            flex-direction: column;
            background: #0f172a;
        }
        .chat-sidebar h3 {
            padding: 15px;
            margin: 0;
            border-bottom: 1px solid #334155;
            color: #fff;
            font-size: 1rem;
        }
        .coach-contact-item {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            border-bottom: 1px solid #1e293b;
            transition: background 0.2s;
        }
        .coach-contact-item:hover, .coach-contact-item.active {
            background: #1e293b;
        }
        .coach-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.85rem;
        }
        .coach-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #fff;
        }
        .coach-info span {
            font-size: 0.75rem;
            color: #94a3b8;
        }
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #1e293b;
        }
        .chat-header {
            padding: 12px 15px;
            background: #0f172a;
            border-bottom: 1px solid #334155;
            color: #fff;
            font-weight: bold;
        }
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .message {
            max-width: 70%;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        .message.received {
            background: #334155;
            color: #f8fafc;
            align-self: flex-start;
        }
        .message.sent {
            background: #2563eb;
            color: #fff;
            align-self: flex-end;
        }
        .chat-input-area {
            padding: 12px;
            background: #0f172a;
            border-top: 1px solid #334155;
            display: flex;
            gap: 10px;
        }
        .chat-input-area input {
            flex: 1;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #475569;
            background: #1e293b;
            color: #fff;
            outline: none;
        }
        .chat-input-area button {
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .chat-input-area button:hover {
            background: #1d4ed8;
        }
    </style>
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
            <li><a href="#chat">💬 Chat con Coach</a></li>
            <li><a href="mi perfil">🎛️ Mi perfil </a></li>
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

        <!-- Nueva Sección de Chat con el Coach para el Cliente -->
        <section id="chat">
            <h1>Chat con tu Coach</h1>
            
            <div class="chat-layout">
                <!-- Lista de Coaches / Conversaciones -->
                <div class="chat-sidebar">
                    <h3>Mis Entrenadores</h3>
                    <div class="coach-contact-item active">
                        <div class="coach-avatar">CR</div>
                        <div class="coach-info">
                            <p>Carlos Ruiz</p>
                            <span>Especialista en Fuerza</span>
                        </div>
                    </div>
                    <div class="coach-contact-item">
                        <div class="coach-avatar">AT</div>
                        <div class="coach-info">
                            <p>Ana Torres</p>
                            <span>Cardio y Resistencia</span>
                        </div>
                    </div>
                </div>

                <!-- Ventana del Chat -->
                <div class="chat-main">
                    <div class="chat-header">
                        Conversación con Carlos Ruiz
                    </div>
                    <div class="chat-messages">
                        <div class="message received">
                            ¡Hola! Bienvenido a tu plan de entrenamiento. ¿Tienes alguna duda sobre tu rutina de hoy?
                        </div>
                        <div class="message sent">
                            Hola profe, sí, quería saber cuántas repeticiones debo hacer en el press de banca.
                        </div>
                        <div class="message received">
                            Te recomiendo hacer 4 series de 10 a 12 repeticiones con un peso moderado. ¡Tú puedes!
                        </div>
                    </div>
                    <div class="chat-input-area">
                        <input type="text" placeholder="Escribe un mensaje a tu coach...">
                        <button type="button">Enviar</button>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>

</html>