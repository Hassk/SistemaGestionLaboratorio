@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container">
    <h1>Reportes</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('reporte.create') }}" class="btn btn-primary">Agregar Reporte</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->descripcion }}</td>
                    <td>{{ $reporte->usuario->nombre }}</td>
                    <td>
                        <a href="{{ route('reporte.edit', $reporte->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reporte.destroy', $reporte->id) }}" method="POST" style="display:inline;">
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
