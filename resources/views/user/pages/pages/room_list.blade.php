@extends('dashboards.hotel_reservation.layouts.app')
@section('title', 'Room List')
@section('room_list', 'active')
@section('manage_room', 'menu-open')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Rooms</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Room </li>
                        <li class="breadcrumb-item active">All Rooms </li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Branch</th>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Persons</th>
                                    <th>Bed Distribution</th>
                                    <th>Price</th>
                                    <th>Facilities</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $key=>$data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img width="100px" height="100px" src="{{asset('/storage/media/branch/rooms/'.$data->room_image)}}"/>
                                    </td>
                                    <td>
                                        @foreach ( $branch as $branches)
                                            @if ($data->branch_id == $branches->id )
                                                {{ $branches->branch_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $data->room_name }}</td>
                                    <td>
                                        @foreach ( $room_types as $type)
                                            @if ($data->room_type == $type->room_type_id)
                                                {{ $type->room_type }}
                                            @endif
                                        @endforeach
                                     </td>
                                    <td>
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
                                    </td>
                                    <td>
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
                                        {{ $data->room_price }}
                                        <br>
                                        @if ($data->refund_policy!=1)
                                            <span class="text-danger" style="font-size: 12px;"> (Not Refundable) </span>
                                        @else
                                            <span class="text-success" style="font-size: 12px;"> (Refundable) </span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $facilities = json_decode($data->room_facilities);
                                        @endphp

                                        @if ($facilities->is_house_keeping == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> House Keeping </snap>
                                        @endif
                                        @if ($facilities->is_air_condition == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Air Condition </snap>
                                        @endif
                                        @if ($facilities->is_fan == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Fan </snap>
                                        @endif
                                        @if ($facilities->is_balcony == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Balcony </snap>
                                        @endif
                                        @if ($facilities->is_toilets == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Toilets </snap>
                                        @endif
                                        @if ($facilities->is_tv == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> TV </snap>
                                        @endif
                                        @if ($facilities->is_kettle == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Kettle </snap>
                                        @endif
                                        @if ($facilities->is_fridge == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Mini Fridge </snap>
                                        @endif
                                        @if ($facilities->is_sofa == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Sofa </snap>
                                        @endif
                                        @if ($facilities->is_ware_drop == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Ware drop </snap>
                                        @endif
                                        @if ($facilities->is_locker == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Safe locker </snap>
                                        @endif
                                        @if ($facilities->is_curtain == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Curtain </snap>
                                        @endif
                                        @if ($facilities->is_blanket == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Blanket </snap>
                                        @endif
                                        @if ($facilities->is_toiletries == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Toiletries </snap>
                                        @endif
                                        @if ($facilities->is_towel == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Towel </snap>
                                        @endif
                                        @if ($facilities->is_hot_water == 1)
                                            <snap class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Hot water </snap>
                                        @endif
                                    </td>


                                    <td>
                                        @if($data->is_status_active==1)
                                            <a href="{{url('user/hotel/room/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>
                                        @elseif($data->is_status_active==0)
                                            <a href="{{url('user/hotel/room/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="p-1">
                                                <a href="{{url('user/hotel/manage_room')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                            </div>
                                            <div class="p-1">
                                                <a href="{{url('user/hotel/room/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Branch</th>
                                    <th>Room Name</th>
                                    <th>Room Type</th>
                                    <th>Persons</th>
                                    <th>Bed Distribution</th>
                                    <th>Price</th>
                                    <th>Facilities</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
