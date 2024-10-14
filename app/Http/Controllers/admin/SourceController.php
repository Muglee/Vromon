<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SourceModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SourceController extends Controller
{
    public function SourceView()
    {
        $result= SourceModel::orderBy('id', 'DESC')->get();
        return view('admin.pages.settings.source',compact('result'));
    }
    public function ManageSourceView($id='')
    {
        if ($id > 0) {
            $arr = SourceModel::where(['id' => $id])->get();
            $result['source_name'] = $arr['0']->source_name;
            $result['description'] = $arr['0']->description;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
        } else {
            $result['source_name'] = '';
            $result['description'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.settings.manage_source',$result);
    }
    public function ManageSourceProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = SourceModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new SourceModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->source_name = $request->post('source_name');
        $model->description = $request->post('description');
        $model->is_status_active = 1;
        $model->save();

        return redirect('admin/source');
    }
    public function DeleteSource($id)
    {
        SourceModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    public function status($status, $id)
    {
        $model = SourceModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }
}
