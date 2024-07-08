@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
<div class="container mt-4">
    <h1>Inventario</h1>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif 

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-search"></i> Buscar Producto</div>
                    <input type="text" id="search-input" class="form-control" placeholder="Buscar...">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-plus-circle"></i> Agregar Producto</div>
                    <a href="{{ route('inventario.create') }}" class="btn btn-light">Agregar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-boxes"></i> Productos</div>
                    <div class="card-text">{{ $productos->count() }}</div>
                    <p>Total de productos en inventario.</p>
                </div>
            </div>
        </div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>N°</th>
                <th>Código Laboratorio</th>
                <th>Código Fábrica</th>
                <th>Nombre Artículo</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $producto->codigo_laboratorio }}</td>
                    <td>{{ $producto->codigo_fabrica }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td class="{{ $producto->estado === 'disponible' ? 'text-success' : 'text-danger' }}">
                        {{ ucfirst($producto->estado) }}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('inventario.edit', $producto->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $producto->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $producto->id }}" action="{{ route('inventario.destroy', $producto->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
