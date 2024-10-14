<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetailsModel;
use App\Models\BookedRecordModel;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\RestaurantBookingModel;
use App\Models\VendorModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function IndexView()
    {
        return view('admin.pages.dashboard');
    }
    public function PassengerDatabaseView()
    {
        return view('admin.pages.passenger_database');
    }
    public function CustomerView()
    {
        return view('admin.pages.master.customer');
    }
    public function HubBookingView()
    {
        // get all booked infos
        $infos=Info::all();
        return view('admin.pages.booked.hub_booking',compact('infos'));

    }
    public function HoldQueueView()
    {
        return view('admin.pages.booked.hold_queue');
    }
    public function AirTicketsView()
    {
        return view('admin.pages.booked.air_tickets');
    }
    public function HotelBookingView()
    {
        return view('admin.pages.booked.hotel_booking');
    }
    public function BalanceView()
    {
        return view('admin.pages.transactions.balance');
    }
    public function BankDetailsView()
    {
        $result= BankDetailsModel::get();
        return view('admin.pages.transactions.banks_details',compact('result'));
    }
    public function OfflinePaymentsView()
    {
        return view('admin.pages.transactions.offline_payments');
    }
    public function OnlinePaymentsView()
    {
        return view('admin.pages.transactions.online_payments');
    }
    public function CreditPaymentsView()
    {
        return view('admin.pages.transactions.credit_payments');
    }
    public function CreditRequestView()
    {
        return view('admin.pages.transactions.credit_request');
    }
    public function MainStatementView()
    {
        return view('admin.pages.transactions.main_statement');
    }
    public function AgentStatementView()
    {
        return view('admin.pages.transactions.agent_statement');
    }
    public function PaymentReceiptstView()
    {
        return view('admin.pages.transactions.payment_receipts');
    }
    public function BoubbleStatementView()
    {
        return view('admin.pages.transactions.boubble_statement');
    }
    public function CustomerStatementView()
    {
        return view('admin.pages.transactions.customer_statement');
    }

    //set agent and vendor from admin
    public function setVendorView()
    {
        return view('admin.pages.set-vendor');

    }

    public function setAgentView()
    {
        return view('admin.pages.set-agent');

    }
    public function bookedHotelList()
    {
        $all_hotel=DB::table('booked_records')->get();
        // dd( $all_hotel);
        return view('admin.pages.hotel.booked_hotels',compact('all_hotel'));
    }


    public function bookedRestaurantList()
    {
        $all_restaurants=DB::table('restaurant_booking')->get();
       
        // $model = TimeSlotModel::find($request->post('id'));
        //where slot id =id
        //slot id,selected meal items,selected tables
       
        return view('admin.pages.restaurant.booked_restaurant',compact('all_restaurants'));
    }


    public function restaurant_delete($id)
    {
        // RestaurantBookingModel
        $res=RestaurantBookingModel::find($id);
        $delete_res=$res->delete();
        return redirect()->back();
        
     }

    public function hotel_delete($id)
    {
        $res=BookedRecordModel::find($id);
        $delete_res=$res->delete();
        return redirect()->back();
    }
}
