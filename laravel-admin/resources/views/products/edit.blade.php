@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Your form fields here, similar to the create.blade.php -->

                            <!-- Example: Product Name -->
                            <div class="form-group">
                                <label for="inputProductName">Product Name</label>
                                <input type="text" id="inputProductName" name="product_name" class="form-control" value="{{ old('product_name', $product->name) }}" required>
                            </div>

                            <!-- Repeat similar fields for other attributes -->

                            <!-- Example: Product Image -->
                            <div class="form-group">
                                <label for="inputProductImage">Product Image</label>
                                <input type="file" id="inputProductImage" name="product_image" class="form-control-file" accept="image/*">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Update Product</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>

@endsection