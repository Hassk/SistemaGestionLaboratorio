<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:1637893474. -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
<div class="side-image">
<img src="{{ asset('images/unp.png') }}" alt="Universidad Nacional de Piura"> <!-- imagen de la unp -->

</div>
     <main class="container align-center p-5">
        <form method="POST" action="{{ route('inicia-sesion') }}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
                <label class="form-check-label" for="rememberCheck">Mantener sesión iniciada</label>
            </div>
            <p>¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a></p>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </main>
</body>
</html>
