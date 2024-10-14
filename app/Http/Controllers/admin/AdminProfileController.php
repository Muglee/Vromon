<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function ProfileView(Request $request)
    {
        $admin_id = $request->session()->get("ADMIN_ID");
        $result = AdminModel::where("id", $admin_id)->get();

        return view('admin.pages.settings.profile',compact('result'));
        // dd($result);
    }

    public function UpdateProfile(Request $request)
    {
        $model = AdminModel::find($request->post('id'));
        $model->name = $request->post('name');
        $model->phone_number = $request->post('phone_number');
        $model->save();
        $request->session()->put('NAME', $request->post('name'));

        Alert::success('Success !!', 'Record Successfully Updated');
        return redirect('/admin/profile');
    }

    public function UpdateProfileView(Request $request, $id = '')
    {
        $profile_data = AdminModel::where(['id' => $id])->get();
        return view('admin.pages.settings.update_profile', compact('profile_data'));
    }

    public function ChangePassword(Request $request)
    {
        $rules = [
            'new_password' => 'required|min:8|string',
            'confirm_password' => 'required|same:new_password',
        ];
        $custom_message = [
            'new_password.min' => 'Password Must be 8 character',
            'confirm-password.same' => 'Confirmed password does not match',
        ];
        $this->validate($request, $rules, $custom_message);

        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password');
        $admin_id = $request->session()->get("ADMIN_ID");

        $result = AdminModel::where(['id' => $admin_id])->first();
        if ($result) {
            if (Hash::check($current_password, $result->password)) {
                $model = AdminModel::find($admin_id);
                $model->password = Hash::make($new_password);
                $model->save();
                Alert::success('Success !!', 'Password Successfully Updated');
            } else {
                Alert::error('Opps !!', 'Wrong Current Password');
            }
        }
        return back();
    }
}
