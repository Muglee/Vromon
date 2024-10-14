<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WalletModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class WalletController extends Controller
{
    public function WalletView()
    {
        $result= WalletModel::orderBy('id', 'DESC')->get();
        return view('admin.pages.settings.wallet',compact('result'));
    }
    public function ManageWalletView($id='')
    {
        if ($id > 0) {
            $arr = WalletModel::where(['id' => $id])->get();
            $result['wallet_name'] = $arr['0']->wallet_name;
            $result['description'] = $arr['0']->description;
            $result['id'] = $arr['0']->id;
        } else {
            $result['wallet_name'] = '';
            $result['description'] = '';
            $result['id'] = 0;
        }
        return view('admin.pages.settings.manage_wallet',$result);
    }
    public function ManageWalletProcess(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = WalletModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new WalletModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->wallet_name = $request->post('wallet_name');
        $model->description = $request->post('description');
        $model->save();

        return redirect('admin/wallet');
    }
    public function DeleteWallet($id)
    {
        WalletModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
