@extends('agent.layouts.app')
@section('title', 'Available Hotels')
@section('booking', 'menu-open')
@section('hotel_booking', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Hotel booking</li>
                        <li class="breadcrumb-item active">Available Hotels</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="callout callout-info">
                <form method="get" action="{{ route('agent.SearchHotel') }}" class="form-horizontal">
                    @csrf
                    <div class="card-body mt-2">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-form-label">Destinaion City</label>
                                <input type="text" name="branch_city" value="{{ session()->get('branch_city') }}" autocomplete="off"  class="form-control typeahead" placeholder="Destinaion City" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-form-label">Check in</label>
                                <input type="text" id="checkIn" value="{{ session()->get('checkin_date') }}" name="checkin_date" class="form-control check_in" placeholder="Check In Date" autocomplete="off" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-form-label">Check out</label>

                                <input type="text" id="checkOut" value="{{ session()->get('checkout_date') }}" name="checkout_date" class="form-control check_out"  placeholder="Check Out Date" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputEmail3" class="col-form-label">Number of room</label>

                                <select class="form-control" name="no_of_room" id="membership-members" required="required">
                                    <?php
                                        $p_room = session()->get('no_of_room');
                                    ?>
                                    @foreach ($no_of_rooms as $no_of_room)
                                        @if($p_room==$no_of_room->no_of_rooms)
                                            <option selected value="{{ $no_of_room->no_of_rooms }} "> {{ $no_of_room->no_of_rooms }} </option>
                                        @else
                                            <option value="{{ $no_of_room->no_of_rooms }} "> {{ $no_of_room->no_of_rooms }} </option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row addMembers">
                        </div>


                        <div class="form-group row pt-2">
                           <button class="btn btn-info w-25 ml-2" >Modify Search</button>
                        </div>

                    </div>
                </form>
            </div>

            @if($result->isNotEmpty())

                <div class="row">
                    @foreach ($result as $data)
                        <div class="col-md-12 pb-3">
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-4 p-2">
                                        <a href="{{ url('agent/room_list') }}/{{ $data->id }}">
                                            <img src="{{ asset('/storage/media/branch/CoverImages/' . $data->branch_cover_image) }}"
                                                class="w-100" style="border-radius: 5px;" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col-md-8 p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="">
                                                    <span
                                                        style="color:#3FD0D4; border-style:solid; border-width: 1px; padding:5px;">
                                                        @foreach ($hotel_types as $types)
                                                            @if ($data->hotel_type == $types->id)
                                                                {{ $types->hotel_type }}
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>

                                                <div>
                                                    <?php $num = $data->number_of_stars; ?>
                                                    @for ($i = 0; $i < $num; $i++)
                                                        <i class="fas fa-star" style="font-size: 8px; color:#3FD0D4;"></i>
                                                    @endfor
                                                </div>
                                                <div>
                                                    <a href="{{ url('agent/room_list') }}/{{ $data->id }}">
                                                        @php
                                                            Session::put('hotel_id',  $data->id);
                                                        @endphp
                                                        <h5>{{ $data->branch_name }} </h5>
                                                    </a>
                                                </div>
                                                <span><i class="fas fa-map-marker-alt" style="color:#3FD0D4;"></i></span> <span>
                                                    {{ $data->branch_location }} </span>
                                                <div style="font-size:12px;">
                                                    @php
                                                        $near_by_place = json_decode($data->near_by_places);
                                                    @endphp
                                                    @if ($near_by_place->place1 != '')
                                                        <span class="mr-2 "><i style="color:#3FD0D4;"
                                                                class="fas fa-map-marker"></i></span> <span
                                                            class="pr-3"> {{ $near_by_place->place1 }}
                                                        </span>
                                                        <br>
                                                    @endif

                                                    @if ($near_by_place->place2 != '')
                                                        <span><i style="color:#3FD0D4;"
                                                                class="mr-2 fas fa-map-marker"></i></span> <span>
                                                            {{ $near_by_place->place2 }} </span>
                                                    @endif
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex flex-row-reverse">
                                                    <h5><span>BDT</span> <span style="padding-left: 10px;">220</span></h5>
                                                </div>
                                                <div class="d-flex flex-row-reverse">
                                                    <p class="text-secondary" style="font-size: 13px">For one night per room</p>
                                                </div>

                                                <div class="d-flex flex-row-reverse">
                                                    <a style="font-size: 13px;color:#3FD0D4;"
                                                        href="{{ url('agent/room_list') }}/{{ $data->id }}">*Additional
                                                        discount on selected payment method</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div style="overflow: hidden; max-height: 25px;">{!! $data->branch_description !!} </div>
                                        </div>
                                        <div class="row mt-2">
                                            @php
                                                $facilities = json_decode($data->branch_facilities);
                                            @endphp

                                            @if ($facilities->is_security_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-shield-alt"></i></span>
                                                    <span class="pl-2 ">Sercurity</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_wifi_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-wifi"></i></span>
                                                    <span class="pl-2 ">Wifi</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_parking_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-car"></i></span>
                                                    <span class="pl-2 ">Parking</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_dining_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-utensils"></i></span>
                                                    <span class="pl-2 ">Dining</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_breakfast_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-bread-slice"></i></span>
                                                    <span class="pl-2 ">Breakfast</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_pets_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-paw"></i></span>
                                                    <span class="pl-2 ">Pet</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_swimingpool_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-swimmer"></i></span>
                                                    <span class="pl-2 ">Swimming Pool</span>
                                                </div>
                                            @endif

                                            @if ($facilities->is_roomservice_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-door-open"></i></span>
                                                    <span class="pl-2 ">Room Service</span>
                                                </div>
                                            @endif

                                            @if ($facilities->is_disability_friendly_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-wheelchair"></i></span>
                                                    <span class="pl-2 ">Disability Friendly</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_aircondition_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-wind"></i></span>
                                                    <span class="pl-2 ">Air Condition</span>
                                                </div>
                                            @endif

                                            @if ($facilities->is_businessfacilities_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-business-time"></i></span>
                                                    <span class="pl-2 ">Business Facilities</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_fitnesscenter_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-dumbbell"></i></span>
                                                    <span class="pl-2 ">Fitness Center</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_restaurant_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-hotel"></i></span>
                                                    <span class="pl-2 ">Restaurant</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_outdooractivities_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-campground"></i></span>
                                                    <span class="pl-2 ">Outdoor Activities</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_airportshuttel_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-car"></i></span>
                                                    <span class="pl-2 ">Airport Shuttel</span>
                                                </div>
                                            @endif


                                            @if ($facilities->is_couplefriendly_active == 1)
                                                <div style="font-size:12px;" class="col-md-3 text-secondary">
                                                    <span><i class="fas fa-user-friends"></i></span>
                                                    <span class="pl-2 ">Couple Friendly</span>
                                                </div>
                                            @endif

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $result->links() !!}
                    </div>
                </div>

            @else
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Opps!</h5>
               No Data Found !!
              </div>
            @endif

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
                dateFormat: 'dd/mm/yy',
                onClose: function(selectedDate){
                    $('#checkOut').datepicker("option", "minDate", selectedDate);
                }
            });

            $("#checkOut").datepicker({
                showAnim: 'drop',
                numberOfMonth: 1,
                minDate: minDate,
                dateFormat: 'dd/mm/yy',
                onClose: function(selectedDate){
                    $('#checkIn').datepicker("option", "minDate", selectedDate);
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
        function displayVals() {
            var html = `
                        <div class="col-sm-6">
                            <label for="inputEmail3" class="col-form-label">Adults</label>
                            <?php
                                $p_adult = session()->get('no_of_adult');
                            ?>
                            <select class="form-control" name="no_of_adult[]">
                                @foreach ($adults as $adult)
                                    @if($p_adult==$adult->no_of_adult)
                                        <option selected value="{{ $adult->no_of_adult }} "> {{ $adult->no_of_adult }} </option>
                                    @else
                                        <option value="{{ $adult->no_of_adult }} "> {{ $adult->no_of_adult }} </option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputEmail3" class="col-form-label">Kids</label>
                            <?php
                                $p_kids = session()->get('no_of_kid');
                            ?>
                                <select class="form-control" name="no_of_kid[]">
                                @foreach ($kids as $kid)
                                    @if($p_kids==$kid->no_of_kids)
                                        <option selected value="{{ $kid->no_of_kids }} "> {{ $kid->no_of_kids }} </option>
                                    @else
                                        <option value="{{ $kid->no_of_kids }} "> {{ $kid->no_of_kids }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div> `;

            fhtml = ``;

            var ProjectValues = $("#membership-members").val();

            for (let i = 0; i < ProjectValues; i++) {
                fhtml = fhtml + html;
            }
            $(".addMembers").html(fhtml);
        }

        $("select").change(displayVals);
        displayVals();
    </script>


@endsection
