<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membresías - GymLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 text-2xl font-bold text-blue-500 tracking-wider flex items-center justify-between">
                GymLink 
                <span class="text-xs bg-blue-600 text-white px-2 py-0.5 rounded uppercase font-semibold">Admin</span>
            </div>
            <nav class="mt-4 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Dashboard</a>
                <a href="{{ route('admin.clientes') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.clientes') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Gestión de Clientes</a>
                <a href="{{ route('admin.coaches') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.coaches') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Control de Coaches</a>
                <a href="{{ route('admin.membresias') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.membresias') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Membresías</a>
                <a href="{{ route('admin.reportes') }}" class="flex items-center px-4 py-2.5 rounded-lg font-medium transition {{ request()->routeIs('admin.reportes') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Reportes</a>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-700">
            <a href="{{ route('logout') }}" class="flex items-center justify-center w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition font-medium">Cerrar Sesión</a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-full overflow-y-auto">
        <header class="bg-gray-800 border-b border-gray-700 p-4 px-6 flex justify-between items-center shadow-md">
            <h1 class="text-xl font-semibold text-white">Gestión de Membresías</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Bienvenido, Administrador</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white">AD</div>
            </div>
        </header>

        <main class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Plan Mensual -->
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 flex flex-col justify-between shadow">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-2">Plan Mensual</h3>
                        <p class="text-gray-400 text-sm mb-4">Acceso completo a todas las áreas durante 30 días.</p>
                        <div class="text-3xl font-bold text-blue-400 mb-6">$50 <span class="text-sm text-gray-400 font-normal">/ mes</span></div>
                    </div>
                    <button class="w-full bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-lg font-medium transition">Editar Plan</button>
                </div>

                <!-- Plan Trimestral -->
                <div class="bg-gray-800 border border-blue-500 rounded-xl p-6 flex flex-col justify-between shadow-lg shadow-blue-500/10">
                    <div>
                        <span class="bg-blue-600 text-white text-xs px-2 py-0.5 rounded font-semibold uppercase">Popular</span>
                        <h3 class="text-lg font-bold text-white mt-2 mb-2">Plan Trimestral</h3>
                        <p class="text-gray-400 text-sm mb-4">Ahorro del 15% en tu suscripción por 3 meses.</p>
                        <div class="text-3xl font-bold text-blue-400 mb-6">$130 <span class="text-sm text-gray-400 font-normal">/ 3 meses</span></div>
                    </div>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition">Editar Plan</button>
                </div>

                <!-- Plan Anual -->
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 flex flex-col justify-between shadow">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-2">Plan Anual</h3>
                        <p class="text-gray-400 text-sm mb-4">Acceso VIP ilimitado con asesoría personalizada.</p>
                        <div class="text-3xl font-bold text-blue-400 mb-6">$450 <span class="text-sm text-gray-400 font-normal">/ año</span></div>
                    </div>
                    <button class="w-full bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-lg font-medium transition">Editar Plan</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>