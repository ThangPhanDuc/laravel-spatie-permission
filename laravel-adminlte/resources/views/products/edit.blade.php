@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('products.form')
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection