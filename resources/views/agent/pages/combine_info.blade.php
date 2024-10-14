@extends('agent.layouts.app')
@section('title', 'Restaurant Booking')
@section('booking_now', 'menu-open')
@section('restaurant_booking', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Booking Slots</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">All Slots </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Restaurant Booking Slots</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <!-- form start -->
                <div class="row">

                    <div class="col-md-12">
                        {{-- @php
                            dd($id);
                        @endphp --}}
                        <form action="{{ route('agent.restaurant.details') }}" method="post">
                            @csrf
                            <input type="hidden" name="agent_id" value="{{ session()->get('AGENT_ID') }}"
                                class="form-control">
                            <input type="hidden" name="outlet_id" value="{{ $id }}"
                                class="form-control">

                            <div class="card-body">
                                <div class="row">
                                    @php
                                        // dd();
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Selected Date</label>
                                            <input type="text" class="form-control" name="selectedDate" id="selectedDate"
                                                value="{{ session()->get('checkin_date') }}" readonly><br>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Available Slots</label>
                                        @foreach ($timeSlots as $timeSlot)
                                            <div class="form-check">
                                                <input class="form-check-input timeSlots" type="checkbox" id="slot"
                                                    name="time_slots[]" value="{{ $timeSlot->id }}">
                                                <label
                                                    class="form-check-label">{{ date('h:i:sa', strtotime($timeSlot->start_slot_time)) }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-md-4">
                                        <label>food Items</label>
                                        <br>
                                        @foreach ($mealItemsArray as $mealItem)
                                            <label for="">{{ $mealItem['category'] }}</label>

                                            @foreach ($mealItem['meal_item_list'] as $m)
                                                @php
                                                    //  dump($m)
                                                @endphp
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="meal_items[]"
                                                        value="{{ $m->id }}">
                                                    <label class="form-check-label">{{ $m->item_name }} -
                                                        {{ $m->item_price }} BDT</label>
                                                </div>
                                            @endforeach
                                        @endforeach

                                    </div>
                                    <div class="col-md-4">
                                        <label>Table Slots</label>
                                        <div class="avlaibleslots">
                                            No Table Availbe in this slot
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
@endsection


@section('extra-js')

    <script>
        //Date picker
        $('#dateForBooking').datetimepicker({
            format: 'L'
        });

        $('.timeSlots').on('change', function() {
            $('.timeSlots').not(this).prop('checked', false);
        })

        $(document).ready(function() {
            $('input[name="time_slots[]"]').on('change', function() {
                var dateT = $("#selectedDate").val();
                var timeslot = this.value;
                var text = dateT.split("/");
                var url = '{{ URL::to("/") }}';
                // console.log(text);

                $.get(url + "/agent/agent_restaurant_booking/find/getEmptyTables/" + text[0] + "/" + text[1] + "/" + text[2] + "/" + timeslot,
                    function(extra) {
                        var vDiv = ``;

                        for (let i = 0; i < extra.length; i++) {
                            vDiv = vDiv + `
                            <div class = "form-check" >
                    <input class = "form-check-input" type = "checkbox" name = "select_tables[]" value =`+extra[i].id+` >
                    <label class = "form-check-label" >`+extra[i].table_name+` - Capacity `+ extra[i].seat_capasity+` </label> </div >`;
                    }
                    $(".avlaibleslots").html(vDiv);

                    });



            });
        });
    </script>

@endsection
