@extends('admin.layouts.app')
@section('title', 'Restaurant Booking')
@section('booking_now', 'menu-open')
@section('restaurant_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Restaurant Search Result</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Restaurant Search Result</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @foreach ($result as $data )
            <div class="col-md-12 pb-30">
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-3 p-2">
                            <img width="100%" src="{{ asset('/storage/media/outlet/CoverImages/'. $data->outlet_cover_image) }}" />
                        </div>
                        {{-- {{ session()->get('checkin_date') }} --}}
                        <div class="col-md-9 p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <span> <img width="35px" height="35px" src="{{ asset('/storage/media/outlet/logo/' . $data->outlet_logo) }}" />
                                        </span>
                                        <span style="color:#3FD0D4; border-style:solid; border-width: 1px; padding:5px;">
                                            {{ $data->outlet_name }}
                                        </span>
                                    </div>

                                    <div class="mt-2">

                                        <span  class="mr-2 mt-3 "><i style="color:#3FD0D4;"
                                            class=" fas fa-map-marker"></i></span> <span class="pr-3"> {{ $data->outlet_location }}
                                        </span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="overflow: hidden; max-height: 50px;" class="ml-2 mr-2 mt-3">{!! $data->outlet_description !!}
                                </div>
                            </div>
                            <div class="row mt-2 d-flex flex-row-reverse mr-2">
                                <a href="{{url('admin/admin_restaurant_booking/find')}}/{{$data->id}}" class="btn btn-success">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="  d-flex justify-content-center">
                {!! $result->links() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>


@endsection
@section('extra-js')




@endsection
