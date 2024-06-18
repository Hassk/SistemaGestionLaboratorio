@extends('layouts.app')

@section('title', 'Inventario - Gestión de Inventario')



@section('content')
<div class="container mt-4">
    <h1>Inventario</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <div class="card-title">Productos</div>
                    <div class="card-text">{{ $productos->count() }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <div class="card-title">Categorías</div>
                    <div class="card-text">{{ $categorias->count() }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <div class="card-title">Agregar Producto</div>
                    <a href="{{ route('inventario.create') }}" class="btn btn-light">Agregar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <div class="card-title">Eliminar Producto</div>
                    <!-- Este es solo un ejemplo, para implementar realmente esta funcionalidad se necesitaría más lógica -->
                    <a href="#" class="btn btn-light">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>
                        <a href="{{ route('inventario.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('inventario.destroy', $producto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
