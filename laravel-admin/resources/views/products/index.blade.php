@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <form id="searchAndFilterForm">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Result Type:</label>
                                <select name="result_type[]" class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                    <option>Text only</option>
                                    <option>Images</option>
                                    <option>Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="price_range">Price Range:</label>
                                <select name="price_range" id="price_range" class="select2" style="width: 100%;">
                                    <option value="" selected>All Prices</option>
                                    <option value="0-200"> $0 - $200</option>
                                    <option value="200-500"> $200 - $500</option>
                                    <option value="500"> $500 and above</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" id="category" class="select2" style="width: 100%;">
                                    <option value="" selected>All Categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-lg btn-default" onclick="updateProducts()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Code
                            </th>
                            <th>
                                Unit Price
                            </th>
                            <th>
                                Discount
                            </th>
                            <th>
                                Final Price
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Image
                            </th>
                            <th class="text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $product->name }}
                                </a>
                                <br />
                                <small>
                                    Created 01.01.2019
                                </small>
                            </td>
                            <td>
                                {{ $product->code }}
                            </td>
                            <td>
                                {{ $product->unit_price }}
                            </td>
                            <td>
                                {{ $product->discount }}
                            </td>
                            <td>
                                {{ $product->final_price }}
                            </td>
                            <td>
                                {{ $product->category->name }}
                            </td>
                            <td>
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 60px; max-height: 600px;">
                            </td>
                            <td class="project-actions text-center">
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm mx-1" href="{{ route('products.show', $product) }}">
                                        <i class="fas fa-folder"></i> View
                                    </a>
                                    @can('edit_products')
                                    <a class="btn btn-info btn-sm mx-1" href="{{ route('products.edit', $product) }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    @endcan
                                    @can('delete_products')
                                    <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('#price_range, #category, input[name="search"]').change(function() {
            console.log("filter");
            updateProducts();
        });
    });

    function updateProducts() {
        $.ajax({
            url: '{{ route('products.filter-and-search')}}',
            type: 'GET',
            data: $('#searchAndFilterForm').serialize(),
            success: function(data) {
                $('#tbody').html(data);
                console.log("data: ", data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
@endsection