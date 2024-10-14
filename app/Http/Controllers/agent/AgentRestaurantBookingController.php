<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\OutletModel;
use Illuminate\Http\Request;
use App\Models\FoodCategoryModel;
use App\Models\MealItemModel;
use App\Models\RestaurantBookingModel;
use App\Models\TableModel;
use App\Models\TimeSlotModel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AgentRestaurantBookingController extends Controller
{
    public function RestaurantBookingView()
    {

       
        return view('agent.pages.restaurant_booking');
    }

    public function SearchRestaurant(Request $request)
    {
        $search_city = $request->input('search_city');
        $checkin_date = $request->input('checkin_date');

        $request->session()->put('checkin_date',$checkin_date);

        $result = OutletModel::query()
            ->where('outlet_location', 'LIKE', "%{$search_city}%")
            ->where(['is_status_active'=>1])
            ->orderBy('created_at', 'desc')->paginate(20);
            //  dd($result);
        return view('agent.pages.restaurant_search_result',compact('result'));
    }


    public function RestaurantSearchResult()
    {
        return view('agent.pages.restaurant_search_result');
    }

    public function CheckAvailableSlot($id,Request $request)
    {
        // dD($id);
        $chk_in_date = $request->session()->get('checkin_date');
        $dataofBookingSlot = array(
            "date" => $request->session()->get('checkin_date')
        );

        $results = RestaurantBookingModel::where('checking_date', $chk_in_date)->get()->toArray();

        $agent_id = $request->session()->get("AGENT_ID");


        $foodCategories = FoodCategoryModel::where('is_status_active', 1)->get();
        $availableTables = TableModel::where('is_status_active', 1)->get();


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
            $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
            return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
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
                    return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                    // return back();
                } else {
                    $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                    $availableTables  = TableModel::whereNotIn('id', $alreadyBookedTables)->get();
                    return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                }
            } else {
                $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
            }
        }
    }

    public function BookingDetails(Request $request)
    {
        // dd();
        $Bookingdetails = array(
            "outlet_id" => $request->outlet_id,
            "agent_id" => $request->agent_id,
            "selectedDate" => $request->selectedDate,
            "time_slots" => $request->time_slots,
            "meal_items" => $request->meal_items,
            "select_tables" => $request->select_tables
        );

        Session::put('Bookingdetails', $Bookingdetails);
        // dd(Session::get('Bookingdetails'));
        return view('agent.pages.book_restaurant_info');
    }

    public function UserDetailsSave(Request $request)
    {
        $BookingDetails = Session::get('Bookingdetails');
        // dd($BookingDetails);
        $restaurantBooking = new RestaurantBookingModel();
        $restaurantBooking->agent_id = $request->agent_id;
        $restaurantBooking->first_name = $request->firstName;
        $restaurantBooking->last_name = $request->lastName;
        $restaurantBooking->phone_no = $request->phone;
        $restaurantBooking->email = $request->email;
        $restaurantBooking->outlet_id = $BookingDetails["outlet_id"];
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
            return redirect()->route('agent.restaurant.book.list');
        }
    }

    public function AllBookingList()
    {
        $agent_id = session()->get("AGENT_ID");
        // dd($agent_id);
        $allRestaurantLists = RestaurantBookingModel::where('agent_id', $agent_id)->get();

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
            foreach ((array)$tmpValue['selected_meal_item'] as $meal) {
                // dd("$meal");
                $mealItems  = MealItemModel::where('id', $meal)->pluck('item_name');
                $tmpValue['item_name'][$j] =   $mealItems[0];
                $j++;
            }

            $tmpValue['selected_tables'] = json_decode($allRestaurantList->selected_tables);
            $k = 0;
            foreach ($tmpValue['selected_tables'] as $table) {
                // dd("$table");
                $selectedTable  = TableModel::where('id', $table)->pluck('table_name');
                $tmpValue['selected_table_name'][$k] =   $selectedTable[0];
                $k++;
            }
            $tmpValue['is_booked'] = $allRestaurantList->is_booked;
            $tmpValue['first_name'] = $allRestaurantList->first_name;
            $tmpValue['last_name'] = $allRestaurantList->last_name;
            $tmpValue['phone_no'] = $allRestaurantList->phone_no;
            $tmpValue['email'] = $allRestaurantList->email;
            $tmpValue['agent_id'] = $allRestaurantList->agent_id;

            array_push($restaurantLists, $tmpValue);

           
           
            
        }
         return view('agent.pages.booking_list', compact('restaurantLists'));

    }

    public function getEmptyTables($m, $d, $y, $slotIdfromFrontend)
    {
        $datestring = "";
        $datestring .= $m . "/" . $d . "/" . $y;
        $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $datestring)->get()->toArray();
        $alreadySelectedtable = [];
        if (count($getRowsOfSelectesDate) > 0) {
            foreach ($getRowsOfSelectesDate as $row) {

                $slotId = (json_decode($row['slot_id']));


                if ($slotId[0] == $slotIdfromFrontend) {
                    $selectedId = $row["id"];

                    $getTableBookInfo = RestaurantBookingModel::where('id', $selectedId)->get()->toArray();


                    foreach ($getTableBookInfo as $row2) {
                        $getTableSlots = json_decode($row2['selected_tables']);
                        foreach ($getTableSlots as $getTableSlot) {
                            array_push($alreadySelectedtable, $getTableSlot);
                        }
                    }
                    $tableAvailable  = TableModel::whereNotIn('id', $alreadySelectedtable)->get()->toArray();
                    return response()->json($tableAvailable);
                    // dd($tableAvailable);
                } else {
                    $tableAvailable = TableModel::where('is_status_active', 1)->get();
                    return response()->json($tableAvailable);
                }
            }
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
}
