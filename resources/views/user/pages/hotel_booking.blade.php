@extends('web.layouts.app')
@section('title', 'Hotel Booking')
@section('booking', 'menu-open')
@section('hotel_booking', 'active')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-8">Hotel Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active"><a href="{{ url('user/hotel_booking') }}">Hotel booking</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
            <div class="callout callout-info">
                <form method="get" action="{{ route('user.SearchHotel') }}" class="form-horizontal">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-form-label">Destinaion City</label>
                                <input type="text" name="branch_city" autocomplete="off"  class="form-control typeahead" placeholder="Destinaion City" required>
                            </div>

                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-form-label">Check In</label>
                                {{-- <input type="date" id="date_picker" value="$today" name="checkin_date" class="form-control check_in" placeholder="Check in" required> --}}

                                <input type="text" id="checkIn" name="checkin_date" class="form-control check_in" placeholder="Check In Date" autocomplete="off" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputEmail3" class=" col-form-label">Check Out</label>
                                {{-- <input type="date" id="auto_date_picker" name="checkout_date" class="form-control check_out"  placeholder="Check out" required> --}}
                                <input type="text" id="checkOut" name="checkout_date" class="form-control check_out"  placeholder="Check Out Date" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputEmail3" class="col-form-label">Number of room</label>

                                <select class="form-control" name="no_of_room" id="membership-members">
                                    @foreach ($no_of_rooms as $no_of_room)
                                        <option value=" {{ $no_of_room->no_of_rooms }} "> {{ $no_of_room->no_of_rooms }} </option>
                                    @endforeach
                                </select>
                            </div>
                          
                        </div>

                        <div class="form-group row addMembers">
                            
                        </div>

                        <div class="form-group row pt-2">
                           <button class="btn btn-info w-25 ml-2" >Search Hotel</button>
                        </div>

                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    

    {{-- for disable previous date --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function(){
             $('.check_out').attr('disabled', true);

            var minDate = new Date();

            $("#checkIn").datepicker({
                showAnim: 'drop',
                numberOfMonth: 1,
                minDate: minDate,
                onClose: function(selectedDate){
                    $('#checkOut').datepicker("option", "minDate", selectedDate);
                }
            });

            $("#checkOut").datepicker({
                showAnim: 'drop',
                numberOfMonth: 1,
                onClose: function(selectedDate){
                    $('#checkIn').datepicker("option", selectedDate);
                }
            });

            

            $(function() {
                $(".check_in").on("change",function(){
                   
                    var selected = $(this).val();
                    if ( selected == '') {
                        $('.check_out').attr('disable', true);
                    }else{
                        $('.check_out').attr('disabled', false);
                    }
                });
            });
        });   
    </script>


    <script>
        $(document).ready(function(){
        
        function displayVals() {
            var html = `<div class="col-sm-6">
                            <label for="inputEmail3" class=" col-form-label">Adults</label>
                            <select class="form-control" name="no_of_adult[]" id="count_adults">
                                @foreach ($adults as $adult)
                                    <option  value="{{ $adult->no_of_adult }}"> {{ $adult->no_of_adult }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputEmail3" class=" col-form-label">Kids</label>
                            <select class="form-control" name="no_of_kid[]" id="count_kidss">
                                @foreach ($kids as $kid)
                                    <option value="{{ $kid->no_of_kids }}"> {{ $kid->no_of_kids }} </option>
                                @endforeach
                            </select>
                        </div>`;

            fhtml = ``;
          
            var ProjectValues = $("#membership-members").val();

         
            for (let i = 0; i < ProjectValues; i++) {
            
                fhtml = fhtml + html;

            }

            $(".addMembers").html(fhtml);
           
        }

        $("select").change(displayVals);
        displayVals();
        
    });
   
    </script>
    
@endsection
