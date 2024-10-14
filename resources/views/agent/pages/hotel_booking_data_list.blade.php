@extends('agent.layouts.app')
@section('title', 'Hotel Booking')
@section('booking', 'menu-open')
@section('Hotel_Booking', 'active')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Booked </li>
                        <li class="breadcrumb-item active">Hotel Booking</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle">#</th>
                                        <th style="vertical-align:middle">Booking ID</th>
                                        <th style="vertical-align:middle">Hotel Name</th>
                                        <th style="vertical-align:middle">Hotel City</th>
                                        <th style="vertical-align:middle">Check IN Date</th>
                                        <th style="vertical-align:middle">Check out Date</th>
                                        <th style="padding-right: 0px; vertical-align:middle">API Book ID</th>
                                        <th style="vertical-align:middle">Amount</th>
                                        <th style="vertical-align:middle">Currency</th>
                                        <th style="vertical-align:middle">Booked On</th>
                                        <th style="vertical-align:middle">Status</th>
                                        <th style="vertical-align:middle">Hotel Confirmationm No</th>
                                        <th style="vertical-align:middle">Cencel ID</th>
                                        <th style="vertical-align:middle">Booked By</th>
                                        <th style="vertical-align:middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($booked_customers_information as $info)
                                        @php
                                            $hotel_name = DB::table('branches')
                                            ->where('id', $info->hotel_id)
                                            ->where(['is_status_active' => 1])
                                            ->first();
                                        @endphp
                                        <tr>
                                            <td style="vertical-align: middle">{{$i++}}</td>
                                            <td style="vertical-align: middle">{{$info->id}}</td>
                                            <td style="vertical-align: middle">{{$hotel_name->branch_name}}</td>
                                            <td style="vertical-align: middle">{{$hotel_name->branch_city}}</td>
                                            <td style="vertical-align: middle">{{$info->checkin_date}}</td>
                                            <td style="vertical-align: middle">{{$info->checkout_date}}</td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle">
                                                <small class="form-text text-muted" style="font-size: 65%;">(Per Person {{$info->room_price}})</small>
                                                Total Price {{$info->total_room_price}} TK
                                            </td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                            <td style="vertical-align: middle"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
