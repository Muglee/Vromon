<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantBookingModel;
use App\Models\TimeSlotModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTimeSlotController extends Controller
{
    public function SlotListView(Request $request)
    {
        
        $vendor_id = $request->vendor;
        $result = TimeSlotModel::where("vendor_id", $vendor_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.pages.restaurant.slot_list', compact('result'));
    }


    public function ManageSlotView(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = TimeSlotModel::where(['id' => $id])->get();
            $result['start_slot_time'] = $arr['0']->start_slot_time;
            $result['end_slot_time'] = $arr['0']->end_slot_time;
            $result['id'] = $arr['0']->id;
            $result['vendor'] = $request->vendor;
        } else {
            $result['start_slot_time'] = '';
            $result['end_slot_time'] = '';
            $result['id'] = 0;
            $result['vendor'] = $request->vendor;
        }

        // return redirect()->route('admin.manage.slot');
        return view('admin.pages.restaurant.manage_slot', $result);
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
        $model->vendor_id = $request->vendor_id;
        $model->is_status_active = 1;
        $model->save();
        return redirect()->route('admin.manage.slot');
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


    public function SelectVendorManageSlot(){
        
        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_slot',compact('all_restaurant'));
    }
    
    
    public function SelectVendorSlotList(){
        
        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_slot_list',compact('all_restaurant'));
    }
}
