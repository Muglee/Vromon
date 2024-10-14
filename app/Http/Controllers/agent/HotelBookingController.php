<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Http\Controllers\hotel\RoomController;
use App\Models\AdultsModel;
use App\Models\BankDetailsModel;
use App\Models\BookedCustomerInfo;
use App\Models\BranchModel;
use App\Models\HotelTypesModel;
use App\Models\KidsModel;
use App\Models\NoOfRoomsModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use LDAP\Result;
use RealRashid\SweetAlert\Facades\Alert;

class HotelBookingController extends Controller
{

    public function HotelBookingView()
    {
        $kids=KidsModel::get();
        $adults=AdultsModel::get();
        $no_of_rooms=NoOfRoomsModel::get();

        return view('agent.pages.hotel_booking',compact('kids','adults','no_of_rooms'));
    }

    public function index(){
        $agent_id = session()->get ("AGENT_ID");
        $booked_customers_information = BookedCustomerInfo::where('agent_id',$agent_id)->orderBy('id', 'desc')->get();
        // dd($booked_customers_information);

        return view('agent.pages.hotel_booking_data_list', compact('booked_customers_information'));
    }

    public function HotelSearchResultView()
    {
        return view('agent.pages.hotel_search_result');
    }

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
            ->where('branch_city',"{$search_city}")
            ->where(['is_status_active' => 1])
            ->orderBy('number_of_stars', 'desc')
            ->paginate(15);

        $kids=KidsModel::get();
        $adults=AdultsModel::get();
        $no_of_rooms=NoOfRoomsModel::get();
        $hotel_types = HotelTypesModel::all();


        return view('agent.pages.hotel_search_result', compact('result', 'hotel_types','kids','adults','no_of_rooms'));
    }

    public function HotelWiseRroomListView($id)
    {
        $hotel_id = $id;
        $rooms = RoomModel::where('branch_id', $id)
            ->where(['is_status_active' => 1])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        

        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();
        $branch_details=BranchModel::find($id);

        return view('agent.pages.room_list', compact('rooms', 'room_types', 'branch','branch_details', 'hotel_id'));
    }

    public function BlockRoomView($hotel_id, $id, $price,$vendor_id)
    {
        $hotel_id = $hotel_id;
        $room_id = $id;
        $room_price = $price;
        $vendor_id=$vendor_id;

        return view('agent.pages.block_rooms', compact('room_price', 'hotel_id', 'room_id','vendor_id'));
    }

    public function AddPay()
    {
        $result = BankDetailsModel::all();
        return view('agent.pages.add_pay',compact('result'));
        
    }

    // public function BlockRoomView($id, $price)
    // {
    //     $room_id = $id;
    //     $room_price = $price;

    //     $checkin_date = strtotime(Session::get('checkin_date')) ;
    //     $checkout_date = strtotime(Session::get('checkout_date')) ;
    //     $new_checkin_date = date('m/d/y', $checkin_date);
    //     $new_checkout_date = date('m/d/y', $checkout_date);
    //     $days_count = ceil(abs($checkout_date - $checkin_date) / 86400);


    //     $wallet = 100;
    //     $total_room = Session::get('no_of_room');
    //     $room_rent =  $room_price * $days_count * $total_room;


    //     if ($room_rent >= $wallet){
    //         Alert::info('Warring !!', 'Your balance is too low! Please recharge first..!!');
    //     }

    //     Session::flush('message', 'Your balance is too low! Please recharge first..!!');
    //     return view('agent.pages.block_rooms', compact('room_price', 'room_id', 'room_rent', 'wallet'));
    // }
}
