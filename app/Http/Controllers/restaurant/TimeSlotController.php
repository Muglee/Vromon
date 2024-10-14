<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantBookingModel;
use App\Models\TimeSlotModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TimeSlotController extends Controller
{
    public function SlotListView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = TimeSlotModel::where("vendor_id", $vendor_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('dashboards.restaurant_reservation.pages.slot_list', compact('result',));
    }


    public function ManageSlotView(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = TimeSlotModel::where(['id' => $id])->get();
            $result['start_slot_time'] = $arr['0']->start_slot_time;
            $result['end_slot_time'] = $arr['0']->end_slot_time;
            $result['id'] = $arr['0']->id;
        } else {
            $result['start_slot_time'] = '';
            $result['end_slot_time'] = '';
            $result['id'] = 0;
        }
        return view('dashboards.restaurant_reservation.pages.manage_slot', $result);
    }

    public function ManageSlotProcess(Request $request)
    {
        if ($request->post('id') > 0) {
            $model = TimeSlotModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new TimeSlotModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }
        $model->start_slot_time = $request->post('start_slot_time');
        $model->end_slot_time = $request->post('end_slot_time');
        $model->value = 1;
        $model->vendor_id = $request->post('vendor_id');
        $model->is_status_active = 1;
        $model->save();
        return redirect('vendor/restaurant/slot_list');
    }

    public function status($status, $id)
    {
        $model = TimeSlotModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function DeleteSlot(Request $request, $id)
    {
        TimeSlotModel::where('id', $id)->delete();
        $bookingToDelete = RestaurantBookingModel::all()->toArray();
        // dd($bookingToDelete);

        if (count($bookingToDelete) > 0) {
            foreach ($bookingToDelete as $delete) {
                $slotFind = json_decode($delete['slot_id']);
                // dd($slotFind);
                if ($slotFind[0] == $id) {
                    // dd('oka');
                    RestaurantBookingModel::where('id', $delete['id'])->delete();
                }
            }
        }
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
