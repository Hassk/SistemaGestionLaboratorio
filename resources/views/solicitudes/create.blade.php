@extends('layouts.app')

@section('title', 'Crear Solicitud')

@section('content')
<div class="container">
    <h1>Crear Solicitud</h1>
    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="usuario_id" value="{{ $usuario_id }}">
        
        <div class="form-group">
            <label for="tipo_solicitud">Tipo de Solicitud</label>
            <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de Solicitud</label>
            <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
