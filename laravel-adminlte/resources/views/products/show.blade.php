@extends('layouts.app')

@section('content_header')
    <h1>Product Details</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Code:</strong> {{ $product->code }}</p>
                    <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
                    <p><strong>Discount:</strong> {{ $product->discount }}</p>
                    <p><strong>Final Price:</strong> {{ $product->final_price }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Image:</strong> <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 200px;"></p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
