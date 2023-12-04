@extends('layouts.app')

@section('content')
<h2>Manage Posts</h2>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Published</th>
            <th>Edit</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->published ? 'Yes' : 'No' }}</td>
            <td>
                @can('edit articles', $post)
                <a href="{{ route('manage.posts.edit', $post) }}">Edit</a>
                @endcan
            </td>
            <td>
                @can('publish articles', $post)
                <form method="post" action="{{ route('manage.posts.updateStatus', $post) }}">
                    @csrf
                    @method('put')

                    <label for="published">Published:</label>
                    <select name="published" class="form-select">
                        <option value="1" {{ $post->published ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$post->published ? 'selected' : '' }}>No</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection