@extends('admin.layouts.app')
@section('title', 'Air Tickets')
@section('booked', 'menu-open')
@section('air_tickets', 'active')

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
                        <li class="breadcrumb-item active">Air Tickets</li>
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
                                    <th>Book ID</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Airline</th>
                                    <th>PNR</th>
                                    <th>API Book ID</th>
                                    <th>Contact No</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Refundable</th>
                                    <th>Travel Date</th>
                                    <th>Cancel ID</th>
                                    <th>Online</th>
                                    <th>Booked On</th>
                                    <th>Booked By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Book ID</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Airline</th>
                                    <th>PNR</th>
                                    <th>API Book ID</th>
                                    <th>Contact No</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Refundable</th>
                                    <th>Travel Date</th>
                                    <th>Cancel ID</th>
                                    <th>Online</th>
                                    <th>Booked On</th>
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
