<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Clientes - GymLink Coach</title>
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
                <span class="text-xs bg-blue-600 text-white px-2 py-0.5 rounded uppercase font-semibold">COACH</span>
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
            <h1 class="text-xl font-semibold text-white">👥 Mis Clientes Asignados</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Coach Carlos</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white shadow-lg shadow-blue-600/30">CC</div>
            </div>
        </header>

        <main class="p-8 space-y-8 max-w-7xl mx-auto w-full">
            
            <!-- Banner superior -->
            <div class="glass-card neon-glow rounded-2xl p-6 border border-blue-500/20 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-blue-400 mb-1">Control de Atletas y Progreso</h2>
                    <p class="text-gray-400 text-sm">Supervisa el estado físico, los objetivos y las metas alcanzadas por cada uno de tus clientes asignados.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-blue-600/30 text-sm whitespace-nowrap">
                    + Asignar Nuevo Cliente
                </button>
            </div>

            <!-- Tabla de Clientes con diseño Glassmorphism idéntico -->
            <div class="glass-card rounded-2xl overflow-hidden shadow-xl border border-gray-800">
                <div class="p-6 border-b border-gray-800">
                    <h3 class="text-lg font-bold text-white">Listado General de Clientes</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-800 text-gray-400 text-sm">
                                <th class="py-4 px-6">Cliente</th>
                                <th class="py-4 px-6">Objetivo Principal</th>
                                <th class="py-4 px-6">Progreso</th>
                                <th class="py-4 px-6 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800/60 text-sm">
                            <tr class="hover:bg-gray-800/30 transition">
                                <td class="py-4 px-6 font-medium text-white">Daniel Zubieta</td>
                                <td class="py-4 px-6 text-gray-400">Hipertrofia y Volumen</td>
                                <td class="py-4 px-6">
                                    <div class="w-full bg-gray-900 rounded-full h-2.5 max-w-[150px] border border-gray-800">
                                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right space-x-3">
                                    <a href="{{ url('/coach/rutinas') }}" class="text-blue-400 hover:underline font-medium">Ver Rutina</a>
                                    <a href="{{ url('/coach/dashboard') }}#chat-section" class="text-cyan-400 hover:underline font-medium">Enviar Mensaje</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>