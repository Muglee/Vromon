@extends('dashboards.restaurant_reservation.layouts.app')
@if($id>0)
    @section('title', 'Update Outlet')
@else
    @section('title', 'Create Outlet')
@endif

@if($id>0)
    @section('manage_outlet', 'menu-open')
@else
    @section('manage_outlet', 'menu-open')
    @section('create_outlet', 'active')
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
                        <h1 class="m-0">Update Outlet</h1>
                    @else
                        <h1 class="m-0">Create Outlet</h1>
                    @endif

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/restaurant/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item ">Manage Outlet </li>
                        @if ($id>0)
                            <li class="breadcrumb-item active">Update Outlet</li>
                        @else
                            <li class="breadcrumb-item active">Create Outlet</li>
                        @endif

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Outlet Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{route('outlet.ManageOutletProcess')}}" method="post" enctype="multipart/form-data">
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
                                            <input type="text" name="outlet_name" value="{{$outlet_name}}" class="form-control"  placeholder="Enter Outlet Name" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Country</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$country}}" name="country" class="form-control"  placeholder="Enter Country Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">City</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$outlet_city}}" name="outlet_city" class="form-control"  placeholder="Enter City Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Outlet Location / Address</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$outlet_location}}" name="outlet_location" class="form-control"  placeholder="Enter Outlet Location / Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pt-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Outlet Logo</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="outlet_logo" value="{{$outlet_logo}}" class="custom-file-input" {{$image_required}} accept="image/*" onchange="loadFile(event)">
                                                <label class="custom-file-label" for="">Choose a logo</label>
                                            </div>
                                            @if($outlet_logo!='')
                                                <div class="mt-3" >
                                                    <a href="{{asset('/public/storage/media/outlet/logo/'.$outlet_logo)}}" target="_blank"><img id="logo" width="100px" height="100px;" src="{{asset('/public/storage/media/outlet/logo/'.$outlet_logo)}}"/></a>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="logo" src="{{ asset('public/dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Cover Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input name="outlet_cover_image" value="$outlet_cover_image" type="file" class="custom-file-input" {{$image_required}} accept="image/*" onchange="loadCover(event)">
                                                <label class="custom-file-label" for="">Choose a cover image</label>
                                            </div>
                                            @if($outlet_cover_image!='')
                                                <div class="mt-3" >
                                                    <a href="{{asset('/public/storage/media/outlet/CoverImages/'.$outlet_cover_image)}}" target="_blank"><img id="cover" width="100px" height="100px;" src="{{asset('/public/storage/media/outlet/CoverImages/'.$outlet_cover_image)}}"/></a>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="cover" src="{{ asset('public/dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="outlet_description" id="outlet_description" class="form-control" required="required" >{!! $outlet_description !!}</textarea>
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
        <script>
            CKEDITOR.replace('outlet_description');

            var loadFile = function(event) {
                var logo = document.getElementById('logo');
                logo.src = URL.createObjectURL(event.target.files[0]);
                logo.onload = function() {
                    URL.revokeObjectURL(logo.src) // free memory
                }
            };
            var loadCover = function(event) {
                var cover = document.getElementById('cover');
                cover.src = URL.createObjectURL(event.target.files[0]);
                cover.onload = function() {
                    URL.revokeObjectURL(cover.src) // free memory
                }
            };

        </script>
    </section>
@endsection
