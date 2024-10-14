@extends('admin.layouts.app')
@section('title', 'Source')
@section('settings', 'menu-open')
@section('source', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    <a class="btn btn-primary" href="{{ url('admin/manage_source') }}">Add Source </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Settings </li>
                        <li class="breadcrumb-item active">Source</li>
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
                                        <th>#</th>
                                        <th>Source Name</th>
                                        <th>Source Description</th>
                                        <th>Wallet Status</th>
                                        <th>Last Update</th>
                                        <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->source_name }}</td>
                                        <td>{!! $data->description !!}</td>
                                        <td>
                                            @if($data->is_status_active==1)
                                                <a href="{{url('admin/source/status/0')}}/{{$data->id}}" class="badge bg-success"> Enabled</a>
                                            @elseif($data->is_status_active==0)
                                                <a href="{{url('admin/source/status/1')}}/{{$data->id}}" class="badge bg-danger">Disabled</a>
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="p-1">
                                                    <a href="{{url('admin/manage_source')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="p-1">
                                                    <a href="{{url('admin/source/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Source Name</th>
                                    <th>Source Description</th>
                                    <th>Wallet Status</th>
                                    <th>Last Update</th>
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