<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - GymLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <!-- Sidebar de Navegación -->
    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 text-2xl font-bold text-blue-500 tracking-wider flex items-center justify-between">
                GymLink 
                <span class="text-xs bg-blue-600 text-white px-2 py-0.5 rounded uppercase font-semibold">Admin</span>
            </div>
            <nav class="mt-4 px-4 space-y-1">
                <a href="#" class="flex items-center px-4 py-2.5 bg-blue-600 text-white rounded-lg font-medium transition">Dashboard</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Gestión de Clientes</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Control de Coaches</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Membresías</a>
                <a href="#" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">Reportes</a>
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
            <h1 class="text-xl font-semibold text-white">Panel de Control General</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Bienvenido, Administrador</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white">AD</div>
            </div>
        </header>

        <!-- Contenido del Dashboard -->
        <main class="p-6 space-y-6">
            <!-- Tarjetas de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Total Clientes</p>
                    <h3 class="text-3xl font-bold text-white mt-2">1,248</h3>
                    <span class="text-green-400 text-xs mt-1 block">+12% este mes</span>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Coaches Activos</p>
                    <h3 class="text-3xl font-bold text-white mt-2">24</h3>
                    <span class="text-blue-400 text-xs mt-1 block">En servicio óptimo</span>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-5 rounded-xl shadow">
                    <p class="text-gray-400 text-sm font-medium">Ingresos Mensuales</p>
                    <h3 class="text-3xl font-bold text-white mt-2">$14,850</h3>
                    <span class="text-green-400 text-xs mt-1 block">+8% vs mes anterior</span>
                </div>
            </div>

            <!-- Tabla de Registros Recientes -->
            <div class="bg-gray-800 border border-gray-700 rounded-xl shadow p-6">
                <h3 class="text-lg font-bold text-white mb-4">Últimos Registros del Sistema</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-700 text-gray-400 text-sm">
                                <th class="py-3 px-4">Usuario</th>
                                <th class="py-3 px-4">Correo</th>
                                <th class="py-3 px-4">Rol</th>
                                <th class="py-3 px-4">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 text-sm">
                            <tr>
                                <td class="py-3 px-4 font-medium text-white">Fabián Álvarez</td>
                                <td class="py-3 px-4 text-gray-400">abianalvarezjdhdb@gmail.com</td>
                                <td class="py-3 px-4"><span class="bg-purple-900 text-purple-300 px-2.5 py-1 rounded-full text-xs font-semibold">Admin</span></td>
                                <td class="py-3 px-4 text-green-400 font-medium">Activo</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4 font-medium text-white">Carlos Coach</td>
                                <td class="py-3 px-4 text-gray-400">carlos.coach@gymlink.com</td>
                                <td class="py-3 px-4"><span class="bg-blue-900 text-blue-300 px-2.5 py-1 rounded-full text-xs font-semibold">Coach</span></td>
                                <td class="py-3 px-4 text-green-400 font-medium">Activo</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4 font-medium text-white">Daniel Zubieta</td>
                                <td class="py-3 px-4 text-gray-400">jajajadani47@gmail.com</td>
                                <td class="py-3 px-4"><span class="bg-gray-700 text-gray-300 px-2.5 py-1 rounded-full text-xs font-semibold">Cliente</span></td>
                                <td class="py-3 px-4 text-green-400 font-medium">Activo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>