@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignar Rol al Usuario</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('usuario.assignRole', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Seleccionar Rol:</label>
            <select name="role" id="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar Rol</button>
    </form>
</div>
@endsection
