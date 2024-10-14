<?php

namespace App\Http\Controllers\hotel;
use App\Http\Controllers\Controller;
use App\Models\BookedRecordModel;
use App\Models\BranchModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RoomController extends Controller
{

    public function CancelRoom(Request $request, $id = '')
    {
        DB::table('booked_records')->where(['room_id' => $id])->delete();
        // dd(kon id theke ase jante hobe);

        return back();
    }

    public function HotelInvoiceView(Request $request, $id = '')
    {

        $vendor_id = $request->session()->get("VENDOR_ID");

        $result['result'] = DB::table('booked_records')
            ->leftJoin('rooms', 'rooms.id', '=', 'booked_records.room_id')
            ->where(['booked_records.vendor_id' => $vendor_id])
            ->orderBy('booked_records.created_at', 'desc')
            ->get();
        $result['roomtypes'] = RoomTypeModle::get();

        $result['branch']= BranchModel::where('id',$result['result'][0]->branch_id)->first();
       $bed_distribution=($result["result"][0]->bed_distribution);
       $decoded_bed_distribution=json_decode($bed_distribution,true);

       $no_of_person=($result["result"][0]->no_of_person);
       $decoded_no_of_person=json_decode($no_of_person,true);
    //    dd($decoded_no_of_person);
        return view('dashboards.invoice.hotelinvoice', compact('result','decoded_bed_distribution','decoded_no_of_person'));




    }

    public function RoomView(Request $request)
    {

        $vendor_id = $request->session()->get("VENDOR_ID");
        $result = RoomModel::where("vendor_id", $vendor_id)->get();
        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();
        $branch_list = BranchModel::pluck('branch_name')->all();
        return view('dashboards.hotel_reservation.pages.room_list', compact('result', 'room_types', 'branch', 'branch_list'));
    }
    public function AvailableRoomsView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");

        $rooms = RoomModel::where("vendor_id", $vendor_id)
            ->where(['is_status_active' => 1])
            ->get();
        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();

        //        $result['booked_records']= DB::table('booked_records')
        //            ->leftJoin('rooms','rooms.id','=','booked_records.room_id')
        //            ->where(['services.service_name'=>'photography'])
        //            ->where(['services.status'=>1])
        //            ->orderBy('id', 'desc')->paginate(6);

        return view('dashboards.hotel_reservation.pages.available_rooms', compact('rooms', 'room_types', 'branch'));
    }
    public function RoomSearch(Request $request)
    {

        // dd(gettype($request->check_in));
        //        $vendor_id=$request->session()->get("VENDOR_ID");
        //        $branch_name = $request->post('branch_name');
        //        $check_in = $request->post('check_in');
        //        $check_out = $request->post('check_out');

        //    $query->where([
        //     ['column_1', '=', 'value_1'],
        //     ['column_2', '<>', 'value_2'],
        //     [COLUMN, OPERATOR, VALUE],
        //     ...
        // ])

        //       $result['rooms']=RoomModel::query()
        //           ->leftJoin('branches','branches.id','=','rooms.branch_id')
        //           ->leftJoin('booked_records','booked_records.room_id','=','rooms.id')
        //
        //           ->where('branches.branch_name','=',$branch_name)


        //    ['booked_records.check_in', '!=', $check_in],
        //    ['booked_records.check_out', '!=', $check_out]])
        //    ->Where()
        //    ->Where()
        //    ->where(['rooms.vendor_id'=>$vendor_id])
        //           ->get();
        //        dd( $result['rooms']);
        //        //    ->orWhere('branches.branch_name', 'like', "%$branch_name%")
        //       $result['branch_list']= BranchModel::pluck('branch_name')->all();
        //       $result['branch']= BranchModel::get();
        //       $result['roomtypes']= RoomTypeModle::get();

        //    dd($result);
        //    $query->where('a','=',$a)
        //        ->orWhere('b','=', $b);

        //     $availableRooms = RoomModel::where(['','=',$a]);
        //     dd($availableRooms);
        //        return view('vendor_hotel.pages.available_rooms',$result);
    }
    public function BookedRoomsView(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");

        $result['result'] = DB::table('booked_records')
            ->leftJoin('rooms', 'rooms.id', '=', 'booked_records.room_id')
            ->where(['booked_records.vendor_id' => $vendor_id])
            ->orderBy('booked_records.created_at', 'desc')
            ->get();
        $result['roomtypes'] = RoomTypeModle::get();
        $result['branch'] = BranchModel::get();
        return view('dashboards.hotel_reservation.pages.booked_rooms', $result);
    }
    public function ManageRoomView(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = RoomModel::where(['id' => $id])->get();
            $result['room_name'] = $arr['0']->room_name;
            $result['room_type'] = $arr['0']->room_type;
            $result['bed_distribution'] = $arr['0']->bed_distribution;
            $result['no_of_person'] = $arr['0']->no_of_person;
            $result['refund_policy'] = $arr['0']->refund_policy;
            $result['room_facilities'] = $arr['0']->room_facilities;
            $result['room_image'] = $arr['0']->room_image;
            $result['room_price'] = $arr['0']->room_price;
            $result['branch_id'] = $arr['0']->branch_id;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
        } else {
            $result['room_name'] = '';
            $result['room_type'] = '';
            $result['bed_distribution'] = '';
            $result['refund_policy'] = '';
            $result['room_facilities'] = '';
            $result['no_of_person'] = '';
            $result['room_image'] = '';
            $result['room_price'] = '';
            $result['branch_id'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
        }

        $vendor_id = $request->session()->get("VENDOR_ID");
        $result['branch'] = BranchModel::where("vendor_id", $vendor_id)->get();
        $result['room'] = RoomTypeModle::get();
        // dd($result);
        return view('dashboards.hotel_reservation.pages.manage_room', $result);
    }

    public function ManageRoomProcess(Request $request)
    {
        // validation starts
        $rules = [
            'room_image' => 'mimes:jpeg,png,jpg,gif',
            // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
        ];
        $custom_message = [

            // 'room_name.unique'=>'This room is already exist',
            'room_image.mimes' => 'Image must be on jpeg,png,jpg,gif format',
        ];
        $this->validate($request, $rules, $custom_message);

        // validation ends

        if ($request->post('id') > 0) {

            $model = RoomModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new RoomModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        if ($request->hasfile('room_image')) {
            if ($request->post('id') > 0) {
                $arrImage = DB::table('rooms')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/branch/rooms/' . $arrImage[0]->room_image)) {
                    Storage::delete('/media/branch/rooms/' . $arrImage[0]->room_image);
                }
            }
            $room_image = $request->file('room_image');
            $ext = $room_image->extension();
            $image_name = time() . '.' . $ext;
            $room_image->storeAs('/media/branch/rooms/', $image_name);
            $model->room_image = $image_name;
        }
        //bed distribution
        $bed_distribution = array(
            'no_of_single_bed' => $request->post('no_of_single_bed'),
            'no_of_double_bed' => $request->post('no_of_double_bed'),
        );
        $bed_distribution = json_encode($bed_distribution);

        //room facilities
        $room_facilities = array(
            'is_house_keeping' => $request->post('is_house_keeping'),
            'is_air_condition' => $request->post('is_air_condition'),
            'is_fan' => $request->post('is_fan'),
            'is_balcony' => $request->post('is_balcony'),
            'is_toilets' => $request->post('is_toilets'),
            'is_tv' => $request->post('is_tv'),
            'is_kettle' => $request->post('is_kettle'),
            'is_fridge' => $request->post('is_fridge'),
            'is_sofa' => $request->post('is_sofa'),
            'is_ware_drop' => $request->post('is_ware_drop'),
            'is_locker' => $request->post('is_locker'),
            'is_curtain' => $request->post('is_curtain'),
            'is_blanket' => $request->post('is_blanket'),
            'is_toiletries' => $request->post('is_toiletries'),
            'is_towel' => $request->post('is_towel'),
            'is_hot_water' => $request->post('is_hot_water'),
        );
        $room_facilities = json_encode($room_facilities);
        //for number of person
        $no_of_person = array(
            'no_of_adult' => $request->post('no_of_adult'),
            'no_of_kids' => $request->post('no_of_kids'),
            'no_of_guest' => $request->post('no_of_guest'),
        );
        $no_of_person = json_encode($no_of_person);

        $model->room_name = $request->post('room_name');
        $model->room_type = $request->post('room_type');
        $model->bed_distribution = $bed_distribution;
        $model->no_of_person = $no_of_person;
        $model->room_price = $request->post('room_price');
        $model->room_facilities = $room_facilities;
        $model->refund_policy = $request->post('refund_policy');
        $model->branch_id = $request->post('branch_id');
        $model->vendor_id = $request->post('vendor_id');
        $model->is_status_active = 1;
        $model->is_room_booked = 0;

        $model->save();
        return redirect('vendor/hotel/roomlist');
    }

    public function status($status, $id)
    {
        $model = RoomModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function DeleteRoom(Request $request, $id)
    {
        $arrImage = DB::table('rooms')->where(['id' => $id])->get();
        if (Storage::exists('/media/branch/rooms/' . $arrImage[0]->room_image)) {
            Storage::delete('/media/branch/rooms/' . $arrImage[0]->room_image);
        }

        RoomModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
}
