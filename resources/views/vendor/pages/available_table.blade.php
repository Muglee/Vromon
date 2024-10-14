@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Available Table')
@section('available_table', 'active')
@section('manage_table', 'menu-open')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Available Table</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/restaurant/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Table </li>
                        <li class="breadcrumb-item active">Available Table </li>
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
                                    <th>Table Name</th>
                                    <th>Price</th>
                                    <th>Outlet</th>
                                    <th>Available slots</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $key=>$data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img width="100px" height="100px" src="{{asset('public/storage/media/outlet/table_img/'.$data->table_img)}}"/>
                                        </td>
                                        <td>{{ $data->table_name }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>
                                            @foreach ( $names as $key=>$name)
                                                @if ($data->outlet_id == $name->id )
                                                    {{ $name->outlet_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><?php $today=date("Y-m-d"); ?>  </td>
                                        <td>
                                            <a href="{{url('vendor/restaurant/booking_form')}}/{{$data->id}}"  class="btn btn-sm btn-outline-success">Book now</a>
{{--                                            @if($data->is_status_active==1)--}}
{{--                                                <a href="{{url('vendor/restaurant/table/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>--}}
{{--                                            @elseif($data->is_status_active==0)--}}
{{--                                                <a href="{{url('vendor/restaurant/table/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>--}}
{{--                                            @endif--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Table Name</th>
                                    <th>Price</th>
                                    <th>Outlet</th>
                                    <th>Available slots</th>
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
