@extends('admin.layouts.app')
@section('title', 'Payment Receipts')
@section('transaction', 'menu-open')
@section('payment_receipts', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Online Payment Receipts</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Transactions </li>
                        <li class="breadcrumb-item active"> Payment Receipts</li>
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
                                    <th>Receipt No</th>
                                    <th>Customer Name</th>
                                    <th>Customer ID</th>
                                    <th>Customer Mobile</th>
                                    <th>Due Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Pay Amount</th>
                                    <th>Currency</th>
                                    <th>Discount</th>
                                    <th>BankName</th>
                                    <th>PayMethod	</th>
                                    <th>Remark</th>
                                    <th>AddedOn</th>
                                    <th>AddedBy</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Receipt No</th>
                                    <th>Customer Name</th>
                                    <th>Customer ID</th>
                                    <th>Customer Mobile</th>
                                    <th>Due Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Pay Amount</th>
                                    <th>Currency</th>
                                    <th>Discount</th>
                                    <th>BankName</th>
                                    <th>PayMethod	</th>
                                    <th>Remark</th>
                                    <th>AddedOn</th>
                                    <th>AddedBy</th>
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
