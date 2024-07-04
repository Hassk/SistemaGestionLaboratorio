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
                <th>Usuario</th>
                <th>Tipo de Solicitud</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Fecha de Solicitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $solicitud->usuario->nombre }}</td>
                    <td>{{ $solicitud->tipo_solicitud }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->descripcion }}</td>
                    <td>{{ $solicitud->fecha_solicitud ? $solicitud->fecha_solicitud->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="{{ $solicitud->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $solicitud->id }}" action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:none;">
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
