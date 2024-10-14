@extends('admin.layouts.app')
@section('title', 'Credit Request')
@section('transaction', 'menu-open')
@section('credit_request', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    {{-- <a class="btn btn-primary" href="{{ url('admin/manage_bank') }}">Add Bank </a> --}}
                </div><!-- /.col -->
                <div class="col-sm-10">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Transactions </li>
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
                                    <th>Agent Name</th>
                                    <th>Currency</th>
                                    <th>Credit Request Amount</th>
                                    <th>Validity of Credit Request Date</th>
                                    <th>Ticket Travel Date</th>
                                    <th>Commitment of Payment Date</th>
                                    <th>Commitment of Payment Time within</th>
                                    <th>Payment From</th>
                                    <th>ApprovedDate</th>
                                    <th>Status</th>
                                    <th>AcceptBy</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($result as $data)
                                    <tr>
                                        <td>{{ $data->banck_name }}</td>
                                        <td>{{ $data->bank_branch }}</td>
                                        <td>{{ $data->bank_ac_name }}</td>
                                        <td>{{ $data->bank_ac_no }}</td>
                                        <td>{{ $data->bank_routing_number }}</td>
                                        <td>{{ $data->account_type }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="p-1">
                                                    <a href="{{url('admin/manage_bank')}}/{{$data->id}}" class="btn bg-gradient-info   btn-flat"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="p-1">
                                                    <a href="{{url('admin/bank/delete')}}/{{$data->id}}" class="btn bg-gradient-danger btn-flat"> <i class="far fa-trash-alt"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Agent Name</th>
                                    <th>Currency</th>
                                    <th>Credit Request Amount</th>
                                    <th>Validity of Credit Request Date</th>
                                    <th>Ticket Travel Date</th>
                                    <th>Commitment of Payment Date</th>
                                    <th>Commitment of Payment Time within</th>
                                    <th>Payment From</th>
                                    <th>ApprovedDate</th>
                                    <th>Status</th>
                                    <th>AcceptBy</th>
                                    <th>Remark</th>
                                    <th>Action</th>
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
