@extends('web.layouts.app')
@section('title', 'Booking Success')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row" class="mt-2">
                <div class="col-md-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="row p-3" style="margin-top: 20px">
                            <div class="col-md-12 pt-4 pb-4 text-center">

                                <hr>
                               @if ($cancel_response)
                               <h3 >{{$cancel_response}}</h3>
                               @else
                               <h3>Your ticket is successfully cancelled</h3>
                               @endif


                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection


