@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('inventario.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="codigo_laboratorio">Código Laboratorio</label>
            <input type="text" class="form-control" id="codigo_laboratorio" name="codigo_laboratorio" value="{{ $producto->codigo_laboratorio }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_fabrica">Código Fábrica</label>
            <input type="text" class="form-control" id="codigo_fabrica" name="codigo_fabrica" value="{{ $producto->codigo_fabrica }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre Artículo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
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

