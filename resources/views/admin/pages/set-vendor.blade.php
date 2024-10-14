@extends('admin.layouts.app')
@section('title', 'Passenger Details')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')

<div class="row p-3 d-flex justify-content-center text-cente">
    <div class="col-md-8">
        <div class="card" >
            <div class="card-header" style="background-color:#042642d9">
            <h3 class="card-title text-white">Add vendor</h3>
            </div>
            <form action="{{route('vendor.register')}}" method="post">
                @csrf
                   <div class="input-group">
                        @error('vendor_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                   </div>
                <div class="input-group  mb-3">
                    <select class="form-control clearfix" name="vendor_type" required="required">
                        <option>Select a service type</option>
                        <option value="air">Air Ticket booking Service</option>
                        <option value="bus">Bus Ticket booking Service</option>
                        <option value="train">Train Ticket booking Service</option>
                        <option value="tour">Tour booking Service</option>
                        <option value="hotel">Hotel Booking Service</option>
                        <option value="restaurant">Restaurant Booking Service</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="   fas fa-user-check"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('vendor_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="vendor_name" class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('vendor_company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="vendor_company_name" class="form-control" placeholder="Company name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hotel"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('vendor_phone_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="vendor_phone_no" class="form-control" placeholder="Phone no">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('vendor_address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="vendor_address" class="form-control" placeholder="Full Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-marker-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('vendor_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="vendor_email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('confirm-password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               <div class="input-group mb-3">
                   <input type="password" name="confirm-password" class="form-control" placeholder="Retype password">
                   <div class="input-group-append">
                       <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button  style="background-color:#042642d9" type="submit" class="btn btn-block text-white">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            </div>
    </div>
</div>
@endsection