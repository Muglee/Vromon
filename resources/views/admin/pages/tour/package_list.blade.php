@extends('admin.layouts.app')
@section('title', 'tour List')
@section('tour_list', 'active')
@section('manage_tour', 'menu-open')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tour List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/vromoon-update/admin/tour/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Tour </li>
                    <li class="breadcrumb-item active">Available Tour </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content pt-2">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>Image</th>
                                <th>Country</th>
                                <th>Tour Length</th>
                                <th>Package Name</th>
                                <th>Starting Point</th>
                                <th>End Point</th>
                                <th>Amount</th>
                                <th>Action</th>
                                {{-- $single_package->amount                                --}}
                            </tr>
                         </thead>
                            @foreach ($package as $single_package)
                            <tr>
                                <td>{{ $single_package->image }}</td>
                                <td>{{ $single_package->destination_country }}</td>
                                <td>{{ $single_package->tour_length }}</td>
                                <td>{{ $single_package->package_name }}</td>
                                <td>{{ $single_package->starting_point }}</td>
                                <td>{{ $single_package->end_point }}</td>
                                <td>{{ $single_package->amount }}</td>
                                <td><a href="{{ route('create.package.edit',$single_package->id) }}" class="btn bg-gradient-info   btn-flat" >Edit</a></td>
                                <td><a href="{{ route('package.list.delete',$single_package->id) }}" class="btn bg-gradient-danger btn-flat" >Delete</a></td>
                            </tr>
                                
                            @endforeach
                            {{-- {{route('admin/tour/create_package')}}/{{$data->id}} --}}

                            {{-- <td>
                                <div class="row">
                                    <div class="p-1">
                                        <a href="" class="btn bg-gradient-info   btn-flat"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="p-1">
                                        <a href="#" class="btn bg-gradient-danger btn-flat"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td> --}}
                            
                            <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Country</th>
                                <th>Tour Length</th>
                                <th>Package Name</th>
                                <th>Starting Point</th>
                                <th>End Point</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
    </section>
@endsection
