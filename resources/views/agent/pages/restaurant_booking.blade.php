@extends('agent.layouts.app')
@section('title', 'Restaurant Booking')
@section('booking_now', 'menu-open')
@section('restaurant_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Restaurant Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Restaurant booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Restaurant Booking Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{ route('agent.restaurant.search') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ Session::get('AGENT_ID') }}" id="agent_id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Search City / Location</label>
                                    <input type="text" value="" name="search_city" class="form-control "  required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <div class="input-group date" id="dateForBooking" data-target-input="nearest">
                                        <input type="text" value="" name="checkin_date"
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
