@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')
<div class="container">
    <h1>Editar Solicitud</h1>
    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre_estudiante">Nombre del Estudiante</label>
            <input type="text" name="nombre_estudiante" id="nombre_estudiante" class="form-control" value="{{ $solicitud->nombre_estudiante }}" required>
        </div>
        
        <div class="form-group">
            <label for="codigo_universitario">Código Universitario</label>
            <input type="text" name="codigo_universitario" id="codigo_universitario" class="form-control" value="{{ $solicitud->codigo_universitario }}" required>
        </div>
        
        <div class="form-group">
            <label for="facultad">Facultad</label>
            <input type="text" name="facultad" id="facultad" class="form-control" value="{{ $solicitud->facultad }}" required>
        </div>
        
        <div class="form-group">
            <label for="docente_a_cargo">Docente a Cargo</label>
            <input type="text" name="docente_a_cargo" id="docente_a_cargo" class="form-control" value="{{ $solicitud->docente_a_cargo }}" required>
        </div>
        
        <div class="form-group">
            <label for="solicitud">Solicitud</label>
            <input type="text" name="solicitud" id="solicitud" class="form-control" value="{{ $solicitud->solicitud }}" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de Solicitud</label>
            <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control" value="{{ $solicitud->fecha_solicitud }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
