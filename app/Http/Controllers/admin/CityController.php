<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CityModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    public function CityView()
    {
        $result= CityModel::get();
        return view('admin.pages.master.cities',compact('result'));
    }
    public function ManageCityView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = CityModel::where(['id' => $id])->get();
            $result['city_name'] = $arr['0']->city_name;
            $result['city_code'] = $arr['0']->city_code;
            $result['id'] = $arr['0']->id;
        } else {
            $result['city_name'] = '';
            $result['city_code'] = '';
            $result['id'] = 0;
        }

        // dd($result);
        return view('admin.pages.master.manage_city',$result);
    }
    public function ManageCityProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = CityModel::find($request->post('id'));
            // $msg = " Updated Successfully ";
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new CityModel();
            // $msg = " Created Successfully ";
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->city_name = $request->post('city_name');
        $model->city_code = $request->post('city_code');
        $model->save();

        // return redirect('/vendor/hotel/branch_list');
        return redirect('admin/cities');
    }
    public function DeleteCity(Request $request, $id)
    {

        CityModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

}
