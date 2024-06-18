@extends('layouts.app')

@section('title', 'Mantenimientos')

@section('content')
<div class="container">
    <h1>Mantenimientos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary">Agregar Mantenimiento</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $mantenimiento)
                <tr>
                    <td>{{ $mantenimiento->id }}</td>
                    <td>{{ $mantenimiento->producto->nombre }}</td>
                    <td>{{ $mantenimiento->usuario->nombre }}</td>
                    <td>{{ $mantenimiento->descripcion }}</td>
                    <td>{{ $mantenimiento->tipo }}</td>
                    <td>
                        <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST" style="display:inline;">
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
