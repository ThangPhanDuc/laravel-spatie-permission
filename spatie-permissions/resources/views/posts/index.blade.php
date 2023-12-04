@extends('layouts.app')

@section('content')
    <h2>Posts</h2>

    @foreach($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <p>Published: {{ $post->published ? 'Yes' : 'No' }}</p>
        </div>
        <hr>
    @endforeach
@endsection