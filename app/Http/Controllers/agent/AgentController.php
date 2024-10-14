<?php

namespace App\Http\Controllers\agent;

use App\Models\Info;
use App\Http\Controllers\Controller;
use App\Models\AdultsModel;
use App\Models\AgentModel;
use App\Models\AgentRechargeModel;
use App\Models\BankDetailsModel;
use App\Models\KidsModel;
use App\Models\NoOfRoomsModel;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function IndexView()
    {
        return view('agent.pages.dashboard');
    }

    public function FlightBookingView()
    {
        return view('agent.pages.flight_booking');
    }
    public function HubBookingView()
    {
        // get all booked infos
        $infos=Info::all();
        return view('agent.pages.booked.hub_booking',compact('infos'));

    }
    public function HoldQueueView()
    {
        return view('agent.pages.booked.hold_queue');
    }

    public function HotelBookingView()
    {
        $kids=KidsModel::get();
        $adults=AdultsModel::get();
        $no_of_rooms=NoOfRoomsModel::get();

        return view('agent.pages.hotel_booking',compact('kids','adults','no_of_rooms'));
    }

    //payments
    public function BankDetailsView()
    {
        $result= BankDetailsModel::get();
        return view('agent.pages.bank_details',compact('result'));
    }
    public function OfflinePaymentsView()
    {
        $agent_id= session()->get('AGENT_ID');
        $result= AgentRechargeModel::where(['agent_id' => $agent_id])->get();
        return view('agent.pages.offline_payments',compact('result'));
    }
    public function OnlinePaymentsView()
    {
        return view('agent.pages.online_payments');
    }

    //transaction
    public function BalanceView()
    {
        return view('agent.pages.balance');
    }
    public function CreditRequestView()
    {
        return view('agent.pages.credit_request');
    }
    public function VoucherDebitView()
    {
        return view('agent.pages.voucher_debit');
    }
    public function StatementView()
    {
        return view('agent.pages.statement');
    }
    public function PassengerDatabaseView()
    {
        return view('agent.pages.passenger_database');
    }

}
