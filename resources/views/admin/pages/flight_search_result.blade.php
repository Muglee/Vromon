@extends('admin.layouts.app')
@section('title', 'Flight Search Result')
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
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Flight Booking </li>
                        <li class="breadcrumb-item active">Flight Search Result</li>
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
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5>Flight Search Results DAC- Dhaka CGP- Chittagong, 10 May 2022, 1 Adult</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Flight Types</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active px-3 pt-3">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">Refundable</button>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">Non Refundable</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Flight Stops</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active px-3 pt-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">Non Stop</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">1 Stop</button>

                                        </div>
                                        <div class="col-md-4">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">2 or more</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Flight Times</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active px-3 py-3">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">14:00 - 11:00</button>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">11:00 - 16:00</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">16:00 - 21:00</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button style="font-size:12px;"
                                                class="btn btn-block btn-outline-secondary btn-flat">21:000 - 24:00</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-9">
                    {{-- @foreach ($responseBody['Results'] as $response) --}}
                        {{-- {{dd($response['ResultID'])}} --}}
                        {{-- Flight-cart --}}
                        <div class="card">
                            {{-- <p>Result id: {{ $response['ResultID'] }} </p>
                            <p>Search id: </p> --}}
                        </div>
                        <div class="card">
                            <div class="row p-3">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="text-danger text-bold"> Special Fare </h6>
                                            {{-- {{($response['ResultID'])}} --}}
                                            {{-- {{ dd($responseBody) }} --}}
                                        </div>
                                        <div class="col-md-8">
                                            <div class="d-flex justify-content-end" style="font-size: 15px;">
                                                <span class="pr-2 "> <small>Fare Rule :</small> </span>

                                                <span class="pr-3 text-bold text-success">Refundable</span>


                                                <span class="pr-1 "><i class="fas fa-luggage-cart"></i> </span>
                                                <span class=" "> 20 KG </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="padding: 0; margin: 0;">
                                    <div class="row pt-3 pb-3 " style="font-size: 14px;">
                                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo"
                                                width="65" height="65">
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <div class="text-left">
                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Bangladesh
                                                    Novo Air</p>
                                                <p style="padding: 0;margin: 0;">BG-147, Aircrft-773</p>
                                                <p style="padding: 0;margin: 0;">Seat: Economy, G-9</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="text-left">
                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                        class="fas fa-plane-departure"></i></i> Take Off</p>
                                                <p style="padding: 0;margin: 0;">BG-147, Aircrft-773</p>
                                                <p style="padding: 0;margin: 0;">Seat: Economy, G-9</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <p class="text-bold " style="padding: 0;margin: 0;">9:00 <i
                                                        class="fas fa-clock"></i> 9:00 </p>
                                                {{-- <p class="text-bold " style="padding: 0;margin: 0;"> <i class="fas fa-clock"></i>  </p> --}}
                                                {{-- <p class="text-bold " style="padding: 0;margin: 0;"> 11:00 </p> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="text-left">
                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                        class="fas fa-plane-arrival"></i> DAC (Dhaka)</p>
                                                <p style="padding: 0;margin: 0;">CGP (Chittagong)</p>
                                                <p style="padding: 0;margin: 0;">Tue, 10 May 2022</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="text-left">
                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Flight Time
                                                </p>
                                                <p style="padding: 0;margin: 0;">0H 45M</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="rate pt-2 pb-2"
                                                style="background-color: #00b2c9;width: 100%; border-radius: 15px ; ">
                                                <p class="text-center text-light"
                                                    style="padding: 0;margin: 0; font-size: 12px;">TOTAL FARE</p>
                                                <p class="text-light text-center"
                                                    style=" padding: 0;margin: 0; font-size: 18px;font-weight: 600;">BDT
                                                    3000</p>
                                            </div>
                                            <div>
                                                <p style="padding: 0;margin: 0;font-size: 12px;text-decoration: line-through"
                                                    class="text-center text-danger">BDT 3500</p>
                                            </div>
                                            <div>
                                                <a href="{{ url('admin/flight_hub_book') }}" style="font-size: 15px;"
                                                    class="btn btn-block btn-outline-success btn-flat">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- flight-cart end --}}
                    <div class="container">
                        <marquee behavior="scroll" direction="left" class="fly">
                        </marquee>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


@endsection

@section('extra-js')
    <script>
 $(document).ready(function () {
        $.ajax({
            url: "",
            type: "get",
            dataType: "json",
            success: function (response) {
                alert(response["progress"]);
            },
        });
    });
    </script>

@endsection