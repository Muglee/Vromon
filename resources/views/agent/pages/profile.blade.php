@extends('agent.layouts.app')
@section('title', 'Profile')
@section('settings', 'menu-open')
@section('profile', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings </li>
                        <li class="breadcrumb-item active">Profile</li>
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
                <h5 class="text-bold pb-4 ">Profile Info</h5>
                @foreach ($result as $data )
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p>Agent Name:</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{$data->agent_name}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p>Company Name:</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{$data->company_name}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p>Phone:</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{$data->agent_phone_no}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p>Gmail:</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{$data->agent_email}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p>Address:</p>
                    </div>
                    <div class="col-md-9">
                        <p>{{$data->agent_address}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <p >Logo:</p>
                    </div>
                    <div class="col-md-9">
                        @if($data->logo!='')
                        <div class="mt-3" >
                            <img width="100px" height="100px" id="img" src="{{asset('storage/media/agent/company_logo/'.$data->logo)}}"/>
                        </div>
                        @else
                            <div class="mt-3" >
                                <img width="100px" height="100px" id="img" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach


                <div class="mt-4">
                    {{-- <a href="" class="btn btn-sm btn-outline-info btn-flat">Update</a> --}}
                    <a type="button" style="text-decoration: none" href="{{url('agent/update_profile')}}/{{$data->id}}" class="btn btn-sm btn-outline-info btn-flat">Update</a>
                </div>

            </div>

            <div class="callout callout-info">
                <h5 class="text-bold pb-4">Change Password</h5>
                <form action="{{route('agent.ChangePassword')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-4">Current Paassword:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="current_password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-4">New Paassword:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="new_password" required>
                            <div class="input-group">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-4">Confirm Paassword:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="confirm_password" required>
                            <div class="input-group">
                                @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        {{-- <a href="" class="btn btn-sm btn-outline-info btn-flat">Update</a> --}}
                        <button type="submit" class="btn btn-sm btn-outline-info btn-flat">Confirm Change</button>
                    </div>
                </form>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
