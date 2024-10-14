@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Book Restaurant')
@section('book', 'menu-open')
@section('book', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Restaurant </h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Book Restaurant </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Restaurant Booking Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{ route('restaurant.find') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ Session::get('VENDOR_ID') }}" id="vendor_id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="dateForBooking" data-target-input="nearest">
                                        <input type="text" value="date" name="date"
                                            class="form-control datetimepicker-input" data-target="#dateForBooking"
                                            required />
                                        <div class="input-group-append" data-target="#dateForBooking"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>



            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
@endsection


@section('extra-js')

    <script>
        //Date picker
        $('#dateForBooking').datetimepicker({
            format: 'L'
        });
    </script>

@endsection
