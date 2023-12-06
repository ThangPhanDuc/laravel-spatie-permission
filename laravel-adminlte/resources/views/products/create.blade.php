@extends('layouts.app')

@section('content')
    <h2>Create Product</h2>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('products.form')
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
@endsection