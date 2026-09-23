<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta principal y alias /index
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

// Ruta para cerrar sesión (Logout)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas de Autenticación (Login)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Rutas de Registro
Route::get('/registro', [AuthController::class, 'showRegister']);
Route::post('/registro', [AuthController::class, 'register']);

// ==========================================
// MÓDULO DE CLIENTE / USUARIO NORMAL
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutina Diaria del Usuario
Route::get('/rutinas', function () {
    return view('RutinasU'); // Nombre del archivo RutinasU.blade.php
})->name('cliente.rutinas');

// Chat del Usuario con su Coach
Route::get('/chat', function () {
    return view('chatC'); // Nombre del archivo ChatU.blade.php
})->name('cliente.chat');

// Mi Progreso
Route::get('/progreso', function () {
    return view('progreso');
})->name('cliente.progreso');

// Logros
Route::get('/logros', function () {
    return view('logrosU');
})->name('cliente.logros');

// Gimnasios
Route::get('/gimnasios', function () {
    return view('gimnasiosU');
})->name('cliente.gimnasios');

// Comunidad
Route::get('/comunidad', function () {
    return view('comunidad');
})->name('cliente.comunidad');

// Perfil
Route::get('/perfil', function () {
    return view('perfil');
})->name('cliente.perfil');

// Configuración
Route::get('/configuracion', function () {
    return view('configuracionU');
})->name('cliente.configuracion');

// ==========================================
// MÓDULO DE ADMINISTRADOR
// ==========================================
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/clientes', function () {
        return view('admin.clientes');
    })->name('admin.clientes');

    Route::get('/coaches', function () {
        return view('admin.coaches');
    })->name('admin.coaches');

    Route::get('/membresias', function () {
        return view('admin.membresias');
    })->name('admin.membresias');

    Route::get('/reportes', function () {
        return view('admin.reportes');
    })->name('admin.reportes');
});

// ==========================================
// MÓDULO DE COACH / ENTRENADOR
// ==========================================
Route::prefix('coach')->group(function () {
    Route::get('/dashboard', function () {
        return view('coach.dashboard');
    })->name('coach.dashboard');

    Route::get('/clientes', function () {
        return view('coach.clientes');
    })->name('coach.clientes');

    // Gestión de Rutinas del Coach (Grutinas.blade.php)
    Route::get('/rutinas', function () {
        return view('coach.Grutinas'); 
    })->name('coach.rutinas');

    // Chat del Coach con Clientes (chatC.blade.php)
    Route::get('/chat', function () {
        return view('coach.chatC'); 
    })->name('coach.chat');
});