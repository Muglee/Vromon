@extends('admin.layouts.app')
@section('title', 'Banks')
@section('master', 'menu-open')
@section('banks', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Master </li>
                        <li class="breadcrumb-item active">Banks</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Bank</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{ route('admin.ManageBankProcess') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Bank Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="banck_name" value="{{ $banck_name }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Bank Branch</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_branch" value="{{ $bank_branch }}" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>A/C Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_ac_name" value="{{ $bank_ac_name }}" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>A/C No</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_ac_no" value="{{ $bank_ac_no }}" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Routing Number </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_routing_number" value="{{ $bank_routing_number }}" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Account Type</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="account_type" value="{{ $account_type }}" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
