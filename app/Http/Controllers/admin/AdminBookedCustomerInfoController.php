<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookedCustomerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBookedCustomerInfoController extends Controller
{
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
        $bookedCustomerInfo->total_room_price= Session::get('total_room_price');
        $bookedCustomerInfo->lead_title = $request->lead_title;
        $bookedCustomerInfo->lead_first_name = $request->lead_first_name;
        $bookedCustomerInfo->lead_last_name = $request->lead_last_name;
        $bookedCustomerInfo->guest_title = $request->guest_title;
        $bookedCustomerInfo->guest_first_name = $request->guest_first_name;
        $bookedCustomerInfo->guest_last_name = $request->guest_last_name;
        $bookedCustomerInfo->total_room= Session::get('no_of_room');
        $bookedCustomerInfo->checkin_date = Session::get('checkin_date') ;
        $bookedCustomerInfo->checkout_date = Session::get('checkout_date') ;
        $bookedCustomerInfo->email = $request->email;
        $bookedCustomerInfo->country_code = $request->country_code;
        $bookedCustomerInfo->phone_no = $request->phone_no;

        //$bookedCustomerInfo->room_with_person = session()->get("no_of_adult");

        //for session
        $request->session()->put('lead_title', $bookedCustomerInfo->lead_title);
        $request->session()->put('lead_first_name', $bookedCustomerInfo->lead_first_name);
        $request->session()->put('lead_last_name', $bookedCustomerInfo->lead_last_name);
        $request->session()->put('guest_title', $bookedCustomerInfo->guest_title);
        $request->session()->put('guest_first_name',$bookedCustomerInfo->guest_first_name);
        $request->session()->put('guest_last_name', $bookedCustomerInfo->guest_last_name);

        $request->session()->put('email', $bookedCustomerInfo->email);
        $request->session()->put('country_code', $bookedCustomerInfo->country_code);
        $request->session()->put('phone_no', $bookedCustomerInfo->phone_no);

        $bookedCustomerInfo->save();



        Alert::success('Success !!', 'Customer Information Successfully Insert ');

        return redirect()->route('agent.hotel_booking');

        session_unset();
    }
}
