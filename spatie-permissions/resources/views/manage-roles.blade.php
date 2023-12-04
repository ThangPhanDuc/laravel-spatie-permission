@extends('layouts.app')

@section('content')
    <h2>Manage Users</h2>

    @if(session('success'))
        <!-- <div class="alert alert-success">
            {{ session('success') }}
        </div> -->
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                    <td>
                        <form method="post" action="{{ route('manage.roles.update', $user) }}">
                            @csrf
                            <div class="form-check">
                                @foreach($roles as $role)
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                    <label>{{ $role->name }}</label>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Update Roles</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection