@extends('layouts.app')

@section('content_header')
<h1>Product List</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('products.index') }}" method="get" class="mb-4">
            <div class="form-row">
                <div class="col-md-3 mb-2">
                    <label for="search">Search:</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
                </div>
                <div class="col-md-3 mb-2">
                    <label for="price_range">Price Range:</label>
                    <select name="price_range" id="price_range" class="form-control">
                        <option value="">All Prices</option>
                        <option value="0-5000000">$0 - $5,000,000</option>
                        <option value="5000000-10000000">$5,000,000 - $10,000,000</option>
                        <option value="10000000-">$10,000,000 and above</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

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
                        <form method="post" action="{{ route('products.destroy', $product->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection