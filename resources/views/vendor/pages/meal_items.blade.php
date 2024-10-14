@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Meal Items')
@section('food_menu', 'menu-open')
@section('meals', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    <a class="btn btn-primary" href="{{ url('vendor/restaurant/manage_meal_items') }}">Add New Item </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Food Menu </li>
                        <li class="breadcrumb-item active">Meal Items</li>
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
                                    <th> # </th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price per unit</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key=> $data )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img width="100px" height="100px" src="{{asset('public/storage/media/food_item_image/'.$data->item_image)}}"/>
                                        </td>
                                        <td>{{ $data->item_name }}</td>
                                        <td>{{ $data->item_price }}</td>
                                        <td>{!! $data->item_description !!}</td>
                                        <td>
                                            @foreach($categories as $key => $category)
                                                @if($category->id == $data->food_category_id)
                                                    {{ $category->category_name }}
                                                @endif 
                                            @endforeach

                                        </td>
                                        <td>
                                            @if($data->is_status_active==1)
                                                <a href="{{url('vendor/restaurant/meal_items/status/0')}}/{{$data->id}}" class="badge bg-success"> Activated</a>
                                            @elseif($data->is_status_active==0)
                                                <a href="{{url('vendor/restaurant/meal_items/status/1')}}/{{$data->id}}" class="badge bg-danger">Deactivated</a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="p-1">
                                                    <a href="{{url('vendor/restaurant/manage_meal_items')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="p-1">
                                                    <a href="{{url('vendor/restaurant/meal_items/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th> # </th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price per unit</th>
                                    <th>Description</th>
                                    <th>category</th>
                                    <th>Status</th>
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
