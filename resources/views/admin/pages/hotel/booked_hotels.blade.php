@extends('admin.layouts.app')
@section('title', 'Booking Success')
@section('content')
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
                <div class="card">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Came Form</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Nid Number</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Reason</th>
                                <th>Paid Amount</th>
                                <th>Room Id</th>
                                <th>Vendor Id</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($all_hotel as $item)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->came_form}}</td>
                                    <td>{{$item->check_in}}</td>
                                    <td>{{$item->check_out}}</td>
                                    <td>{{$item->nid_number}}</td>
                                    <td>{{$item->phone_number}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->reason}}</td>
                                    <td>{{$item->paid_amount}}</td>
                                    <td>{{$item->room_id}}</td>
                                    <td>{{ $item->vendor_id}}</td>
                                    <td>
                                    <a href="{{route('hotel_delete',$item->id)}}" class="btn btn-danger">delete</a>
                                    </td>
                                </tbody>
                            @endforeach
                            <tfoot>
                            </tfoot>
                        </table>
                    <!-- /.card-body -->
                </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection