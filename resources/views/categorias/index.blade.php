@extends('layouts.app')

@section('title', 'Categorías - Gestión de Inventario')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar categoría</a>
    </div>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif  
    <table class="table mt-4">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $categoria->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $categoria->id }}" action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:none;">
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
    <script src="{{ asset('js/success-alert.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection
