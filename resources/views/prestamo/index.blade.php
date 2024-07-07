@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Préstamos</h1>
        <a href="{{ route('prestamo.create') }}" class="btn btn-primary">Agregar préstamo</a>
    </div>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif  
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Producto</th>
                <th>Nombre del Estudiante</th>
                <th>Código Universitario</th>
                <th>Facultad</th>
                <th>Docente a Cargo</th>
                <th>Descripción</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $prestamo->producto->nombre }}</td>
                    <td>{{ $prestamo->nombre_estudiante }}</td>
                    <td>{{ $prestamo->codigo_universitario }}</td>
                    <td>{{ $prestamo->facultad }}</td>
                    <td>{{ $prestamo->docente_a_cargo }}</td>
                    <td>{{ $prestamo->descripcion }}</td>
                    <td>{{ Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('prestamo.edit', $prestamo->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $prestamo->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $prestamo->id }}" action="{{ route('prestamo.destroy', $prestamo->id) }}" method="POST" style="display:none;">
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
