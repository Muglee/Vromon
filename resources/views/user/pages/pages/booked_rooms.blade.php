@extends('dashboards.hotel_reservation.layouts.app')
@section('title', 'Booked Rooms')
@section('booked_rooms', 'active')
@section('manage_room', 'menu-open')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booked Rooms</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Room </li>
                        <li class="breadcrumb-item active">Booked Rooms </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Branch</th>
                                    <th>Image</th>
                                    <th>Room Details</th>
                                    <th>Guest Details</th>
                                    <th>Check in</th>
                                    <th>Check Out</th>
                                    <th>Payable</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $key=>$data)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td>
                                            @foreach ( $branch as $branches)
                                                @if ($data->branch_id == $branches->id )
                                                    {{ $branches->branch_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            <img width="100px" height="100px" src="{{asset('/storage/media/branch/rooms/'.$data->room_image)}}"/>
                                        </td>
                                        <td>{{$data->room_name}}
                                            <br>
                                            @foreach($roomtypes as $type)
                                                @if ($data->room_type == $type->room_type_id)
                                                   ( {{ $type->room_type }} )
                                                @endif
                                            @endforeach
                                            <br>
                                            Person:
                                            @php
                                                $no_of_person = json_decode($data->no_of_person);
                                            @endphp
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="mr-2">Adult</span>
                                                    <br><span class="mr-2">Kids</span>
                                                    <br><span class="mr-2">Guests</span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="">: {{ $no_of_person->no_of_adult }}</span>
                                                    <br><span class="">: {{ $no_of_person->no_of_kids }}</span>
                                                    <br><span class="">: {{ $no_of_person->no_of_guest }}</span>
                                                </div>
                                            </div>
                                            Bed:
                                            @php
                                                $bed_distribution = json_decode($data->bed_distribution);
                                            @endphp
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="mr-2">Single </span>
                                                    <br><span class="mr-2">Double </span>
                                                </div>
                                                <div class="col-4">
                                                    <span class=""> : {{ $bed_distribution->no_of_single_bed }} </span>
                                                    <br><span class="">: {{ $bed_distribution->no_of_double_bed }} </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Name:{{$data->name}} <br>
                                            Email:{{$data->email}} <br>
                                            Phone:{{$data->phone_number}}<br>
                                            NID:{{$data->nid_number}}<br>
                                        </td>
                                        <td>{{date('d-m-Y', strtotime($data->check_in))}}</td>
                                        <td>{{date('d-m-Y', strtotime($data->check_out))}}</td>
                                        <td>{{$data->room_price}}</td>
                                        <td>{{$data->paid_amount}}</td>
                                        <?php
                                        $price=$data->room_price;
                                        $paid=$data->paid_amount;
                                        $due= $price-$price;
                                        ?>

                                        <td>
                                          <p class="text-danger"> {{$data->room_price-$data->paid_amount}} </p>
                                        </td>
                                        <td>
                                            <a  href="{{url('user/hotel/cancel')}}/{{$data->id}}" class="btn btn-outline-danger btn-sm">Cancel book</a>
                                            <a   href="{{url('user/hotel/invoice')}}/{{$data->id}}" class="btn btn-outline-primary btn-sm">Invoice</a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Branch</th>
                                    <th>Image</th>
                                    <th>Room Details</th>
                                    <th>Guest Details</th>
                                    <th>Check in</th>
                                    <th>Check Out</th>
                                    <th>Payable</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
