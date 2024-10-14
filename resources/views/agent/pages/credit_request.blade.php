@extends('agent.layouts.app')
@section('title', 'Credit Request')
@section('transaction', 'menu-open')
@section('credit_request', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Credit Request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payments </li>
                        <li class="breadcrumb-item active">Credit Request</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Agent Name</th>
                                    <th>Currency</th>
                                    <th>Credit Request Amount</th>
                                    <th>Validity of Credit Request Date</th>
                                    <th>Ticket Travel Date</th>
                                    <th>Commitment of Payment Date</th>
                                    <th>Commitment of Payment Time within	</th>
                                    <th>Payment From</th>
                                    <th>ApprovedDate</th>
                                    <th>Status</th>
                                    <th>AcceptBy</th>
                                    <th>Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Agent Name</th>
                                    <th>Currency</th>
                                    <th>Credit Request Amount</th>
                                    <th>Validity of Credit Request Date</th>
                                    <th>Ticket Travel Date</th>
                                    <th>Commitment of Payment Date</th>
                                    <th>Commitment of Payment Time within	</th>
                                    <th>Payment From</th>
                                    <th>ApprovedDate</th>
                                    <th>Status</th>
                                    <th>AcceptBy</th>
                                    <th>Remark</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>


        </div><!-- /.container-fluid -->
    </section>
@endsection
