@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Available Table')
@section('available_table', 'active')
@section('manage_table', 'menu-open')
@section('content')
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

                                

                <form action="{{ route('manage.booking.edit') }}" method="post">
                    @csrf
           
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="firstName" value={{$first_name}}
                                       required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastName"  value={{$last_name}}
                                        required><br>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"  value={{$phone_no}}
                                         required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="email" value={{$email}}
                                        required><br>
                                </div>
                            </div>
                            <input type="hidden"name="id" value="{{$id }}">

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
        <!-- /content -->
    </div>
    @endsection