@extends('admin.layouts.app')
@section('title', 'Passenger Review')
@section('booking', 'menu-open')
@section('flight_booking', 'active')
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
                        <li class="breadcrumb-item active">Flight Booking </li>
                        <li class="breadcrumb-item active">Passenger Review</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Passenger Booking Review</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    {{-- <p style="font-size: 14px;">ADULT:{{session()->get('key');  }}</p>
                                                    <p style="font-size: 14px;">CHILD:{{ session()->get('key'); }}</p>
                                                    <p style="font-size: 14px;">INFANT:{{ session()->get('key'); }}</p> --}}
                                                    <p style="font-size: 14px;">FIRST NAME:{{ session()->get('firstName'); }}</p>
                                                    <p style="font-size: 14px;">LAST NAME:{{session()->get('lastName');  }}</p>
                                                    <p style="font-size: 14px;">GENDER:{{ session()->get('gender'); }}</p>
                                                    {{-- <p style="font-size: 14px;">DOB: </p> --}}
                                                    <p style="font-size: 14px;">LEAD EMAIL:{{ session()->get('email'); }}</p>
                                                    <p style="font-size: 14px;">LEAD MOBILE:{{  session()->get('contactNumber');}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="row p-3">
                                            @foreach ($segments as $item)
                                            <div class="col-md-12 pt-4 pb-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- <h5 class="text-danger"> Dhaka To Jessore </h5> --}}
                                                        <span style="">{{ $item['Origin']['Airport']['AirportCode'] }} To  {{ $item['Destination']['Airport']['AirportCode'] }} </span>
                                                        <span style="font-size: 12px;">( One Way Flight )</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-right" style="font-size: 15px;">
                                                           <h6>{{ $item['Airline']['AirlineName'] }} </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="padding: 0; margin: 0;">
                                                <div class="row pt-3 pb-3 " style="font-size: 14px;">

                                                    <div class="col-md-4">
                                                        {{-- <div class="">
                                                            <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo"
                                                                width="65" height="65">
                                                        </div> --}}
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo"
                                                                width="65" height="65">
                                                        </div>
                                                        <div class="text-center">
                                                            <p class="" style="padding: 0;margin: 0;">{{  $item['Origin']['Airport']['AirportCode']  }} To {{ $item['Destination']['Airport']['AirportCode']   }}</p>
                                                            {{-- <p class="" style="padding: 0;margin: 0;">Seat: Economy, G-9</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                        <div class="text-center">
                                                            <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                    class="fas fa-plane-departure"></i></i> Take Off</p>
                                                            <p style="padding: 0;margin: 0;">{{ $item['Origin']['DepTime'] }}</p>
                                                            <p style="padding: 0;margin: 0;">9:15</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                        <div class="text-center">
                                                            <p class="text-bold" style="padding: 0;margin: 0;">
                                                                <i class="fas fa-clock"></i>
                                                            </p>
                                                            <p class="text-bold" >1:10 H </p>
                                                            {{-- <p class="text-bold " style="padding: 0;margin: 0;"> <i class="fas fa-clock"></i>  </p> --}}
                                                            {{-- <p class="text-bold " style="padding: 0;margin: 0;"> 11:00 </p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                        <div class="text-center">
                                                            <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                    class="fas fa-plane-arrival"></i>Landing</p>
                                                            <p style="padding: 0;margin: 0;">{{  $item['Destination']['ArrTime'] }}</p>
                                                            <p style="padding: 0;margin: 0;">10:15</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-md-4">
                                <a href="{{ url('admin/flight_hub_air_book') }}" type="submit"
                                    class="btn btn-primary w-100">Hold Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="lead">Booking Details</p>
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo"
                                            width="65" height="65">
                                    </div>
                                    <div class="col-md-8">
                                        <p style="padding: 0;margin: 0;">{{ session()->get('origin'); }}To {{ session()->get('destination'); }}</p>
                                        <p class="text-primary" style="padding: 0;margin: 0; font-size: 12px;">
                                            {{ Request::get('AirlineName') }}</p>
                                        <p class="text-primary" style="padding: 0;margin: 0; font-size: 12px;">BG - 127 -
                                            G - 788
                                        </p>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-6 text-center">
                                        <p class="text-bold " style="padding: 0;margin: 0;font-size: 13px;">
                                            TAKE OFF</p>
                                        <p class="text" style="padding: 0;margin: 0; font-size: 12px;">
                                            {{ Request::get('AirlineName') }}</p>
                                        <p class="" style="padding: 0;margin: 0; font-size: 12px;">
                                            {{ Request::get('OriginTimeFinal') }}</p>
                                    </div>
                                    {{-- <div class="col-md-4 d-flex align-items-center"> --}}
                                    {{-- <div class=""> --}}
                                    {{-- <i class="far fa-clock text-center"></i> --}}
                                    {{-- <p class="text-primary text-center" style=" font-size: 12px;" >0H 45M</p> --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                    <div class="col-md-6 text-center">
                                        <p class="text-bold" style="padding: 0;margin: 0;">LANDING</p>
                                        <p class="" style="padding: 0;margin: 0; font-size: 12px;">
                                            {{ Request::get('AirlineName') }}</p>
                                        <p class="" style="padding: 0;margin: 0; font-size: 12px;">BG - 127 -
                                            G - 788
                                        </p>
                                    </div>
                                </div>
                                <p class="lead">Order Details</p>
                                <table class="table">
                                    <tr>
                                        <td>Base Fare</td>
                                        <td>{{$fares[0]['BaseFare']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Taxes and Fees</td>
                                        <td>{{$fares[0]['Tax']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Other Charges</td>
                                        <td>{{ Request::get('OtherCharges') }}</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $total_price = Request::get('BaseFare') + Request::get('Tax') + Request::get('OtherCharges'); ?>
                                        <td>
                                            <p class="lead">Total Price</p>
                                        </td>
                                        <td>
                                            <p class="lead">{{$totalfare }}</p>
                                        </td>
                                    </tr>
                                </table>
                                {{-- <p class="lead">Passenger Fare Details</p> --}}
                                {{-- <table class="table">
                                    <tr>
                                        <?php
                                        $adult_total_fare = Request::get('AdultCount') * Request::get('AdultFare');

                                        ?>
                                        <td><span>Adult</span><span
                                                class="pl-2">{{ Request::get('AdultCount') }}</span>
                                        </td>
                                        <td>{{ $adult_total_fare }}</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $child_total_fare = Request::get('ChildCount') * Request::get('ChildFare') + Request::get('ChildTax');

                                        ?>
                                        <td><span>Child</span><span
                                                class="pl-2">{{ Request::get('ChildCount') }}</span>
                                        </td>
                                        <td>{{ $child_total_fare }}</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $infant_total_fare = Request::get('InfantCount') * Request::get('InfantFare') + Request::get('InfantTax');
                                        ?>
                                        <td><span>Infant</span><span
                                                class="pl-2">{{ Request::get('InfantCount') }}</span>
                                        </td>
                                        <td>{{ $infant_total_fare }}</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $grand_total = $adult_total_fare + $child_total_fare + $infant_total_fare;
                                        ?>
                                        <td>
                                            <p class="lead">Grand Total</p>
                                        </td>
                                        <td>
                                            <p class="lead">{{ $grand_total }}</p>
                                        </td>
                                    </tr>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
