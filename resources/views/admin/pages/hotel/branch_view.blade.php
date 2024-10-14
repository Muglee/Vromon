@extends('admin.layouts.app')
@section('title', 'Manage Branch')
@section('manage_branch', 'menu-open')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Branch Details View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item ">Manage Branch </li>
                        <li class="breadcrumb-item active">Branch View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"></h3>
                        <div class="col-12">
                            <img src="{{ asset('/storage/media/branch/CoverImages/' . $result->branch_cover_image) }}"
                                class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            {{-- <div class="product-image-thumb active"><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                            <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                            <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                            <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div>
                            <div class="product-image-thumb" ><img src="{{asset('storage/media/branch/CoverImages/'.$result->branch_cover_image)}}"></div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('/storage/media/branch/logo/' . $result->branch_logo) }}"
                                    class="product-image" alt="logo">
                            </div>
                            <div class="col-md-10">
                                <h3 class="my-3">{{ $result->branch_name }}</h3>
                                <?php $num = $result->number_of_stars; ?>
                                @for ($i = 0; $i < $num; $i++)
                                    <i class="fas fa-star text-info" style="font-size: 10px"></i>
                                @endfor
                            </div>
                        </div>
                        {{-- <span><i class="fas fa-star"></i></span> --}}

                        <p>{!! $result->branch_description !!}</p>
                        <hr>
                        <span><i class="mr-2 text-info fas fa-map-marker-alt"></i></span> <span>
                            {{ $result->branch_location }} </span> <br>
                        @php
                            $near_by_place = json_decode($result->near_by_places);
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
                            $facilities = json_decode($result->branch_facilities);
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
                        <div class="col-md-6">
                            <h4>House Rules</h4>
                            <p>{!! $result->branch_house_rules !!}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Policy</h4>
                            <p>{!! $result->branch_policy !!}</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
@endsection
