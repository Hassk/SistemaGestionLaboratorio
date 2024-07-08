@extends('layouts.app')

@section('title', 'Mantenimientos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Mantenimientos</h1>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary">Agregar Mantenimiento</a>
    </div>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif 
    <table class="table">
        <thead>
            <tr>
                <th>N°</th> <!-- Cambiado de ID a # para indicar el orden -->
                <th>Producto</th>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $key => $mantenimiento) <!-- Usar $key como contador -->
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Mostrar el índice + 1 para empezar desde 1 -->
                    <td>{{ $mantenimiento->producto->nombre }}</td>
                    <td>{{ $mantenimiento->usuario->nombre }}</td>
                    <td>{{ $mantenimiento->descripcion }}</td>
                    <td>{{ $mantenimiento->tipo }}</td>
                    <td>{{ \Carbon\Carbon::parse($mantenimiento->fecha_inicio)->toDateString() }}</td>
                    <td>{{ \Carbon\Carbon::parse($mantenimiento->fecha_fin)->toDateString() }}</td>
                    <td>{{ $mantenimiento->estado }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $mantenimiento->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $mantenimiento->id }}" action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST" style="display:none;">
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
