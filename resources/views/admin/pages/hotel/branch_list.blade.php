@extends('admin.layouts.app')
@section('title', 'Branch List')
@section('branch_list', 'active')
@section('manage_branch', 'menu-open')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Branch List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item ">Manage Branch </li>
                        <li class="breadcrumb-item active">Branch List </li>
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
                                    <th>Branch Name</th>
                                    <th>Cover Image</th>
                                    <th>Branch Logo</th>
                                    <th> Location </th>
                                    <th>Hotel Type</th>
                                    <th> Active Status </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $data)
                                <tr>
                                    <td>{{$data->branch_name}}</td>
                                    <td>
                                        @if($data->branch_cover_image!='')
                                            <img width="100px" height="100px" src="{{asset('/storage/media/branch/CoverImages/'.$data->branch_cover_image)}}"/>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->branch_logo!='')
                                            <img width="100px" height="100px" src="{{asset('/storage/media/branch/logo/'.$data->branch_logo)}}"/>
                                        @endif
                                    </td>
                                    <td>{{$data->branch_location}}</td>
                                    <td>
                                    {{-- @for ($i = 1; $i < $data->hotel_type; $i++)--}}
                                    {{--<i class="fas fa-star text-info" style="font-size: 10px"></i>--}}
                                    {{--@endfor--}}
                                        @foreach($hotel_types as $types)
                                        {{-- {{ dd($hotel_types) }} --}}
                                            @if($data->hotel_type == $types->id)
                                                {{$types->hotel_type}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($data->is_status_active==1)
                                        {{-- {{ dd($data) }} --}}
                                            <a href="{{url('admin/hotel/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>
                                        @elseif($data->is_status_active==0)
                                            <a href="{{url('admin/hotel/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{route('admin.BranchView')}} --}}
                                        <a href="{{url('admin/hotel/branch_view')}}/{{$data->id}}" class="btn bg-gradient-secondary btn-flat"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('admin/hotel/manage_branch')}}/{{$data->id}}" class="btn bg-gradient-info btn-flat"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/hotel/branch/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Cover Image</th>
                                    <th>Branch Logo</th>
                                    <th>Location</th>
                                    <th>Hotel Type</th>
                                    <th>Active Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
