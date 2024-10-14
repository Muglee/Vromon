@extends('web.layouts.app')
@section('title', 'Room List')
@section('booking', 'menu-open')
@section('hotel_booking', 'active')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-2">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Hotel booking</li>
                        <li class="breadcrumb-item active">Available Hotels</li>
                        <li class="breadcrumb-item active">Room List</li>
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
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img src="{{ asset('/storage/media/branch/CoverImages/' . $branch_details->branch_cover_image) }}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        {{-- <div class="product-image-thumb active"><img src="{{asset('storage/media/branch/CoverImages/'.$branch_details->branch_cover_image)}}"></div>
                        <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$branch_details->branch_cover_image)}}"></div>
                        <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$branch_details->branch_cover_image)}}"></div>
                        <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$branch_details->branch_cover_image)}}"></div>
                        <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$branch_details->branch_cover_image)}}"></div> --}}
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('/storage/media/branch/logo/' . $branch_details->branch_logo) }}"
                                class="product-image" alt="logo">
                        </div>
                        <div class="col-md-10">
                            <h3 class="my-3">{{ $branch_details->branch_name }}</h3>
                            <?php $num = $branch_details->number_of_stars; ?>
                            @for ($i = 0; $i < $num; $i++)
                                <i class="fas fa-star text-info" style="font-size: 10px"></i>
                            @endfor
                        </div>
                    </div>


                    {{-- <span><i class="fas fa-star"></i></span> --}}

                    <p>{!! $branch_details->branch_description !!}</p>
                    <hr>
                    <span><i class="mr-2 text-info fas fa-map-marker-alt"></i></span> <span>
                        {{ $branch_details->branch_location }} </span> <br>
                    @php
                        $near_by_place = json_decode($branch_details->near_by_places);
                    @endphp
                    @if($near_by_place->place1!='')
                    <span style='font-size:12px;' class="mr-2 "><i
                        class=" text-info fas fa-map-marker"></i></span> <span class="pr-3"> {{ $near_by_place->place1 }}
                    </span>
                    @endif
                    @if($near_by_place->place2!='')
                    <span style='font-size:12px;'><i class="mr-2 text-info fas fa-map-marker"></i></span> <span>
                        {{ $near_by_place->place2 }} </span>
                    @endif
                    <hr>
                    @php
                        $facilities = json_decode($branch_details->branch_facilities);
                    @endphp

                    <h4>Fasilities</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-shield-alt"></i></span>
                            <span class=" pl-2 ">Sercurity</span>
                            @if ($facilities->is_security_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-wifi"></i></span>
                            <span class=" pl-2 ">Wifi</span>
                            @if ($facilities->is_wifi_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-car"></i></span>
                            <span class=" pl-2 ">Parking</span>
                            @if ($facilities->is_parking_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-utensils"></i></span>
                            <span class=" pl-2 ">Dining</span>
                            @if ($facilities->is_dining_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-bread-slice"></i></span>
                            <span class=" pl-2 ">Breakfast</span>
                            @if ($facilities->is_breakfast_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-paw"></i></span>
                            <span class=" pl-2 ">Pet</span>
                            @if ($facilities->is_pets_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-swimmer"></i></span>
                            <span class=" pl-2 ">Swimming Pool</span>
                            @if ($facilities->is_swimingpool_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-door-open"></i></span>
                            <span class=" pl-2 ">Room Service</span>
                            @if ($facilities->is_roomservice_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-wheelchair"></i></span>
                            <span class=" pl-2 ">Disability Friendly</span>
                            @if ($facilities->is_disability_friendly_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-wind"></i></span>
                            <span class=" pl-2 ">Air Condition</span>
                            @if ($facilities->is_aircondition_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-business-time"></i></span>
                            <span class=" pl-2 ">Business Facilities</span>
                            @if ($facilities->is_businessfacilities_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-dumbbell"></i></span>
                            <span class=" pl-2 ">Fitness Center</span>
                            @if ($facilities->is_fitnesscenter_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-hotel"></i></span>
                            <span class=" pl-2 ">Restaurant</span>
                            @if ($facilities->is_restaurant_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-campground"></i></span>
                            <span class=" pl-2 ">Outdoor Activities</span>
                            @if ($facilities->is_outdooractivities_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-car"></i></span>
                            <span class=" pl-2 ">Airport Shuttel</span>
                            @if ($facilities->is_airportshuttel_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span><i class=" text-info fas fa-user-friends"></i></span>
                            <span class=" pl-2 ">Couple Friendly</span>
                            @if ($facilities->is_couplefriendly_active == 1)
                                <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                            @else
                                <span class=" pl-2 text-danger"><i class="fas fa-times"></i></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 p-4">
                        <h4>House Rules</h4>
                        <p class="text-justify">{!! $branch_details->branch_house_rules !!}</p>
                    </div>
                    <div class="col-md-6 p-4">
                        <h4>Policy</h4>
                        <p class="text-justify ">{!! $branch_details->branch_policy !!}</p>
                    </div>
                </div>
            </div>

            <hr>
            <h4>Available Rooms</h4>
            <hr>
            <div class="row">
                @foreach ($rooms as $key => $data)

                    <div class="col-12">
                        <div class="card">
                            <div class="row p-2">
                                <div class="col-md-3">
                                    <img width="100%"

                                        src="{{ asset('/storage/media/branch/rooms/' . $data->room_image) }}" />
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <h4 class="pl-1">
                                            @foreach ($room_types as $type)
                                                @if ($data->room_type == $type->room_type_id)
                                                    {{ $type->room_type }}
                                                @endif
                                            @endforeach
                                        </h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="text-secondary">
                                                @php
                                                    $bed_distribution = json_decode($data->bed_distribution);
                                                @endphp
                                                <span class="mr-2">King size bed </span><span
                                                    class="mr-2 text-bold">{{ $bed_distribution->no_of_double_bed }}</span><span
                                                    class="mr-2">Double Bed </span><span
                                                    class="mr-2 text-bold">{{ $bed_distribution->no_of_single_bed }}</span><span
                                                    class="mr-2">Single Bed </span><span
                                                    class="mr-2 text-bold">{{ $bed_distribution->no_of_single_bed }}</span>
                                            </div>
                                            <div class="text-secondary">
                                                {{-- <h5 mt-2>Facilities</h5> --}}
                                                @php
                                                    $facilities = json_decode($data->room_facilities);
                                                @endphp
                                                <span class="pt-2"><i class="fas fa-house-damage"></i></span>
                                                <span>Facilities</span><br>

                                                @if ($facilities->is_house_keeping == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> House Keeping </snap>
                                                @endif
                                                @if ($facilities->is_air_condition == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Air Condition </snap>
                                                @endif
                                                @if ($facilities->is_fan == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Fan </snap>
                                                @endif
                                                @if ($facilities->is_balcony == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Balcony </snap>
                                                @endif
                                                @if ($facilities->is_toilets == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Toilets </snap>
                                                @endif
                                                @if ($facilities->is_tv == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> TV </snap>
                                                @endif
                                                @if ($facilities->is_kettle == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Kettle </snap>
                                                @endif
                                                @if ($facilities->is_fridge == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Mini Fridge </snap>
                                                @endif
                                                @if ($facilities->is_sofa == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Sofa </snap>
                                                @endif
                                                @if ($facilities->is_ware_drop == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Ware drop </snap>
                                                @endif
                                                @if ($facilities->is_locker == 1)
                                                    <snap class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Safe locker </snap>
                                                @endif
                                                @if ($facilities->is_curtain == 1)
                                                    <span class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Curtain </span>
                                                @endif
                                                @if ($facilities->is_blanket == 1)
                                                    <span class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Blanket </span>
                                                @endif
                                                @if ($facilities->is_toiletries == 1)
                                                    <span class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Toiletries </span>
                                                @endif
                                                @if ($facilities->is_towel == 1)
                                                    <span class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Towel </span>
                                                @endif
                                                @if ($facilities->is_hot_water == 1)
                                                    <span class="pr-2" style="font-size: 14px;"> <i
                                                            class="fas fa-check"></i> Hot water </span>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="pr-2 text-success" style="font-size: 14px;"><i
                                                        class="fas fa-check"></i> Cancellation Policy</span><span>
                                                    @if ($data->refund_policy != 1)
                                                        <span class="text-danger" style="font-size: 12px;"> (Not
                                                            Refundable) </span>
                                                    @else
                                                        <span class="text-success" style="font-size: 12px;"> (Refundable)
                                                        </span>
                                                    @endif
                                                </span>
                                            </div>

                                        </div>
                                        <div class="col-md-4">

                                            <div class="d-flex flex-row-reverse price-text">
                                                <span class="text-secondary ml-2" style="font-size: 12px;">
                                                    Price for 1 day
                                                </span>
                                                <span style="font-size:24px;font-width:600;" class="ml-2">
                                                    {{ $data->room_price }}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="d-flex align-items-end flex-column"
                                                    style="font-size: 12px;">Free Cancellation till 28 Mar 2022 </span>
                                            </div>
                                            <div class="d-flex align-items-end flex-column" style="padding-top:40px;">
                                                <a href="{{ url('user/block_rooms') }}/{{$hotel_id}}/{{ $data->id }}/{{ $data->room_price }}"
                                                    class="btn btn-sm btn-outline-success">Room Book</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!! $rooms->links() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
