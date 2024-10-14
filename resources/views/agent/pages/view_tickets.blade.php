@extends('agent.layouts.app')
@section('title', 'Hold Queue')
@section('booked', 'menu-open')
{{-- @section('hold_queue', 'active') --}}

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Cities</h1> --}}
                    {{-- <a class="btn btn-primary" href="{{ url('agent/manage_city') }}">Add Customer </a> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Booked </li>
                        <li class="breadcrumb-item active">Hub booking</li>
                        <li class="breadcrumb-item active">Tickets</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="callout callout-info">
                <h5 class="text-bold pb-4 ">Profile Info</h5>


            </div> --}}
            {{-- <div class="row mb-3">
                <div class="col-md-3">
                    <a class="btn btn-success w-100" href="{{ url('agent/manage_city') }}">Add City </a>
                </div>
            </div> --}}

        </div><!-- /.container-fluid -->
    </section>
@endsection
