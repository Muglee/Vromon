@extends('admin.layouts.app')
@section('title', 'hotel List')
@section('hotel_list', 'active')
@section('manage_hotel', 'menu-open')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hotel List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/vromoon-update/admin/tour/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Hotel </li>
                    <li class="breadcrumb-item active">Available Hotel </li>
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
                                <th>Hotel Name</th>
                                <th>Action</th>
                                {{-- $single_package->amount                                --}}
                            </tr>
                         </thead>
                            @foreach ($hotel as $single_hotel)
                            <tr>
                                <td>{{ $single_hotel->image }}</td>
                                <td>{{ $single_hotel->destination_country }}</td>
                                <td>{{ $single_hotel->hotel_rating }}</td>
                                <td>{{ $single_hotel->hotel_name }}</td>
                                <td><a href="{{ route('create.hotel.edit',$single_hotel->id) }}" class="btn bg-gradient-info   btn-flat" >Edit</a></td>
                                <td><a href="{{ route('hotel.list.delete',$single_hotel->id) }}" class="btn bg-gradient-danger btn-flat" >Delete</a></td>
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
                                <th>Hotel Name</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
    </section>
@endsection
