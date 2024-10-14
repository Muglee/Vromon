@extends('dashboards.restaurant_reservation.layouts.app')
@section('title', 'Meal Items')
@section('food_menu', 'menu-open')
@section('meals', 'active')


@section('content')
    @if($id>0)
        <?php $image_required=" "; ?>
    @else
        <?php $image_required="required"; ?>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($id>0)
                        <h1 class="m-0">Update New Item</h1>
                    @else
                        <h1 class="m-0">Add New Item</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Table </li>
                        @if ($id>0)
                            <li class="breadcrumb-item active">Update New Item </li>
                        @else
                            <li class="breadcrumb-item active">Add New Item </li>
                        @endif

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Manage Meal Item</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row">

                    <div class="col-md-12">
                        <form action="{{route('Item.ManageMealItemProcess')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" class="form-control" >
                            <input type="hidden" name="vendor_id" value="{{session()->get('VENDOR_ID')}}" class="form-control" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select name="food_category_id" class="form-control select2"  style="width: 100%;" required="required">
                                                <option> Select one</option>
                                                @foreach($categories as $key=>$category)
                                                    @if($food_category_id==$category->id)
                                                        <option selected value="{{ $category->id}}"> {{ $category->category_name}}</option>
                                                    @else
                                                        <option value="{{ $category->id}}"> {{ $category->category_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Item Name</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="item_name" value="{{ $item_name }}"  class="form-control"  placeholder="Item Name" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pt-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Image</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" name="item_image"  class="custom-file-input"  accept="image/*" onchange="loadFile(event)" >
                                                <label class="custom-file-label" for="">Choose an image</label>

                                                @error('item_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @if($item_image!='')
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="item_image" src="{{asset('public/storage/media/food_item_image/'.$item_image)}}"/>
                                                </div>
                                            @else
                                                <div class="mt-3" >
                                                    <img width="100px" height="100px" id="item_image" src="{{ asset('public/dashboard/dist/img/dummy_image.jpg')}}" />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Price</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="item_price" value="{{ $item_price }}"   class="form-control"  placeholder="Enter Table Price" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Description</label>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="item_description" id="item_description" class="form-control" required="required" > {!! $item_description !!} </textarea>
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

                </div>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
    <script>
        var loadFile = function(event) {
            var item_image = document.getElementById('item_image');
            item_image.src = URL.createObjectURL(event.target.files[0]);
            item_image.onload = function() {
                URL.revokeObjectURL(item_image.src) // free memory
            }
        };

        CKEDITOR.replace('item_description');
    </script>
@endsection
