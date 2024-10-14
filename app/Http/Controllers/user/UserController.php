<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AdultsModel;
use App\Models\BookedCustomerInfo;
use App\Models\BranchModel;
use App\Models\FoodCategoryModel;
use App\Models\HotelTypesModel;
use App\Models\Info;
use App\Models\KidsModel;
use App\Models\MealItemModel;
use App\Models\NoOfRoomsModel;
use App\Models\OutletModel;
use App\Models\RestaurantBookingModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModle;
use App\Models\TableModel;
use App\Models\TimeSlotModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kids;
use PhpParser\Node\Expr\New_;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function SearchHotel(Request $request)
    {


        $search_city = $request->input('branch_city');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');
        $no_of_room = $request->input('no_of_room');

        $no_of_adult = $request->input('no_of_adult');
        $no_of_child = $request->input('no_of_kid');

        Session::put('branch_city', $search_city);
        Session::put('checkin_date', $checkin_date);
        Session::put('checkout_date', $checkout_date);
        Session::put('no_of_room', $no_of_room);
        Session::put('no_of_adult', $no_of_adult);
        Session::put('no_of_kid', $no_of_child);


        $result = BranchModel::query()
            ->where('branch_city', "{$search_city}")
            ->where(['is_status_active' => 1])
            ->orderBy('number_of_stars', 'desc')
            ->paginate(15);
            // dd($result);

        $kids = KidsModel::get();
        $adults = AdultsModel::get();
        $no_of_rooms = NoOfRoomsModel::get();
        $hotel_types = HotelTypesModel::all();


        return view('user.pages.hotel_search_result', compact('result', 'hotel_types', 'kids', 'adults', 'no_of_rooms'));
    }



    public function HotelWiseRroomListView($id)
    {

        $hotel_id = $id;
        $rooms = RoomModel::where('branch_id', $id)
            ->where(['is_status_active' => 1])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            // dd($rooms);

        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();
        $branch_details = BranchModel::find($id);

        return view('user.pages.room_list', compact('rooms', 'room_types', 'branch', 'branch_details', 'hotel_id'));
    }

    public function BlockRoomView($hotel_id, $id, $price)
    {
        $hotel_id = $hotel_id;
        $room_id = $id;
        $room_price = $price;

        return view('user.pages.block_rooms', compact('room_price', 'hotel_id', 'room_id'));
    }
    public function HotelBookingView()
    {
        $kids = KidsModel::get();
        $adults = AdultsModel::get();
        $no_of_rooms = NoOfRoomsModel::get();
        return view('user.pages.hotel_booking', compact('kids', 'adults', 'no_of_rooms'));
    }

    //booked customer info 

    public function booked_customer_info(Request $request)
    {

        // $validatedData = $request->validate([
        //     'lead_title' => 'required',
        //     'lead_first_name' => 'required',
        //     'lead_last_name' => 'required',
        //     'guest_title' => 'required',
        //     'guest_first_name' => 'required',
        //     'guest_last_name' => 'required',
        //     'email' => 'required',
        //     'country_code' => 'required',
        //     'phone_no' => 'required',
        // ]);


        $bookedCustomerInfo = new BookedCustomerInfo();
        $bookedCustomerInfo->agent_id = Session::get('AGENT_ID');
        $bookedCustomerInfo->hotel_id = $request->hotel_id;
        $bookedCustomerInfo->room_id = $request->room_id;
        $bookedCustomerInfo->room_price = $request->room_price;
        $bookedCustomerInfo->total_room_price = Session::get('total_room_price');
        $bookedCustomerInfo->lead_title = $request->lead_title;
        $bookedCustomerInfo->lead_first_name = $request->lead_first_name;
        $bookedCustomerInfo->lead_last_name = $request->lead_last_name;
        $bookedCustomerInfo->guest_title = $request->guest_title;
        $bookedCustomerInfo->guest_first_name = $request->guest_first_name;
        $bookedCustomerInfo->guest_last_name = $request->guest_last_name;
        $bookedCustomerInfo->total_room = Session::get('no_of_room');
        $bookedCustomerInfo->checkin_date = Session::get('checkin_date');
        $bookedCustomerInfo->checkout_date = Session::get('checkout_date');
        $bookedCustomerInfo->email = $request->email;
        $bookedCustomerInfo->country_code = $request->country_code;
        $bookedCustomerInfo->phone_no = $request->phone_no;

        //$bookedCustomerInfo->room_with_person = session()->get("no_of_adult");

        //for session
        $request->session()->put('lead_title', $bookedCustomerInfo->lead_title);
        $request->session()->put('lead_first_name', $bookedCustomerInfo->lead_first_name);
        $request->session()->put('lead_last_name', $bookedCustomerInfo->lead_last_name);
        $request->session()->put('guest_title', $bookedCustomerInfo->guest_title);
        $request->session()->put('guest_first_name', $bookedCustomerInfo->guest_first_name);
        $request->session()->put('guest_last_name', $bookedCustomerInfo->guest_last_name);

        $request->session()->put('email', $bookedCustomerInfo->email);
        $request->session()->put('country_code', $bookedCustomerInfo->country_code);
        $request->session()->put('phone_no', $bookedCustomerInfo->phone_no);

        $bookedCustomerInfo->save();
        dd($bookedCustomerInfo);



        Alert::success('Success !!', 'Customer Information Successfully Insert ');

        return redirect()->route('user.hotel_booking');

        session_unset();
    }
    //flight booking

    //restaurant booking

    // public function RestaurantBookingView()
    // {
    //     return view('user.pages.restaurant_booking');
    // }
    // public function CheckAvailableSlot($id,Request $request)
    // {
    //     // dD($id);
    //     $chk_in_date = $request->session()->get('checkin_date');
    //     $dataofBookingSlot = array(
    //         "date" => $request->session()->get('checkin_date')
    //     );

    //     $results = RestaurantBookingModel::where('checking_date', $chk_in_date)->get()->toArray();

    //     $agent_id = $request->session()->get("AGENT_ID");


    //     $foodCategories = FoodCategoryModel::where('is_status_active', 1)->get();
    //     $availableTables = TableModel::where('is_status_active', 1)->get();


    //     $mealItemsArray = array();
    //     $tempfoodCategories = array();

    //     foreach ($foodCategories as $foodCategory) {

    //         $mealItems = MealItemModel::where([
    //             ['is_status_active', '=', 1],
    //             ['food_category_id', '=', $foodCategory->id]
    //         ])->orderBy('id', 'ASC')->get();
    //         $tempfoodCategories['category'] =  $foodCategory->category_name;
    //         if (count($mealItems) == null) {
    //             $tempfoodCategories['meal_item_list'] = array();
    //         } else {
    //             $tempfoodCategories['meal_item_list'] = $mealItems;
    //         }

    //         array_push($mealItemsArray, $tempfoodCategories);
    //     }

    //     if (count($results) == 0) {
    //         $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
    //         return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
    //     } else {
    //         $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $request->date)->get()->toArray();

    //         $alreadySelectedslot = [];
    //         $alreadyBookedTables = [];
    //         foreach ($getRowsOfSelectesDate as $row) {
    //             $getBookedSlots = json_decode($row['slot_id']);
    //             $getBookedTables = json_decode($row['selected_tables']);
    //             foreach ($getBookedSlots as $getBookedSlot) {
    //                 array_push($alreadySelectedslot, $getBookedSlot);
    //             }
    //             foreach ($getBookedTables as $getBookedTable) {
    //                 array_push($alreadyBookedTables, $getBookedTable);
    //             }
    //         }

    //         $timeSlots1 = TimeSlotModel::where('is_status_active', 1)->get()->toArray();
    //         $availableTables1 = TableModel::where('is_status_active', 1)->get()->toArray();
    //         // dump($timeSlots1);
    //         if (count($alreadySelectedslot) == count($timeSlots1)) {
    //             if (count($alreadyBookedTables) == count($availableTables1)) {
    //                 $timeSlots  = TimeSlotModel::whereNotIn('id', $alreadySelectedslot)->get();
    //                 return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
    //                 // return back();
    //             } else {
    //                 $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
    //                 $availableTables  = TableModel::whereNotIn('id', $alreadyBookedTables)->get();
    //                 return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
    //             }
    //         } else {
    //             $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
    //             return view('agent.pages.combine_info', compact('id','dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
    //         }
    //     }
    // }






    //flight controller 

    public function OneWayFlightSearch(Request $request)
    {

        //for round ticket
        if ($request->ReturningDateTime != null) {
            $destination_form = $request->Origin;
            $destination_to = $request->Destination;
            $origin = session()->put('origin', $destination_form);
            $destination = session()->put('destination', $destination_to);
            $cabin_class = $request->CabinClass;
            $JourneyType = $request->JourneyType;
            $date = $request->DepartureDateTime;
            //date formating
            $flightDate = strtotime($date);
            $departing_on = date('Y-m-d', $flightDate);
            $adult = $request->AdultQuantity;
            $child = $request->ChildQuantity;
            $infant = $request->InfantQuantity;
            $clientIP = $request->EndUserIp;
            $authorization = $request->authorization;


            $date2 = $request->ReturningDateTime;
            $flightDate2 = strtotime($date2);
            $returning_on = date('Y-m-d', $flightDate2);
            $adult_count = Session::put('a_count', $adult);
            $child_count = Session::put('c_count', $child);
            $infant_count = Session::put('i_count', $infant);
            $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
            $total_count = Session::put('total_count_passenger', $total_count_passenger);

            $desination_from_array[0] = (object)[
                'Origin' => $destination_form,
                'Destination' => $destination_to,
                'CabinClass' => $cabin_class,
                'DepartureDateTime' => $departing_on
            ];
            $desination_from_array[1] = (object)[
                'Origin' => $destination_to,
                'Destination' => $destination_form,
                'CabinClass' => $cabin_class,
                'DepartureDateTime' => $returning_on
            ];

            $client = new Client();
            $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
            $params = [
                'AdultQuantity' => $adult,
                'ChildQuantity' => $child,
                'InfantQuantity' => $infant,
                'EndUserIp' => $clientIP,
                'JourneyType' => "2",
                'Segments' => $desination_from_array
            ];

            $headers = [
                'Authorization' => $authorization,
            ];

            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $params,
                'verify'  => false,
            ]);
            $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

            return response()->json($responseBody);
        }

        //for multi city

        if ($request['vars'] != null) {
            $new_array = [];
            $demo_array = [];
            $demo_array[0] = (object)[
                'Origin' => $request->Origin,
                'Destination' => $request->Destination,
                'CabinClass' => $request->CabinClass,
                'DepartureDateTime' => $request->DepartureDateTime
            ];

            for ($i = 1; $i < 3; $i++) {
                $vars = $request->vars;
                $destination_form = "destination_form" . "_" . $i;
                $destination_to = "destination_to" . "_" . $i;
                $departing_on = "departing_on" . "_" . $i;

                if ($vars[$destination_form]) {
                    $new_array['Origin'] = $vars[$destination_form];
                    $new_array['Destination'] = $vars[$destination_to];
                    $new_array['CabinClass'] = "1";
                    $new_array['DepartureDateTime'] = $vars[$departing_on];
                }
                $demo_array[$i] = (object)$new_array;

                $destination_form = $request->Origin;
                $destination_to = $request->Destination;
                $origin = session()->put('origin', $destination_form);
                $destination = session()->put('destination', $destination_to);
                $cabin_class = $request->CabinClass;
                $JourneyType = $request->JourneyType;
                $date = $request->DepartureDateTime;
                //date formating
                $flightDate = strtotime($date);
                $departing_on = date('Y-m-d', $flightDate);
                $adult = $request->AdultQuantity;
                $child = $request->ChildQuantity;
                $infant = $request->InfantQuantity;
                $clientIP = $request->EndUserIp;
                $authorization = $request->authorization;

                $adult_count = Session::put('a_count', $adult);
                $child_count = Session::put('c_count', $child);
                $infant_count = Session::put('i_count', $infant);

                $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
                $total_count = Session::put('total_count_passenger', $total_count_passenger);


                $client = new Client();
                $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
                $params = [
                    'AdultQuantity' => $adult,
                    'ChildQuantity' => $child,
                    'InfantQuantity' => $infant,
                    'EndUserIp' => $clientIP,
                    'JourneyType' => "3",
                    'Segments' => $demo_array,
                    "preferredAirlines" => null
                ];


                $headers = [
                    'Authorization' => $authorization,
                ];
                $response = $client->request('POST', $url, [
                    'headers' => $headers,
                    'json' => $params,
                    'verify'  => false,
                ]);
                $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                // dd($responseBody);
                return response()->json($responseBody);
            }
        } else {
            // for single ticket

            $destination_form = $request->Origin;
            $destination_to = $request->Destination;
            $origin = session()->put('origin', $destination_form);
            $destination = session()->put('destination', $destination_to);
            $cabin_class = $request->CabinClass;
            $JourneyType = $request->JourneyType;
            $date = $request->DepartureDateTime;
            //date formating
            $flightDate = strtotime($date);
            $departing_on = date('Y-m-d', $flightDate);
            $adult = $request->AdultQuantity;
            $child = $request->ChildQuantity;
            $infant = $request->InfantQuantity;
            $clientIP = $request->EndUserIp;
            $authorization = $request->authorization;
            $adult_count = Session::put('a_count', $adult);
            $child_count = Session::put('c_count', $child);
            $infant_count = Session::put('i_count', $infant);
            $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
            $total_count = Session::put('total_count_passenger', $total_count_passenger);
            $client = new Client();
            $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
            $params = [
                'AdultQuantity' => $adult,
                'ChildQuantity' => $child,
                'InfantQuantity' => $infant,
                'EndUserIp' => $clientIP,
                'JourneyType' => $JourneyType,
                'Segments' => [[
                    'Origin' => $destination_form,
                    'Destination' => $destination_to,
                    'CabinClass' => $cabin_class,
                    'DepartureDateTime' => $departing_on
                ]]
            ];
            $headers = [
                'Authorization' => $authorization,
            ];


            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $params,
                'verify'  => false,
            ]);
            $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
            return response()->json($responseBody);
        }
    }


    public function FlightSearchResultViewAjax()
    {
        $searchResults = $this->AirSearch();
        return response()->json($searchResults);
    }
    public function FlightHubBookViewUser()
    {

        return view('user.pages.flight_hub_book');
    }
    public function FlightAirPrice(Request $req)
    {
        $s_id = Session::put('s_id', $req->searchId);
        $r_id = Session::put('r_id', $req->resultId);
        // dd($s_id,$r_id);
        // dump($s_id);
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPrice";
        $params = [
            "SearchID" => $req->searchId,
            "ResultID" => $req->resultId
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        $fares = $responseBody['Results'][0]['Fares'];
        $segments = $responseBody['Results'][0]['segments'];
        $totalfare = $responseBody['Results'][0]['TotalFare'];
        $discount = $responseBody['Results'][0]['Discount'];
        return view('user.pages.prebook', compact('fares', 'segments', 'totalfare', 'discount'));
        // return $responseBody;

    }




    public function FlightPreBook(Request $req)

    {

        // dd($req);
        $date_of_birth = $req->year . "-" . $req->month . "-" . $req->day;
        $s_id = Session::get('s_id');
        $r_id = Session::get('r_id');
        // dd($s_id,$r_id);

        $count_adult = Session::get("total_count_passenger");
        // dd($count_adult);
        $title = Session::put('title', $req->title);
        $firstName = Session::put('firstName', $req->FirstName);
        $lastName = Session::put('lastName', $req->LastName);
        $paxType = Session::put('paxType', $req->PaxType);
        $dateOfBirth = Session::put('dateOfBirth', "1995-10-06");
        $gender = Session::put('gender', $req->gender);
        $passportExpiryDate = Session::put('passportExpiryDate', "2024-10-20");
        $address1 = Session::put('address1', $req->Address1);
        $countryCode = Session::put('countryCode', $req->CountryCode);
        $nationality = Session::put('nationality', "BD");
        $contactNumber = Session::put('contactNumber', $req->ContactNumber);
        $email = Session::put('email', $req->Email);
        $isLeadPassenger = Session::put('isLeadPassenger', "true");
        $token_id = Session::get('TOKEN_ID');
        // dump( $token_id);
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPreBook";
        //make all fields dynamic
        $p = [
            "Title" => $req->title,
            "FirstName" => $req->FirstName,
            "LastName" => $req->LastName,
            "PaxType" => $req->PaxType,
            "DateOfBirth" => $date_of_birth, //"1995-05-31T05:28:40.535Z"
            "Gender" => $req->gender,
            "Address1" => $req->Address1,
            "CountryCode" => $req->CountryCode,
            "Nationality" => $req->Nationality,
            "ContactNumber" => $req->ContactNumber,
            "Email" => $req->Email,
            "IsLeadPassenger" => true,
            "PassportNumber" => $req->PassportNumber,
            "PassportExpiryDate" => $req->PassportExpiryDate,
            "PassportNationality" => $req->PassportNationality
        ];
        $new_p = ((object)$p);
        // dd([$new_p]);
        $params = [
            "SearchID" =>  $s_id,
            "ResultID" => $r_id,
            // "SearchID"=> $req->searchId,
            // "ResultID"=> '886e2ea7-3a0b-408b-8621-56a7aa28f243',
            'Passengers' => [$new_p],
        ];
        $new_array = array();
        for ($i = 1; $i < (int)($count_adult); $i++) {
            //get day month and year and set it dynamic
            $passenger_no = ("passenger" . "_" . $i);

            $date_of_birth = $req->$passenger_no[7] . "-" . $req->$passenger_no[6] . "-" . $req->$passenger_no[5];
            $new_array['Title'] = $req->$passenger_no[0];
            $new_array['FirstName'] = $req->$passenger_no[1];
            $new_array['LastName'] = $req->$passenger_no[2];
            $new_array['PaxType'] = $req->$passenger_no[3];
            $new_array['DateOfBirth'] =  $date_of_birth;
            $new_array['Gender'] = $req->$passenger_no[4];
            $new_array['Address1'] = $req->$passenger_no[9];
            $new_array['CountryCode'] = $req->$passenger_no[10];
            $new_array['Nationality'] = $req->$passenger_no[8];
            $new_array['ContactNumber'] = $req->$passenger_no[11];
            $new_array['Email'] = "test@m.com";
            $new_array['IsLeadPassenger'] = false;
            $new_array['PassportNumber'] = $req->$passenger_no[13]; //to remove duplicate entry
            $new_array['PassportExpiryDate'] = $req->$passenger_no[14];
            $new_array['PassportNationality'] = $req->$passenger_no[15];
            $params['Passengers'][$i] =  (object)$new_array;
        }



        $users_info = Session::put('users_info', $params);


        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);




        if ($responseBody['Error'] != null) {
            $errors = $responseBody['Error']['ErrorMessage'];

            return  view('user.pages.error', compact('errors'));
        } else {

            if ($responseBody['RePriceStatus'] == "FareUnavailable") {
                $errors = "No ticket found,please try another flight";
                return view('user.pages.error');
            }



            $fares = $responseBody['Results'][0]['Fares'];
            $segments = $responseBody['Results'][0]['segments'];
            $totalfare = $responseBody['Results'][0]['TotalFare'];
            $discount = $responseBody['Results'][0]['Discount'];
            // dd($responseBody['Results'][0]['segments']);
            return view('user.pages.flight_hub_review', compact('fares', 'segments', 'totalfare', 'discount'));
        }
    }
    public function FlightAirBook(Request $req)

    {

        $get_users_info = Session::get('users_info');
        // dd($get_users_info);
        //no need//
        $s_id = Session::get('s_id');
        $r_id = Session::get('r_id');
        $title = Session::get('title');
        $firstName = Session::get('firstName');
        $lastName = Session::get('lastName');
        $paxType = Session::get('paxType');
        $gender = Session::get('gender');
        $email = Session::get('email');
        $contactNumber = Session::get('contactNumber');
        // $email=Session::get('email');
        // $isLeadPassenger=Session::get('isLeadPassenger');
        //no need//
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirBook";

        $headers = [
            'Authorization' => $token_id,
        ];

        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' =>  $get_users_info,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);


        $fares = Session::put('Fares', $responseBody['Results'][0]['Fares']);
        $segments = Session::put('segments', $responseBody['Results'][0]['segments']);
        $totalfare = Session::put('TotalFare', $responseBody['Results'][0]['TotalFare']);
        $discount = Session::put('Discount', $responseBody['Results'][0]['Discount']);
        // $dateOfBirth=Session::put('b_id',$responseBody['BookingID']);
        $booking_id = $responseBody['BookingID'];
        $set_booking_id = Session::put('b_id',  $booking_id);

        // dd( $responseBody);
        if (array_key_exists("BookingStatus", $responseBody)) {
            if ($responseBody['BookingStatus'] == "Booked") {

                $status = $responseBody['BookingStatus'];
                //saving in databse
                $lead_pax = $responseBody['Passengers'][0]['PaxIndex'];
                $contact_no = $responseBody['Passengers'][0]['ContactNumber'];
                $booking_id = $responseBody['BookingID'];
                $origin = $responseBody['Results'][0]['segments'][0]['Origin']['Airport']['AirportCode'];
                $destination = $responseBody['Results'][0]['segments'][0]['Destination']['Airport']['AirportCode'];
                $amount = $responseBody['Results'][0]['TotalFare'];
                $status = $responseBody['BookingStatus'];
                //starts
                $airline = $responseBody['Results'][0]['segments'][0]['Airline']['AirlineName'];
                $duration = $responseBody['Results'][0]['segments'][0]['JourneyDuration'];
                $arrival_time = $responseBody['Results'][0]['segments'][0]['Destination']['ArrTime'];
                $departure_time = $responseBody['Results'][0]['segments'][0]['Origin']['DepTime'];
                $flight_no = $responseBody['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                $aircraft = (int)$responseBody['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                $class = $responseBody['Results'][0]['segments'][0]['Airline']['CabinClass'];
                $f_name = $responseBody['Passengers'][0]['FirstName'];
                $l_name = $responseBody['Passengers'][0]['LastName'];
                $baggage = $responseBody['Results'][0]['segments'][0]['Baggage'];
                $this->create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage);
                //saving in the database end

                $booked_fares = $responseBody['Results'][0]['Fares'];
                $booked_segments = $responseBody['Results'][0]['segments'];
                $booked_totalfare = $responseBody['Results'][0]['TotalFare'];
                $booked_discount = $responseBody['Results'][0]['Discount'];
                return view('user.pages.flight_booked', compact('status', 'booked_fares', 'booked_segments', 'booked_totalfare', 'booked_discount'));
            }

            //solve this
            elseif ($responseBody['BookingStatus'] == "Pending" || $responseBody['BookingStatus'] == "InProcess") {
                // calling FlightAirRetrive api when its pending or inprocess

                $new_response = $this->FlightAirRetrive($booking_id);





                if ($new_response['BookingStatus'] == "InProcess") {
                    $status = $responseBody['BookingStatus'];

                    $lead_pax = $new_response['Passengers'][0]['PaxIndex'];
                    $contact_no = $new_response['Passengers'][0]['ContactNumber'];
                    $booking_id = $new_response['BookingID'];
                    $origin = $new_response['Results'][0]['segments'][0]['Origin']['Airport']['AirportCode'];
                    $destination = $new_response['Results'][0]['segments'][0]['Destination']['Airport']['AirportCode'];
                    $amount = $new_response['Results'][0]['TotalFare'];
                    $status = $new_response['BookingStatus'];

                    //starts
                    $airline = $new_response['Results'][0]['segments'][0]['Airline']['AirlineName'];
                    $duration = $new_response['Results'][0]['segments'][0]['JourneyDuration'];
                    $arrival_time = $new_response['Results'][0]['segments'][0]['Destination']['ArrTime'];
                    $departure_time = $new_response['Results'][0]['segments'][0]['Origin']['DepTime'];
                    $flight_no = $new_response['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                    $aircraft = (int)$new_response['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                    $class = $new_response['Results'][0]['segments'][0]['Airline']['CabinClass'];
                    $f_name = $new_response['Passengers'][0]['FirstName'];
                    $l_name = $new_response['Passengers'][0]['LastName'];
                    $baggage = $new_response['Results'][0]['segments'][0]['Baggage'];


                    $this->create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage);
                    //saving in the database end

                    $booked_fares = $new_response['Results'][0]['Fares'];
                    $booked_segments = $new_response['Results'][0]['segments'];
                    $booked_totalfare = $new_response['Results'][0]['TotalFare'];
                    $booked_discount = $new_response['Results'][0]['Discount'];
                    return view('user.pages.flight_booked', compact('status', 'booked_fares', 'booked_segments', 'booked_totalfare', 'booked_discount'));
                }
            } elseif ($responseBody['BookingStatus'] == "UnConfirmed") {
                dd("Your ticket is unconfirmed.Please call us");
            }
        } else {
            return view('user.pages.hub_success');
        }
    }


    public function create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage)
    {

        // Validate the request...

        $flight = new Info;
        $flight->book_id = $booking_id;
        $flight->lead_pax = $lead_pax;
        $flight->origin = $origin;
        $flight->destination = $destination;
        $flight->amount = $amount;
        $flight->contact_no = $contact_no;
        $flight->status = $status;


        //starts
        $flight->airline = $airline;
        $flight->duration = $duration;
        $flight->arrival_time = $arrival_time;
        $flight->departure_time = $departure_time;
        $flight->flight_no = $flight_no;
        $flight->aircraft = $aircraft;
        $flight->class = $class;
        $flight->f_name = $f_name;
        $flight->l_name = $l_name;
        $flight->baggage = $baggage;
        $flight->save();
    }

    public function FlightAirRetrive($b_id)
    {

        $token_id = Session::get('TOKEN_ID');
        $booking_id = $b_id;
        // $fares=Session::get('Fares');
        // $segments=Session::get('segments');
        // $totalfare=Session::get('TotalFare');
        // $discount=Session::get('Discount');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirRetrieve";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [
            "BookingID" =>   $booking_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        return  $responseBody;
    }


    public function FlightAirTicket()
    {


        // $token_id = Session::get('TOKEN_ID');




        // $client = New Client();

        // $url = "http://api.sandbox.flyhub.com/api/v1/DownloadTicket";

        // $params = [

        //     "BookingID" => "FHB22071953805",
        //     "ResultID" => "e84c20dc-8cc3-4ee1-b27b-0d6e36215b2bTPBG",
        //     "PaxIndex"=> "P64821",
        //     "TicketNumber"=> "TN22071901",
        //     "ShowFare"=> 1,
        //     "ShowAllPax"=> 1,

        // ];



        // $request=$client->get($url,$params);
        // $response = $request->send();



        // $responseBody = json_decode($request->getBody(), JSON_PRETTY_PRINT);
        // dd($responseBody);


        // for booking
        $token_id = Session::get('TOKEN_ID');
        $b_id = Session::get('b_id');
        $fares = Session::get('Fares');
        $segments = Session::get('segments');
        // dd($segments);
        $airline = Session::get('Airline');
        $totalfare = Session::get('TotalFare');
        $discount = Session::get('Discount');

        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirTicketing";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" =>  $b_id,
            "IsAcceptedPriceChangeandIssueTicket" => 'true'

        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        // dd($responseBody);

        return view('user.pages.hub_success', compact('b_id', 'fares', 'segments', 'totalfare', 'discount', 'airline'));
    }

    public function get_ticket($b_id)
    {

        // dd("hello");



        $get_ticket = DB::table('infos')->where('book_id', $b_id)->first();

        return view('user.pages.flight_get_ticket', compact('get_ticket'));
    }

    public function download_ticket()
    {
        $token_id = Session::get('TOKEN_ID');


        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/DownloadTicket";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" => "FHB22071953805",
            "ResultID" => "e84c20dc-8cc3-4ee1-b27b-0d6e36215b2bTPBG",
            "PaxIndex" => "string",
            "TicketNumber" => "TN22071901",
            "ShowFare" => true,
            "ShowAllPax" => false,

        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        dd($responseBody);
    }

    public function FlightAirTicketCancel()
    {

        $b_id = Session::get('b_id');
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirCancel";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" =>  $b_id,
            "IsAcceptedPriceChangeandIssueTicket" => 'true'


        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        if ($responseBody['BookingStatus'] == "InProcess") {

            $cancel_response = "You can not cancel a ticket that is in process";
            return view('user.pages.flight_cancel', compact('cancel_response'));
        } elseif ($responseBody['BookingStatus'] == "Cancelled") {
            $cancel_response = "Your Ticket is cancelled";
            return view('user.pages.flight_cancel', compact('cancel_response'));
        }
    }



    //res


    public function SearchRestaurant(Request $request)
    {


        $search_city = $request->input('search_city');
        $checkin_date = $request->input('checkin_date');

        $request->session()->put('checkin_date', $checkin_date);

        $result = OutletModel::query()
            ->where('outlet_location', 'LIKE', "%{$search_city}%")
            ->where(['is_status_active' => 1])
            ->orderBy('created_at', 'desc')->paginate(20);
        //  dd($result);
        return view('user.pages.restaurant_search_result', compact('result'));
    }


    public function RestaurantSearchResult()
    {
        return view('user.pages.restaurant_search_result');
    }


    public function CheckAvailableSlot($id, Request $request)
    {

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
            return view('user.pages.combine_info', compact('id', 'dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
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
                    return view('user.pages.combine_info', compact('id', 'dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                    // return back();
                } else {
                    $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                    $availableTables  = TableModel::whereNotIn('id', $alreadyBookedTables)->get();
                    return view('user.pages.combine_info', compact('id', 'dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
                }
            } else {
                $timeSlots  = TimeSlotModel::where('is_status_active', 1)->get();
                return view('user.pages.combine_info', compact('id', 'dataofBookingSlot', 'timeSlots', 'mealItemsArray', 'availableTables'));
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
        return view('user.pages.book_restaurant_info');
    }



    public function UserDetailsSave(Request $request)
    {

        $BookingDetails = Session::get('Bookingdetails');
        // dd($BookingDetails);
        $restaurantBooking = new RestaurantBookingModel();
        $restaurantBooking->admin_id = "null";
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

        Alert::success('Success !!', 'Record Successfully Added');
        if ($request->session()->has('Bookingdetails')) {
            $request->session()->forget('Bookingdetails');
        }
        return redirect()->route('index.user');
    }


    public function getEmptyTables($m, $d, $y, $slotIdfromFrontend)
    {

        $datestring = "";
        $datestring .= $m . "/" . $d . "/" . $y;
        $getRowsOfSelectesDate = RestaurantBookingModel::where('checking_date', $datestring)->get()->toArray();
        $alreadySelectedtable = [];
        $tableAvailable = [];
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

            $tableAvailable2  = TableModel::whereNotIn('id', $alreadySelectedtable)->get();
            return response()->json($tableAvailable2);
        } else {
            $tableAvailable = TableModel::where('is_status_active', 1)->get();
            return response()->json($tableAvailable);
        }
    }
}
