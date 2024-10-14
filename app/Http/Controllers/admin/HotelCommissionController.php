<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CommissionModel;
use App\Models\HotelCommissionModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class HotelCommissionController extends Controller
{
    public function HotelCommissionView()
    {
        $result= HotelCommissionModel::get();
        $package_name= CommissionModel::get();
        return view('admin.pages.commission.hotel_commission',compact('result','package_name'));
    }
    public function ManageWalletView($id='')
    {
        if ($id > 0) {
            $arr = HotelCommissionModel::where(['id' => $id])->get();
            $result['package_name'] = $arr['0']->package_name;
            $result['offer'] = $arr['0']->offer;
            $result['public'] = $arr['0']->public;
            $result['domestic'] = $arr['0']->domestic;
            $result['international'] = $arr['0']->international;
            $result['id'] = $arr['0']->id;
        } else {
            $result['package_name'] = '';
            $result['offer'] = '';
            $result['public'] = '';
            $result['domestic'] = '';
            $result['international'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.commission.manage_hotel_commission',$result);
    }
    public function ManageHotelCommissionProcess(Request $request)
    {
        if ($request->post('id') > 0) {
            $model = HotelCommissionModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new HotelCommissionModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->wallet_name = $request->post('package_name');
        $model->description = $request->post('offer');
        $model->description = $request->post('public');
        $model->description = $request->post('domestic');
        $model->description = $request->post('international');
        $model->save();

        return redirect('admin/hotel_commission');
    }

}
