<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Coaches - GymLink</title>
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
            <h1 class="text-xl font-semibold text-white">Control de Coaches</h1>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-400">Bienvenido, Administrador</span>
                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white">AD</div>
            </div>
        </header>

        <main class="p-6 space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">Entrenadores Activos</h3>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow">+ Registrar Coach</button>
            </div>

            <div class="bg-gray-800 border border-gray-700 rounded-xl shadow p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-700 text-gray-400 text-sm">
                                <th class="py-3 px-4">Coach</th>
                                <th class="py-3 px-4">Correo</th>
                                <th class="py-3 px-4">Especialidad</th>
                                <th class="py-3 px-4">Estado</th>
                                <th class="py-3 px-4 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 text-sm">
                            <tr>
                                <td class="py-3 px-4 font-medium text-white">Carlos Coach</td>
                                <td class="py-3 px-4 text-gray-400">carlos.coach@gymlink.com</td>
                                <td class="py-3 px-4"><span class="bg-blue-900 text-blue-300 px-2.5 py-1 rounded-full text-xs font-semibold">Musculación</span></td>
                                <td class="py-3 px-4 text-green-400 font-medium">Activo</td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <button class="text-blue-400 hover:underline">Editar</button>
                                    <button class="text-red-400 hover:underline">Desactivar</button>
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