@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Manage Categories')
@section('food_menu', 'menu-open')
@section('categories', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Catagories </h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Food Menu </li>
                        <li class="breadcrumb-item active">Manage Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="callout callout-info">
                <form action="{{ route('Category.ManageFoodCategoryProcess') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                    <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Category Name</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text"  name="category_name" value="{{ $category_name }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
