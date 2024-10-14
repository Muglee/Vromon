<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\AgentRechargeModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RechargeController extends Controller
{
    public function RechargeRequest(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'numeric',
        ]);



        $agent_id= session()->get('AGENT_ID');

        $model = new AgentRechargeModel();
        $model->bank_name = $request->post('bank_name');
        $model->method = $request->post('method');
        $model->amount = $request->post('amount');
        $model->account_name = $request->post('account_name');
        $model->date_of_payment = $request->post('date_of_payment');
        $model->bank_ref_number = $request->post('bank_ref_number');
        $model->message = $request->post('message');
        $model->agent_id = $agent_id;
        $model->request_status = 0;
        $model->save();
        Alert::success('Success !!', ' Successfully Requested');
        return back();
    }
}
