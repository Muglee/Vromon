@extends('dashboards.restaurant_reservation.layouts.app')

@if($id>0)
    @section('title', 'Update Table')
@else
    @section('title', 'Create Table')
@endif

@if($id>0)
    @section('manage_table', 'menu-open')
@else
    @section('create_table', 'active')
@section('manage_table', 'menu-open')
@endif

@section('content')
    @if($id>0)
        <?php $image_required=" "; ?>
    @else
        <?php $image_required="required"; ?>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($id>0)
                        <h1 class="m-0">Update Table</h1>
                    @else
                        <h1 class="m-0">Create Table</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/restaurant/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Table </li>
                        @if ($id>0)
                            <li class="breadcrumb-item active">Update Table </li>
                        @else
                            <li class="breadcrumb-item active">Create Table </li>
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
                    <h3 class="card-title">Table Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{route('table.ManageTableProcess')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Outlet Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="outlet_id" class="form-control select2"  style="width: 100%;" required="required">
                                                <option> Select one</option>
                                                @foreach($names as $key=>$name)
                                                    @if($outlet_id==$name->id)
                                                        <option selected value="{{ $name->id}}"> {{ $name->outlet_name}}</option>
                                                    @else
                                                        <option value="{{ $name->id }}"> {{ $name->outlet_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Table Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="table_name" value="{{ $table_name }}"  class="form-control"  placeholder="Enter Table Name" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group pt-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="table_img"  class="custom-file-input"  accept="image/*" onchange="loadFile(event)" >
                                                <label class="custom-file-label" for="">Choose an image</label>

                                                @error('table_img')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @if($table_img!='')
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="table_img" src="{{asset('public/storage/media/outlet/table_img/'.$table_img)}}"/>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="table_img" src="{{ asset('public/dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Seat Capacity</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="seat_capasity" value="{{ $seat_capasity }}"  class="form-control"  placeholder="Enter Seat Capacity" required >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
    <script>
        var loadFile = function(event) {
            var table_img = document.getElementById('table_img');
            table_img.src = URL.createObjectURL(event.target.files[0]);
            table_img.onload = function() {
                URL.revokeObjectURL(table_img.src) // free memory
            }
        };
    </script>
@endsection
