@extends('layouts.app')

@section('title', 'Crear Solicitud')

@section('content')
<div class="container">
    <h1>Crear Solicitud</h1>
    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_estudiante">Nombre del Estudiante</label>
            <input type="text" name="nombre_estudiante" id="nombre_estudiante" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="codigo_universitario">Código Universitario</label>
            <input type="text" name="codigo_universitario" id="codigo_universitario" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="facultad">Facultad</label>
            <input type="text" name="facultad" id="facultad" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="docente_a_cargo">Docente a Cargo</label>
            <input type="text" name="docente_a_cargo" id="docente_a_cargo" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="solicitud">Solicitud</label>
            <input type="text" name="solicitud" id="solicitud" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de Solicitud</label>
            <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control" required>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
