@extends('admin.layouts.app')
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
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings </li>
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
                <form action="{{route('admin.UpdateProfile')}}" method="post">
                    @csrf
                    @foreach ($profile_data as $info )
                    <input class="form-control" name="id" value="{{ $info->id }}" type="hidden">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Name:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="name" value="{{ $info->name }}" type="text" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p>Phone:</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="phone_number" value="{{ $info->phone_number }}" type="text" required>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4">
                        <button type="submit" style="text-decoration: none" class="btn btn-sm btn-outline-info btn-flat">Confirm</a>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
