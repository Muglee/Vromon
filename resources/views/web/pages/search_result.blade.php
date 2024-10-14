@extends('web.layouts.app')
@section('services','active')
@section('content')
    <header class="inner-page-header inner-page-header-4">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Search Result</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Result</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>


    <!-- booking services -->

    <section class="about-section pb-70 position-relative">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb-30">
                    <div class="about-selection-content">

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="about-selection-details">

                                    <!-- ===========Hotels========== -->
                                    <div class="about-selection-details-item active" data-about-details="2">
                                        <div class="forum-details">
                                            <div class="authentication-form-box">
                                                <div class="authentication-form-box-item active">
                                                    <div class="authentication-box">
                                                        <div class="authentication-box-inner">
                                                            <form metheod="GET" action="{{ route('search.SearchHotel') }}" class="authentication-form mb-20">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">DESTINATION CITY</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text" name="search_city"
                                                                            value=" {{session()->get('search_city')}}" class="form-control" placeholder="CITY" aria-label="Name" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">CHECK IN</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" name="checkin_date" value="{{session()->get('checkin_date')}}" class="form-control" aria-label="Name" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">CHECK OUT</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" name="checkout_date" value="{{session()->get('checkout_date')}}" class="form-control" aria-label="Name" required />
                                                                        </div>

                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label  name="no_of_room" class="mb-2 custom-label">ROOM {{session()->get('no_of_room')}}</label>
                                                                                <input type="number" value="{{session()->get('no_of_room')}}" class="form-control" aria-label="Name" />
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label name="no_of_adult" class="mb-2 custom-label">ADULT</label>
                                                                                <input type="number" value="{{session()->get('no_of_adult')}}" class="form-control" aria-label="Name" />


                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <label class="mb-2 custom-label">KIDS</label>
                                                                                <input  name="no_of_child"  type="number" value="{{session()->get('no_of_child')}}" class="form-control" aria-label="Name" />

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                {{-- <div class="mt-3">
                                                                    <button type="submit" class="btn main-btn main-btn-lg"> Modify Search</button>
                                                                </div> --}}

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===========/Hotels========== -->

                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="holiday-planning-section pb-70 position-relative">
        <div class="map-shapes">
            <div class="map-shape map-shape-1">
                <img src="{{asset('web/assets/images/shapes/map-1.png')}}" alt="shape" />
            </div>
            <div class="map-shape map-shape-2">
                <img src="{{asset('web/assets/images/shapes/map-2.png')}}" alt="shape" />
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($result as $data )
                <div class="col-md-2"></div>
                <div class="col-md-8 pb-30">
                    <div class="card-1">
                        <div class="row">
                            <div class="col-md-4 p-2">
                               <a href="{{url('branch_wise_room_list')}}/{{$data->id}}">
                                <img src="{{asset('storage/media/branch/CoverImages/'.$data->branch_cover_image)}}"class="w-100" style="border-radius: 5px;" alt="Product Image">
                               </a>
                            </div>
                            <div class="col-md-8 p-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <span style="color:#3FD0D4; border-style:solid; border-width: 1px; padding:5px;">
                                            @foreach ($hotel_types as $types )
                                                @if($data->hotel_type == $types->id)
                                                {{ $types->hotel_type }}
                                                @endif
                                            @endforeach
                                            </span>
                                        </div>

                                        <div>
                                            <?php $num= $data->number_of_stars; ?>
                                            @for ($i = 0; $i < $num; $i++)
                                            <i class="fas fa-star" style="font-size: 8px; color:#3FD0D4;" ></i>
                                            @endfor
                                        </div>
                                        <div>
                                            <a href="{{url('branch_wise_room_list')}}/{{$data->id}}">  <h5>{{ $data->branch_name }} </h5></a>
                                        </div>
                                        <span><i class="fas fa-map-marker-alt" style="color:#3FD0D4;"></i></span> <span> {{ $data->branch_location }} </span>
                                        <div style="font-size:12px;">
                                            @php
                                                $near_by_place = json_decode($data->near_by_places);
                                            @endphp
                                            @if($near_by_place->place1!='')
                                            <span  class="mr-2 "><i style="color:#3FD0D4;"
                                                class=" fas fa-map-marker"></i></span> <span class="pr-3"> {{ $near_by_place->place1 }}
                                            </span>
                                            <br>
                                            @endif

                                            @if($near_by_place->place2!='')
                                            <span ><i style="color:#3FD0D4;" class="mr-2 fas fa-map-marker"></i></span> <span>
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
                                            <a style="font-size: 13px;color:#3FD0D4;" href="{{url('branch_wise_room_list')}}/{{$data->id}}">*Additional discount on selected payment method</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="overflow: hidden; max-height: 20px;">{!! $data->branch_description !!} </div>
                                </div>
                                <div class="row mt-2">
                                        @php
                                            $facilities = json_decode($data->branch_facilities);
                                        @endphp

                                        @if ($facilities->is_security_active == 1)
                                        <div style="font-size:12px;" class="col-md-3 text-secondary">
                                            <span><i class="fas fa-shield-alt"></i></span>
                                            <span class=" pl-2 ">Sercurity</span>
                                        </div>
                                        @endif


                                        @if ($facilities->is_wifi_active == 1)
                                        <div style="font-size:12px;" class="col-md-3 text-secondary">
                                            <span><i class="fas fa-wifi"></i></span>
                                            <span class=" pl-2 ">Wifi</span>
                                        </div>
                                        @endif


                                    @if ($facilities->is_parking_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-car"></i></span>
                                        <span class=" pl-2 ">Parking</span>
                                    </div>
                                    @endif


                                        @if ($facilities->is_dining_active == 1)
                                        <div style="font-size:12px;" class="col-md-3 text-secondary">
                                            <span><i class="fas fa-utensils"></i></span>
                                            <span class=" pl-2 ">Dining</span>
                                        </div>
                                        @endif


                                    @if ($facilities->is_breakfast_active == 1)
                                        <div style="font-size:12px;" class="col-md-3 text-secondary">
                                            <span><i class="fas fa-bread-slice"></i></span>
                                            <span class=" pl-2 ">Breakfast</span>
                                        </div>
                                    @endif


                                    @if ($facilities->is_pets_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-paw"></i></span>
                                        <span class=" pl-2 ">Pet</span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_swimingpool_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-swimmer"></i></span>
                                        <span class=" pl-2 ">Swimming Pool</span>
                                    </div>
                                    @endif

                                    @if ($facilities->is_roomservice_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                    <span><i class="fas fa-door-open"></i></span>
                                    <span class=" pl-2 ">Room Service</span>
                                    </div>
                                    @endif

                                    @if ($facilities->is_disability_friendly_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-wheelchair"></i></span>
                                        <span class=" pl-2 ">Disability Friendly</span>
                                        </div>
                                    @endif


                                        @if ($facilities->is_aircondition_active == 1)
                                        <div style="font-size:12px;" class="col-md-3 text-secondary">
                                            <span><i class="fas fa-wind"></i></span>
                                            <span class=" pl-2 ">Air Condition</span>
                                        </div>
                                        @endif

                                    @if ($facilities->is_businessfacilities_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-business-time"></i></span>
                                        <span class=" pl-2 ">Business Facilities</span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_fitnesscenter_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-dumbbell"></i></span>
                                        <span class=" pl-2 ">Fitness Center</span>
                                        </div>
                                    @endif


                                    @if ($facilities->is_restaurant_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-hotel"></i></span>
                                        <span class=" pl-2 ">Restaurant</span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_outdooractivities_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-campground"></i></span>
                                        <span class=" pl-2 ">Outdoor Activities</span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_airportshuttel_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-car"></i></span>
                                        <span class=" pl-2 ">Airport Shuttel</span>
                                    </div>
                                    @endif


                                    @if ($facilities->is_couplefriendly_active == 1)
                                    <div style="font-size:12px;" class="col-md-3 text-secondary">
                                        <span><i class="fas fa-user-friends"></i></span>
                                        <span class=" pl-2 ">Couple Friendly</span>
                                    </div>
                                    @endif

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                @endforeach

            </div>
        </div>
    </section>

{{-- <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{url('tour_list')}}">
                                    <img src="{{asset('web/assets/images/holiday/holiday-place-1.jpg')}}" alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        02 Feb
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        04 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Milan
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{url('tour_list')}}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{url('tour_list')}}">Rome</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(100 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div> --}}

    <!-- /booking services -->
@endsection
