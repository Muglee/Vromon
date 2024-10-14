@extends('web.layouts.app')
@section('services', 'active')
@section('content')
    <header class="inner-page-header inner-page-header-4">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Search Result</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Result</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>


    <!-- booking services -->

    <section class="about-section pb-70 position-relative">

        <div class="container">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">


                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <h3 class="d-inline-block d-sm-none"></h3>
                            <div class="col-12">
                                <img src="{{ asset('storage/media/branch/CoverImages/' . $result->branch_cover_image) }}" class="w-100">
                            </div>
                            {{-- <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
              </div> --}}
                        </div>
                        <div class="col-12 col-sm-7">

                            <h3 class="my-3">{{ $result->branch_name }}</h3>
                            <?php $num = $result->number_of_stars; ?>

                            @for ($i = 0; $i < $num; $i++)
                                <i class="fas fa-star text-info" style="font-size: 10px"></i>
                            @endfor



                            <p>{!! $result->branch_description !!}</p>
                            <hr>
                            <span><i class=" text-info fas fa-map-marker-alt"></i></span> <span>
                                {{ $result->branch_location }} </span>
                            <hr>
                            @php
                                $near_by_place = json_decode($result->near_by_places);
                            @endphp
                            @if ($near_by_place->place1 != '')
                                <span style='font-size:12px;' class="mr-2 "><i
                                        class=" text-info fas fa-map-marker"></i></span> <span class="pr-3">
                                    {{ $near_by_place->place1 }}
                                </span>
                            @endif
                            @if ($near_by_place->place2 != '')
                                <span style='font-size:12px;'><i class="mr-2 text-info fas fa-map-marker"></i></span> <span>
                                    {{ $near_by_place->place2 }} </span>
                            @endif

                            <hr>

                            @php
                                $facilities = json_decode($result->branch_facilities);
                            @endphp

                            <h4>Fasilities</h4>
                            <div class="row">

                                    @if ($facilities->is_security_active == 1)
                                        <div class="col-md-4">
                                            <span><i class=" text-info fas fa-shield-alt"></i></span>
                                            <span class=" pl-2 ">Sercurity</span>
                                            <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                        </div>
                                    @endif


                                    @if ($facilities->is_wifi_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-wifi"></i></span>
                                        <span class=" pl-2 ">Wifi</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_parking_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-car"></i></span>
                                        <span class=" pl-2 ">Parking</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_dining_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-utensils"></i></span>
                                        <span class=" pl-2 ">Dining</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_breakfast_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-bread-slice"></i></span>
                                        <span class=" pl-2 ">Breakfast</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_pets_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-paw"></i></span>
                                        <span class=" pl-2 ">Pet</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_swimingpool_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-swimmer"></i></span>
                                        <span class=" pl-2 ">Swimming Pool</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_roomservice_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-door-open"></i></span>
                                        <span class=" pl-2 ">Room Service</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_disability_friendly_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-wheelchair"></i></span>
                                        <span class=" pl-2 ">Disability Friendly</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_aircondition_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-wind"></i></span>
                                        <span class=" pl-2 ">Air Condition</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_businessfacilities_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-business-time"></i></span>
                                        <span class=" pl-2 ">Business Facilities</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_fitnesscenter_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-dumbbell"></i></span>
                                        <span class=" pl-2 ">Fitness Center</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_restaurant_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-hotel"></i></span>
                                        <span class=" pl-2 ">Restaurant</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_outdooractivities_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-campground"></i></span>
                                        <span class=" pl-2 ">Outdoor Activities</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>

                                    </div>
                                    @endif


                                    @if ($facilities->is_airportshuttel_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-car"></i></span>
                                        <span class=" pl-2 ">Airport Shuttel</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_couplefriendly_active == 1)
                                    <div class="col-md-4">
                                        <span><i class=" text-info fas fa-user-friends"></i></span>
                                        <span class=" pl-2 ">Couple Friendly</span>
                                        <span class=" pl-2 text-success"><i class="far fa-check-circle"></i></span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 p-2">
                                    <h4>House Rules</h4>
                                    <p class="text-justify">{!! $result->branch_house_rules !!}</p>
                                </div>
                                <div class="col-md-6 p-2">
                                    <h4>Policy</h4>
                                    <p class="text-justify ">{!! $result->branch_policy !!}</p>
                                </div>
                            </div>

                            <hr>
                            <h4 class="mb-3">Available Rooms</h4>
                            <hr>
                            <div class="row">
                                @foreach ($rooms as $key => $data)
                                    <div class="col-1"></div>
                                    <div class="col-10 mt-3">
                                        <div class="card">
                                            <div class="row p-2">
                                                <div class="col-md-3">
                                                    <img width="100%"
                                                        src="{{ asset('storage/media/branch/rooms/' . $data->room_image) }}" />
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

                                                            <div class="d-flex flex-row-reverse">
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
                                                                <a href="{{ url('agent/block_rooms') }}/{{ $data->id }}"
                                                                    class="btn btn-sm ">Room Book</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $rooms->links() !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>



        </div>
    </section>




@endsection
