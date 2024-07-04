@extends('layouts.app')

@section('title', 'Editar Reporte')

@section('content')
<div class="container">
    <h1>Editar Reporte</h1>
    <form action="{{ route('reporte.update', $reporte->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $reporte->descripcion }}" required>
        </div>
        <div class="form-group">
            <label for="nombre_estudiante">Nombre del Estudiante</label>
            <input type="text" name="nombre_estudiante" id="nombre_estudiante" class="form-control" value="{{ $reporte->nombre_estudiante }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_universitario">Código Universitario</label>
            <input type="text" name="codigo_universitario" id="codigo_universitario" class="form-control" value="{{ $reporte->codigo_universitario }}" required>
        </div>
        <div class="form-group">
            <label for="facultad">Facultad</label>
            <input type="text" name="facultad" id="facultad" class="form-control" value="{{ $reporte->facultad }}" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $reporte->fecha->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="docente_a_cargo">Docente a Cargo</label>
            <input type="text" name="docente_a_cargo" id="docente_a_cargo" class="form-control" value="{{ $reporte->docente_a_cargo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
