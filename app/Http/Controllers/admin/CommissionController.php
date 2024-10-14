<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CommissionModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommissionController extends Controller
{
    //hotel packages
    public function HotelPackageView()
    {
        $result= CommissionModel::where('commission_for','hotel')->get();
        return view('admin.pages.commission.hotel_packages',compact('result'));
    }
    public function ManageHotelPackageView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = CommissionModel::where(['id' => $id])->get();
            $result['package_name'] = $arr['0']->package_name;
            $result['price'] = $arr['0']->price;
            $result['description'] = $arr['0']->description;
            $result['commission_for'] = $arr['0']->commission_for;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
        } else {
            $result['package_name'] = '';
            $result['price'] = '';
            $result['description'] = '';
            $result['commission_for'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
        }

        // dd($result);
        return view('admin.pages.manage_hotel_package',$result);
    }
    public function ManageHotelPackageProcess(Request $request)
    {
        if ($request->post('id') > 0) {
            $model = CommissionModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new CommissionModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->package_name = $request->post('package_name');
        $model->price = $request->post('price');
        $model->description = $request->post('description');
        $model->commission_for = "hotel";
        $model->is_status_active = 1;
        $model->save();

        // return redirect('/vendor/hotel/branch_list');
        return redirect('admin/hotel_package');
    }


    //flight package
    public function FlightPackageView()
    {
        $result= CommissionModel::where('commission_for','flight')->get();
        return view('admin.pages.commission.flight_packages',compact('result'));
    }
    public function ManageFlightPackageView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = CommissionModel::where(['id' => $id])->get();
            $result['package_name'] = $arr['0']->package_name;
            $result['price'] = $arr['0']->price;
            $result['description'] = $arr['0']->description;
            $result['commission_for'] = $arr['0']->commission_for;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
        } else {
            $result['package_name'] = '';
            $result['price'] = '';
            $result['description'] = '';
            $result['commission_for'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.commission.manage_flight_package',$result);
    }
    public function ManageFlightPackageProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = CommissionModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new CommissionModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->package_name = $request->post('package_name');
        $model->price = $request->post('price');
        $model->description = $request->post('description');
        $model->commission_for = "flight";
        $model->is_status_active = 1;
        $model->save();
        return redirect('admin/flight_package');
    }

    //delete commision
    public function DeleteCommission(Request $request, $id)
    {

        CommissionModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    //status
    public function status($status, $id)
    {
        $model = CommissionModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function PaymentCommissionView()
    {
        return view('admin.pages.commission.payment_commission');
    }
    
    public function PaymentCommissionB2BView()
    {
        return view('admin.pages.commission.payment_commission_B2B');
    }
}
