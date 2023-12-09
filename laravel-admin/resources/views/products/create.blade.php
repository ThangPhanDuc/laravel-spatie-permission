@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                            <div class="form-group">
                                <label for="inputProductName">Product Name</label>
                                <input type="text" id="inputProductName" name="product_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputProductCode">Product Code</label>
                                <input type="text" id="inputProductCode" name="product_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputUnitPrice">Unit Price</label>
                                <input type="number" id="inputUnitPrice" name="unit_price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDiscount">Discount</label>
                                <input type="number" id="inputDiscount" name="discount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputFinalPrice">Final Price</label>
                                <input type="number" id="inputFinalPrice" name="final_price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Category</label>
                                <select id="inputCategory" name="category_id" class="form-control custom-select" required>
                                    <option selected disabled>Select one</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputProductImage">Product Image</label>
                                <input type="file" id="inputProductImage" name="product_image" class="form-control-file" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="inputProductDescription">Product Description</label>
                                <textarea id="inputProductDescription" name="product_description" class="form-control" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-success float-right">Create new Product</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('inputUnitPrice').addEventListener('input', updateFinalPrice);
        document.getElementById('inputDiscount').addEventListener('input', updateFinalPrice);

        function updateFinalPrice() {
            var unitPrice = parseFloat(document.getElementById('inputUnitPrice').value) || 0;
            var discount = parseFloat(document.getElementById('inputDiscount').value) || 0;
            var finalPrice = unitPrice - (unitPrice * discount / 100);

            document.getElementById('inputFinalPrice').value = finalPrice.toFixed(2);
        }
    });
</script>
@endsection