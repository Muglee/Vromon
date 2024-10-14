@extends('admin.layouts.app')
@section('title', 'Hotel Booking')
@section('booked', 'menu-open')
@section('hotel_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    {{-- <a class="btn btn-primary" href="{{ url('admin/manage_city') }}">Add Customer </a> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Booked </li>
                        <li class="breadcrumb-item active">Hotel Booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="callout callout-info">
                <h5 class="text-bold pb-4 ">Profile Info</h5>


            </div> --}}
            {{-- <div class="row mb-3">
                <div class="col-md-3">
                    <a class="btn btn-success w-100" href="{{ url('admin/manage_city') }}">Add City </a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking ID</th>
                                    <th>Hotel Name</th>
                                    <th>Hotel City</th>
                                    <th>Check IN Date</th>
                                    <th>Check out Date</th>
                                    <th>API Book ID</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Booked On</th>
                                    <th>Status</th>
                                    <th>Hotel Confirmationm No</th>
                                    <th>Cencel ID</th>
                                    <th>Booked By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Booking ID</th>
                                    <th>Hotel Name</th>
                                    <th>Hotel City</th>
                                    <th>Check IN Date</th>
                                    <th>Check out Date</th>
                                    <th>API Book ID</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Booked On</th>
                                    <th>Status</th>
                                    <th>Hotel Confirmationm No</th>
                                    <th>Cencel ID</th>
                                    <th>Booked By</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
