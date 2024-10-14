
@extends('admin.layouts.app')
@section('title', 'Room List')
@section('room_list', 'active')
@section('manage_room', 'menu-open')

@section('content')


<section class="content">
   <div class="container-fluid">
      <div class="row justify-content text-center pt-2 mt-2" style="justify-content: center">
         <div class="col-md-6">
            <form action="{{route('category.ManageFood')}}" method="get" enctype="multipart/form-data">


               <div class="card card-info" style="height: 300px;">
                  <div class="card-header">
                  <h3 class="card-title">Select a vendor</h3>
                  </div>
                  
            
               <div class="form-group p-2 m-2">
                  
            
                  <select name="vendor" class="custom-select form-control-border" id="exampleSelectBorder">
                <option value=""> Select one</option>
                @foreach($all_restaurant as $key=>$vendor)
               
                    <option selected value="{{ $vendor->id }}"> {{ $vendor->vendor_name}}</option>
               
                  
              
            @endforeach
             </select>
              </div>
            
              <div class="p-2 m-2">
                  <button type="submit" class="btn btn-info">Submit</button>
              </div>
            
            </form>
            
         </div>
      </div>
   </div>
</section>



@endsection


