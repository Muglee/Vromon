<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OutletModel;
use App\Models\RestaurantBookingModel;
use App\Models\TableModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTableController extends Controller
{
    public function ManageTableView(Request $request, $id = '')
    {
        if ($id > 0) {

            $arr = TableModel::where(['id' => $id])->get();
            $result['table_name'] = $arr['0']->table_name;
            $result['table_img'] = $arr['0']->table_img;
            $result['seat_capasity'] = $arr['0']->seat_capasity;
            $result['outlet_id'] = $arr['0']->outlet_id;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
            $result['vendor'] = $request->vendor;
        } else {
            $result['table_name'] = '';
            $result['table_img'] = '';
            $result['seat_capasity'] = '';
            $result['outlet_id'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
            $result['vendor'] = $request->vendor;
        }

       $vendor_id=$request->vendor;
        $result['names'] = OutletModel::where("vendor_id", $vendor_id)
            ->where('is_status_active', 1)
            ->get();
        //        dd($result['names']);
        return view('admin.pages.restaurant.manage_table', $result);
    }
    public function TableListView(Request $request)
    {
        $vendor_id =$request->vendor;
        $result = TableModel::where("vendor_id", $vendor_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $names = OutletModel::where("vendor_id", $vendor_id)->get();
        return view('admin.pages.restaurant.table_list', compact('result', 'names'));
    }
    public function ManageTableProcess(Request $request)
    {
        // validation starts
        $rules = [
            'table_img' => 'mimes:jpeg,png,jpg,gif',
            // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
        ];
        $custom_message = [

            // 'room_name.unique'=>'This room is already exist',
            'table_img.mimes' => 'Image must be on jpeg,png,jpg,gif format',
        ];
        $this->validate($request, $rules, $custom_message);

        // validation ends

        if ($request->post('id') > 0) {

            $model = TableModel::find($request->post('id'));

            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new TableModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        if ($request->hasfile('table_img')) {

            if ($request->post('id') > 0) {

                $arrImage = DB::table('tables')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/outlet/table_img/' . $arrImage[0]->table_img)) {
                    Storage::delete('/media/outlet/table_img/' . $arrImage[0]->table_img);
                }
            }
            $table_img = $request->file('table_img');
            $ext = $table_img->extension();
            $image_name = time() . '.' . $ext;
            $table_img->storeAs('/media/outlet/table_img/', $image_name);
            $model->table_img = $image_name;
        }

        $model->table_name = $request->post('table_name');
        $model->seat_capasity = $request->post('seat_capasity');
        $model->outlet_id = $request->post('outlet_id');
        $model->vendor_id = $request->post('vendor_id');
        $model->is_status_active = 1;
        $model->save();

        //        dd($model->save());
        return redirect('admin/table_list');
    }
    public function AvailableTableView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = TableModel::where("vendor_id", $vendor_id)
            ->where(['is_status_active' => 1])
            ->get();
        $names = OutletModel::where("vendor_id", $vendor_id)->get();
        return view('admin.pages.restaurant.available_table', compact('result', 'names'));
    }
    public function status($status, $id)
    {
        $model = TableModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }
    public function DeleteTable(Request $request, $id)
    {
        $arrImage = DB::table('tables')->where(['id' => $id])->get();
        if (Storage::exists('/media/outlet/table_img/' . $arrImage[0]->table_img)) {
            Storage::delete('/media/outlet/table_img/' . $arrImage[0]->table_img);
        }
        $bookingToDelete = RestaurantBookingModel::all()->toArray();
        if (count($bookingToDelete) > 0) {
            foreach ($bookingToDelete as $delete) {
                $slotFind = json_decode($delete['selected_tables']);

                foreach ($slotFind as $s) {
                    if ($s == $id) {
                         RestaurantBookingModel::where('id', $delete['id'])->delete();
                         break;
                    }
                }
            }
        }
        TableModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    public function SelectVendorTable(){

        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_table',compact('all_restaurant'));
    }


    public function SelectVendorTableList(){

        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_table_list',compact('all_restaurant'));
    }
}
