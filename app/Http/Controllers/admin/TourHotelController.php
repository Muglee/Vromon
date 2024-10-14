<?php

namespace App\Http\Controllers\admin;

use App\Models\Hotel;
use App\Models\PackageHotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TourHotelController extends Controller
{
    public function CreateHotel()
    {
        return view('admin.pages.tour.create_hotel');
    }

    public function HotelStore(Request $request)
    {


        $create_hotel = array(
            "destination_country" => $request->destination_country,
            "hotel_rating" => $request->hotel_rating,
            "hotel_name" => $request->hotel_name,
            "facilities" => $request->facilities,
            "image" => $request->image,
        );

        // dd($create_hotel);
        $hotel_store = Hotel::create($create_hotel);
        // $hotel = Hotel::find(1);
        // // dd($hotel);
        // $package_store->hotels()->attach($hotel);
        Alert::success('Success !!', 'Record Successfully Added');
        return Redirect()->back();
        //dd($request->all());   
    }
    public function HotelList()
    {


        $hotel = Hotel::all();

        return view('admin.pages.tour.hotel_list', compact('hotel'));
    }
    public function EditCreateHotel(Request $request, $id)

    {
        // dd($id);
        $hotel = Hotel::find($id);
        // dd($package);
        return view('admin.pages.tour.update_hotel', compact('hotel'));
    }
    public function UpdateHotel(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        $hotel->image = $request->input('image');
        $hotel_rating = $request->input('hotel_rating');
        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->save();
        Alert::success('Success !!', 'Record Successfully Update');
        return back();

        // return view('admin.pages.tour.package_list', compact('package'));
    }

    public function DeleteHotelList($id)
    {
        // dd($id);
        Hotel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
