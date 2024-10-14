@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Book Restaurant')
@section('book', 'menu-open')
@section('book', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Info of Booking </h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Book Restaurant Info </li>
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

                @php
                    // dd($dataofBookingSlot);
                @endphp
                

                <form action="{{ route('restaurant.save.book') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ Session::get('VENDOR_ID') }}" id="vendor_id" name="vendor_id">
                    
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="firstName"
                                       required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastName"
                                        required><br>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                         required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="email"
                                        required><br>
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
