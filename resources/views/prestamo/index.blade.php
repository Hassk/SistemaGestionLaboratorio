@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="container">
    <h1>Préstamos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('prestamo.create') }}" class="btn btn-primary">Agregar Préstamo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->producto ? $prestamo->producto->nombre : 'Producto no disponible' }}</td>
                    <td>{{ $prestamo->usuario ? $prestamo->usuario->nombre : 'Usuario no disponible' }}</td>
                    <td>{{ $prestamo->descripcion }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                    <td>
                        <a href="{{ route('prestamo.edit', $prestamo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('prestamo.destroy', $prestamo->id) }}" method="POST" style="display:inline;">
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
