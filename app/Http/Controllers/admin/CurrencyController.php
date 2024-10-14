<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CurrencyModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    public function CurrencyView()
    {
        $result= CurrencyModel::get();
        return view('admin.pages.settings.currency',compact('result'));
    }
    public function ManageCurrencyView(Request $request,$id='')
    {
        if ($id > 0) {
            $arr = CurrencyModel::where(['id' => $id])->get();
            $result['currency_name'] = $arr['0']->currency_name;
            $result['currency_code'] = $arr['0']->currency_code;
            $result['conversion_rate'] = $arr['0']->conversion_rate;
            $result['currency_rate_plan'] = $arr['0']->currency_rate_plan;

            if($arr['0']->currency_rate_plan==1){
                $result['currency_rate_plan_selected']="checked";
            }
            $result['id'] = $arr['0']->id;
        } else {
            $result['currency_name'] = '';
            $result['currency_code'] = '';
            $result['conversion_rate'] = '';
            $result['currency_rate_plan'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.settings.manage_currency',$result);
    }
    public function ManageCurrencyProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = CurrencyModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new CurrencyModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->currency_name = $request->post('currency_name');
        $model->currency_code = $request->post('currency_code');
        $model->conversion_rate = $request->post('conversion_rate');
        $model->currency_rate_plan=0;
        if($request->post('currency_rate_plan')!==null){
            $model->currency_rate_plan=1;
        }
        $model->save();

        // return redirect('/vendor/hotel/branch_list');
        return redirect('admin/currency');
    }
    public function DeleteCurrency($id)
    {
        CurrencyModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

}
