@extends('admin.layouts.app')
@section('title', 'Passenger Details')
@section('booking', 'menu-open')
@section('flight_booking', 'active')



@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary mt-4 " style="justify-content:center">
                        <div class="text-center">
                            <h4> Please click the continue button to buy ticket</h4>

                            <form method="get" action="{{ route('admin.FlightAirPrice') }}" enctype="multipart/form-data">
                                <input type="hidden" name="searchId" value="{{ Request::get('SearchId') }}">
                                <input type="hidden" name="resultId" value=" {{ Request::get('ResultID') }}">

                                <center>
                                    <button href="" class="btn  btn-block btn-outline-primary">Continue</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </section> --}}


    <div class="container">
        <div class="row align-items-center" style="padding-top:15%">
            <div class="col-6 mx-auto">
                <div class="card shadow border">
                    <div class="card-body d-flex flex-column align-items-center" style="height: 250px;justify-content:center">
                        <p> Please click the continue button to buy ticket</p>
                        <form method="get" action="{{ route('admin.FlightAirPrice') }}" enctype="multipart/form-data">
                            <input type="hidden" name="searchId" value="{{ Request::get('SearchId') }}">
                            <input type="hidden" name="resultId" value=" {{ Request::get('ResultID') }}">
                                <button href="" class="btn  btn-block btn-outline-primary">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
