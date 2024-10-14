@extends('admin.layouts.app')
@section('title', 'Source')
@section('settings', 'menu-open')
@section('source', 'active')

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
                        <li class="breadcrumb-item active">Manage Sources</li>
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
                    <h3 class="card-title">Add Source</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
                        <form action="{{ route('admin.ManageSourceProcess') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Source Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"  name="source_name" value="{{ $source_name }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description" id="description" class="form-control" required="required" >{!! $description !!}</textarea>
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
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
