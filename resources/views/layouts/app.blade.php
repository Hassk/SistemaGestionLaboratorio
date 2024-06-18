<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Inventario')</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
    <!-- Añadir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="side-image">
    <img src="{{ asset('images/unp.png') }}" alt="Universidad Nacional de Piura">
</div>
<div class="sidebar"> 
    <div class="profile-info">
        <img src="{{ asset('images/user-icon.png') }}" alt="Foto">
        <p>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}<br>{{ Auth::user()->email }}</p>
    </div> 
    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('inventario.index') }}">Productos</a></li>
            <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
            <li><a href="{{ route('prestamo.index') }}">Préstamos</a></li>
            <li><a href="{{ route('reporte.index') }}">Reportes</a></li>
            <li><a href="{{ route('solicitudes.index') }}">Solicitudes</a></li>
            <li><a href="{{ route('mantenimientos.index') }}">Mantenimiento</a></li>
            @role('admin')
                <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
            @endrole
            <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
    </nav>
</div>
<main class="content-area">
    <header>
        <h1>@yield('header', 'GESTIÓN DE INVENTARIO')</h1>
    </header>
    <div class="content">
        @yield('content')
    </div>
</main>
<!-- Añadir Bootstrap JS y sus dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
