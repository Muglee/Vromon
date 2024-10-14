<?php

namespace App\Http\Controllers\hotel;

use App\Http\Controllers\Controller;
use App\Models\BookedRecordModel;
use App\Models\BranchModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModle;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class BookingController extends Controller
{
    public function BookingFormView($id)
    {
       
        $result = RoomModel::find($id);
        $roomtype = RoomTypeModle::get();
        $branch = BranchModel::get();
        $booked_date = BookedRecordModel::select('check_in', 'check_out')
            ->where(['room_id' => $id])
            ->orderBy('created_at', 'desc')->paginate(3);

        //dd($booked_date);
        return view('dashboards.hotel_reservation.pages.booking_form', compact('result', 'roomtype', 'branch', 'booked_date'));
    }

    public function ManageBookProcess(Request $request)
    {
        
       
        $check_in = $request->post('check_in');
        $check_out = $request->post('check_out');

        $room= $request->post('room_id');
        // dd(gettype($check_in));

        $inDate = strtotime($check_in);
        $innewformat = date('Y-m-d',$inDate);
        // dd($innewformat);

        $outDate = strtotime($check_out);
        $outnewformat = date('Y-m-d',$outDate);

        $checkd_date =BookedRecordModel::where(['room_id' => $room])
        ->whereBetween('check_in',[$innewformat,$outnewformat])
        ->orwhereBetween('check_out',[$innewformat,$outnewformat])
        ->count();
        

        if ($checkd_date == "0") {
            $model = new BookedRecordModel();
            $model->name = $request->post('name');
            $model->came_form = $request->post('came_form');
            $model->check_in = $request->post('check_in');
            $model->check_out = $request->post('check_out');
            $model->nid_number = $request->post('nid_number');
            $model->phone_number = $request->post('phone_number');
            $model->email = $request->post('email');
            $model->reason = $request->post('reason');
            $model->paid_amount = $request->post('paid_amount');
            $model->room_id = $request->post('room_id');
            $model->vendor_id = $request->post('vendor_id');
            $model->save();
            Alert::success('Success !!', 'Room Successfully Booked');
            return redirect('vendor/hotel/booked_rooms');
        } else {
            Alert::info('Sorry !!', 'Room already Booked');
            return back();
        }
    }
    public function UpdateBookingStatus($status, $id)
    {
        $model = RoomModel::Find($id);
        $model->is_room_booked = $status;
        $model->save();
        return back()->with('message', ' Status Updated Successfully');
    }
}
