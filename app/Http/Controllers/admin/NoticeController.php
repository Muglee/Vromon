<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NoticeModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeController extends Controller
{
    public function NoticeView()
    {
        $result= NoticeModel::orderBy('id', 'DESC')->get();
        return view('admin.pages.settings.notice',compact('result'));
    }
    public function ManageNoticeView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = NoticeModel::where(['id' => $id])->get();
            $result['notice_heading'] = $arr['0']->notice_heading;
            $result['notice'] = $arr['0']->notice;
            $result['id'] = $arr['0']->id;
        } else {
            $result['notice_heading'] = '';
            $result['notice'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.settings.manage_notice',$result);
    }
    public function ManageNoticeProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = NoticeModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new NoticeModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->notice_heading = $request->post('notice_heading');
        $model->notice = $request->post('notice');
        $model->save();

        // return redirect('/vendor/hotel/branch_list');
        return redirect('admin/notice');
    }
    public function DeleteNotice($id)
    {
        NoticeModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
    public function NoticeViewIndex()
    {
        $result=  NoticeModel::orderBy('id', 'desc')->first();;
        return response()->json($result);
    }
}
