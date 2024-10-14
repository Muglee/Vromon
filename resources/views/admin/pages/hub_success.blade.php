@extends('admin.layouts.app')
@section('title', 'Booking Success')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:80px">
                <div class="col-md-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="row p-3">
                            <div class="col-md-12 pt-4 pb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo" width="65" height="65">
                                                </div>
                                            </div>
                                            <div class="col-md-9" >
                                                <span style="padding: 0;margin: 0;color:rgb(2, 137, 226); ">{{ session()->get('origin'); }}To {{ session()->get('destination'); }} </span>
                                                <p style="padding: 0;margin: 0;font-size: 12px;">REFUNDABLE</p>
                                                <p style="padding: 0;margin: 0;font-size: 12px;">BG-461-T</p>
                                                <p style="padding: 0;margin: 0;font-size: 12px;color:rgb(155, 155, 155);"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="text-right" style="font-size: 15px;">
                                            <span style="padding: 0;margin: 0;color:rgb(2, 137, 226); ">TOTAL FLIGHT FARE</span>
                                            <p style="padding: 0;margin: 0;font-size: 12px;">BaseFare:{{$fares[0]['BaseFare']}}</p>
                                            <p style="padding: 0;margin: 0;font-size: 12px;">Tax:{{$fares[0]['Tax']}}</p>
                                            <p style="padding: 0;margin: 0;font-size: 12px;">TotalFare:{{$totalfare }}</p>
                                            {{-- <p style="padding: 0;margin: 0;font-size: 12px;">{{$fares[0]['Tax']}}</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pt-3 pb-3 " style="font-size: 14px;">
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
                                                        <p class="" style="padding: 0;margin: 0;">Seat: Economy, G-9</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                    <div class="text-center">
                                                        <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                class="fas fa-plane-departure"></i></i> Take Off</p>
                                                        <p style="padding: 0;margin: 0;">{{   $item['Origin']['DepTime'] }}</p>
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

                                    {{-- <div class="col-md-2">

                                    </div> --}}
                                    {{-- <div class="col-md-3 d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                    class="fas fa-plane-departure"></i></i> Take Off</p>
                                                    <p style="padding: 0;margin: 0;">DAC 8:15</p>

                                            <p style="padding: 0;margin: 0;color:rgb(2, 137, 226);">(BG-1661-T)</p>
                                            <p style="padding: 0;margin: 0;">Mon May 30 2022</p>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-2 d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <p class="text-bold" style="padding: 0;margin: 0;">
                                                <i class="fas fa-clock"></i>
                                            </p>
                                            <p class="text-bold" >1:10 H </p>

                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-3 d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                    class="fas fa-plane-arrival"></i>Landing</p>
                                                    <p style="padding: 0;margin: 0;">DAC 8:15</p>

                                                    <p style="padding: 0;margin: 0;color:rgb(2, 137, 226);">(BG-1661-T)</p>
                                                    <p style="padding: 0;margin: 0;">Mon May 30 2022</p>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-2">

                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection