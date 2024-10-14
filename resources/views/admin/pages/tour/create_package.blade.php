@extends('admin.layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.package_store') }}" method="post" class="form-horizontal">
                @csrf


                <!-- /.card-header -->
                <!-- form start -->


                    <div class="form-group">
                        <label class="col-md-12 control-label" for="selectbasic">Destination Country</label>
                        <div class="col-md-12">
                          <select id="selectbasic" name="destination_country" class="form-control">
                            <option value="0">Select Country</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="India">India</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Singapur">Singapur</option>
                            <option value="Thailand">Thailand</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label">Location</label>
                        <div class="col-sm-12">
                            <input type="text" name="location" class="form-control" placeholder="Location" required="">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-md-12 control-label" for="selectbasic">Tour Length</label>
                        <div class="col-md-12">
                          <select id="selectbasic" name="tour_length" class="form-control">
                            <option value="0">How Night</option>
                            <option value="Up To 2 Night">Up To 2 Night</option>
                            <option value="Up To 3 Night">Up To 3 Night</option>
                            <option value="Up To 4 Night">Up To 4 Night</option>
                            <option value="Up To 5 Night">Up To 5 Night</option>
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
                                <input type="text" name="package_name" class="form-control" placeholder="Full Name" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label"> Starting Point</label>
                            <div class="col-sm-12">
                                <input type="text" name="starting_point" class="form-control" placeholder="Starting Point" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">End Point</label>
                            <div class="col-sm-12">
                                <input type="text" name="end_point" class="form-control" placeholder="Ending Point" required="">
                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">Amount</label>
                            <div class="col-sm-12">
                                <input type="text" name="amount" class="form-control" placeholder="Amount" required="">
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
