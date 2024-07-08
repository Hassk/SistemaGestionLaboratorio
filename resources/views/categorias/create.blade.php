@extends('layouts.app')

@section('title', 'Agregar Categoría - Gestión de Inventario')


@section('content')
<div class="container mt-4">
    <h1>Agregar Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection
