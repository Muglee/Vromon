<?php

use App\Http\Controllers\admin\FlightBookingController;
// use App\Http\Controllers\agent\FlightBookingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//authentication
Route::get('/authenticate',[FlightBookingController::class, 'Authenticate']);
//air search
Route::get('/airsearch',[FlightBookingController::class, 'AirSearch']);
//air rule
Route::get('/airrule',[FlightBookingController::class, 'AirRule']);
//get balance
Route::get('/getbalance',[FlightBookingController::class, 'GetBalance']);
//air promotion
Route::get('/airpromotion',[FlightBookingController::class, 'AirPromotion']);
//air check promotion
Route::get('/aircheckpromotion',[FlightBookingController::class, 'AirCheckPromotion']);
//air price
Route::get('/airprice',[FlightBookingController::class, 'AirPrice']);
//air mini rules
Route::get('/airminirules',[FlightBookingController::class, 'AirMiniRules']);