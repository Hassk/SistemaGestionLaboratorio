@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" maxlength="40" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" maxlength="40" required>
            @error('apellido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="8" maxlength="12" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="12" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Usuario</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
