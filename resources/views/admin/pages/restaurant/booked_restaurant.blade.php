@extends('admin.layouts.app')
@section('title', 'Booking Success')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')


<section class="content">
   
        {{-- <div class="callout callout-info">
            <h5 class="text-bold pb-4 ">Profile Info</h5>


        </div> --}}
        {{-- <div class="row mb-3">
            <div class="col-md-3">
                <a class="btn btn-success w-100" href="{{ url('admin/manage_city') }}">Add City </a>
            </div>
        </div> --}}
        <div class="row">
          
               

                    <div class="card">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>checking_date</th>
                                <th>outlet</th>
                               
                                <th>slot_id</th>
                                <th>selected_meal_item</th>
                               
                                <th>selected_tables</th>
                                <th>first_name</th>
                              
                                <th>phone_no</th>
                                <th>email</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            @foreach ($all_restaurants as $restaurant)
                            <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$restaurant->checking_date}}</td>
                                    <?php 
                                        $outlet=App\Models\VendorModel::where('id',$restaurant->outlet_id)->first();
                                       
                                    ?>
                                    <td>{{(isset($outlet['vendor_company_name']))}}</td>

                                    <?php 
                                    $times=json_decode($restaurant->slot_id);
                                   
                                   
                                    foreach ($times as $value) {
                                       
                                     
                                      $time_slot=App\Models\TimeSlotModel::where('id',$value)->first();
                                    }
                                    $meals=json_decode($restaurant->selected_meal_item);
                                    $meals_array=[];
                                    foreach ($meals as $key => $value) {
                                       
                                      $meal_items=App\Models\MealItemModel::where('id',$value)->first();
                                      array_push( $meals_array, $meal_items);
                                    //  dump($meals_array);
                                    }
                                    $tables=json_decode($restaurant->selected_tables);
                                    $tables_array=[];
                                    foreach ($tables as $key => $value) {
                                      $table_items=App\Models\TableModel::where('id',$value)->first();
                                      array_push( $tables_array, $table_items);
                                    }
                                    ?>
                                    <td>{{($time_slot['start_slot_time'])."-".($time_slot['start_slot_time'])}}</td>
                                        <td>@foreach ($meals_array as $item)
                                            {{$item['item_name']}}  
                                        @endforeach</td>
                                   
                                    <td>@foreach ($tables_array as $item)
                                        {{$item['table_name']}}  
                                    @endforeach</td>


                                   
                                    <td>{{$restaurant->last_name}}</td>
                                    <td>{{$restaurant->phone_no}}</td>
                                    <td>{{$restaurant->email}}</td>
                                    

                                   
                                         <td> 
                                        <a href="{{route('restaurant_delete',$restaurant->id)}}" class="btn btn-danger">delete</a>
                                         </td>
                            </tbody>
                                 
                              

                            
                        
                            @endforeach
                           
                        </table>
                    </div>
                    <!-- /.card-body -->
                
            </div>
            <!-- /.col -->
       
   
</section>
@endsection