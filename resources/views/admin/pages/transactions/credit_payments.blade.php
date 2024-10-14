@extends('admin.layouts.app')
@section('title', 'Credit Payments')
@section('transaction', 'menu-open')
@section('credit_payments', 'active')

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
                        <li class="breadcrumb-item active">Credit Payments</li>
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
                                    <th>Agent Name</a></th>
                                    <th>Currency</th>
                                    <th>Credit Amount</th>
                                    <th>Validity Of Payment</th>
                                    <th>Approved Date</th>
                                    <th>ApprovedBy</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($result as $data)
                                    <tr>
                                        <th>Agent Name</a></th>
                                        <th>Currency</th>
                                        <th>Credit Amount</th>
                                        <th>Validity Of Payment</th>
                                        <th>Approved Date</th>
                                        <th>ApprovedBy</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Action</th>
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
                                    <tr>
                                        <th>Agent Name</a></th>
                                        <th>Currency</th>
                                        <th>Credit Amount</th>
                                        <th>Validity Of Payment</th>
                                        <th>Approved Date</th>
                                        <th>ApprovedBy</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
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
