<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OutletModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminOutletController extends Controller
{
    public function OutletListView(Request $request)
    {
        $vendor_id = $request->vendor;
        $result = OutletModel::where("vendor_id", $vendor_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.pages.restaurant.outlet_list', compact('result','vendor_id'));
    }
    public function OutletListViewAjax(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = OutletModel::where("vendor_id", $vendor_id)
            ->orderBy('created_at', 'DESC')
            ->get();
            return response()->json($result);
    }

    public function ManageOutletView(Request $request,$vendor,$id ='',)
    {

        if ($id > 0) {
            $arr = OutletModel::where(['id' => $id])->get();
            $result['outlet_name'] = $arr['0']->outlet_name;
            $result['country'] = $arr['0']->country;
            $result['outlet_city'] = $arr['0']->outlet_city;
            $result['outlet_location'] = $arr['0']->outlet_location;
            $result['outlet_description'] = $arr['0']->outlet_description;
            $result['outlet_logo'] = $arr['0']->outlet_logo;
            $result['outlet_cover_image'] = $arr['0']->outlet_cover_image;
            $result['id'] = $arr['0']->id;
            $result['vendor'] = $vendor;
        } else {
            $result['outlet_name'] = '';
            $result['country'] = '';
            $result['outlet_city'] = '';
            $result['outlet_location'] = '';
            $result['outlet_description'] = '';
            $result['outlet_logo'] = '';
            $result['outlet_cover_image'] = '';
            $result['id'] = '';
            $result['vendor'] =$vendor;
        }
        return view('admin.pages.restaurant.manage_outlet', $result);
    }

    public function AdminManageOutletProcess(Request $request)
    {


        if ($request->post('id') > 0) {

            $model = OutletModel::find($request->post('id'));
            // $msg = " Updated Successfully ";
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new OutletModel();
            // $msg = " Created Successfully ";
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        if ($request->hasfile('outlet_cover_image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('outlets')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/outlet/CoverImages/' . $arrImage[0]->outlet_cover_image)) {
                    Storage::delete('/media/outlet/CoverImages/' . $arrImage[0]->outlet_cover_image);
                }
            }

            $outlet_cover_image = $request->file('outlet_cover_image');
            $ext = $outlet_cover_image->extension();
            $image_name = time() . '.' . $ext;
            $outlet_cover_image->storeAs('/media/outlet/CoverImages/', $image_name);
            $model->outlet_cover_image = $image_name;
        }
        // for logo
        if ($request->hasfile('outlet_logo')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('outlets')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/outlet/logo/' . $arrImage[0]->outlet_logo)) {
                    Storage::delete('/media/outlet/logo/' . $arrImage[0]->outlet_logo);
                }
            }
            $outlet_logo = $request->file('outlet_logo');
            $ext = $outlet_logo->extension();
            $image_name = time() . '.' . $ext;
            $outlet_logo->storeAs('/media/outlet/logo/', $image_name);
            $model->outlet_logo = $image_name;
        }
        $model->outlet_name = $request->post('outlet_name');
        $model->country = $request->post('country');
        $model->outlet_city = $request->post('outlet_city');
        $model->outlet_location = $request->post('outlet_location');
        $model->outlet_description = $request->post('outlet_description');
        $model->vendor_id = $request->vendor_id;
        $model->is_status_active = 1;
        $model->save();
        return redirect()->back();
        // dd('asdasasdasd');
        // // return redirect('adsmin/outlet_list');
    }

    public function status($status, $id)
    {
        $model = OutletModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function DeleteOutlet(Request $request, $id)
    {
        $cover_image = DB::table('outlets')->where(['id' => $id])->get();
        if (Storage::exists('/media/outlet/CoverImages/' . $cover_image[0]->outlet_cover_image)) {
            Storage::delete('/media/outlet/CoverImages/' . $cover_image[0]->outlet_cover_image);
        }
        $logo = DB::table('outlets')->where(['id' => $id])->get();
        if (Storage::exists('/media/outlet/logo/' . $logo[0]->outlet_logo)) {
            Storage::delete('/media/outlet/logo/' . $logo[0]->outlet_logo);
        }
        OutletModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    public function SelectVendorOutlet(){

        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_outlet',compact('all_restaurant'));
    }

    //    public function BranchView($id)
    //    {
    //        $result= BranchModel::find($id);
    //        // dd($result);
    //        return view('dashboards.hotel_reservation.pages.branch_view',compact('result'));
    //    }
}
