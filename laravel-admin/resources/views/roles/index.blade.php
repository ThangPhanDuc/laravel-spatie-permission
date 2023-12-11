@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">users</h3>

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
                                Email
                            </th>
                            <th>
                                Roles
                            </th>
                            <th class="text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="row_{{ $user->id }}">
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $user->name }}
                                </a>
                                <br />
                                <small>
                                    Created 01.01.2019
                                </small>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            </td>
                            <td class="align-middle text-center">
                                <form method="post" action="{{ route('roles.update', $user) }}">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        @foreach($roles as $role)
                                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                        <label class="form-check-label mr-2">{{ $role->name }}</label>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Update Roles</button>
                                </form>
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
            url: '{{ route('
            products.filter - and - search ')}}',
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