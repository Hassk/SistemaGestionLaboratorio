@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assign Role to User</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Select Role:</label>
            <select name="role" id="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Role</button>
    </form>
</div>
@endsection
