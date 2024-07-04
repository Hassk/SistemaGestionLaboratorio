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
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
