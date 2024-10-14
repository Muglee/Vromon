@extends('agent.layouts.app')
@section('title', 'Restaurant Booking')
@section('booking_now', 'menu-open')
@section('restaurant_booking', 'active')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Bookings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        @php
            // dd($restaurantLists);
        @endphp
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
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Slot</th>
                                        <th>Meal Items</th>
                                        <th>Table Details</th>
                                        <th>Booking Status</th>
                                        <th>User Info</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $key = 1;
                                    @endphp
                                    @foreach ($restaurantLists as $restaurantList)

                                  
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $restaurantList['checking_date'] }}</td>
                                            <td>
                                                @if (count($restaurantList['slot_time']) != null)
                                                    @foreach ($restaurantList['slot_time'] as $item)
                                                        {{ date('h:i:sa', strtotime($item)) }}
                                                        <br>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td>
                                                {{-- @foreach ($restaurantList['item_name'] as $item)
                                                    {{ $item }}
                                                    <br>
                                                @endforeach --}}
                                            </td>

                                            <td>
                                                @foreach ($restaurantList['selected_table_name'] as $item)
                                                    {{ $item }}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($restaurantList['is_booked'] == 1)
                                                    <button class="badge bg-success"> Activated</button>
                                                @else
                                                    <button class="badge bg-danger"> Deactivated</button>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $restaurantList['first_name'] }} {{ $restaurantList['last_name'] }}
                                                <br>
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                                {{ $restaurantList['phone_no'] }}<br>
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                {{ $restaurantList['email'] }}
                                            </td>
                                            <td>
                                                <div class="p-1">
                                                    <a onclick="return confirm('Are you sure you want to delete booking schedule?')"
                                                        href="{{ route('agent.restaurant.booking.delete', $restaurantList['id']) }}"
                                                        class="btn bg-gradient-danger btn-flat"> <i
                                                            class="far fa-trash-alt"></i></a>

                                                            <a onclick="return confirm('Are you sure you want to Edit booking schedule?')"
                                                        href="{{ route('agent.restaurant.booking.edit', $restaurantList['id']) }}"
                                                        class="btn bg-gradient-primary btn-flat"> <i
                                                            class="far fa-trash-alt"></i></a>                                                         
                                                </div>
                                            </td>
                                            {{-- <td>{{ $data->item_price }}</td> --}}
                                        </tr>
                                        @php
                                            $key++;

                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Slot</th>
                                        <th>Meal Items</th>
                                        <th>Table Details</th>
                                        <th>Booking Status</th>
                                        <th>User Info</th>
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

    <script>
        window.onload = function() {
            if (typeof history.pushState === "function") {
                history.pushState("jibberish", null, null);
                window.onpopstate = function() {
                    history.pushState('newjibberish', null, null);
                };
            } else {
                var ignoreHashChange = true;
                window.onhashchange = function() {
                    if (!ignoreHashChange) {
                        ignoreHashChange = true;
                        window.location.hash = Math.random();
                    } else {
                        ignoreHashChange = false;
                    }
                };
            }
        };
    </script>

@endsection
