@extends('layouts.app')

@section('content')
    <h2>Edit Post : {{ $post->id }}</h2>

    <form method="post" action="{{ route('manage.posts.updateStatus', $post) }}">
        @csrf
        @method('put')

        
    </form>
@endsection
