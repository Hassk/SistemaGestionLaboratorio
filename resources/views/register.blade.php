<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
   
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="side-image">
        <img src="{{ asset('images/unp.png') }}" alt="Universidad Nacional de Piura";>  <!-- imagen de la unp -->
</div>
    <main class="container align-center p-5">
        <form method="POST" action="{{route('validar-registro')}}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3">
                <label for="nombreInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreInput" name="nombre" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="apellidoInput" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidoInput" name="apellido" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>
