<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta principal
Route::get('/', function () {
    return view('index');
});

// Rutas de Autenticación (Login)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Rutas de Registro
Route::get('/registro', [AuthController::class, 'showRegister']);
Route::post('/registro', [AuthController::class, 'register']);

// Panel de Administración (Dashboard)
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});