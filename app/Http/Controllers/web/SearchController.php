<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\BranchModel;
use App\Models\HotelTypesModel;
use App\Models\RoomTypeModle;
use App\Models\RoomModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function SearchResultView()
    {
        return view('web.pages.search_result');
    }
    public function SearchHotel(Request $request )
    {
        $search_city = $request->input('search_city');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');
        $no_of_room = $request->input('no_of_room');
        $no_of_adult = $request->input('no_of_adult');
        $no_of_child = $request->input('no_of_child');

        $request->session()->put('search_city',$search_city);
        $request->session()->put('checkin_date',$checkin_date);
        $request->session()->put('checkout_date',$checkout_date);
        $request->session()->put('no_of_room',$no_of_room);
        $request->session()->put('no_of_adult',$no_of_adult);
        $request->session()->put('no_of_child',$no_of_child);

        $result = BranchModel::query()
                ->where('branch_city', 'LIKE', "%{$search_city}%")
                ->where(['is_status_active'=>1])
                ->get();
        $hotel_types = HotelTypesModel::all();

        //      dd($result);
        //    echo "<pre>";
        //    print_r($result);
        //    die();

        return view('web.pages.search_result', compact('result','hotel_types'));
    }

    public function BranchWiseRoomList($id)
    {
        $result= BranchModel::find($id);
            // ->where(['is_status_active'=>1]);
        $rooms = RoomModel::where('branch_id', $id)
            ->where(['is_status_active' => 1])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $room_types = RoomTypeModle::get();
        // $branch = BranchModel::get();


        return view('web.pages.branch_wise_room_list', compact('result','rooms','room_types'));
    }
    // public function BranchView($id)
    // {
    //     $result= BranchModel::find($id);
    //     // dd($result);
    //     return view('user_hotel.pages.branch_view',compact('result'));
    // }
}
