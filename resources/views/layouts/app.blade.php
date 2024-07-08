<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Inventario')</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('unplogo.ico') }}"> <!-- Actualiza esta línea -->
     <!-- Añadir Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Añadir FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            <li><a href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('inventario.index') }}"><i class="fas fa-boxes"></i> Productos</a></li>
            <li><a href="{{ route('categorias.index') }}"><i class="fas fa-tags"></i> Categorías</a></li>
            <li><a href="{{ route('prestamo.index') }}"><i class="fas fa-hand-holding-usd"></i> Préstamos</a></li>
            <li><a href="{{ route('reporte.index') }}"><i class="fas fa-chart-line"></i> Reportes</a></li>
            <li><a href="{{ route('solicitudes.index') }}"><i class="fas fa-envelope-open-text"></i> Solicitudes</a></li>
            <li><a href="{{ route('mantenimientos.index') }}"><i class="fas fa-tools"></i> Mantenimiento</a></li>
            <li><a href="{{ route('usuario.index') }}"><i class="fas fa-users-cog"></i> Usuarios</a></li>
            <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
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
    <!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
 @yield('scripts')
</body>
</html>