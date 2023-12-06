@extends('layouts.app')

@section('content_header')
<h1>Product List</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Unit Price</th>
                    <th>Discount</th>
                    <th>Final Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->final_price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                        @can('edit_products')
                        <button class="btn btn-warning">Edit</button>
                        @endcan

                        @can('delete_products')
                        <button class="btn btn-danger">Delete</button>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection