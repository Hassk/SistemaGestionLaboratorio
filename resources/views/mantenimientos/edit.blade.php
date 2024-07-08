@extends('layouts.app')

@section('title', 'Editar Mantenimiento')

@section('content')
<div class="container">
    <h1>Editar Mantenimiento</h1>
    <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" {{ $producto->id == $mantenimiento->producto_id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $mantenimiento->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $mantenimiento->descripcion }}" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $mantenimiento->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $mantenimiento->fecha_inicio }}">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin (Estimada)</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $mantenimiento->fecha_fin }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <form action="{{ route('mantenimientos.finalize', $mantenimiento->id) }}" method="POST" class="mt-2">
        @csrf
        <button type="submit" class="btn btn-success">Finalizar Mantenimiento</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#producto_id').select2({
                placeholder: 'Selecciona un producto',
                allowClear: true
            });
        });
    </script>
    <script src="{{ asset('js/success-alert.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
