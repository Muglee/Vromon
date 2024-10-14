@extends('agent.layouts.app')
@section('title', 'Block Room')
@section('booking', 'menu-open')
@section('hotel_booking', 'active')

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
                        <li class="breadcrumb-item active">Room List</li>
                        <li class="breadcrumb-item active">Block Room</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row pb-4">
                <div class="col-md-12">
                    <form action="{{ route('agent.booked_customer_info') }}" method="POST">
                        @csrf
                        <div class="callout callout-info">
                            <div class="card-header border-bottom-0">
                                <h4>Enter Traveller Details | Total Room {{ session()->get('no_of_room') }} | Lead Passenger</h4>
                    
                                <hr>
                            </div>

                            @php
                                $checkin_date = strtotime(Session::get('checkin_date')) ;
                                $checkout_date = strtotime(Session::get('checkout_date')) ;
                            
                                $new_checkin_date = date('m/d/y', $checkin_date);
                                $new_checkout_date = date('m/d/y', $checkout_date);

                                $days_count = ceil(abs($checkout_date - $checkin_date) / 86400);



                                $wallet = 553500;
                                $total_room = Session::get('no_of_room') ;
                                
                                if ($days_count == 0) {
                                    $room_rent =  $room_price * 1 * $total_room;
                                }else{
                                    $room_rent =  $room_price * $days_count * $total_room;
                                }
                                
                                Session::put('total_room_price',  $room_rent);
                            @endphp

                            <?php
                                if($room_rent >= $wallet){
                                    Alert::info('Warring !!', 'Your balance is too low! Please recharge first..!!');
                                    Session::flash('message', 'Your balance is too low! Please recharge first..!!');
                                }
                            ?>

                            <div class="card-body pt-0">
                                
                                <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                                <input type="hidden" name="room_id" value="{{$room_id}}">
                                <input type="hidden" name="room_price" value="{{$room_price}}">
                                <input type="hidden" name="vendor_id" value="{{$vendor_id}}">

                                @if(Session::has('message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ Session::get('message') }}
                                    
                                    <a href="{{ route('agent.addpay') }}" style="float: right; color: #495057; text-decoration: none; background: white; padding: 0px 8px; border-radius: 3px;;">Recharge Your Account </a>
                                   
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <div class="form-group row guest_info">

                                    <div class="adult_room_no">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="callout callout-info">
                            <H4>Hotels Norms</H4>
                            <hr>
                            <p class="text-justify">
                                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document or a typeface without relying on meaningful
                                content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and
                                graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                                form of a document or a typeface without relying on meaningful content. Lorem ipsum may be
                                used as a placeholder before the final copy is.
                            </p>
                        </div>
                        <div class="callout callout-info">
                            <H4>Hotels Policy</H4>
                            <hr>
                            <p class="text-justify">
                                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document or a typeface without relying on meaningful
                                content. Lorem ipsum may be used as a placeholder before the final copy is In publishing and
                                graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                                form of a document or a typeface without relying on meaningful content. Lorem ipsum may be
                                used as a placeholder before the final copy is.
                            </p>
                        </div>
                        <div class="callout callout-info">
                            <H4>Cancellation and Charges Policy</H4>
                            <hr>
                            <p class="text-justify">
                                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                demonstrate the visual form of a document or a typeface without
                            </p>
                        </div>

                        

                        @if ($room_rent >= $wallet)
                            <div class="col-3">
                                <a class="btn btn-info w-100" href="{{ route('agent.addpay') }}">Recharge Your Account </a>
                            </div>
                        @else
                            <div class="col-3">
                                <button class="btn btn-info w-100" type="submit">Confirm</button>
                            </div>
                        @endif

                </div>
                </form>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

    <script>
        $(document).ready(function() {

            <?php
            $adults = [session()->get('no_of_adult')];
            $kids = [session()->get('no_of_kid')];
            ?>



            function addRows() {

                total_adults = <?php echo json_encode($adults); ?>;
                // total_kids = <?php echo json_encode($kids); ?>;

                var lead_passenger = `
                            <div class="col-sm-12">
                                <div class="lead-passenger">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Title</label>
                                            <select class="form-control" name="lead_title">
                                                <option value="Mr">MR</option>
                                                <option value="Ms">MS</option>
                                                <option value="Mrs">MRS</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">First Name</label>
                                            <input type="text" name="lead_first_name" class="form-control" placeholder="First Name"
                                                required>
                                        </div>


                                        
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Last Name</label>
                                            <input type="text" name="lead_last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">NID Number</label>
                                            <input type="text" name="nid_number" class="form-control"  placeholder="NID Number" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class=" col-form-label">Reason of Tour</label>
                                            <input type="text" name="reason" class="form-control"  placeholder="Optional">
                                        </div>


                                        <div class="col-sm-4">  
                                            <label for="inputEmail3" class="col-form-label">Paid Amount</label>
                                            <input type="text" name="paid_amount" class="form-control"  placeholder="Paid Amount" required>

                                        </div>

                                      

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Country Code</label>
                                            <select name="country" class="form-control" name="country_code" required>
                                                <option disabled selected>Select Country Code</option>
                                                <option value="+880 ">Bangladesh (+88)</option>
                                                <option value="+91 ">India (+91)</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Phone No</label>
                                            <input type="text" name="phone_no" class="form-control" placeholder="Phone No" required>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                            

                var adult_html = `
                            <div class="col-sm-4">
                                <label for="" class=" col-form-label">Title</label>
                                <select name="guest_title[]" class="form-control">
                                    <option value="Mr">MR</option>
                                    <option value="Ms">MS</option>
                                    <option value="Mrs">MRS</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class="col-form-label">First Name</label>
                                <input type="text" name="guest_first_name[]" class="form-control" placeholder="First Name" required>
        
                            </div>

                            <div class="col-sm-4">
                                <label class="col-form-label">Last Name</label>
                                <input type="text" name="guest_last_name[]" class="form-control" placeholder="First Name" required>
                            </div>`;

                // var kid_html = `
                //             <div class="col-sm-4">
                //                 <label for="" class=" col-form-label">Title</label>
                //                 <select name="kid_title[]" class="form-control">
                //                     <option value="Mr">MR</option>
                //                     <option value="Ms">MS</option>
                //                     <option value="Mrs">MRS</option>
                //                 </select>
                //             </div>

                //             <div class="col-sm-4">
                //                 <label class="col-form-label">First Name</label>
                //                 <input type="text" name="kid_first_name[]" class="form-control" placeholder="First Name" required>
        
                //             </div>

                //             <div class="col-sm-4">
                //                 <label class="col-form-label">Last Name</label>
                //                 <input type="text" name="kid_last_name[]" class="form-control" placeholder="First Name" required>
                //             </div>`;

                var fhtml = ``;

                //var ProjectValues = "{{ Session::get('total_adults') }}"; 

                //  for (let i = 0; i < total_adults.length; i++) {
                //      console.log(total_adults[0]);

                //  }

                for (var i = 0; i < total_adults[0].length; i++) {
                 
                    for (var j = 0; j < total_adults[0][i]; j++) {
                        if (i == 0  && j == 0) {
                            fhtml = fhtml +  `
                                <div class="col-sm-12">
                                    <h5 class="card-header headline text-uppercase  mb-0 mt-2" style="background-color: #ebecec; border:none; border-radius: 0px">Room 1 Lead Passanger </h5>
                                </div> ` + lead_passenger;
                        } else {
                            fhtml = fhtml + `
                                <div class="col-sm-12">
                                    <h5 class="card-header headline text-uppercase  mb-0 mt-2" style="background-color: #ebecec; border:none; border-radius: 0px">Room `+ (i + 1) +` Adult ` + (j + 1) + ` </h5>
                                </div>  ` + adult_html;
                        }
                    }

                }

                //for kid field information

                // for (var i = 0; i < total_kids[0].length; i++) {

                //     for (var j = 0; j < total_kids[0][i]; j++) {
                //         fhtml = fhtml + `
                //                 <div class="col-sm-12">
                //                     <h5 class="card-header headline text-uppercase  mb-0 mt-4" style="background-color: #ebecec; border:none; border-radius: 0px">Room `+ (i + 1) +` Kid ` + (j + 1) + ` </h5>
                //                 </div>  ` + kid_html;
                //     }
                    

                // }

                $(".guest_info").html(fhtml);

            }

            addRows();
        });
    </script>

@endsection
