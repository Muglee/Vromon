@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('package.update',$package->id) }}" method="post" class="form-horizontal">
                @csrf
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="selectbasic">Destination Country</label>
                        <div class="col-md-12">
                          <select id="selectbasic" name="destination_country" class="form-control">
                            <option value="0">Select Country</option>
                            <option value="1">Bangladesh</option>
                            <option value="2">India</option>
                            <option value="3">Nepal</option>
                            <option value="3">Singapur</option>
                            <option value="3">Thailand</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="selectbasic">Tour Length</label>
                        <div class="col-md-12">
                          <select id="selectbasic" name  ="tour_length"  class="form-control">
                            {{-- <option  value={{ $package->tour_length }}>How Night</option> --}}
                            <option value="0">How Night</option>
                            <option value="1">Up To 2 Night</option>
                            <option value="2">p To 3 Night</option>
                            <option value="3">p To 4 Night</option>
                            <option value="3">p To 5 Night</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="selectbasic">Choose Hotel</label>
                        <div class="col-md-12">
                      <select class="form-control" name="hotel">
                        <option>Select Item</option>
                        @foreach ($hotels as $item)
                          <option value="{{ $item->id }}"> {{ $item->hotel_name }} </option>
                        @endforeach
                      </select>
                     </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">Package Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="package_name" value="{{ $package->package_name }}" class="form-control" placeholder="Full Name" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label"> Starting Point</label>
                            <div class="col-sm-12">
                                <input type="text" name="starting_point" value="{{ $package->starting_point }}" class="form-control" placeholder="Starting Point" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">End Point</label>
                            <div class="col-sm-12">
                                <input type="text" name="end_point" value="{{ $package->end_point }}" class="form-control" placeholder="Ending Point" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">Amount</label>
                            <div class="col-sm-12">
                                <input type="text" name="amount" value="{{ $package->amount }}" class="form-control" placeholder="Amount" required="">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                          <div class="row">
                              <div class="col-md-3">
                                  <label for="">Image</label>
                              </div>
                              <div class="col-md-12">
                                  <div class="custom-file">
                                      <input type="file" name="image"  class="custom-file-input"  value="" accept="image/*" onchange="loadFile(event)" >
                                      <label class="custom-file-label" for="">Choose a photo</label>
                                      @error('image')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  @if(isset($image))
                                  <div class="mt-3" >
                                      <img width="100px" height="100px" id="img" src="{{asset('/storage/media/tour/'.$image)}}"/>
                                  </div>
                                  @else
                                      <div class="mt-3" >
                                          <img width="100px" height="100px" id="img" src="{{ asset('dashboard/dist/img/dummy_image.jpg')}}" />
                                      </div>
                                  @endif
                              </div>
                          </div>
                    <!-- /.card-body -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                          <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">confirm</button>
                        </div>
                      </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
      var loadFile = function(event)
      {
          var img = document.getElementById('img');
          img.src = URL.createObjectURL(event.target.files[0]);
          img.onload = function() {
              URL.revokeObjectURL(img.src) // free memory
          }
      };
  </script>
@endsection
