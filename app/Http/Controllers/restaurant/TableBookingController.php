<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\TableModel;
use Illuminate\Http\Request;

class TableBookingController extends Controller
{
    public function BookingFormView($id)
    {
        $result= TableModel::find($id);
        return view('dashboards.restaurant_reservation.pages.booking_form',compact('result'));
    }
}
