<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetailsModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    public function BankView()
    {
        $result= BankDetailsModel::all();
        return view('admin.pages.master.banks',compact('result'));
    }
    public function ManageBankView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = BankDetailsModel::where(['id' => $id])->get();
            $result['banck_name'] = $arr['0']->banck_name;
            $result['bank_branch'] = $arr['0']->bank_branch;
            $result['bank_ac_name'] = $arr['0']->bank_ac_name;
            $result['bank_ac_no'] = $arr['0']->bank_ac_no;
            $result['bank_routing_number'] = $arr['0']->bank_routing_number;
            $result['account_type'] = $arr['0']->account_type;
            $result['id'] = $arr['0']->id;
        } else {
            $result['banck_name'] = '';
            $result['bank_branch'] = '';
            $result['bank_ac_name'] = '';
            $result['bank_ac_no'] = '';
            $result['bank_routing_number'] = '';
            $result['account_type'] = '';
            $result['id'] = 0;
        }

        // dd($result);
        return view('admin.pages.master.manage_bank',$result);
    }
    public function ManageBankProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = BankDetailsModel::find($request->post('id'));
            // $msg = " Updated Successfully ";
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new BankDetailsModel();
            // $msg = " Created Successfully ";
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->banck_name = $request->post('banck_name');
        $model->bank_branch = $request->post('bank_branch');
        $model->bank_ac_name = $request->post('bank_ac_name');
        $model->bank_ac_no = $request->post('bank_ac_no');
        $model->bank_routing_number = $request->post('bank_routing_number');
        $model->account_type = $request->post('account_type');
        $model->save();

        return redirect('admin/banks');
    }
    public function DeleteBank(Request $request, $id)
    {

        BankDetailsModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
