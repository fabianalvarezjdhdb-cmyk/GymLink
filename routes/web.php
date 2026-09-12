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

// Dashboards según el rol
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/coach/dashboard', function () {
    return view('coach.dashboard');
});