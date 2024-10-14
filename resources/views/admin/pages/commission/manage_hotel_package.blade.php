@extends('admin.layouts.app')
@section('title', 'Hotel Packages')
@section('commission', 'menu-open')
@section('hotel_package', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    {{-- <a class="btn btn-primary" href="{{ url('admin/manage_hotel_package') }}">Add Hotel Package </a> --}}
                </div><!-- /.col -->
                <div class="col-sm-10">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Commission </li>
                        <li class="breadcrumb-item active">Hotel Packages</li>
                        <li class="breadcrumb-item active">Add Hotel Packages</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Hotel Package</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{ route('admin.ManageHotelPackageProcess') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$id}}" class="form-control" > --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Package Name </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"  name="package_name" value="{{$package_name }}"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Price </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="price" value="{{ $price }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Description </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description" id="branch_description" class="form-control" required > {!! $description !!} </textarea>
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
                    <div class="col-md-1"></div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <script>
        CKEDITOR.replace('branch_description');
    </script>
@endsection
