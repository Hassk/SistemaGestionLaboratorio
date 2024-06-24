@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')

<div class="container">
    <h1>Editar Solicitud</h1>
    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $solicitud->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_solicitud">Tipo de Solicitud</label>
            <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control" value="{{ $solicitud->tipo_solicitud }}" required>
        </div>
        @role('admin')
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ $solicitud->estado }}" required>
        </div>
        @endrole
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $solicitud->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

@endsection
