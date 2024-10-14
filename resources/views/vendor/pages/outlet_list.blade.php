@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Manage Outlet')
@section('outlet_list', 'active')
@section('manage_outlet', 'menu-open')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Outlet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Manage outlet </li>
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
                            <div class="mb-2 addButton">
                                <a href="{{ url('vendor/restaurant/manage_outlet') }}" class="btn btn-success">Add
                                    Outlet</a>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>location</th>
                                        <th>Description</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $data)
                                        <tr>

                                            <td>
                                                <img width="100px" height="100px"src="{{ asset('public/storage/media/outlet/CoverImages/' . $data->outlet_cover_image) }}" />
                                            </td>
                                            <td>
                                                <img width="100px" height="100px"
                                                    src="{{ asset('public/storage/media/outlet/logo/' . $data->outlet_logo) }}" />
                                            </td>
                                            <td>{{ $data->outlet_name }} </td>
                                            <td>{{ $data->country }}</td>
                                            <td>{{ $data->outlet_city }}</td>
                                            <td>{{ $data->outlet_location }}</td>
                                            <td>{!! $data->outlet_description !!}</td>
                                            {{-- <td>
                                            @if ($data->is_status_active == 1)
                                                <a href="{{url('vendor/restaurant/outlet/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>
                                            @elseif($data->is_status_active==0)
                                                <a href="{{url('vendor/restaurant/outlet/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>
                                            @endif
                                        </td> --}}
                                            <td>
                                                <div class="row">

                                                    <div class="p-1">
                                                        <a href="{{ url('vendor/restaurant/manage_outlet') }}/{{ $data->id }}"
                                                            class="btn bg-gradient-info   btn-flat"> <i
                                                                class="fas fa-edit"></i> </a>
                                                    </div>
                                                    {{-- <div class="p-1">
                                                    <a href="{{url('vendor/restaurant/outlet/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                                </div> --}}
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>Image</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>location</th>
                                        <th>Description</th>
                                        {{-- <th>Status</th> --}}
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

@section('extra-js')



@endsection
