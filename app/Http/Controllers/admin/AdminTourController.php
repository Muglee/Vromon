<?php

namespace App\Http\Controllers\admin;

use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTourController extends Controller
{
    public function TourSearchView()
    {
        return view('admin.pages.tour.tour_search');
    }
    public function CreatePackageView()
    {
        $hotels = Hotel::all();
        return view('admin.pages.tour.create_package', compact('hotels'));
    }

    public function PackageStore(Request $request)
    {


        $create_package = array(
            "destination_country" => $request->destination_country,
            "location" => $request->location,
            "tour_length" => $request->tour_length,
            "package_name" => $request->package_name,
            "starting_point" => $request->starting_point,
            "end_point" => $request->end_point,
            "amount" => $request->amount,
            "image" => $request->image,
        );

        $package_store = Package::create($create_package);

        $hotel = Hotel::find($request->hotel);
        // dd($hotel);
        $package_store->hotels()->attach($hotel);

        Alert::success('Success !!', 'Record Successfully Added');
        return Redirect()->back();


        //dd($request->all());   
    }

    public function PackageList()
    {


        $package = package::all();

        return view('admin.pages.tour.package_list', compact('package'));
    }




    public function EditCreatePackage(Request $request, $id)

    {
        // dd($id);
        $package = Package::find($id);
        $hotels = Hotel::all();

        // dd($package);
        return view('admin.pages.tour.update_package', compact('package', 'hotels'));
    }

    public function UpdatePackage(Request $request, $id)
    {
        $package = Package::find($id);

        $package->image = $request->input('image');
        $package->package_name = $request->input('package_name');
        $package->location = $request->input('location');
        $package->starting_point = $request->input('starting_point');
        $package->end_point = $request->input('end_point');
        $package->amount = $request->input('amount');
        $package->save();
        Alert::success('Success !!', 'Record Successfully Update');
        return back();

        // return view('admin.pages.tour.package_list', compact('package'));
    }

    public function DeletePackageList($id)
    {
        // dd($id);
        Package::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
