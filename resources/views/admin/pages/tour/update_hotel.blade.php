@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('hotel.update',$hotel->id) }}" method="post" class="form-horizontal">
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
                        <label class="col-md-12 control-label" for="selectbasic">Hotel Star</label>
                        <div class="col-md-12">
                          <select id="selectbasic" name  ="hotel_rating"  class="form-control">
                            <option  value={{ $hotel->hotel_rating }}>Hotel Star</option>
                            <option value="0">Hotel Star</option>
                            <option value="1">Up To 2 Star</option>
                            <option value="2">p To 3 Star</option>
                            <option value="3">p To 4 Star</option>
                            <option value="3">p To 5 Star</option>
                          </select>
                        </div>
                      </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-form-label">Hotel Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="hotel_name" value="{{ $hotel->hotel_name }}" class="form-control" placeholder="Full Name" required="">
                              </div>
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
