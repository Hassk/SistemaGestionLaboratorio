@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')
<div class="container">
    <h1>Solicitudes</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Agregar Solicitud</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo de Solicitud</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->usuario->nombre }}</td>
                    <td>{{ $solicitud->tipo_solicitud }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->descripcion }}</td>
                    <td>
                        <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:inline;">
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
