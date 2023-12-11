@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Show Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $product->name }}</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Product Name:</dt>
                            <dd class="col-sm-9">{{ $product->name }}</dd>

                            <dt class="col-sm-3">Product Code:</dt>
                            <dd class="col-sm-9">{{ $product->code }}</dd>

                            <dt class="col-sm-3">Unit Price:</dt>
                            <dd class="col-sm-9">{{ $product->unit_price }}</dd>

                            <dt class="col-sm-3">Discount:</dt>
                            <dd class="col-sm-9">{{ $product->discount }}</dd>

                            <dt class="col-sm-3">Final Price:</dt>
                            <dd class="col-sm-9">{{ $product->final_price }}</dd>

                            <dt class="col-sm-3">Category:</dt>
                            <dd class="col-sm-9">{{ $product->category->name }}</dd>

                            <dt class="col-sm-3">Product Image:</dt>
                            <dd class="col-sm-9">
                                @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                                @else
                                No Image
                                @endif
                            </dd>

                            <dt class="col-sm-3">Product Description:</dt>
                            <dd class="col-sm-9">{{ $product->description }}</dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
