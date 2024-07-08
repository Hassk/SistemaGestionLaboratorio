@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Reportes</h1>
        <a href="{{ route('reporte.create') }}" class="btn btn-primary">Agregar Reporte</a>
    </div>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif 
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Descripción</th>
                <th>Nombre del Estudiante</th>
                <th>Código Universitario</th>
                <th>Facultad</th>
                <th>Fecha</th>
                <th>Docente a Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reporte->descripcion }}</td>
                    <td>{{ $reporte->nombre_estudiante }}</td>
                    <td>{{ $reporte->codigo_universitario }}</td>
                    <td>{{ $reporte->facultad }}</td>
                    <td>{{ $reporte->fecha ? $reporte->fecha->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $reporte->docente_a_cargo }}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('reporte.edit', $reporte->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $reporte->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $reporte->id }}" action="{{ route('reporte.destroy', $reporte->id) }}" method="POST" style="display:none;">
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
