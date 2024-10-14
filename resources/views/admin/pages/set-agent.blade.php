@extends('admin.layouts.app')
@section('title', 'Passenger Details')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')

<div class="row p-3 d-flex justify-content-center text-cente">
    <div class="col-md-8">

        <div class="card" >
            <div class="card-header" style="background-color:#042642d9">
            <h3 class="card-title text-white">Add Agent</h3>
            </div>
            <form action="{{route('agent.register')}}" method="post">
                @csrf
                <div class="input-group">
                    @error('agent_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="agent_name" class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="company_name" class="form-control" placeholder="Company name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hotel"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('agent_phone_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="agent_phone_no" class="form-control" placeholder="Phone no">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('agent_address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="agent_address" class="form-control" placeholder="Full Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-marker-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    @error('agent_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="agent_email" class="form-control" placeholder="Email">
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