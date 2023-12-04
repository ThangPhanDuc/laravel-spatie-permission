@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-5">My Roles</h2>

        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text">Your roles:</p>
                <ul class="list-group">
                    @foreach($roles as $role)
                        <li class="list-group-item">{{ $role }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection