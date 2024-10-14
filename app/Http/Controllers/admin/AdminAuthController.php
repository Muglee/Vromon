<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;


class AdminAuthController extends Controller
{
    public function LoginView()
    {
        return view('admin.auth_pages.login');
    }
    // public function RegisterView()
    // {
    //     return view('admin.auth_pages.register');
    // }

    public function Register(Request $request)
    {
        // $rules = [
        //     'admin_name' => 'required',
        //     'company_name' => 'required',
        //     'admin_phone_no' => 'required',
        //     'admin_address' => 'required',
        //     'email' => 'required|unique:admins,email,' . $request->post('id'),
        //     'password' => 'required|min:8|string',
        //     'confirm-password' => 'required|same:password',
        // ];
        // $custom_message = [
        //     'admin_name.required' => 'Please enter name',
        //     'company_name.required' => 'Please enter company name',
        //     'admin_phone_no.required' => 'Please enter a phone number',
        //     'admin_address.required' => 'Please enter address',
        //     'email.required' => 'Please enter email',
        //     'email.unique' => 'This email already exist',
        //     'password.required' => 'Please enter password',
        //     'password.min' => 'Password Must be 8 character',
        //     'confirm-password.required' => 'Please re-enter password',
        //     'confirm-password.same' => 'Re-entered password does not match',
        // ];
        // $this->validate($request, $rules, $custom_message);

        // $model = new AgentModel();
        // $model->admin_name = $request->post('admin_name');
        // $model->company_name = $request->post('company_name');
        // $model->admin_phone_no = $request->post('admin_phone_no');
        // $model->email = $request->post('email');
        // $model->admin_address = $request->post('admin_address');
        // $model->password = Hash::make($request->post('password'));
        // $model->is_active = 1;
        // $model->save();
        // Alert::success('Success !!', 'Registration Successfully Completed ');
        // return redirect('/admin/login');
    }


    public function LogIn(Request $request)
    {

       
        $email = $request->post('email');
        // $password=$request->post('password');

        //        $result = AdminModel::where(['email'=>$email,'password'=>$password])->get();
        $result = AdminModel::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('NAME', $result->name);


                Alert::success('Welcome', 'Successfully loged in');
                return redirect('admin/dashboard');
            } else {
                Alert::error('Login Failed !!', 'Please enter valid password');
                return back();
            }
        } else {
            Alert::info('Login Failed !!', 'Invalid Email Address');
            return redirect('admin/login');
        }
    }

    function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }
}
