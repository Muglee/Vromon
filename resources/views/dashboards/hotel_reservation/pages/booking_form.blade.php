@extends('dashboards.hotel_reservation.layouts.app')
@section('title', 'Room Booking Form')
@section('available_rooms', 'active')
@section('manage_room', 'menu-open')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Room Booking Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/hotel/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Room </li>
                        <li class="breadcrumb-item active">Available Rooms </li>
                        <li class="breadcrumb-item active">{{ $result->room_name }}</li>
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
            <div class="row">
                <div class="col-12" >
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <tr>
                                <td>
                                    @php
                                        $no_of_person = json_decode($result->no_of_person);
                                    @endphp
                                    @php
                                        $bed_distribution = json_decode($result->bed_distribution);
                                    @endphp
                                    @php
                                        $room_facilities = json_decode($result->room_facilities);
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="card p-3">
                                                <div class="details ">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img width="100px" height="100px" src="{{asset('/storage/media/branch/rooms/'.$result->room_image)}}"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-4 font-weight-bold">Room Name:</div>
                                                                <div class="col-md-8">

                                                                    <span>{{$result->room_name}}</span>
                                                                    <span class="font-weight-bold">
                                                                    @foreach ( $roomtype as $roomtypes)
                                                                            @if ($result->room_type == $roomtypes->id )
                                                                                ( {{ $roomtypes->room_type }} )
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 font-weight-bold">Persons Allow:</div>
                                                                <div class="col-md-8">
                                                                    <span class="mr-2">Adult</span> <span class="font-weight-bold">{{ $no_of_person->no_of_adult }}</span>
                                                                    ,<span class="mr-2">Kids</span> <span class="font-weight-bold"> {{ $no_of_person->no_of_kids }}</span>
                                                                    ,<span class="mr-2">Guests</span> <span class="font-weight-bold"> {{ $no_of_person->no_of_guest }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 font-weight-bold"> Bed Distribution:</div>
                                                                <div class="col-md-8">
                                                                    <span class="mr-2">Single bed</span> <span class="font-weight-bold">  {{ $bed_distribution->no_of_single_bed }} </span>
                                                                    ,<span class="mr-2">Double bed</span> <span class="font-weight-bold"> {{ $bed_distribution->no_of_double_bed }} </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 font-weight-bold "> Price:</div>
                                                                <div class="col-md-8">
                                                                    <span class="font-weight-bold">  {{ $result->room_price }}   </span>
                                                                    <span class="pl-2" style="font-size: 12px;">
                                                                        @if ($result->refund_policy!=1)
                                                                            <span class="text-danger"> <i class="fas fa-info-circle"></i> Not Refundable </span>
                                                                        @else
                                                                            <span class="text-success"> <i class="fas fa-info-circle"></i> Refundable </span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p class="font-weight-bold">Room Facilities</p>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                @php
                                                                    $facilities = json_decode($result->room_facilities);
                                                                @endphp

                                                                @if ($facilities->is_house_keeping == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> House Keeping </span>
                                                                @endif
                                                                @if ($facilities->is_air_condition == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Air Condition </span>
                                                                @endif
                                                                @if ($facilities->is_fan == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Fan </span>
                                                                @endif
                                                                @if ($facilities->is_balcony == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Balcony </span>
                                                                @endif
                                                                @if ($facilities->is_toilets == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Toilets </span>
                                                                @endif
                                                                @if ($facilities->is_tv == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> TV </span>
                                                                @endif
                                                                @if ($facilities->is_kettle == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Kettle </span>
                                                                @endif
                                                                @if ($facilities->is_fridge == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Mini Fridge </span>
                                                                @endif
                                                                @if ($facilities->is_sofa == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Sofa </span>
                                                                @endif
                                                                @if ($facilities->is_ware_drop == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Ware drop </span>
                                                                @endif
                                                                @if ($facilities->is_locker == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Safe locker </span>
                                                                @endif
                                                                @if ($facilities->is_curtain == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Curtain </span>
                                                                @endif
                                                                @if ($facilities->is_blanket == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Blanket </span>
                                                                @endif
                                                                @if ($facilities->is_toiletries == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Toiletries </span>
                                                                @endif
                                                                @if ($facilities->is_towel == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Towel </span>
                                                                @endif
                                                                @if ($facilities->is_hot_water == 1)
                                                                    <span class="pr-2" style="font-size: 12px;"> <i class="fas fa-check"></i> Hot water </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </td>
                            </tr>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="card card-outline card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Advanced booking record  </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @foreach($booked_date as $list)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span style="font-weight: bold">Check In:</span><span class="pl-2 text-danger">{{date('d-m-Y', strtotime($list->check_in))}}</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <span style="font-weight: bold">Check Out:</span><span class="pl-2 text-danger">{{date('d-m-Y', strtotime($list->check_out))}}</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <span style="font-weight: bold">Staus:</span><span class="pl-2 text-danger">Released</span>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-1"></div>
                            <div class="col-md-10" >
                                <div class="card card-info">
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{route('room.ManageBookProcessHotel')}}" method="post" class="form-horizontal">
                                        @csrf
                                    {{-- <input type="hidden" name="room_id" value="{{$id}}" class="form-control"> --}}
                                        <input type="hidden" name="room_id" value="{{$result->id}}" class="form-control">
                                        <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                                        <div class="card-body mt-2">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control"  placeholder="Full Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Came Form</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="came_form" class="form-control"  placeholder="Country / City / Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Check in/out</label>
                                                <div class="col-sm-5">
{{--                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">--}}
{{--                                                        <input type="text"  name="check_in" placeholder="Check in" class="form-control datetimepicker-input" data-target="#reservationdate"/>--}}
{{--                                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">--}}
{{--                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <input type="date" name="check_in" class="form-control"  placeholder="Check in">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="date" name="check_out" class="form-control"  placeholder="Check out" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">NID Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nid_number" class="form-control"  placeholder="NID Number " required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Info</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="phone_number" class="form-control"  placeholder="Phone Number" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="email" class="form-control"  placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Reason of Tour</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="reason" class="form-control"  placeholder="Optional">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Paid Amount</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="paid_amount" class="form-control"  placeholder="Paid Amount" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value="{{ $result->room_price }}(payable)" placeholder="Due Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
{{--                                            <a type="submit" class="btn btn-info" href="{{url('vendor/hotel/room/booking_status/1')}}/{{$result->id}}" >Confirm </a>--}}
                                            <button type="submit" class="btn btn-info" >Confirm </button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
