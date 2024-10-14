@extends('agent.layouts.app')
@section('title', 'Block Room')
@section('booking', 'menu-open')
@section('hotel_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
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
                    <div class="callout callout-info">
                        <form action="{{route('agent.RechargeRequest')}}" method="POST">
                            @csrf
                            <div class="card-body mt-2">
                                <div class="row">
                                    <h4>Add Payment</h4>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Bank</label>
                                            <select class="form-control" name="bank_name" required="required" >
                                                <option>Select One</option>
                                                @foreach ($result as $data)
                                                <option>{{ $data->banck_name }}</option>
                                                @endforeach`
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Method</label>
                                            <select class="form-control" name="method" required="required">
                                                <option>Transfer</option>
                                                <option>NEFT/RTGS</option>
                                                <option>Cash Deposit</option>
                                                <option>Cheque Deposit</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Amount</label>
                                            <input type="text" name="amount" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Account Name</label>
                                            <input type="text" name="account_name" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Date Of Payment</label>
                                            <input type="date" name="date_of_payment" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Bank Reference Number</label>
                                            <input type="text" name="bank_ref_number" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="" class=" col-form-label">Message / Instruction</label>
                                            {{-- <input type="text" name="message" class="form-control"
                                                required> --}}
                                                <textarea class="form-control" name="message"  rows="3" required ></textarea>
                                        </div>
                                        <div class="col-sm-3 mt-4">
                                            <button type="submit" class="btn btn-info w-100">Save</button>
                                           {{-- <a herf="{{url('agent/add_pay')}}" class="btn btn-info w-100">Recharge Your Account </a> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
