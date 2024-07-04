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
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection