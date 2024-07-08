@extends('layouts.app')

@section('title', 'Crear Préstamo')

@section('content')
<div class="container">
    <h1>Crear Préstamo</h1>
    <form action="{{ route('prestamo.store') }}" method="POST">
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
            <label for="nombre_estudiante">Nombre del Estudiante</label>
            <input type="text" name="nombre_estudiante" id="nombre_estudiante" class="form-control @error('nombre_estudiante') is-invalid @enderror" value="{{ old('nombre_estudiante') }}" required>
            @error('nombre_estudiante')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="codigo_universitario">Código Universitario</label>
            <input type="text" name="codigo_universitario" id="codigo_universitario" class="form-control @error('codigo_universitario') is-invalid @enderror" value="{{ old('codigo_universitario') }}" required>
            @error('codigo_universitario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="facultad">Facultad</label>
            <input type="text" name="facultad" id="facultad" class="form-control @error('facultad') is-invalid @enderror" value="{{ old('facultad') }}" required>
            @error('facultad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="docente_a_cargo">Docente a Cargo</label>
            <input type="text" name="docente_a_cargo" id="docente_a_cargo" class="form-control @error('docente_a_cargo') is-invalid @enderror" value="{{ old('docente_a_cargo') }}" required>
            @error('docente_a_cargo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}" required>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control @error('fecha_prestamo') is-invalid @enderror" value="{{ old('fecha_prestamo') }}" required>
            @error('fecha_prestamo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fecha_devolucion">Fecha de Devolución</label>
            <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control @error('fecha_devolucion') is-invalid @enderror" value="{{ old('fecha_devolucion') }}" required>
            @error('fecha_devolucion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
