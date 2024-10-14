@extends('dashboards.restaurant_reservation.layouts.app')

@if($id>0)
    @section('title', 'Update Slot')
@else
    @section('title', 'Create Slot')
@endif

@if($id>0)
    @section('manage_slot', 'menu-open')
@else
    @section('create_slot', 'active')
    @section('manage_slot', 'menu-open')
@endif

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($id>0)
                        <h1 class="m-0">Update Slot</h1>
                    @else
                        <h1 class="m-0">Create Slot</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/restaurant/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Slot </li>
                        @if ($id>0)
                            <li class="breadcrumb-item active">Update Slot </li>
                        @else
                            <li class="breadcrumb-item active">Create Slot </li>
                        @endif

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

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Slot Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{route('slot.ManageSlotProcess')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Start Slot </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="time" name="start_slot_time" value="{{$start_slot_time}}"  class="form-control"  placeholder="Enter Slot " required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">End Slot </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="time" name="end_slot_time" value="{{$end_slot_time}}"  class="form-control"  placeholder="Enter Slot " required >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
@endsection
