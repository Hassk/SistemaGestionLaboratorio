@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('usuario.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $user->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('refresh') === 'true') {
            window.location.href = window.location.pathname; // Recargar la página sin los parámetros de búsqueda
        }
    });
</script>


@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
