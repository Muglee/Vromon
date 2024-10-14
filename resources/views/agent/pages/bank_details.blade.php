@extends('agent.layouts.app')
@section('title', 'Bank Details')
@section('payments', 'menu-open')
@section('bank_details', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bank Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payments </li>
                        <li class="breadcrumb-item active">Bank Details</li>
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
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>A/c Name</th>
                                    <th>A/c Number</th>
                                    <th>Routing Number</th>
                                    <th>Account Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $data)
                                    <tr>
                                        <td>{{ $data->banck_name }}</td>
                                        <td>{{ $data->bank_branch }}</td>
                                        <td>{{ $data->bank_ac_name }}</td>
                                        <td>{{ $data->bank_ac_no }}</td>
                                        <td>{{ $data->bank_routing_number }}</td>
                                        <td>{{ $data->account_type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>A/c Name</th>
                                    <th>A/c Number</th>
                                    <th>Routing Number</th>
                                    <th>Account Type</th>
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
