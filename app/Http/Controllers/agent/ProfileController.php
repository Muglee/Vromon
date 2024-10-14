<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\AgentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function ProfileView(Request $request)
    {
        $agent_id = $request->session()->get("AGENT_ID");
        $result = AgentModel::where("id", $agent_id)->get();

        return view('agent.pages.profile', compact('result'));
    }

    public function UpdateProfile(Request $request)
    {
        // validation starts
        $rules = [
            'logo' => 'mimes:jpeg,png,jpg,gif',
            // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
        ];
        $custom_message = [

            // 'room_name.unique'=>'This room is already exist',
            'logo.mimes' => 'Logo must be on jpeg,png,jpg,gif format',
        ];
        $this->validate($request, $rules, $custom_message);

        // validation ends


        //for logo
        $model = AgentModel::find($request->post('id'));
        if ($request->hasfile('logo')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('agents')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/agent/company_logo/' . $arrImage[0]->logo)) {
                    Storage::delete('/media/agent/company_logo/' . $arrImage[0]->logo);
                }
            }
            $logo = $request->file('logo');
            $ext = $logo->extension();
            $image_name = time() . '.' . $ext;
            $logo->storeAs('/media/agent/company_logo/', $image_name);
            $model->logo = $image_name;
            $request->session()->put('COMPANY_LOGO', $image_name);
        }

        $model->agent_name = $request->post('agent_name');
        $model->company_name = $request->post('company_name');
        $model->agent_phone_no = $request->post('agent_phone_no');
        $model->agent_address = $request->post('agent_address');
        $model->save();

        $request->session()->put('COMPANY_NAME', $request->post('company_name'));

        Alert::success('Success !!', 'Record Successfully Updated');
        return redirect('/agent/profile');
    }

    public function UpdateProfileView(Request $request, $id = '')
    {
        $profile_data = AgentModel::where(['id' => $id])->get();
        return view('agent.pages.update_profile', compact('profile_data'));
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
        $agent_id = $request->session()->get("AGENT_ID");

        $result = AgentModel::where(['id' => $agent_id])->first();
        if ($result) {
            if (Hash::check($current_password, $result->password)) {
                $model = AgentModel::find($agent_id);
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
