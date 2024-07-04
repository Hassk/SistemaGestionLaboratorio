<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Api\productoController;
use App\http\Controllers\Api\usuariosController;
use App\http\Controllers\Api\categoriasController;
use App\Http\Controllers\Api\MantenimientoController;


Route::get('/Productos', [productoController::class, 'index']);

Route::get('/Productos/{id}', [productoController::class, 'show']);

Route::post('/Productos', [productoController::class, 'store']);

Route::put('/Productos/{id}', [productoController::class, 'update']);

Route::delete('/Productos/{id}', [productoController::class, 'destroy']);


Route::get('/Usuarios', [usuariosController::class, 'index']);

Route::get('/Usuarios/{id}', [usuariosController::class, 'show']);

Route::post('/Usuarios', [usuariosController::class, 'store']);

Route::put('/Usuarios/{id}', [usuariosController::class, 'update']);

Route::delete('/Usuarios/{id}', [usuariosController::class, 'destroy']);



Route::get('/Categorias', [categoriasController::class, 'index']);

Route::get('/Categorias/{id}', [categoriasController::class, 'show']);

Route::post('/Categorias', [categoriasController::class, 'store']);

Route::put('/Categorias/{id}', [categoriasController::class, 'update']);

Route::delete('/Categorias/{id}', [categoriasController::class, 'destroy']);

// Listar todos los mantenimientos
Route::get('/mantenimientos', [MantenimientoController::class, 'index']);

// Obtener un mantenimiento específico
Route::get('/mantenimientos/{id}', [MantenimientoController::class, 'show']);

// Crear un nuevo mantenimiento
Route::post('/mantenimientos', [MantenimientoController::class, 'store']);

// Actualizar un mantenimiento
Route::put('/mantenimientos/{id}', [MantenimientoController::class, 'update']);

// Finalizar un mantenimiento
Route::post('/mantenimientos/{id}/finalize', [MantenimientoController::class, 'finalize']);

// Eliminar un mantenimiento
Route::delete('/mantenimientos/{id}', [MantenimientoController::class, 'destroy']);