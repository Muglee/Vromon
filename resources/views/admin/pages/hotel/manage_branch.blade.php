@extends('admin.layouts.app')

    @if($id>0)
        @section('title', 'Update Branch')
    @else
        @section('title', 'Create Branch')
    @endif

    @if($id>0)
        @section('manage_branch', 'menu-open')
    @else
        @section('manage_branch', 'menu-open')
        @section('create_branch', 'active')
    @endif

@section('content')
    @if($id>0)
        <?php $image_required=" "; ?>
    @else
        <?php $image_required="required"; ?>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($id>0)
                        <h1 class="m-0">Update Branch</h1>
                    @else
                        <h1 class="m-0">Create Branch</h1>
                    @endif

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- {{ url('admin/hotel/dashboard') }} --}}
                        <li class="breadcrumb-item"><a href="{{route('admin.BranchView')}}">Dashboard</a></li>
                        <li class="breadcrumb-item ">Manage Branch </li>
                        @if ($id>0)
                        <li class="breadcrumb-item active">Update Branch</li>
                        @else
                            <li class="breadcrumb-item active">Create Branch</li>
                        @endif

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Branch Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{route('hotel.ManageBranchProcess')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <input type="hidden" name="vendor_id" value="{{$vendor_id}}" class="form-control" >
                            <input type="hidden" name="admin_id" value="{{session()->get('admin_ID')}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Branch Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="branch_name" value="{{$branch_name}}" class="form-control"  placeholder="Enter Branch Name" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Type</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="hotel_type" class="form-control select2"  style="width: 100%;" required="required">
                                                <option value=""> Select one</option>
                                                @foreach($hotel_types as $data)
                                                    @if($hotel_type==$data->id)
                                                        <option selected value="{{ $data->id }}"> {{ $data->hotel_type }}</option>
                                                    @else
                                                        <option  value="{{ $data->id }}"> {{ $data->hotel_type }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Number of stars</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="number_of_stars" class="form-control select2"  style="width: 100%;" required="required">
                                                <option value=""> Select one</option>
                                                @foreach($number_of_star as $data)
                                                    @if($number_of_stars==$data->id)
                                                        <option selected value="{{ $data->id }}"> {{ $data->name }}</option>
                                                    @else
                                                        <option  value="{{ $data->id }}"> {{ $data->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Country</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$branch_country}}" name="branch_country" class="form-control"  placeholder="Enter City Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">City</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$branch_city}}" name="branch_city" class="form-control"  placeholder="Enter City Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Branch Location / Address</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$branch_location}}" name="branch_location" class="form-control"  placeholder="Enter Branch Location / Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Near By Places (optional)</label>
                                            @php
                                                $near_by_place = json_decode($near_by_places);
                                            @endphp
                                            {{-- {{$near_by_place->place1}}; --}}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if($id>0)
                                                        <input type="text" value="{{$near_by_place->place1}}" name="place1" class="form-control"  placeholder="Place 1" >
                                                    @else
                                                        <input type="text"  name="place1" class="form-control"  placeholder="Place 1" >
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    @if($id>0)
                                                        <input type="text" value="{{$near_by_place->place2}}" name="place2" class="form-control"  placeholder="Place 2" >
                                                    @else
                                                        <input type="text"  name="place2" class="form-control"  placeholder="Place 2" >
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Facilities</label>
                                        @php
                                            $facilities = json_decode($branch_facilities);
                                        @endphp
                                        {{--{{$facilities->is_security_active}};--}}
                                        {{--dd($facilities->is_wifi_active);--}}
                                        {{--dd($facilities->is_dining_active);--}}
                                        {{--dd($facilities->is_pets_active);--}}
                                        {{--dd($facilities->is_parking_active);--}}
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if($id > 0)
                                                    <input name="is_security_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_security_active == 1 ? ' checked' : '') }} >
                                                @else
                                                    <input name="is_security_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Security
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id>0)
                                                    <input name="is_parking_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_parking_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_parking_active" class="form-check-input" type="checkbox" value="1">
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Parking
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id>0)
                                                    <input name="is_wifi_active" class="form-check-input" type="checkbox"  value="1" {{  ($facilities->is_wifi_active == 1 ? ' checked' : '') }}>
                                                @else
                                                     <input name="is_wifi_active" class="form-check-input" type="checkbox"  value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Wifi
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id>0)
                                                    <input name="is_pets_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_pets_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_pets_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Pets
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id>0)
                                                    <input name="is_dining_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_dining_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_dining_active" class="form-check-input" type="checkbox" value="1">
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Dining
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_breakfast_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_breakfast_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_breakfast_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Breakfast
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- === --}}
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_swimingpool_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_swimingpool_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_swimingpool_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Swimming Pool
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_roomservice_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_roomservice_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_roomservice_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Room Service
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_disability_friendly_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_disability_friendly_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_disability_friendly_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Disability Friendly
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_aircondition_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_aircondition_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_aircondition_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Air Condition
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_businessfacilities_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_businessfacilities_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_businessfacilities_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Business Facilities
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_fitnesscenter_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_fitnesscenter_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_fitnesscenter_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Fitness Center
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_restaurant_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_restaurant_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_restaurant_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Restaurant
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_outdooractivities_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_outdooractivities_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_outdooractivities_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Outdoor Activities
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_airportshuttel_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_airportshuttel_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_airportshuttel_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Airport Shuttel
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                @if ($id > 0)
                                                    <input name="is_couplefriendly_active" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_couplefriendly_active == 1 ? ' checked' : '') }}>
                                                @else
                                                    <input name="is_couplefriendly_active" class="form-check-input" type="checkbox" value="1" >
                                                @endif

                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Couple Friendly
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pt-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Branch Logo</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="branch_logo" value="{{$branch_logo}}" class="custom-file-input" {{$image_required}} accept="image/*" onchange="loadFile(event)">
                                                <label class="custom-file-label" for="">Choose a logo</label>
                                            </div>
                                            @if($branch_logo!='')
                                                <div class="mt-3" >
                                                    <a href="{{asset('/storage/media/branch/logo/'.$branch_logo)}}" target="_blank"><img id="logo" width="100px" height="100px;" src="{{asset('storage/media/branch/logo/'.$branch_logo)}}"/></a>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="logo" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Cover Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input name="branch_cover_image" value="$branch_cover_image" type="file" class="custom-file-input" {{$image_required}} accept="image/*" onchange="loadCover(event)">
                                                <label class="custom-file-label" for="">Choose a cover image</label>
                                            </div>
                                            @if($branch_cover_image!='')
                                                <div class="mt-3" >
                                                    <a href="{{asset('/storage/media/branch/CoverImages/'.$branch_cover_image)}}" target="_blank"><img id="cover" width="100px" height="100px;" src="{{asset('storage/media/branch/CoverImages/'.$branch_cover_image)}}"/></a>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="cover" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="branch_description" id="branch_description" class="form-control" required="required" >{!! $branch_description !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> House Rules</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="branch_house_rules" id="branch_house_rules"  class="form-control" required="required" >{!! $branch_house_rules !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label> Policy </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="branch_policy" id="branch_policy"  class="form-control" required="required" >{!! $branch_policy !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <script>
            CKEDITOR.replace('branch_description');
            CKEDITOR.replace('branch_house_rules');
            CKEDITOR.replace('branch_policy');

            var loadFile = function(event) {
                var logo = document.getElementById('logo');
                logo.src = URL.createObjectURL(event.target.files[0]);
                logo.onload = function() {
                    URL.revokeObjectURL(logo.src) // free memory
                }
            };
            var loadCover = function(event) {
                var cover = document.getElementById('cover');
                cover.src = URL.createObjectURL(event.target.files[0]);
                cover.onload = function() {
                    URL.revokeObjectURL(cover.src) // free memory
                }
            };

        </script>
    </section>
@endsection
