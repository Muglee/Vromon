@extends('admin.layouts.app')
@section('title', 'Offline Payments')
@section('transaction', 'menu-open')
@section('offline_pay', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Offline Payments</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Transactions </li>
                        <li class="breadcrumb-item active">Offline Payments</li>
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
                                    <th>Bank</th>
                                    <th>Method</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Account Name</th>
                                    <th>Date of Payment</th>
                                    <th>Accept Payment Date</th>
                                    <th>Payment Form</th>
                                    <th>Status</th>
                                    <th>Bonus</th>
                                    <th>Accept By</th>
                                    <th>Remark</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Bank</th>
                                    <th>Method</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Account Name</th>
                                    <th>Date of Payment</th>
                                    <th>Accept Payment Date</th>
                                    <th>Payment Form</th>
                                    <th>Status</th>
                                    <th>Bonus</th>
                                    <th>Accept By</th>
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
