<?php

namespace App\Http\Controllers\restaurant;
use App\Http\Controllers\Controller;
use App\Models\VendorModel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class VendorProfileController extends Controller
{
    public function ProfileView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = VendorModel::where("id", $vendor_id)->get();

        return view('dashboards.restaurant_reservation.pages.profile', compact('result'));
        // dd($result);
    }

    public function UpdateProfileView(Request $request, $id = '')
    {
        $profile_data = VendorModel::where(['id' => $id])->get();
        return view('dashboards.restaurant_reservation.pages.update_profile', compact('profile_data'));

        // dd($profile_data);
    }

    public function UpdateProfile(Request $request)
    {
        $model = VendorModel::find($request->post('id'));
        $model->vendor_name = $request->post('vendor_name');
        $model->vendor_company_name = $request->post('vendor_company_name');
        $model->vendor_phone_no = $request->post('vendor_phone_no');
        $model->vendor_address = $request->post('vendor_address');
        $model->save();
        Alert::success('Success !!', 'Record Successfully Updated');
        return redirect('/vendor/restaurant/profile');
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
        $vendor_id = $request->session()->get("VENDOR_ID");

        $result = VendorModel::where(['id' => $vendor_id])->first();
        if ($result) {
            if (Hash::check($current_password, $result->password)) {
                $model = VendorModel::find($vendor_id);
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
