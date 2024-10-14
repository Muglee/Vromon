@extends('agent.layouts.app')
@section('title', 'Voucher Debit')
@section('transaction', 'menu-open')
@section('voucher_debit', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Voucher Debit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('agent/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions </li>
                        <li class="breadcrumb-item active">Voucher Debit</li>
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
                                    <th>Debit Amount</th>
                                    <th>Date of Payment</th>
                                    <th>Payment From</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                    <th>Remark</th>
                                    <th>Issue Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Agent Name</th>
                                    <th>Currency</th>
                                    <th>Debit Amount</th>
                                    <th>Date of Payment</th>
                                    <th>Payment From</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                    <th>Remark</th>
                                    <th>Issue Date</th>
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
