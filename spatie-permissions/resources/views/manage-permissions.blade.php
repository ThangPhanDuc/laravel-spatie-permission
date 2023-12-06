@extends('layouts.app')

@section('content')
<h2>Manage Users</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Permissions</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <ul>
                    @foreach($user->getAllPermissions() as $permission)
                    <li>{{ $permission->name }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <form method="post" action="{{ route('manage.permissions.update', $user) }}">
                    @csrf
                    <div class="form-check">
                        @foreach($permissions as $permission)
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        <label>{{ $permission->name }}</label>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Update Permissions</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection