<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\AdultsModel;
use App\Models\BookedRecordModel;
use App\Models\BranchModel;
use App\Models\VendorModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModle;
use App\Models\HotelTypesModel;
use App\Models\KidsModel;
use App\Models\NoOfRoomsModel;
use App\Models\NumberOfStarModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//Booking Controller


class AdminHotelBookingController extends Controller
{
    public function BookingFormView($id)
    {
        $result = RoomModel::find($id);
        $roomtype = RoomTypeModle::get();
        $branch = BranchModel::get();
        $booked_date = BookedRecordModel::select('check_in', 'check_out')
            ->where(['room_id' => $id])
            ->orderBy('created_at', 'desc')->paginate(3);
        //        dd($booked_date);
        return view('admin.pages.hotel.booking_form', compact('result', 'roomtype', 'branch', 'booked_date'));
    }
    public function ManageBookProcess(Request $request)
    {
        $vendor_id = $request->session()->get("VENDOR_ID");
        $check_in = $request->post('check_in');
        $check_out = $request->post('check_out');
        $room = $request->post('room_id');
        // dd(gettype($check_in));
        $inDate = strtotime($check_in);
        $innewformat = date('Y-m-d', $inDate);
        // dd($innewformat);
        $outDate = strtotime($check_out);
        $outnewformat = date('Y-m-d', $outDate);
        $checkd_date = BookedRecordModel::where(['room_id' => $room])
            ->whereBetween('check_in', [$innewformat, $outnewformat])
            ->orwhereBetween('check_out', [$innewformat, $outnewformat])
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
            $model->vendor_id =  $vendor_id;
            $model->save();

            Session::forget('VENDOR_ID');
            Alert::success('Success !!', 'Room Successfully Booked');
            return redirect('admin/hotel/booked_rooms');
        } else {
            Alert::info('Sorry !!', 'Room already Booked');

            // dd($check_date);
        }
        return back();

        //        $id=$request->post('room_id');
        //        $room = RoomModel::Find($id);
        //        $room->is_room_booked = 1;
        //        $room->save();
    }
    public function UpdateBookingStatus($status, $id)
    {
        $model = RoomModel::Find($id);
        $model->is_room_booked = $status;
        $model->save();
        return back()->with('message', ' Status Updated Successfully');
    }
    public function BranchListView(Request $request)
    {
        $result = BranchModel::where("vendor_id", $request->vendor)->get();
        // dd($result);
        $hotel_types = HotelTypesModel::all();
        // dd($result);
        return view('admin.pages.hotel.branch_list', compact('result', 'hotel_types'));
    }

    public function ManageBranchView(Request $request, $id = '')
    {
        // dd(new Storage);
        $vendor_id = $request->vendor;
        if ($id > 0) {
            $arr = BranchModel::where(['id' => $id])->get();
            $result['branch_name'] = $arr['0']->branch_name;
            $result['hotel_type'] = $arr['0']->hotel_type;
            $result['number_of_stars'] = $arr['0']->number_of_stars;
            $result['branch_country'] = $arr['0']->branch_country;
            $result['branch_city'] = $arr['0']->branch_city;
            $result['branch_location'] = $arr['0']->branch_location;
            $result['near_by_places'] = $arr['0']->near_by_places;
            $result['branch_description'] = $arr['0']->branch_description;
            $result['branch_house_rules'] = $arr['0']->branch_house_rules;
            $result['branch_policy'] = $arr['0']->branch_policy;
            $result['branch_logo'] = $arr['0']->branch_logo;
            $result['branch_cover_image'] = $arr['0']->branch_cover_image;
            $result['branch_facilities'] = $arr['0']->branch_facilities;
            $result['id'] = $arr['0']->id;
            $result['vendor_id'] = $vendor_id;
        } else {
            $result['branch_name'] = '';
            $result['hotel_type'] = '';
            $result['number_of_stars'] = '';
            $result['branch_country'] = '';
            $result['branch_city'] = '';
            $result['branch_location'] = '';
            $result['near_by_places'] = '';
            $result['branch_description'] = '';
            $result['branch_house_rules'] = '';
            $result['branch_policy'] = '';
            $result['branch_logo'] = '';
            $result['branch_cover_image'] = '';
            $result['branch_facilities'] = '';
            $result['id'] = 0;
            $result['vendor_id'] = $vendor_id;
        }
        // dd($result);
        $result['hotel_types'] = HotelTypesModel::where(['is_status_active' => 1])->get();
        $result['number_of_star'] = NumberOfStarModel::where(['is_status_active' => 1])->get();
        // dd('hello');
        return view('admin.pages.hotel.manage_branch', $result);
    }
    public function ManageBranchProcess(Request $request)
    {

        // dd($request);

        if ($request->post('id') > 0) {
            $model = BranchModel::find($request->post('id'));
            // $msg = " Updated Successfully ";
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new BranchModel();
            // $msg = " Created Successfully ";
            // dd('hello');
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        if ($request->hasfile('branch_cover_image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image)) {
                    Storage::delete('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image);
                }
            }
            $branch_cover_image = $request->file('branch_cover_image');
            $ext = $branch_cover_image->extension();
            $image_name = date('mdYHis') . uniqid() . "." . $ext;
            // dd(time());
            // dd($image_name);
            $branch_cover_image->storeAs('/media/branch/CoverImages/', $image_name);
            // dd($branch_cover_image);
            $model->branch_cover_image = $image_name;
        }
        // for logo
        if ($request->hasfile('branch_logo')) {
            if ($request->post('id') > 0) {
                $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/branch/logo/' . $arrImage[0]->branch_logo)) {
                    Storage::delete('/media/branch/logo/' . $arrImage[0]->branch_logo);
                }
            }
            $branch_logo = $request->file('branch_logo');
            $ext = $branch_logo->extension();
            $image_name = date('mdYHis') . uniqid() . "." . $ext;
            $branch_logo->storeAs('/media/branch/logo/', $image_name);
            $model->branch_logo = $image_name;
        }
        $model->branch_name = $request->post('branch_name');
        $model->hotel_type = $request->post('hotel_type');
        $model->number_of_stars = $request->post('number_of_stars');
        $model->branch_country = $request->post('branch_country');
        $model->branch_city = $request->post('branch_city');
        $model->branch_location = $request->post('branch_location');
        $model->branch_description = $request->post('branch_description');
        $model->branch_house_rules = $request->post('branch_house_rules');
        $model->branch_policy = $request->post('branch_policy');
        //near_by_places
        $near_by_places = array(
            'place1' => $request->post('place1'),
            'place2' => $request->post('place2'),
        );
        $near_by_places = json_encode($near_by_places);
        //facilities
        $branch_facilities = array(
            'is_security_active' => $request->post('is_security_active'),
            'is_wifi_active' => $request->post('is_wifi_active'),
            'is_dining_active' => $request->post('is_dining_active'),
            'is_pets_active' => $request->post('is_pets_active'),
            'is_parking_active' => $request->post('is_parking_active'),
            'is_breakfast_active' => $request->post('is_breakfast_active'),
            // ====
            'is_swimingpool_active' => $request->post('is_swimingpool_active'),
            'is_roomservice_active' => $request->post('is_roomservice_active'),
            'is_disability_friendly_active' => $request->post('is_disability_friendly_active'),
            'is_aircondition_active' => $request->post('is_aircondition_active'),
            'is_businessfacilities_active' => $request->post('is_businessfacilities_active'),
            'is_fitnesscenter_active' => $request->post('is_fitnesscenter_active'),
            'is_restaurant_active' => $request->post('is_restaurant_active'),
            'is_outdooractivities_active' => $request->post('is_outdooractivities_active'),
            'is_airportshuttel_active' => $request->post('is_airportshuttel_active'),
            'is_couplefriendly_active' => $request->post('is_couplefriendly_active'),
        );

        $branch_facilities = json_encode($branch_facilities);
        $model->branch_facilities = $branch_facilities;
        $model->near_by_places = $near_by_places;
        $model->vendor_id = $request->vendor_id;
        $model->is_status_active = 1;
        $model->save();
        return redirect('/admin/hotel/branch_list');
    }
    public function status($status, $id)
    {
        $model = BranchModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }
    public function DeleteBranch(Request $request, $id)
    {

        $cover_image = DB::table('branches')->where(['id' => $id])->get();
        if (Storage::exists('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image)) {
            Storage::delete('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image);
        }
        $logo = DB::table('branches')->where(['id' => $id])->get();
        if (Storage::exists('/media/branch/logo/' . $logo[0]->branch_logo)) {
            Storage::delete('/media/branch/logo/' . $logo[0]->branch_logo);
        }
        BranchModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }
    public function BranchView($id)
    {

        $result = BranchModel::find($id);
        // dd($result);
        return view('admin.pages.hotel.branch_view', compact('result'));
    }

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
        $result['branch'] = BranchModel::where('id', $result['result'][0]->branch_id)->first();
        $bed_distribution = ($result["result"][0]->bed_distribution);
        $decoded_bed_distribution = json_decode($bed_distribution, true);
        $no_of_person = ($result["result"][0]->no_of_person);
        $decoded_no_of_person = json_decode($no_of_person, true);
        //    dd($decoded_no_of_person);
        return view('admin.pages.hotel.hotelinvoice', compact('result', 'decoded_bed_distribution', 'decoded_no_of_person'));
    }
    public function RoomView(Request $request)
    {
        $result = RoomModel::where("vendor_id", $request->vendor)->get();
        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();
        $branch_list = BranchModel::pluck('branch_name')->all();
        return view('admin.pages.hotel.room_list', compact('result', 'room_types', 'branch', 'branch_list'));
    }
    // public function AvailableRoomsView(Request $request)
    // {


    //     $x=$this->SelectVendor();


    // }


    public function SelectVendor()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor', compact('all_hotels'));
    }

    // addition
    public function SelectVendorBookedRooms()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor_booked_rooms', compact('all_hotels'));
    }
    public function  SelectVendorRoomsList()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor_rooms_list', compact('all_hotels'));
    }
    public function    SelectVendorManageRoom()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor_manage_room', compact('all_hotels'));
    }
    public function     SelectVendorBranchList()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor_branch_list', compact('all_hotels'));
    }
    public function     SelectVendorBranchManage()
    {
        $all_hotels = VendorModel::where('vendor_type', 'hotel')->get();
        return view('admin.pages.hotel.select_vendor_branch_manage', compact('all_hotels'));
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
        // dd($vendor_id);
        $result['result'] = DB::table('booked_records')
            ->leftJoin('rooms', 'rooms.id', '=', 'booked_records.room_id')
            ->where(['booked_records.vendor_id' => $request->vendor])
            ->orderBy('booked_records.created_at', 'desc')
            ->get();
        $result['roomtypes'] = RoomTypeModle::get();
        $result['branch'] = BranchModel::get();
        return view('admin.pages.hotel.booked_rooms', $result);
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
        $result['branch'] = BranchModel::where("vendor_id", $request->vendor)->get();
        $result['room'] = RoomTypeModle::get();
        return view('admin.pages.hotel.manage_room', $result);
    }
    public function AvailableRoomsView(Request $request)
    {
        $request->session()->put('VENDOR_ID', $request->vendor);
        $rooms = RoomModel::where("vendor_id", $request->vendor)
            ->where(['is_status_active' => 1])
            ->get();
        $room_types = RoomTypeModle::get();
        $branch = BranchModel::get();
        //        $result['booked_records']= DB::table('booked_records')
        //            ->leftJoin('rooms','rooms.id','=','booked_records.room_id')
        //            ->where(['services.service_name'=>'photography'])
        //            ->where(['services.status'=>1])
        //            ->orderBy('id', 'desc')->paginate(6);

        return view('admin.pages.hotel.available_rooms', compact('rooms', 'room_types', 'branch'));
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
    // public function status($status, $id)
    // {
    //     $model = RoomModel::Find($id);
    //     $model->is_status_active = $status;
    //     $model->save();
    //     Alert::success('Success !!', 'Status Successfully Updated');
    //     return back();
    // }
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
//         public function BookingFormView($id)
//         {
//             $result = RoomModel::find($id);
//             $roomtype = RoomTypeModle::get();
//             $branch = BranchModel::get();
//             $booked_date = BookedRecordModel::select('check_in', 'check_out')
//                 ->where(['room_id' => $id])
//                 ->orderBy('created_at', 'desc')->paginate(3);

//             //dd($booked_date);
//             return view('admin.pages.hotel.booking_form', compact('result', 'roomtype', 'branch', 'booked_date'));
//         }


//         public function RoomView(Request $request)
//         {
//             $admin_id = $request->session()->get("ADMIN_ID");
//             $result = RoomModel::where("admin_id", $admin_id)->get();
//             $room_types = RoomTypeModle::get();
//             $branch = BranchModel::get();
//             $branch_list = BranchModel::pluck('branch_name')->all();
//             return view('admin.pages.hotel.room_list', compact('result', 'room_types', 'branch', 'branch_list'));
//         }
//         public function BookedRoomsView(Request $request)

//         {
//             $admin_id = $request->session()->get("ADMIN_ID");

//             $result['result'] = DB::table('booked_records')
//                 ->leftJoin('rooms', 'rooms.id', '=', 'booked_records.room_id')
//                 ->where(['booked_records.admin_id' => $admin_id])
//                 ->orderBy('booked_records.created_at', 'desc')
//                 ->get();
//             $result['roomtypes'] = RoomTypeModle::get();
//             $result['branch'] = BranchModel::get();
//             return view('admin.pages.hotel.booked_rooms', $result);
//         }


//         public function AvailableRoomsView(Request $request)
//         {



//         $x=$this->SelectVendor();


//         $y="sssss";
//         if($y=="ss"){





//         $rooms = RoomModel::where("vendor_id", "1")
//             ->where(['is_status_active' => 1])
//             ->get();
//         $room_types = RoomTypeModle::get();
//         $branch = BranchModel::get();

//         //        $result['booked_records']= DB::table('booked_records')
//         //            ->leftJoin('rooms','rooms.id','=','booked_records.room_id')
//         //            ->where(['services.service_name'=>'photography'])
//         //            ->where(['services.status'=>1])
//         //            ->orderBy('id', 'desc')->paginate(6);

//         return view('admin.pages.hotel.available_rooms', compact('rooms', 'room_types', 'branch'));

//         }
//     public function HotelBookingView()
//     {
//         $kids=KidsModel::get();
//         $adults=AdultsModel::get();
//         $no_of_rooms=NoOfRoomsModel::get();

//         return view('admin.pages.hotel.hotel_booking',compact('kids','adults','no_of_rooms'));
//     }
// //
// public function ManageRoomView(Request $request, $id = '')
//     {
//     if ($id > 0) {
//         $arr = RoomModel::where(['id' => $id])->get();
//         $result['room_name'] = $arr['0']->room_name;
//         $result['room_type'] = $arr['0']->room_type;
//         $result['bed_distribution'] = $arr['0']->bed_distribution;
//         $result['no_of_person'] = $arr['0']->no_of_person;
//         $result['refund_policy'] = $arr['0']->refund_policy;
//         $result['room_facilities'] = $arr['0']->room_facilities;
//         $result['room_image'] = $arr['0']->room_image;
//         $result['room_price'] = $arr['0']->room_price;
//         $result['branch_id'] = $arr['0']->branch_id;
//         $result['is_status_active'] = $arr['0']->is_status_active;
//         $result['id'] = $arr['0']->id;
//     } else {
//         $result['room_name'] = '';
//         $result['room_type'] = '';
//         $result['bed_distribution'] = '';
//         $result['refund_policy'] = '';
//         $result['room_facilities'] = '';
//         $result['no_of_person'] = '';
//         $result['room_image'] = '';
//         $result['room_price'] = '';
//         $result['branch_id'] = '';
//         $result['is_status_active'] = '';
//         $result['id'] = 0;
//     }

//     $admin_id = $request->session()->get("ADMIN_ID");
//     $result['branch'] = BranchModel::where("admin_id", $admin_id)->get();
//     $result['room'] = RoomTypeModle::get();
//     return view('admin.pages.hotel.manage_room', $result);
//         }
//         //
//         public function ManageBookProcess(Request $request)
//         {
//             $check_in = $request->post('check_in');
//             $check_out = $request->post('check_out');
//             $room= $request->post('room_id');
//             // dd(gettype($check_in));

//             $inDate = strtotime($check_in);
//             $innewformat = date('Y-m-d',$inDate);
//             // dd($innewformat);

//             $outDate = strtotime($check_out);
//             $outnewformat = date('Y-m-d',$outDate);

//             $checkd_date =BookedRecordModel::where(['room_id' => $room])
//             ->whereBetween('check_in',[$innewformat,$outnewformat])
//             ->orwhereBetween('check_out',[$innewformat,$outnewformat])
//             ->count();

//             if ($checkd_date == "0") {
//                 $model = new BookedRecordModel();
//                 $model->name = $request->post('name');
//                 $model->came_form = $request->post('came_form');
//                 $model->check_in = $request->post('check_in');
//                 $model->check_out = $request->post('check_out');
//                 $model->nid_number = $request->post('nid_number');
//                 $model->phone_number = $request->post('phone_number');
//                 $model->email = $request->post('email');
//                 $model->reason = $request->post('reason');
//                 $model->paid_amount = $request->post('paid_amount');
//                 $model->room_id = $request->post('room_id');
//                 $model->admin_id = $request->post('admin_id');
//                 $model->save();
//                 Alert::success('Success !!', 'Room Successfully Booked');
//                 return redirect('admin/hotel/booked_rooms');
//             } else {
//                 Alert::info('Sorry !!', 'Room already Booked');
//                 // dd($check_date);
//             }
//             return back();

//             //        $id=$request->post('room_id');
//             //        $room = RoomModel::Find($id);
//             //        $room->is_room_booked = 1;
//             //        $room->save();
//         }
//         public function UpdateBookingStatus($status, $id)
//         {
//             $model = RoomModel::Find($id);
//             $model->is_room_booked = $status;
//             $model->save();
//             return back()->with('message', ' Status Updated Successfully');
//         }

//         public function ManageBranchView(Request $request, $id = '')
//         {

//             if ($id > 0) {
//                 $arr = BranchModel::where(['id' => $id])->get();
//                 $result['branch_name'] = $arr['0']->branch_name;
//                 $result['hotel_type'] = $arr['0']->hotel_type;
//                 $result['number_of_stars'] = $arr['0']->number_of_stars;
//                 $result['branch_country'] = $arr['0']->branch_country;
//                 $result['branch_city'] = $arr['0']->branch_city;
//                 $result['branch_location'] = $arr['0']->branch_location;
//                 $result['near_by_places'] = $arr['0']->near_by_places;
//                 $result['branch_description'] = $arr['0']->branch_description;
//                 $result['branch_house_rules'] = $arr['0']->branch_house_rules;
//                 $result['branch_policy'] = $arr['0']->branch_policy;
//                 $result['branch_logo'] = $arr['0']->branch_logo;
//                 $result['branch_cover_image'] = $arr['0']->branch_cover_image;
//                 $result['branch_facilities'] = $arr['0']->branch_facilities;
//                 $result['id'] = $arr['0']->id;
//             } else {
//                 $result['branch_name'] = '';
//                 $result['hotel_type'] = '';
//                 $result['number_of_stars'] = '';
//                 $result['branch_country'] = '';
//                 $result['branch_city'] = '';
//                 $result['branch_location'] = '';
//                 $result['near_by_places'] = '';
//                 $result['branch_description'] = '';
//                 $result['branch_house_rules'] = '';
//                 $result['branch_policy'] = '';
//                 $result['branch_logo'] = '';
//                 $result['branch_cover_image'] = '';
//                 $result['branch_facilities'] = '';
//                 $result['id'] = 0;
//             }

//             $result['hotel_types'] = HotelTypesModel::where(['is_status_active' => 1])->get();
//             $result['number_of_star'] = NumberOfStarModel::where(['is_status_active' => 1])->get();
//             return view('admin.pages.hotel.manage_branch', $result);
//         }


//         public function BranchListView(Request $request)
//     {
//         $admin_id = $request->session()->get("ADMIN_ID");
//         $result = BranchModel::where("admin_id", $admin_id)->get();
//         $hotel_types = HotelTypesModel::all();

//         return view('admin.pages.hotel.branch_list', compact('result', 'hotel_types'));
//     }
//     public function ManageBranchProcess(Request $request)
//     {
//         if ($request->post('id') > 0) {

//             $model = BranchModel::find($request->post('id'));
//             // $msg = " Updated Successfully ";
//             Alert::success('Success !!', 'Record Successfully Updated');
//         } else {
//             $model = new BranchModel();
//             // $msg = " Created Successfully ";
//             Alert::success('Success !!', 'Record Successfully Added');
//         }

//         //for cover image
//         if ($request->hasfile('branch_cover_image')) {

//             if ($request->post('id') > 0) {
//                 $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
//                 if (Storage::exists('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image)) {
//                     Storage::delete('/media/branch/CoverImages/' . $arrImage[0]->branch_cover_image);
//                 }
//             }

//             $branch_cover_image = $request->file('branch_cover_image');
//             $ext = $branch_cover_image->extension();
//             $image_name = time() . '.' . $ext;
//             $branch_cover_image->storeAs('/media//branch/CoverImages/', $image_name);
//             $model->branch_cover_image = $image_name;
//         }
//         // for logo
//         if ($request->hasfile('branch_logo')) {

//             if ($request->post('id') > 0) {
//                 $arrImage = DB::table('branches')->where(['id' => $request->post('id')])->get();
//                 if (Storage::exists('/media/branch/logo/' . $arrImage[0]->branch_logo)) {
//                     Storage::delete('/media/branch/logo/' . $arrImage[0]->branch_logo);
//                 }
//             }
//             $branch_logo = $request->file('branch_logo');
//             $ext = $branch_logo->extension();
//             $image_name = time() . '.' . $ext;
//             $branch_logo->storeAs('/media/branch/logo/', $image_name);
//             $model->branch_logo = $image_name;
//         }
//         $model->branch_name = $request->post('branch_name');
//         $model->hotel_type = $request->post('hotel_type');
//         $model->number_of_stars = $request->post('number_of_stars');
//         $model->branch_country = $request->post('branch_country');
//         $model->branch_city = $request->post('branch_city');
//         $model->branch_location = $request->post('branch_location');
//         $model->branch_description = $request->post('branch_description');
//         $model->branch_house_rules = $request->post('branch_house_rules');
//         $model->branch_policy = $request->post('branch_policy');
//         //near_by_places
//         $near_by_places = array(
//             'place1' => $request->post('place1'),
//             'place2' => $request->post('place2'),
//         );
//         $near_by_places = json_encode($near_by_places);
//         //facilities
//         $branch_facilities = array(
//             'is_security_active' => $request->post('is_security_active'),
//             'is_wifi_active' => $request->post('is_wifi_active'),
//             'is_dining_active' => $request->post('is_dining_active'),
//             'is_pets_active' => $request->post('is_pets_active'),
//             'is_parking_active' => $request->post('is_parking_active'),
//             'is_breakfast_active' => $request->post('is_breakfast_active'),
//             // ====
//             'is_swimingpool_active' => $request->post('is_swimingpool_active'),
//             'is_roomservice_active' => $request->post('is_roomservice_active'),
//             'is_disability_friendly_active' => $request->post('is_disability_friendly_active'),
//             'is_aircondition_active' => $request->post('is_aircondition_active'),
//             'is_businessfacilities_active' => $request->post('is_businessfacilities_active'),
//             'is_fitnesscenter_active' => $request->post('is_fitnesscenter_active'),
//             'is_restaurant_active' => $request->post('is_restaurant_active'),
//             'is_outdooractivities_active' => $request->post('is_outdooractivities_active'),
//             'is_airportshuttel_active' => $request->post('is_airportshuttel_active'),
//             'is_couplefriendly_active' => $request->post('is_couplefriendly_active'),
//         );
//         $branch_facilities = json_encode($branch_facilities);

//         $model->branch_facilities = $branch_facilities;
//         $model->near_by_places = $near_by_places;
//         $model->admin_id = $request->post('admin_id');
//         $model->is_status_active = 1;

//         $model->save();

//         return redirect('/admin/hotel/branch_list');
//     }
//     public function status($status, $id)
//     {
//         $model = BranchModel::Find($id);
//         $model->is_status_active = $status;
//         $model->save();
//         Alert::success('Success !!', 'Status Successfully Updated');
//         return back();
//     }
//     public function DeleteBranch(Request $request, $id)
//     {
//         $cover_image = DB::table('branches')->where(['id' => $id])->get();
//         if (Storage::exists('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image)) {
//             Storage::delete('/media/branch/CoverImages/' . $cover_image[0]->branch_cover_image);
//         }
//         $logo = DB::table('branches')->where(['id' => $id])->get();
//         if (Storage::exists('/media/branch/logo/' . $logo[0]->branch_logo)) {
//             Storage::delete('/media/branch/logo/' . $logo[0]->branch_logo);
//         }

//         BranchModel::where('id', $id)->delete();
//         Alert::success('Success !!', 'Record Successfully Deleted');
//         return back();
//     }
//     public function BranchView($id)
//     {
//         $result = BranchModel::find($id);
//         // dd($result);
//         return view('admin.pages.hotel.branch_view', compact('result'));
//     }



// }

//     }





// class RoomController extends Controller
// {

//     public function CancelRoom(Request $request, $id = '')
//     {
//         DB::table('booked_records')->where(['room_id' => $id])->delete();
//         // dd(kon id theke ase jante hobe);

//         return back();
//     }

//     public function HotelInvoiceView(Request $request, $id = '')
//     {

//         $admin_id = $request->session()->get("ADMIN_ID");

//         $result['result'] = DB::table('booked_records')
//             ->leftJoin('rooms', 'rooms.id', '=', 'booked_records.room_id')
//             ->where(['booked_records.admin_id' => $admin_id])
//             ->orderBy('booked_records.created_at', 'desc')
//             ->get();
//         $result['roomtypes'] = RoomTypeModle::get();

//         $result['branch']= BranchModel::where('id',$result['result'][0]->branch_id)->first();
//        $bed_distribution=($result["result"][0]->bed_distribution);
//        $decoded_bed_distribution=json_decode($bed_distribution,true);

//        $no_of_person=($result["result"][0]->no_of_person);
//        $decoded_no_of_person=json_decode($no_of_person,true);
//     //    dd($decoded_no_of_person);
//         return view('admin.pages.hotel.hotelinvoice', compact('result','decoded_bed_distribution','decoded_no_of_person'));




//     }



//     public function RoomSearch(Request $request)
//     {

//         // dd(gettype($request->check_in));
//         //        $admin_id=$request->session()->get("ADMIN_ID");
//         //        $branch_name = $request->post('branch_name');
//         //        $check_in = $request->post('check_in');
//         //        $check_out = $request->post('check_out');

//         //    $query->where([
//         //     ['column_1', '=', 'value_1'],
//         //     ['column_2', '<>', 'value_2'],
//         //     [COLUMN, OPERATOR, VALUE],
//         //     ...
//         // ])

//         //       $result['rooms']=RoomModel::query()
//         //           ->leftJoin('branches','branches.id','=','rooms.branch_id')
//         //           ->leftJoin('booked_records','booked_records.room_id','=','rooms.id')
//         //
//         //           ->where('branches.branch_name','=',$branch_name)


//         //    ['booked_records.check_in', '!=', $check_in],
//         //    ['booked_records.check_out', '!=', $check_out]])
//         //    ->Where()
//         //    ->Where()
//         //    ->where(['rooms.admin_id'=>$admin_id])
//         //           ->get();
//         //        dd( $result['rooms']);
//         //        //    ->orWhere('branches.branch_name', 'like', "%$branch_name%")
//         //       $result['branch_list']= BranchModel::pluck('branch_name')->all();
//         //       $result['branch']= BranchModel::get();
//         //       $result['roomtypes']= RoomTypeModle::get();

//         //    dd($result);
//         //    $query->where('a','=',$a)
//         //        ->orWhere('b','=', $b);

//         //     $availableRooms = RoomModel::where(['','=',$a]);
//         //     dd($availableRooms);
//         //        return view('admin_hotel.pages.available_rooms',$result);
//     }


//     public function ManageRoomProcess(Request $request)
//     {
//         // validation starts
//         $rules = [
//             'room_image' => 'mimes:jpeg,png,jpg,gif',
//             // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
//         ];
//         $custom_message = [

//             // 'room_name.unique'=>'This room is already exist',
//             'room_image.mimes' => 'Image must be on jpeg,png,jpg,gif format',
//         ];
//         $this->validate($request, $rules, $custom_message);

//         // validation ends

//         if ($request->post('id') > 0) {

//             $model = RoomModel::find($request->post('id'));
//             Alert::success('Success !!', 'Record Successfully Updated');
//         } else {
//             $model = new RoomModel();
//             Alert::success('Success !!', 'Record Successfully Added');
//         }

//         //for cover image
//         if ($request->hasfile('room_image')) {

//             if ($request->post('id') > 0) {
//                 $arrImage = DB::table('rooms')->where(['id' => $request->post('id')])->get();
//                 if (Storage::exists('/media/branch/rooms/' . $arrImage[0]->room_image)) {
//                     Storage::delete('/media/branch/rooms/' . $arrImage[0]->room_image);
//                 }
//             }
//             $room_image = $request->file('room_image');
//             $ext = $room_image->extension();
//             $image_name = time() . '.' . $ext;
//             $room_image->storeAs('/media/branch/rooms/', $image_name);
//             $model->room_image = $image_name;
//         }
//         //bed distribution
//         $bed_distribution = array(
//             'no_of_single_bed' => $request->post('no_of_single_bed'),
//             'no_of_double_bed' => $request->post('no_of_double_bed'),
//         );
//         $bed_distribution = json_encode($bed_distribution);

//         //room facilities
//         $room_facilities = array(
//             'is_house_keeping' => $request->post('is_house_keeping'),
//             'is_air_condition' => $request->post('is_air_condition'),
//             'is_fan' => $request->post('is_fan'),
//             'is_balcony' => $request->post('is_balcony'),
//             'is_toilets' => $request->post('is_toilets'),
//             'is_tv' => $request->post('is_tv'),
//             'is_kettle' => $request->post('is_kettle'),
//             'is_fridge' => $request->post('is_fridge'),
//             'is_sofa' => $request->post('is_sofa'),
//             'is_ware_drop' => $request->post('is_ware_drop'),
//             'is_locker' => $request->post('is_locker'),
//             'is_curtain' => $request->post('is_curtain'),
//             'is_blanket' => $request->post('is_blanket'),
//             'is_toiletries' => $request->post('is_toiletries'),
//             'is_towel' => $request->post('is_towel'),
//             'is_hot_water' => $request->post('is_hot_water'),
//         );
//         $room_facilities = json_encode($room_facilities);
//         //for number of person
//         $no_of_person = array(
//             'no_of_adult' => $request->post('no_of_adult'),
//             'no_of_kids' => $request->post('no_of_kids'),
//             'no_of_guest' => $request->post('no_of_guest'),
//         );
//         $no_of_person = json_encode($no_of_person);

//         $model->room_name = $request->post('room_name');
//         $model->room_type = $request->post('room_type');
//         $model->bed_distribution = $bed_distribution;
//         $model->no_of_person = $no_of_person;
//         $model->room_price = $request->post('room_price');
//         $model->room_facilities = $room_facilities;
//         $model->refund_policy = $request->post('refund_policy');
//         $model->branch_id = $request->post('branch_id');
//         $model->admin_id = $request->post('admin_id');
//         $model->is_status_active = 1;
//         $model->is_room_booked = 0;

//         $model->save();
//         return redirect('admin/hotel/roomlist');
//     }

//     public function status($status, $id)
//     {
//         $model = RoomModel::Find($id);
//         $model->is_status_active = $status;
//         $model->save();
//         Alert::success('Success !!', 'Status Successfully Updated');
//         return back();
//     }

//     public function DeleteRoom(Request $request, $id)
//     {
//         $arrImage = DB::table('rooms')->where(['id' => $id])->get();
//         if (Storage::exists('/media/branch/rooms/' . $arrImage[0]->room_image)) {
//             Storage::delete('/media/branch/rooms/' . $arrImage[0]->room_image);
//         }

//         RoomModel::where('id', $id)->delete();
//         Alert::success('Success !!', 'Record Successfully Deleted');
//         return back();
//     }
