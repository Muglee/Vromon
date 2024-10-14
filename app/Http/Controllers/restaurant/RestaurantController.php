<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function IndexView()
    {
    
        $restaurant_booking=DB::table('restaurant_booking')->where('is_booked',1)->get()->count();
        $meal_items=DB::table('meal_items')->where('is_status_active',1)->get()->count();
        $item_price_count=DB::table('meal_items')->select('item_price')->get()->sum('item_price');
        // dd($item_price_count);
        
        return view('dashboards.restaurant_reservation.pages.dashboard',compact('restaurant_booking','meal_items','item_price_count'));
    }
}
