<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administrador') - GymLink</title>
    <!-- Tailwind CSS CDN para estilos rápidos y modernos -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0b0f19;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }
        .glass-card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <!-- Menú Lateral -->
    <aside class="w-64 bg-[#07090e] border-r border-gray-800 flex flex-col justify-between p-6">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-2 mb-10">
                <span class="text-2xl font-bold text-blue-500 tracking-wide">GymLink</span>
                <span class="bg-blue-600 text-white text-xs px-2 py-0.5 rounded font-semibold">ADMIN</span>
            </div>

            <!-- Enlaces de Navegación -->
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.clientes') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.clientes') ? 'bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    👥 Gestión de Clientes
                </a>
                <a href="{{ route('admin.coaches') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.coaches') ? 'bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    🏋️‍♂️ Control de Coaches
                </a>
                <a href="{{ route('admin.membresias') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.membresias') ? 'bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    💳 Membresías
                </a>
                <a href="{{ route('admin.reportes') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.reportes') ? 'bg-blue-600 text-white font-medium shadow-lg shadow-blue-600/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    📈 Reportes
                </a>
            </nav>
        </div>

        <!-- Botón Cerrar Sesión -->
        <div>
            <a href="{{ route('logout') }}" class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 px-4 rounded-xl font-medium transition shadow-lg shadow-red-600/20">
                🚪 Cerrar Sesión
            </a>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        <!-- Header superior -->
        <header class="h-20 border-b border-gray-800 px-8 flex items-center justify-between bg-[#0b0f19]/80 backdrop-blur sticky top-0 z-10">
            <h1 class="text-xl font-semibold text-gray-200">@yield('header-title', 'Panel de Administración')</h1>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-400">Bienvenido, Administrador</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white shadow">
                    AD
                </div>
            </div>
        </header>

        <!-- Cuerpo Dinámico de cada vista -->
        <div class="p-8 flex-1">
            @yield('content')
        </div>
    </main>

</body>
</html>