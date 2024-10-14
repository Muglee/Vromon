<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\AgentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AgentAuthController extends Controller
{
    public function LoginView()
    {
        return view('agent.auth_pages.login');
    }
    public function RegisterView()
    {
        return view('agent.auth_pages.register');
    }

    public function Register(Request $request)
    {
        $rules = [
            'agent_name' => 'required',
            'company_name' => 'required',
            'agent_phone_no' => 'required',
            'agent_address' => 'required',
            'agent_email' => 'required|unique:agents,agent_email,' . $request->post('id'),
            'password' => 'required|min:8|string',
            'confirm-password' => 'required|same:password',
        ];
        $custom_message = [
            'agent_name.required' => 'Please enter name',
            'company_name.required' => 'Please enter company name',
            'agent_phone_no.required' => 'Please enter a phone number',
            'agent_address.required' => 'Please enter address',
            'agent_email.required' => 'Please enter email',
            'agent_email.unique' => 'This email already exist',
            'password.required' => 'Please enter password',
            'password.min' => 'Password Must be 8 character',
            'confirm-password.required' => 'Please re-enter password',
            'confirm-password.same' => 'Re-entered password does not match',
        ];
        $this->validate($request, $rules, $custom_message);

        $model = new AgentModel();
        $model->agent_name = $request->post('agent_name');
        $model->company_name = $request->post('company_name');
        $model->agent_phone_no = $request->post('agent_phone_no');
        $model->agent_email = $request->post('agent_email');
        $model->agent_address = $request->post('agent_address');
        $model->password = Hash::make($request->post('password'));
        $model->is_active = 1;
        $model->save();
        Alert::success('Success !!', 'Registration Successfully Completed ');
        return redirect()->back();
    }


    public function LogIn(Request $request)
    {
        $email = $request->post('agent_email');
        // $password=$request->post('password');

        //        $result = AdminModel::where(['email'=>$email,'password'=>$password])->get();
        $result = AgentModel::where(['agent_email' => $email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('AGENT_LOGIN', true);
                $request->session()->put('AGENT_ID', $result->id);
                $request->session()->put('COMPANY_NAME', $result->company_name);
                $request->session()->put('COMPANY_LOGO', $result->logo);
                Alert::success('Welcome', 'Successfully loged in');
                return redirect('agent/dashboard');
            } else {
                Alert::error('Login Failed !!', 'Please enter valid password');
                return back();
            }
        } else {
            Alert::info('Login Failed !!', 'Invalid Email Address');
            return redirect('agent/login');
        }
    }

    function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
