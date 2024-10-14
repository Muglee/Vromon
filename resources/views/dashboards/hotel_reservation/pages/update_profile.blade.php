@extends('dashboards.hotel_reservation.layouts.app')
@section('title', 'Update Profile')
@section('settings', 'menu-open')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/hotel/dashboard') }}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="callout callout-info">
                <h5 class="mb-4">Profile Info</h5>

                <form action="{{route('vendor.UpdateProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($profile_data as $info )
                    <input class="form-control" name="id" value="{{ $info->id }}" type="hidden">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>vendor Name:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="vendor_name" value="{{ $info->vendor_name }}" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Company Name:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="vendor_company_name" value="{{ $info->vendor_company_name }}" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Phone:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="vendor_phone_no" value="{{ $info->vendor_phone_no }}" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Email:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="vendor_email" value="{{ $info->vendor_email }}" type="text" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Address:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="vendor_address" value="{{ $info->vendor_address }}" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{--  <div class="col-md-3">
                            <p >Logo:</p>
                        </div>  --}}
                        {{--  <div class="col-md-4">
                            <div class="custom-file">
                                <input type="file" name="logo"  class="custom-file-input" value="{{ $info->logo }}" accept="image/*" onchange="loadFile(event)" >
                                <label class="custom-file-label" for="">Choose a logo</label>
                                @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if($info->logo!='')
                            <div class="mt-3" >
                                <img width="100px" height="100px" id="img" src="{{asset('storage/media/vendor/company_logo/'.$info->logo)}}"/>
                            </div>
                            @else
                                <div class="mt-3" >
                                    <img width="100px" height="100px" id="img" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                                </div>
                            @endif
                        </div>  --}}
                    </div>
                    @endforeach

                    <div class="mt-4">
                        <button type="submit" style="text-decoration: none" class="btn btn-sm btn-outline-info btn-flat">Confirm</a>
                    </div>
                </form>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <script>
        var loadFile = function(event)
        {
            var img = document.getElementById('img');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.onload = function() {
                URL.revokeObjectURL(img.src) // free memory
            }
        };
    </script>
@endsection
