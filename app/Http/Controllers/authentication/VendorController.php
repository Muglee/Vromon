<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class VendorController extends Controller
{
    public function IndexView()
    {

        $booked_records=DB::table('booked_records')->get()->count();

        $total_amount=DB::table('booked_records')->sum('paid_amount');
        $rooms=DB::table('rooms')->get()->count();
        
        return view('dashboards.hotel_reservation.pages.dashboard',compact('booked_records','total_amount','rooms'));
    }
    public function LoginView()
    {
        return view('dashboards.auth_pages.login');
    }
    public function RegisterView()
    {
        return view('dashboards.auth_pages.register');
    }

    public function Register(Request $request)
    {
        $rules = [
            'vendor_type' => 'required',
            'vendor_name' => 'required',
            'vendor_company_name' => 'required',
            'vendor_phone_no' => 'required',
            'vendor_address' => 'required',
            'vendor_email' => 'required|unique:vendors,vendor_email,' . $request->post('id'),
            'password' => 'required|min:8|string',
            'confirm-password' => 'required|same:password',
        ];
        $custom_message = [
            'vendor_name.required' => 'Please enter name',
            'vendor_type.required' => 'Please selece a service',
            'vendor_company_name.required' => 'Please enter company name',
            'vendor_phone_no.required' => 'Please enter a phone number',
            'vendor_address.required' => 'Please enter address',
            'vendor_email.required' => 'Please enter email',
            'vendor_email.unique' => 'This email already exist',
            'password.required' => 'Please enter password',
            'password.min' => 'Password Must be 8 character',

            'confirm-password.required' => 'Please re-enter password',
            'confirm-password.same' => 'Re-entered password does not match',
        ];
        $this->validate($request, $rules, $custom_message);

        $model = new VendorModel();
        $model->vendor_name = $request->post('vendor_name');
        $model->vendor_type = $request->post('vendor_type');
        $model->vendor_company_name = $request->post('vendor_company_name');
        $model->vendor_phone_no = $request->post('vendor_phone_no');
        $model->vendor_email = $request->post('vendor_email');
        $model->vendor_address = $request->post('vendor_address');
        $model->password = Hash::make($request->post('password'));
        // $model->vendor_type="hotel";
        $model->is_active = 1;
        $model->save();
        Alert::success('Success !!', 'Registration Successfully Completed ');
        return redirect()->back();
    }

    public function LogIn(Request $request)
    {
        $vendor_email = $request->post('vendor_email');
        $result = VendorModel::where(['vendor_email' => $vendor_email, 'is_active' => 1])->first();
        //        $vendor_type=$result->vendor_type;
        if ($result) {
            switch ($result->vendor_type) {
                case ('hotel'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('HOTEL_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/hotel/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;

                case ('bus'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('BUS_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/bus/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;

                case ('train'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('TRAIN_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/bus/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;
                case ('air'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('AIR_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/bus/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;
                case ('tour'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('TOUR_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/bus/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;
                case ('restaurant'):
                    if (Hash::check($request->post('password'), $result->password)) {
                        $request->session()->put('RESTAURANT_LOGIN', true);
                        $request->session()->put('VENDOR_ID', $result->id);
                        $request->session()->put('VENDOR_COMPANY_NAME', $result->vendor_company_name);
                        Alert::success('Welcome', 'Successfully loged in');
                        return redirect('/vendor/restaurant/dashboard');
                    } else {
                        Alert::error('Login Failed !!', 'Please enter valid password');
                        return back();
                    }
                    break;

                default:
                    Alert::error('Login Failed !!', 'Please enter valid Information');
            }
        } else {
            Alert::info('Login Failed !!', 'Invalid Email Address');
            return redirect('/vendor/login');
        }
    }
    function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/vendor/login');
    }
}
