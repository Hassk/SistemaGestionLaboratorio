@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Solicitudes</h1>
        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Agregar Solicitud</a>
    </div>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif 
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Estudiante</th>
                <th>Código Universitario</th>
                <th>Facultad</th>
                <th>Docente a Cargo</th>
                <th>Tipo de Solicitud</th>
                <th>Estado</th>
                <th>Fecha de Solicitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $solicitud->nombre_estudiante }}</td>
                    <td>{{ $solicitud->codigo_universitario }}</td>
                    <td>{{ $solicitud->facultad }}</td>
                    <td>{{ $solicitud->docente_a_cargo }}</td>
                    <td>{{ $solicitud->solicitud }}</td> 
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->fecha_solicitud ? $solicitud->fecha_solicitud->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-success aprobar-button" data-id="{{ $solicitud->id }}">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-danger rechazar-button" data-id="{{ $solicitud->id }}">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="btn btn-danger delete-button" data-id="{{ $solicitud->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $solicitud->id }}" action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <!-- Formulario para aprobar la solicitud -->
                            <form id="aprobar-form-{{ $solicitud->id }}" action="{{ route('solicitudes.aprobar', $solicitud->id) }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                            <!-- Formulario para rechazar la solicitud -->
                            <form id="rechazar-form-{{ $solicitud->id }}" action="{{ route('solicitudes.rechazar', $solicitud->id) }}" method="POST" style="display:none;">
                                @csrf
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
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/delete-confirm.js') }}"></script>
    <script src="{{ asset('js/approve-confirm.js') }}"></script>
    <script src="{{ asset('js/reject-confirm.js') }}"></script>
    <script src="{{ asset('js/success-alert.js') }}"></script>
@endsection
