<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Coach - GymLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <!-- Sidebar de Navegación -->
    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 text-2xl font-bold text-green-500 tracking-wider flex items-center justify-between">
                GymLink 
                <span class="text-xs bg-green-600 text-white px-2 py-0.5 rounded uppercase font-semibold">Coach</span>
            </div>
            <nav class="mt-4 px-4 space-y-1">
                <a href="#" class="flex items-center px-4 py-2.5 bg-green-600 text-white rounded-lg font-medium transition">Dashboard</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Mis Clientes</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Gestión de Rutinas</a>
                <a href="#chat-section" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Chat con Clientes</a>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-700">
            <a href="/login" class="flex items-center justify-center w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition font-medium">Cerrar Sesión</a>
        </div>
    </aside>

    <!-- Área Principal -->
    <div class="flex-1 flex flex-col h-full overflow-y-auto">
        
        <!-- Barra Superior -->
        <header class="bg-gray-800 border-b border-gray-700 p-4 px-6 flex justify-between items-center shadow-md">
            <h1 class="text-xl font-semibold text-white">Panel de Entrenador</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Bienvenido, Coach</span>
                <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center font-bold text-white">CO</div>
            </div>
        </header>

        <!-- Contenido del Dashboard -->
        <main class="p-6 space-y-6">
            <!-- Tarjetas de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Clientes Asignados</p>
                    <h3 class="text-3xl font-bold text-white mt-2">18</h3>
                    <span class="text-green-400 text-xs mt-1 block">4 rutinas por revisar</span>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Rutinas Creadas</p>
                    <h3 class="text-3xl font-bold text-white mt-2">42</h3>
                    <span class="text-green-400 text-xs mt-1 block">Actualizadas este mes</span>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Mensajes Nuevos</p>
                    <h3 class="text-3xl font-bold text-white mt-2">3</h3>
                    <span class="text-blue-400 text-xs mt-1 block">Pendientes de respuesta</span>
                </div>
            </div>

            <!-- Sección de Chat con Clientes -->
            <div id="chat-section" class="bg-gray-800 border border-gray-700 rounded-xl shadow overflow-hidden flex flex-col md:flex-row h-[500px]">
                
                <!-- Lista de Conversaciones / Clientes -->
                <div class="w-full md:w-1/3 border-r border-gray-700 flex flex-col bg-gray-850">
                    <div class="p-4 border-b border-gray-700 font-bold text-white">Chats Activos</div>
                    <div class="overflow-y-auto flex-1 divide-y divide-gray-700/50">
                        <div class="p-4 hover:bg-gray-700/50 cursor-pointer transition bg-gray-700/30 flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white">DZ</div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-white truncate">Daniel Zubieta</p>
                                <p class="text-xs text-gray-400 truncate">Profe, ¿cómo hago el peso muerto?</p>
                            </div>
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        </div>
                        <div class="p-4 hover:bg-gray-700/50 cursor-pointer transition flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-purple-600 flex items-center justify-center font-bold text-white">FA</div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-white truncate">Fabián Álvarez</p>
                                <p class="text-xs text-gray-400 truncate">Gracias por la rutina de hoy.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ventana de Chat Activa -->
                <div class="flex-1 flex flex-col bg-gray-900">
                    <!-- Cabecera del Chat -->
                    <div class="p-4 border-b border-gray-700 flex items-center space-x-3 bg-gray-800">
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white text-xs">DZ</div>
                        <div>
                            <p class="text-sm font-medium text-white">Daniel Zubieta</p>
                            <p class="text-xs text-green-400">En línea</p>
                        </div>
                    </div>

                    <!-- Mensajes -->
                    <div class="flex-1 p-4 overflow-y-auto space-y-4">
                        <div class="flex items-start space-x-2">
                            <div class="bg-gray-800 text-gray-200 p-3 rounded-lg max-w-xs text-sm">
                                Hola profe, tengo una duda con la rutina de pierna de esta semana.
                            </div>
                        </div>
                        <div class="flex items-start justify-end space-x-2">
                            <div class="bg-green-600 text-white p-3 rounded-lg max-w-xs text-sm">
                                ¡Hola Daniel! Dime, ¿en qué ejercicio tienes dudas?
                            </div>
                        </div>
                        <div class="flex items-start space-x-2">
                            <div class="bg-gray-800 text-gray-200 p-3 rounded-lg max-w-xs text-sm">
                                Profe, ¿cómo hago el peso muerto correctamente sin lastimarme la espalda?
                            </div>
                        </div>
                    </div>

                    <!-- Input de Mensaje -->
                    <div class="p-4 border-t border-gray-700 bg-gray-800 flex items-center space-x-2">
                        <input type="text" placeholder="Escribe un mensaje..." class="flex-1 bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-green-500 text-sm">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition text-sm font-medium">Enviar</button>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>