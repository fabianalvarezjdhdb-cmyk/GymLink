<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes - GymLink</title>
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
            <h1 class="text-xl font-semibold text-white">Reportes y Estadísticas</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Bienvenido, Administrador</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white">AD</div>
            </div>
        </header>

        <main class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-xl shadow">
                    <h3 class="text-md font-bold text-white mb-4">Ingresos Financieros Recientes</h3>
                    <div class="h-64 flex items-center justify-center border border-dashed border-gray-700 rounded-lg text-gray-500">
                        [ Gráfica de Ingresos Mensuales ]
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-xl shadow">
                    <h3 class="text-md font-bold text-white mb-4">Asistencia Diaria al Gimnasio</h3>
                    <div class="h-64 flex items-center justify-center border border-dashed border-gray-700 rounded-lg text-gray-500">
                        [ Gráfica de Asistencia de Clientes ]
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>