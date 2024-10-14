@extends('admin.layouts.app')
@section('title', 'Hotel Commission')
@section('commission', 'menu-open')
@section('hotel_commission', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    {{-- <a class="btn btn-primary" href="{{ url('admin/manage_hotel_commission') }}">Add Bank </a> --}}
                </div><!-- /.col -->
                <div class="col-sm-10">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Master </li>
                        <li class="breadcrumb-item active">Hotel Commission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Offer </th>
                                    <th>Public</th>
                                    <th>Domestic</th>
                                    <th>International</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package_name as $data)
                                    <tr>
                                        <td>{{ $data->package_name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td>
                                            <div class="row">
                                                <div class="p-1">
                                                    <a href="{{url('admin/manage_bank')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Offer </th>
                                    <th>Public</th>
                                    <th>Domestic</th>
                                    <th>International</th>
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
