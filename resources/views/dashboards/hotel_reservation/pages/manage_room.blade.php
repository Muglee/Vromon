@extends('dashboards.hotel_reservation.layouts.app')



@if($id>0)
@section('title', 'Update Room')
@else
@section('title', 'Create Room')
@endif

@if($id>0)
    @section('manage_room', 'menu-open')
@else
    @section('create_room', 'active')
    @section('manage_room', 'menu-open')
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
                        <h1 class="m-0">Update Room</h1>
                    @else
                        <h1 class="m-0">Create Room</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Room </li>
                        @if ($id>0)
                            <li class="breadcrumb-item active">Update Room </li>
                        @else
                            <li class="breadcrumb-item active">Create Room </li>
                        @endif

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Room Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{route('room.ManageRoomProcess')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                            <div class="card-body">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Room Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="room_name" value="{{ $room_name }}"  class="form-control"  placeholder="Enter Room Name" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Branch Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="branch_id" class="form-control select2"  style="width: 100%;" required="required">
                                                <option value=""> Select one</option>
                                                @foreach($branch as $key=>$branches)
                                                    @if($branch_id==$branches->id)
                                                        <option selected value="{{ $branches->id }}"> {{ $branches->branch_name}}</option>
                                                    @else
                                                        <option  value="{{ $branches->id }}"> {{ $branches->branch_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Room Type</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="room_type" class="form-control select2"  style="width: 100%;" required="required">
                                                <option value=""> Select one</option>
                                                @foreach($room as $key=>$rooms)
                                                @if($room_type==$rooms->room_type_id)
                                                    <option selected value="{{ $rooms->room_type_id }}"> {{ $rooms->room_type}}</option>
                                                @else
                                                <option value="{{ $rooms->room_type_id }}"> {{ $rooms->room_type}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-3">
                                            <label>Bed Distribution</label>
                                            @php
                                                $bed_distribution = json_decode($bed_distribution);
                                            @endphp
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">

                                                <div class="col-md-6 mb-2">
                                                    <label>Single bed</label>
                                                    @if($id>0)
                                                        <input type="number" name="no_of_single_bed" value="{{ $bed_distribution->no_of_single_bed }}" class="form-control"  placeholder="Number Of Single Bed" required >
                                                    @else
                                                        <input type="number" name="no_of_single_bed"  class="form-control"  placeholder="Number Of Single Bed" required >
                                                    @endif

                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>Double bed</label>
                                                    @if($id>0)
                                                        <input type="number" name="no_of_double_bed" value="{{ $bed_distribution->no_of_double_bed }}" class="form-control"  placeholder="Number Of Double Bed" required >
                                                    @else
                                                        <input type="number" name="no_of_double_bed"  class="form-control"  placeholder="Number Of Double Bed" required >
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">No of Person</label>
                                            @php
                                                $no_of_person = json_decode($no_of_person);
                                            @endphp
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label>Adult</label>
                                                    @if ($id>0)
                                                        <input type="number" name="no_of_adult" value="{{ $no_of_person->no_of_adult }}"  class="form-control"  placeholder="Adults" required >
                                                    @else
                                                        <input type="number" name="no_of_adult"  class="form-control"  placeholder="Adults" required >
                                                    @endif

                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label>Kids</label>

                                                    @if ($id>0)
                                                        <input type="number" name="no_of_kids"  value="{{ $no_of_person->no_of_kids }}"  class="form-control"  placeholder="Kids" required >
                                                    @else
                                                        <input type="number" name="no_of_kids"   class="form-control"  placeholder="Kids" required >
                                                    @endif

                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label>Guest</label>

                                                    @if($id>0)
                                                        <input type="number" name="no_of_guest" value="{{ $no_of_person->no_of_guest }}"  class="form-control"  placeholder="Guest" required >
                                                    @else
                                                        <input type="number" name="no_of_guest"  class="form-control"  placeholder="Guest" required >
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Room Facilities</label>
                                        @php
                                            $facilities = json_decode($room_facilities);
                                        @endphp
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_house_keeping" class="form-check-input" type="checkbox" value="1" {{  ($facilities->is_house_keeping == 1 ? ' checked' : '') }} >

                                                    @else
                                                        <input name="is_house_keeping" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        House Keeping
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_air_condition"  {{  ($facilities->is_air_condition == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_air_condition" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Air Condition
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_fan" {{  ($facilities->is_fan == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_fan" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Fan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_balcony" {{  ($facilities->is_balcony == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_balcony" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Balcony
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_toilets" {{  ($facilities->is_toilets == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_toilets" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Toilet
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_tv"  {{  ($facilities->is_tv == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_tv" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        TV
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_kettle" {{  ($facilities->is_kettle == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_kettle" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Electric Kettle
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_fridge" {{  ($facilities->is_fridge == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_fridge" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Mini Fridge
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_sofa" {{  ($facilities->is_sofa == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_sofa" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Sofa
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_ware_drop" {{  ($facilities->is_ware_drop == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_ware_drop" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Ware Drop
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_locker" {{  ($facilities->is_locker == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_locker" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                       Safe Locker
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_curtain" {{  ($facilities->is_curtain == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_curtain" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Curtain
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_blanket"  {{  ($facilities->is_blanket == 1 ? ' checked' : '') }}  class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_blanket" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Blankets
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_toiletries" {{  ($facilities->is_toiletries == 1 ? ' checked' : '') }}  class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_toiletries" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                       Toiletries
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_towel" {{  ($facilities->is_towel == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_towel" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Towel
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-check">
                                                    @if($id > 0)
                                                        <input name="is_hot_water" {{  ($facilities->is_hot_water == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >

                                                    @else
                                                        <input name="is_hot_water" class="form-check-input" type="checkbox" value="1" >
                                                    @endif
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        Hot Water
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group pt-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Room Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="room_image"  class="custom-file-input" {{$image_required}} value="{{ $room_name }}" accept="image/*" onchange="loadFile(event)" >
                                                <label class="custom-file-label" for="">Choose a photo</label>
                                                @error('room_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @if($room_image!='')
                                            <div class="mt-3" >
                                                <img width="100px" height="100px" id="img" src="{{asset('/storage/media/branch/rooms/'.$room_image)}}"/>
                                            </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="img" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Room Price</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="room_price" value="{{ $room_price }}"  class="form-control"  placeholder="Enter Room Price" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Refund Policy</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                @if($id > 0)
                                                    <input name="refund_policy" {{  ($refund_policy == 1 ? ' checked' : '') }} class="form-check-input" type="checkbox" value="1" >
                                                @else
                                                    <input name="refund_policy" class="form-check-input" type="checkbox" value="1" >
                                                @endif
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    Refundable
                                                </label>
                                            </div>
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
    </section>
    <script>
        var loadFile = function(event)
        {
            var img = document.getElementById('img');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.onload = function() {
                URL.revokeObjectURL(img.src) // free memory
            }
        };
    </script>
@endsection
