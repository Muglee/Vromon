@extends('admin.layouts.app')
@section('title', 'Manage Currency')
@section('settings', 'menu-open')
@section('currency', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Settings </li>
                        <li class="breadcrumb-item active">Manage Currency</li>
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
                    <h3 class="card-title">Add Currency</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="{{ route('admin.ManageCurrencyProcess') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Currency Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"  name="currency_name" value="{{ $currency_name }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Currency Code</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="currency_code" value="{{ $currency_code }}"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Convertion Rate</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="conversion_rate" value="{{ $conversion_rate }}"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Convertion Rate Plan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?php
                                                        if ($currency_rate_plan==1) {
                                                            $check_value="checked";
                                                        }
                                                        else {
                                                            $check_value="";
                                                        }
                                                    ?>
                                                     <input name="currency_rate_plan" type="checkbox" {{ $check_value }}>
                                                </div>
                                                <div class="col-md-8 d-flex flex-row-reverse">
                                                    <p class="text-danger"> Check If Use Currency Conversion Special Rate Plan !!!!</p>
                                                </div>
                                            </div>

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
