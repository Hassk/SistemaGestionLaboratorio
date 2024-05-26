<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Api\productoController;
use App\http\Controllers\Api\usuariosController;
use App\http\Controllers\Api\categoriasController;

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