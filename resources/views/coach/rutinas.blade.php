<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Rutinas - GymLink Coach</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-card {
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .neon-glow {
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.15);
        }
    </style>
</head>
<body class="bg-[#0b0f19] text-gray-100 flex h-screen overflow-hidden">

    <!-- Sidebar de Coach -->
    <aside class="w-64 bg-[#07090e] border-r border-gray-800 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 text-2xl font-bold text-blue-500 tracking-wider flex items-center justify-between">
                GymLink 
                <span class="text-xs bg-cyan-600 text-white px-2 py-0.5 rounded uppercase font-semibold">COACH</span>
            </div>
            <nav class="mt-4 px-4 space-y-1">
                <a href="{{ url('/coach/dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->is('coach/dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Dashboard
                </a>
                <a href="{{ url('/coach/clientes') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->is('coach/clientes*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Mis Clientes
                </a>
                <a href="{{ url('/coach/rutinas') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->is('coach/rutinas*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Gestión de Rutinas
                </a>
                <a href="{{ url('/coach/dashboard') }}#chat-section" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                    Chat con Clientes
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-800">
            <a href="{{ route('logout') }}" class="flex items-center justify-center w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition font-medium shadow-lg shadow-red-600/20">Cerrar Sesión</a>
        </div>
    </aside>

    <!-- Área Principal -->
    <div class="flex-1 flex flex-col h-full overflow-y-auto">
        <header class="bg-[#0b0f19]/80 backdrop-blur border-b border-gray-800 p-4 px-6 flex justify-between items-center sticky top-0 z-10 shadow-md">
            <h1 class="text-xl font-semibold text-white">🏋️‍♂️ Módulo de Gestión de Rutinas</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Coach Carlos</span>
                <div class="w-10 h-10 rounded-full bg-cyan-600 flex items-center justify-center font-bold text-white shadow-lg shadow-cyan-500/30">CC</div>
            </div>
        </header>

        <main class="p-8 space-y-8 max-w-7xl mx-auto w-full">
            
            <!-- Banner superior interactivo -->
            <div class="glass-card neon-glow rounded-2xl p-6 border border-cyan-500/20 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-cyan-400 mb-1">Diseña y Asigna Planes de Entrenamiento</h2>
                    <p class="text-gray-400 text-sm">Crea rutinas personalizadas estructuradas por días de la semana y visualiza el rendimiento de tus atletas en tiempo real.</p>
                </div>
                <button class="bg-cyan-600 hover:bg-cyan-500 text-gray-950 font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-cyan-600/30 text-sm whitespace-nowrap">
                    + Nueva Rutina Global
                </button>
            </div>

            <!-- Grid principal: Formulario a la izq / Rutinas activas a la der -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Columna Izquierda: Asignar nueva rutina -->
                <div class="glass-card rounded-2xl p-6 space-y-4 border border-gray-800">
                    <h3 class="text-lg font-bold text-white border-b border-gray-800 pb-3">Asignar Ejercicio a Cliente</h3>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-wider">Seleccionar Cliente</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                                <option>Daniel Zubieta</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-wider">Día de la Semana</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                                <option>Lunes - Pecho y Tríceps</option>
                                <option>Martes - Espalda y Bíceps</option>
                                <option>Miércoles - Pierna Completa</option>
                                <option>Jueves - Hombro y Abdomen</option>
                                <option>Viernes - Full Body / Cardio</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-wider">Ejercicio</label>
                            <input type="text" placeholder="Ej: Press de Banca Plano" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-wider">Series</label>
                                <input type="number" placeholder="4" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-wider">Repeticiones</label>
                                <input type="number" placeholder="12" class="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                            </div>
                        </div>
                    </div>

                    <button class="w-full bg-blue-600 hover:bg-blue-500 text-white font-medium py-2.5 rounded-xl transition shadow-lg shadow-blue-600/20 text-sm mt-4">
                        Añadir a la Rutina
                    </button>
                </div>

                <!-- Columna Derecha: Tarjetas de Rutinas Activas por Día -->
                <div class="lg:col-span-2 space-y-6">
                    <h3 class="text-lg font-bold text-white">Rutina Activa de Daniel Zubieta</h3>
                    
                    <!-- Tarjeta Día Lunes -->
                    <div class="glass-card rounded-2xl p-6 border border-gray-800 space-y-4">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <span class="bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Lunes</span>
                            <span class="text-sm font-semibold text-gray-300">Enfoque: Pecho y Tríceps</span>
                        </div>

                        <div class="space-y-3">
                            <div class="bg-gray-900/60 p-4 rounded-xl border border-gray-800 flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold text-white text-sm">1. Press de Banca Plano con Barra</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">4 Series × 10 a 12 Repeticiones (Descanso: 90s)</p>
                                </div>
                                <div class="space-x-2">
                                    <button class="text-xs text-blue-400 hover:underline">Editar</button>
                                    <button class="text-xs text-red-400 hover:underline">Quitar</button>
                                </div>
                            </div>
                            <div class="bg-gray-900/60 p-4 rounded-xl border border-gray-800 flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold text-white text-sm">2. Aperturas con Mancuernas en Banco Inclinado</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">3 Series × 15 Repeticiones (Descanso: 60s)</p>
                                </div>
                                <div class="space-x-2">
                                    <button class="text-xs text-blue-400 hover:underline">Editar</button>
                                    <button class="text-xs text-red-400 hover:underline">Quitar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta Día Martes -->
                    <div class="glass-card rounded-2xl p-6 border border-gray-800 space-y-4">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Martes</span>
                            <span class="text-sm font-semibold text-gray-300">Enfoque: Espalda y Bíceps</span>
                        </div>

                        <div class="space-y-3">
                            <div class="bg-gray-900/60 p-4 rounded-xl border border-gray-800 flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold text-white text-sm">1. Dominadas en Barra Fixa</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">4 Series × Al fallo</p>
                                </div>
                                <div class="space-x-2">
                                    <button class="text-xs text-blue-400 hover:underline">Editar</button>
                                    <button class="text-xs text-red-400 hover:underline">Quitar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    </div>
</body>
</html>