<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\FoodCategoryModel;
use App\Models\MealItemModel;
use App\Models\OutletModel;
use App\Models\RestaurantBookingModel;
use App\Models\BranchModel;
use App\Models\RoomTypeModle;
use App\Models\TableModel;
use App\Models\TimeSlotModel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Outlet;

class RestaurantBookingController extends Controller
{

    public function RestaurantInvoiceView(Request $request, $id)
    {
        $get_restaurant = RestaurantBookingModel::find($id);
        // dd($get_restaurant);
        $get_meal_items = $get_restaurant->selected_meal_item;
         $get_all_meal_items=json_decode($get_meal_items,true);
         $all_items=[];
         foreach ($get_all_meal_items as $key => $meal_items) {
            # code...
           $get_meal_item=DB::table('meal_items')->where('id',$meal_items)->first();
           $get_meal_item_to_array= (array)$get_meal_item;
           $merged_items=array_push($all_items, $get_meal_item_to_array);
         }
        return view('dashboards.invoice.restaurantinvoice', compact('get_restaurant', 'get_meal_item','all_items'));
    }

    public function RestaurantBookingView()
    {
        return view('dashboards.restaurant_reservation.pages.book_restaurant');
    }
    public function CheckAvailableSlot(Request $request)
    {
        $dataofBookingSlot = array(
            "date" => $request->date
        );

        $results = RestaurantBookingModel::where('checking_date', $request->date)->get()->toArray();

        $vendor_id = $request->session()->get("VENDOR_ID");


        $foodCategories = FoodCategoryModel::where('is_status_active', 1)->where('vendor_id', $vendor_id)->get();
        $availableTables = TableModel::where('is_status_active', 1)->where('vendor_id', $vendor_id)->get();


        $mealItemsArray = array();
        $tempfoodCategories = array();

        foreach ($foodCategories as $foodCategory) {

            $mealItems = MealItemModel::where([
                ['is_status_active', '=', 1],
                ['food_category_id', '=', $foodCategory->id]
            ])->orderBy('id', 'ASC')->get();
            $tempfoodCategories['category'] =  $foodCategory->category_name;
            if (count($mealItems) == null) {
                $tempfoodCategories['meal_item_list'] = array();
            } else {
                $tempfoodCategories['meal_item_list'] = $mealItems;
            }

            array_push($mealItemsArray, $tempfoodCategories);
        }

        if (count($results) == 0) {
            $timeSlots  = TimeSlotModel::where('is_status_active', 1)->where('vendor_id', $vendor_id)->get();
            return view('dashboards.restaurant_reservation.pages.combine_info', compact('dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
        } else {
            $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $request->date)->get()->toArray();

            $alreadySelectedslot = [];
            $alreadyBookedTables = [];
            foreach ($getRowsOfSelectesDate as $row) {
                $getBookedSlots = json_decode($row['slot_id']);
                $getBookedTables = json_decode($row['selected_tables']);
                foreach ($getBookedSlots as $getBookedSlot) {
                    array_push($alreadySelectedslot, $getBookedSlot);
                }
                foreach ($getBookedTables as $getBookedTable) {
                    array_push($alreadyBookedTables, $getBookedTable);
                }
            }

            $timeSlots1 = TimeSlotModel::where('is_status_active', 1)->get()->toArray();
            $availableTables1 = TableModel::where('is_status_active', 1)->get()->toArray();
            // dump($timeSlots1);
            if (count($alreadySelectedslot) == count($timeSlots1)) {
                if (count($alreadyBookedTables) == count($availableTables1)) {
                    $timeSlots  = TimeSlotModel::whereNotIn('id', $alreadySelectedslot)->get();
                    return view('dashboards.restaurant_reservation.pages.combine_info', compact('dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                    // return back();
                } else {
                    $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                    $availableTables  = TableModel::whereNotIn('id', $alreadyBookedTables)->get();
                    return view('dashboards.restaurant_reservation.pages.combine_info', compact('dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                }
            } else {
                $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                return view('dashboards.restaurant_reservation.pages.combine_info', compact('dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
            }
        }
    }

    public function BookingDetails(Request $request)
    {


        $Bookingdetails = array(
            "vendor_id" => $request->vendor_id,
            "selectedDate" => $request->selectedDate,
            "time_slots" => $request->time_slots,
            "meal_items" => $request->meal_items,
            "select_tables" => $request->select_tables
        );

        Session::put('Bookingdetails', $Bookingdetails);
        // dd(Session::get('Bookingdetails'));
        return view('dashboards.restaurant_reservation.pages.book_restaurant_info');
    }

    public function UserDetailsSave(Request $request)
    {


        $get_outlet_id = OutletModel::select('id')->where('vendor_id', $request->vendor_id)->first();
        $outlet_id = $get_outlet_id->id;
        $BookingDetails = Session::get('Bookingdetails');
        $restaurantBooking = new RestaurantBookingModel();
        $restaurantBooking->vendor_id = $request->vendor_id;
        $restaurantBooking->outlet_id = $outlet_id;
        $restaurantBooking->first_name = $request->firstName;
        $restaurantBooking->last_name = $request->lastName;
        $restaurantBooking->phone_no = $request->phone;
        $restaurantBooking->email = $request->email;
        $restaurantBooking->checking_date = $BookingDetails["selectedDate"];
        $restaurantBooking->slot_id = json_encode($BookingDetails["time_slots"]);
        $restaurantBooking->selected_meal_item = json_encode($BookingDetails["meal_items"]);
        $restaurantBooking->selected_tables = json_encode($BookingDetails["select_tables"]);
        $restaurantBooking->is_booked = 1;

        if ($restaurantBooking->save()) {
            Alert::success('Success !!', 'Record Successfully Added');
            if ($request->session()->has('Bookingdetails')) {
                $request->session()->forget('Bookingdetails');
            }
            return $this->AllBookingList();
        }
    }

    public function AllBookingList()
    {
        $vendor_id = session()->get("VENDOR_ID");
        $allRestaurantLists = RestaurantBookingModel::where('vendor_id', $vendor_id)->orderBy('id', 'DESC')->get();

        $restaurantLists = array();
        $tmpValue = array();

        foreach ($allRestaurantLists as $allRestaurantList) {
            $tmpValue['id'] = $allRestaurantList->id;
            $tmpValue['checking_date'] = $allRestaurantList->checking_date;
            $tmpValue['slot_id'] = json_decode($allRestaurantList->slot_id);
            $i = 0;
            if (count($tmpValue['slot_id']) != null) {
                foreach ($tmpValue['slot_id'] as $slot) {
                    $timeSlots  = TimeSlotModel::where('id', $slot)->pluck('start_slot_time');
                    if (count($timeSlots) != null) {
                        $tmpValue['slot_time'][$i] =   $timeSlots[0];
                        $i++;
                    }
                }
            }

            $tmpValue['selected_meal_item'] = json_decode($allRestaurantList->selected_meal_item);

            $j = 0;
            foreach ($tmpValue['selected_meal_item'] as $meal) {
                // dd($meal);
                $mealItems  = MealItemModel::where('id', $meal)->pluck('item_name');
                $tmpValue['item_name'][$j] =   $mealItems[0];
                $j++;
            }

            $tmpValue['selected_tables'] = json_decode($allRestaurantList->selected_tables);
            $k = 0;
            foreach ($tmpValue['selected_tables'] as $table) {
                $selectedTable  = TableModel::where('id', $table)->pluck('table_name');
                $tmpValue['selected_table_name'][$k] =   $selectedTable[0];
                $k++;
            }
            $tmpValue['is_booked'] = $allRestaurantList->is_booked;
            $tmpValue['first_name'] = $allRestaurantList->first_name;
            $tmpValue['last_name'] = $allRestaurantList->last_name;
            $tmpValue['phone_no'] = $allRestaurantList->phone_no;
            $tmpValue['email'] = $allRestaurantList->email;
            $tmpValue['vendor_id'] = $allRestaurantList->vendor_id;



            array_push($restaurantLists, $tmpValue);
        }


        return view('dashboards.restaurant_reservation.pages.booking_list', compact('restaurantLists'));
    }

    // public function getEmptyTables($m, $d, $y, $slotIdfromFrontend)
    // {
    //     $datestring = "";
    //     $datestring .= $m . "/" . $d . "/" . $y;
    //     $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $datestring)->get()->toArray();
    //     $alreadySelectedtable = [];
    //     if (count($getRowsOfSelectesDate) > 0) {
    //         foreach ($getRowsOfSelectesDate as $row) {

    //             $slotId = (json_decode($row['slot_id']));


    //             if ($slotId[0] == $slotIdfromFrontend) {
    //                 $selectedId = $row["id"];

    //                 $getTableBookInfo = RestaurantBookingModel::where('id', $selectedId)->get();


    //                 foreach ($getTableBookInfo as $row2) {
    //                     $getTableSlots = json_decode($row2['selected_tables']);
    //                     foreach ($getTableSlots as $getTableSlot) {
    //                         array_push($alreadySelectedtable, $getTableSlot);
    //                     }
    //                 }
    //                 $tableAvailable  = TableModel::whereNotIn('id', $alreadySelectedtable)->get()->toArray();
    //                 return response()->json($tableAvailable);
    //             } else {
    //                 $tableAvailable = TableModel::where('is_status_active', 1)->get();
    //                 return response()->json($tableAvailable);
    //             }
    //         }
    //     } else {
    //         $tableAvailable = TableModel::where('is_status_active', 1)->get();
    //         return response()->json($tableAvailable);
    //     }
    // }
    public function getEmptyTables($m, $d, $y, $slotIdfromFrontend)
    {
       
        $datestring = "";
        $datestring .= $m . "/" . $d . "/" . $y;
        $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $datestring)->get()->toArray();
        $alreadySelectedtable=[];
        $tableAvailable=[];
        if (count($getRowsOfSelectesDate) > 0) {
           
            foreach ($getRowsOfSelectesDate as $row) {
                $slotId = (json_decode($row['slot_id']));
                if ($slotId[0] == $slotIdfromFrontend) {
                    $selectedId = $row["id"];
                    $getTableBookInfo = RestaurantBookingModel::where('id', $selectedId)->get();
                    foreach ($getTableBookInfo as $row2) {
                        $getTableSlots = json_decode($row2['selected_tables']);
                        foreach ($getTableSlots as $getTableSlot) {
                            array_push($alreadySelectedtable, $getTableSlot);
                        }
                    }
                  
                }
              
            }

            $tableAvailable2  = TableModel::whereNotIn('id',$alreadySelectedtable)->get();
            return response()->json($tableAvailable2 );
        } else {
            $tableAvailable = TableModel::where('is_status_active', 1)->get();
            return response()->json($tableAvailable);
        }
    }


    public function DeleteBookingList($id)
    {
        RestaurantBookingModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }




    //newly added

    public function manage_restaurant(Request $request, $id)
    {
        if ($id > 0) {
            $arr = RestaurantBookingModel::where(['id' => $id])->get();

            $result['checking_date'] = $arr['0']->checking_date;
            $result['slot_time'] = $arr['0']->slot_time;
            $result['item_name'] = $arr['0']->item_name;
            $result['selected_table_name'] = $arr['0']->selected_table_name;
            $result['is_booked'] = $arr['0']->is_booked;
            $result['first_name'] = $arr['0']->first_name;
            $result['last_name'] = $arr['0']->last_name;
            $result['phone_no'] = $arr['0']->phone_no;
            $result['email'] = $arr['0']->email;
        } else {
            $result['checking_datee'] = '';
            $result['slot_time'] = '';
            $result['item_name'] = '';
            $result['selected_table_name'] = '';
            $result['is_booked'] = '';
            $result['first_name'] = '';
            $result['last_name'] = '';
            $result['phone_no'] = '';
            $result['email'] = '';
        }

        $vendor_id = $request->session()->get("VENDOR_ID");
        $result['branch'] = BranchModel::where("vendor_id", $vendor_id)->get();
        $result['room'] = RoomTypeModle::get();
        return view('dashboards.restaurant_reservation.pages.manage_restaurant', compact('id'), $result);
    }





    public function manage_restaurant_edit(Request $request)

    {

        //  // validation starts
        //  $rules = [
        //     'room_image' => 'mimes:jpeg,png,jpg,gif',
        //     // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
        // ];
        // $custom_message = [

        //     // 'room_name.unique'=>'This room is already exist',
        //     'room_image.mimes' => 'Image must be on jpeg,png,jpg,gif format',
        // ];
        // $this->validate($request, $rules, $custom_message);

        // // validation ends

        if ($request->post('id') > 0) {

            $model = RestaurantBookingModel::find($request->id);


            $model->first_name = $request->post('firstName');
            $model->last_name = $request->post('lastName');
            $model->phone_no = $request->post('phone');
            $model->email = $request->post('email');

            $affected = DB::table('restaurant_booking')
                ->where('id', $request->id)
                ->update([
                    'first_name' =>  $request->post('firstName'),
                    'last_name' => $request->post('lastName'),
                    'phone_no' => $request->post('phone'),
                    'email' => $request->post('email')
                ]);

            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            dd('stop');
            // $model = new
            // RestaurantBookingModel();
            // Alert::success('Success !!', 'Record Successfully Added');
        }





        $model->save();
        return redirect()->back();
    }
}
