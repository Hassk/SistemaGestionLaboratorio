<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\SolicitudController;

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');

    // Rutas para todos los usuarios autenticados
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/inventario/create', [InventarioController::class, 'create'])->name('inventario.create');
    Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');
    Route::get('/inventario/{id}/edit', [InventarioController::class, 'edit'])->name('inventario.edit');
    Route::put('/inventario/{id}', [InventarioController::class, 'update'])->name('inventario.update');
    Route::delete('/inventario/{id}', [InventarioController::class, 'destroy'])->name('inventario.destroy');

    // Rutas para el manejo de prestamos
    Route::get('/prestamo', [PrestamoController::class, 'index'])->name('prestamo.index');
    Route::get('/prestamo/create', [PrestamoController::class, 'create'])->name('prestamo.create');
    Route::post('/prestamo', [PrestamoController::class, 'store'])->name('prestamo.store');
    Route::get('/prestamo/{id}/edit', [PrestamoController::class, 'edit'])->name('prestamo.edit');
    Route::put('/prestamo/{id}', [PrestamoController::class, 'update'])->name('prestamo.update');
    Route::delete('/prestamo/{id}', [PrestamoController::class, 'destroy'])->name('prestamo.destroy');

    // Rutas protegidas por el rol de administrador
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/usuarios', [AdminController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/{user}/edit', [AdminController::class, 'edit'])->name('usuarios.edit');
        Route::post('/usuarios/{user}', [AdminController::class, 'update'])->name('usuarios.update');

        Route::get('/users/{user}/assign-role', [UserController::class, 'showAssignRoleForm'])->name('users.showAssignRoleForm');
        Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    });

    // Rutas para el manejo de categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    // Rutas para el manejo de reportes
    Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte.index');
    Route::get('/reporte/create', [ReporteController::class, 'create'])->name('reporte.create');
    Route::post('/reporte', [ReporteController::class, 'store'])->name('reporte.store');
    Route::get('/reporte/{id}/edit', [ReporteController::class, 'edit'])->name('reporte.edit');
    Route::put('/reporte/{id}', [ReporteController::class, 'update'])->name('reporte.update');
    Route::delete('/reporte/{id}', [ReporteController::class, 'destroy'])->name('reporte.destroy');

    // Rutas para el manejo de mantenimientos
    Route::get('/mantenimientos', [MantenimientoController::class, 'index'])->name('mantenimientos.index');
    Route::get('/mantenimientos/create', [MantenimientoController::class, 'create'])->name('mantenimientos.create');
    Route::post('/mantenimientos', [MantenimientoController::class, 'store'])->name('mantenimientos.store');
    Route::get('/mantenimientos/{id}/edit', [MantenimientoController::class, 'edit'])->name('mantenimientos.edit');
    Route::put('/mantenimientos/{id}', [MantenimientoController::class, 'update'])->name('mantenimientos.update');
    Route::delete('/mantenimientos/{id}', [MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');

    // Rutas para el manejo de solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
    Route::get('/solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
    Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');
    Route::get('/solicitudes/{id}/edit', [SolicitudController::class, 'edit'])->name('solicitudes.edit');
    Route::put('/solicitudes/{id}', [SolicitudController::class, 'update'])->name('solicitudes.update');
    Route::delete('/solicitudes/{id}', [SolicitudController::class, 'destroy'])->name('solicitudes.destroy');
});

Route::get('/', function () {
    return view('login');
});
