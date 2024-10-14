<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategoryModel;
use App\Models\MealItemModel;
use App\Models\RestaurantBookingModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFoodMenuController extends Controller
{
    public function FoodCategoryView(Request $request)
    {

        $result = FoodCategoryModel::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.restaurant.food_categories', compact('result'));
    }

    public function ManageFoodCategoryView(Request $request, $id = '')
    {

        if ($id > 0) {
            $arr = FoodCategoryModel::where(['id' => $id])->get();
            $result['category_name'] = $arr['0']->category_name;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['id'] = $arr['0']->id;
            $result['vendor'] = $request->vendor;
        } else {
            $result['category_name'] = '';
            $result['is_status_active'] = '';
            $result['id'] = 0;
            $result['vendor'] = $request->vendor;
        }

        // dd($result);
        return view('admin.pages.restaurant.manage_food_categories', $result);
    }
    public function ManageFoodCategoryProcess(Request $request)
    {

        if ($request->post('id') > 0) {

            $model = FoodCategoryModel::find($request->post('id'));
            // $msg = " Updated Successfully ";

            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new FoodCategoryModel();
            // $msg = " Created Successfully ";
            Alert::success('Success !!', 'Record Successfully Added');
        }

        $model->category_name = $request->post('category_name');
        $model->is_status_active = 1;
        $model->vendor_id =  $request->vendor_id;

        $model->save();

        // return redirect('/vendor/hotel/branch_list');
        return redirect('admin/food_categories');
    }
    public function DeleteCategory(Request $request, $id)
    {
        FoodCategoryModel::where('id', $id)->delete();
        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }

    public function CategoryStatus($status, $id)
    {
        $model = FoodCategoryModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function MealItemView(Request $request)
    {

        $result = MealItemModel::orderBy('created_at', 'DESC')->get();
        $categories = FoodCategoryModel::all();
        return view('admin.pages.restaurant.meal_items', compact('result', 'categories'));
    }


    public function ManageMealItemView(Request $request,  $id = '')
    {


        if ($id > 0) {
            $arr = MealItemModel::where(['id' => $id])->get();
            $result['item_name'] = $arr['0']->item_name;
            $result['item_price'] = $arr['0']->item_price;
            $result['item_image'] = $arr['0']->item_image;
            $result['item_description'] = $arr['0']->item_description;
            $result['is_status_active'] = $arr['0']->is_status_active;
            $result['food_category_id'] = $arr['0']->food_category_id;
            $result['id'] = $arr['0']->id;
            $result['vendor'] = $request->vendor;
        } else {
            $result['item_name'] = '';
            $result['item_price'] = '';
            $result['item_image'] = '';
            $result['item_description'] = '';
            $result['is_status_active'] = '';
            $result['food_category_id'] = '';
            $result['id'] = 0;
            $result['vendor'] = $request->vendor;
        }

        $vendor_id = $request->vendor;

        $result['categories'] = FoodCategoryModel::where("vendor_id", $vendor_id)
            ->where('is_status_active', 1)
            ->get();

        return view('admin.pages.restaurant.manage_meal_item', $result);
    }

    public function ManageMealItemProcess(Request $request)
    {


        // validation starts
        $rules = [
            'item_image' => 'mimes:jpeg,png,jpg,gif',
            // 'room_name'=>'unique:rooms,room_name,'.$request->post('id'),
        ];
        $custom_message = [

            // 'room_name.unique'=>'This room is already exist',
            'item_image.mimes' => 'Image must be on jpeg,png,jpg,gif format',
        ];
        $this->validate($request, $rules, $custom_message);

        // validation ends

        if ($request->post('id') > 0) {

            $model = MealItemModel::find($request->post('id'));
            Alert::success('Success !!', 'Record Successfully Updated');
        } else {
            $model = new MealItemModel();
            Alert::success('Success !!', 'Record Successfully Added');
        }

        //for cover image
        if ($request->hasfile('item_image')) {

            if ($request->post('id') > 0) {

                $arrImage = DB::table('meal_items')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/media/food_item_image/' . $arrImage[0]->item_image)) {
                    Storage::delete('/media/food_item_image/' . $arrImage[0]->item_image);
                }
            }
            $item_image = $request->file('item_image');
            $ext = $item_image->extension();
            $image_name = time() . '.' . $ext;
            $item_image->storeAs('/media/food_item_image/', $image_name);
            $model->item_image = $image_name;
        }

        $model->item_name = $request->post('item_name');
        $model->item_price = $request->post('item_price');
        $model->item_description = $request->post('item_description');
        $model->food_category_id = $request->post('food_category_id');
        $model->vendor_id = $request->post('vendor_id');
        $model->is_status_active = 1;
        // dd($model);
        $model->save();

        //        dd($model->save());
        return redirect('admin/meal_items');
    }

    public function MealItemStatus($status, $id)
    {
        $model = MealItemModel::Find($id);
        $model->is_status_active = $status;
        $model->save();
        Alert::success('Success !!', 'Status Successfully Updated');
        return back();
    }

    public function DeleteMealItem(Request $request, $id)
    {
        $arrImage = DB::table('meal_items')->where(['id' => $id])->get();
        if (Storage::exists('/media/food_item_image/' . $arrImage[0]->item_image)) {
            Storage::delete('/media/food_item_image/' . $arrImage[0]->item_image);
        }


        MealItemModel::where('id', $id)->delete();

        $bookingToDelete = RestaurantBookingModel::all()->toArray();

        if (count($bookingToDelete) > 0) {
            foreach ($bookingToDelete as $delete) {
                $tableFind = json_decode($delete['selected_meal_item']);
                foreach ($tableFind as $s) {
                    if ($s == $id) {
                        RestaurantBookingModel::where('id', $delete['id'])->delete();
                        break;
                    }
                }
            }
        }

        Alert::success('Success !!', 'Record Successfully Deleted');
        return back();
    }



    public function SelectVendorCategory(){

        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_category',compact('all_restaurant'));
    }

    public function SelectVendorMeal(){

        $all_restaurant=VendorModel::where('vendor_type','restaurant')->get();
        return view('admin.pages.restaurant.select_vendor_meal',compact('all_restaurant'));
    }
}
