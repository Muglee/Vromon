<?php

namespace App\Http\Controllers\hotel;

use App\Http\Controllers\Controller;
use App\Models\BranchModel;
use App\Models\HotelTypesModel;
use App\Models\NumberOfStarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
{
    public function BranchListView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = BranchModel::where("vendor_id", $vendor_id)->get();
        $hotel_types = HotelTypesModel::all();

        return view('dashboards.hotel_reservation.pages.branch_list', compact('result', 'hotel_types'));
    }

    public function ManageBranchView(Request $request, $id = '')
    {
        if ($id > 0) {
            // dd($id);
            $arr = BranchModel::where(['id' => $id])->get();
            $result['branch_name'] = $arr['0']->branch_name;
            $result['hotel_type'] = $arr['0']->hotel_type;
            $result['number_of_stars'] = $arr['0']->number_of_stars;
            $result['branch_country'] = $arr['0']->branch_country;
            $result['branch_city'] = $arr['0']->branch_city;
            $result['branch_location'] = $arr['0']->branch_location;
            $result['near_by_places'] = $arr['0']->near_by_places;
            $result['branch_description'] = $arr['0']->branch_description;
            $result['branch_house_rules'] = $arr['0']->branch_house_rules;
            $result['branch_policy'] = $arr['0']->branch_policy;
            $result['branch_logo'] = $arr['0']->branch_logo;
            $result['branch_cover_image'] = $arr['0']->branch_cover_image;
            $result['branch_facilities'] = $arr['0']->branch_facilities;
            $result['id'] = $arr['0']->id;
        } else {
            $result['branch_name'] = '';
            $result['hotel_type'] = '';
            $result['number_of_stars'] = '';
            $result['branch_country'] = '';
            $result['branch_city'] = '';
            $result['branch_location'] = '';
            $result['near_by_places'] = '';
            $result['branch_description'] = '';
            $result['branch_house_rules'] = '';
            $result['branch_policy'] = '';
            $result['branch_logo'] = '';
            $result['branch_cover_image'] = '';
            $result['branch_facilities'] = '';
            $result['id'] = 0;
        }
        //         dd($result);
        $result['hotel_types'] = HotelTypesModel::where(['is_status_active' => 1])->get();
        $result['number_of_star'] = NumberOfStarModel::where(['is_status_active' => 1])->get();
        return view('dashboards.hotel_reservation.pages.manage_branch', $result);
    }

    public function ManageBranchProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = BranchModel::find($request->post('id'));
            // $msg = " Updated Successfully ";
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new BranchModel();
            // $msg = " Created Successfully ";
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        // dd($request);
        if ($request->hasfile('branch_cover_image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image)) {
                    Storage::delete('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image);
                }
            }

            $branch_cover_image = $request->file('branch_cover_image');
            $ext = $branch_cover_image->extension();
            $image_name = date('mdYHis') . uniqid() . "." . $ext;
            $branch_cover_image->storeAs('/media/branch/CoverImages/', $image_name);
            $model->branch_cover_image = $image_name;
        }
        // for logo
        if ($request->hasfile('branch_logo')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/branch/logo/' . $arrImage[0]->branch_logo)) {
                    Storage::delete('/media/branch/logo/' . $arrImage[0]->branch_logo);
                }
            }
            $branch_logo = $request->file('branch_logo');
            $ext = $branch_logo->extension();
            $image_name = date('mdYHis') . uniqid() . "." . $ext;
            // dd(time());
            // dd($image_name);
            $branch_logo->storeAs('/media/branch/logo/', $image_name);
            $model->branch_logo = $image_name;
            // dd($image_name);
        }
        $model->branch_name = $request->post('branch_name');
        $model->hotel_type = $request->post('hotel_type');
        $model->number_of_stars = $request->post('number_of_stars');
        $model->branch_country = $request->post('branch_country');
        $model->branch_city = $request->post('branch_city');
        $model->branch_location = $request->post('branch_location');
        $model->branch_description = $request->post('branch_description');
        $model->branch_house_rules = $request->post('branch_house_rules');
        $model->branch_policy = $request->post('branch_policy');
        //near_by_places
        $near_by_places = array(
            'place1' => $request->post('place1'),
            'place2' => $request->post('place2'),
        );
        $near_by_places = json_encode($near_by_places);
        //facilities
        $branch_facilities = array(
            'is_security_active' => $request->post('is_security_active'),
            'is_wifi_active' => $request->post('is_wifi_active'),
            'is_dining_active' => $request->post('is_dining_active'),
            'is_pets_active' => $request->post('is_pets_active'),
            'is_parking_active' => $request->post('is_parking_active'),
            'is_breakfast_active' => $request->post('is_breakfast_active'),
            // ====
            'is_swimingpool_active' => $request->post('is_swimingpool_active'),
            'is_roomservice_active' => $request->post('is_roomservice_active'),
            'is_disability_friendly_active' => $request->post('is_disability_friendly_active'),
            'is_aircondition_active' => $request->post('is_aircondition_active'),
            'is_businessfacilities_active' => $request->post('is_businessfacilities_active'),
            'is_fitnesscenter_active' => $request->post('is_fitnesscenter_active'),
            'is_restaurant_active' => $request->post('is_restaurant_active'),
            'is_outdooractivities_active' => $request->post('is_outdooractivities_active'),
            'is_airportshuttel_active' => $request->post('is_airportshuttel_active'),
            'is_couplefriendly_active' => $request->post('is_couplefriendly_active'),
        );
        $branch_facilities = json_encode($branch_facilities);

        $model->branch_facilities = $branch_facilities;
        $model->near_by_places = $near_by_places;
        $model->vendor_id = $request->post('vendor_id');
        $model->is_status_active = 1;
        $model->save();
        return redirect('/vendor/hotel/branch_list');
    }

    public function status($status, $id)
    {
        $model = BranchModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function DeleteBranch(Request $request, $id)
    {
        $cover_image = DB::table('branches')->where(['id' => $id])->get();
        if (Storage::exists('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image)) {
            Storage::delete('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image);
        }
        $logo = DB::table('branches')->where(['id' => $id])->get();
        if (Storage::exists('/media/branch/logo/' . $logo[0]->branch_logo)) {
            Storage::delete('/media/branch/logo/' . $logo[0]->branch_logo);
        }

        BranchModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    public function BranchView($id)
    {
        $result = BranchModel::find($id);
        // dd($result);
        return view('dashboards.hotel_reservation.pages.branch_view', compact('result'));
    }
}
