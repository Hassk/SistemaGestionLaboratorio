@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administración de Usuarios</h1>
    @if(session('success'))
        <meta name="alert-success" content="{{ session('success') }}">
    @endif 
    <a href="{{ route('usuario.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ implode(', ', $usuario->getRoleNames()->toArray()) }}</td>
                    <td>
                        <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('usuario.assignRoleForm', $usuario->id) }}" class="btn btn-secondary">Asignar Rol</a>
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
