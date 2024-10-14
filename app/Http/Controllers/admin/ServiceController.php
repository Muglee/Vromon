<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceController extends Controller
{
    public function ServiceView()
    {
        $result= ServiceModel::orderBy('id', 'DESC')->get();
        return view('admin.pages.settings.service',compact('result'));
    }
    public function ManageServiceView($id='')
    {
        if ($id > 0) {
            $arr = serviceModel::where(['id' => $id])->get();
            $result['services_name'] = $arr['0']->services_name;
            $result['description'] = $arr['0']->description;
            $result['id'] = $arr['0']->id;
        } else {
            $result['services_name'] = '';
            $result['description'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.settings.manage_service',$result);
    }
    public function ManageServiceProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = ServiceModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new ServiceModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->services_name = $request->post('services_name');
        $model->description = $request->post('description');
        $model->save();

        return redirect('admin/service');
    }
    public function DeleteService($id)
    {
        serviceModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
