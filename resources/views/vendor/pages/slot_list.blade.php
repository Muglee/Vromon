@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Slot List')
@section('slot_list', 'active')
@section('manage_slot', 'menu-open')

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
                        <li class="breadcrumb-item active">Manage Slot </li>
                        <li class="breadcrumb-item active">Slot List </li>
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
                                    <th>Starting Time</th>
                                    <th>Ending Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $key=>$data)
                                <?php
                                    $start_time = date('h:i A', strtotime($data->start_slot_time));
                                    $end_time = date('h:i A', strtotime($data->end_slot_time));
                                ?>
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                           {{$start_time}}
                                        </td>
                                        <td>
                                            {{$end_time}}
                                         </td>
                                         <td>
                                            @if($data->is_status_active==1)
                                                <a href="{{url('vendor/restaurant/time_slot/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>
                                            @elseif($data->is_status_active==0)
                                                <a href="{{url('vendor/restaurant/time_slot/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>
                                            @endif
                                         </td>
                                        <td>
                                            <span class="p-1">
                                                <a href="{{url('vendor/restaurant/manage_slot')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                            </span>
                                            <span class="p-1">
                                                <a href="{{url('vendor/restaurant/slot/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Starting Time</th>
                                    <th>Ending Time</th>
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
