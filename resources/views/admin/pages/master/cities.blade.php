@extends('admin.layouts.app')
@section('title', 'Cities')
@section('master', 'menu-open')
@section('cities', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    <a class="btn btn-primary" href="{{ url('admin/manage_city') }}">Add City </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Master </li>
                        <li class="breadcrumb-item active">Cities</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="callout callout-info">
                <h5 class="text-bold pb-4 ">Profile Info</h5>


            </div> --}}
            {{-- <div class="row mb-3">
                <div class="col-md-3">
                    <a class="btn btn-success w-100" href="{{ url('admin/manage_city') }}">Add City </a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>City Name</th>
                                    <th>City Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->city_name }}</td>
                                        <td>{{ $data->city_code }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="p-1">
                                                    <a href="{{url('admin/manage_city')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="p-1">
                                                    <a href="{{url('admin/city/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>City Name</th>
                                    <th>City Code</th>
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
        </div><!-- /.container-fluid -->
    </section>
@endsection
