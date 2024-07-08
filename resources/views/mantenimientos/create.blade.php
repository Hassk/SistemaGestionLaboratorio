@extends('layouts.app')

@section('title', 'Crear Mantenimiento')

@section('content')
<div class="container">
    <h1>Crear Mantenimiento</h1>
    <form action="{{ route('mantenimientos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin (Estimada)</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/select2-init.js') }}"></script>
    <script src="{{ asset('js/success-alert.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
