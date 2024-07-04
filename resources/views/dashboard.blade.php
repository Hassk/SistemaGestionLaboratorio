@extends('layouts.app')

@section('title', 'Dashboard - Gestión de Inventario')

@section('header', 'Dashboard - Inventario')

@section('content')
<div class="container" style="margin-right: 120px;"> <!-- Añadir margen derecho -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header"><i class="fas fa-box"></i> Productos</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalProductos }}</h5>
                    <p class="card-text">Total de productos en inventario.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><i class="fas fa-tags"></i> Categorías</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCategorias }}</h5>
                    <p class="card-text">Total de categorías disponibles.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"><i class="fas fa-handshake"></i> Préstamos</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalPrestamos }}</h5>
                    <p class="card-text">Total de préstamos activos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"><i class="fas fa-chart-line"></i> Reportes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalReportes }}</h5>
                    <p class="card-text">Total de préstamos activos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"><i class="fas fa-envelope-open-text"></i> Solicitudes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalSolicitudes }}</h5>
                    <p class="card-text">Total de solicitudes activas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header"><i class="fas fa-tools"></i> Mantenimiento</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalMantenimiento }}</h5>
                    <p class="card-text">Total de mantenimientos activos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header"><i class="fas fa-users-cog"></i> Usuarios</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsuarios }}</h5>
                    <p class="card-text">Total de usuarios creados.</p>
                </div>
            </div>
        </div>
        <!-- Agrega más cartas según sea necesario -->
    </div>
</div>
@endsection
