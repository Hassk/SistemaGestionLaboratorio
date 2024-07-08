@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('inventario.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo_laboratorio">Código Laboratorio</label>
            <input type="text" class="form-control" id="codigo_laboratorio" name="codigo_laboratorio" required>
        </div>
        <div class="form-group">
            <label for="codigo_fabrica">Código Fábrica</label>
            <input type="text" class="form-control" id="codigo_fabrica" name="codigo_fabrica" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre Artículo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection

