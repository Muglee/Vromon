<?php

namespace App\Http\Controllers\web;
use GuzzleHttp\Client;
use App\Models\Package;
use App\Models\KidsModel;
use App\Models\AdultsModel;
use Illuminate\Http\Request;
use App\Models\PackageBooked;
use App\Models\NoOfRoomsModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function IndexView(Request $request)
    {
        $kids = KidsModel::get();
        $adults = AdultsModel::get();
        $no_of_rooms = NoOfRoomsModel::get();
        $countries = Package::distinct('destination_country')->pluck('destination_country');
        // dd($countries);

        //flight 

        $client = new Client();

        $url = "http://api.sandbox.flyhub.com/api/v1/Authenticate";

        $params = [
            'username' => 'rbtours.bd@gmail.com',
            'apikey' => 'zT~x0o72_v6x9Uwwe4MFXcvNvg73QDbxQ6faWqu_Kzn0tE27Q5'
        ];
        $response = $client->request('POST', $url, [
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());

        $TokenId = $responseBody->TokenId;
        $request->session()->put('TOKEN_ID', $TokenId);
        // dd( $responseBody);

        return view('web.pages.index', compact('kids', 'adults', 'no_of_rooms', 'countries'));
    }
    public function SearchTour(Request $request)
    {
        // dd($request);
        $location = Package::select('location')->where('id', $request->location_id)->first();
        $location_name = $location->location;
        // dd($location);
        $country = Package::select('destination_country')->where('id', $request->destination_country)->first();
        $country_name = $country->destination_country;

        $package = Package::where('destination_country', $country_name)->where('location', $location_name)->get();

        // dd($package);

        return view('web.pages.tour_search', compact('package'));
    }
    public function FindLocationAjax($id)
    {
        $countries = DB::table('packages')->where('id', $id)->first();
        $country_name = $countries->destination_country;
        $locations = DB::table('packages')->where('destination_country', $country_name)->get();
        return json_encode($locations);
        // dd('hello');
    }

    public function UserPackageDetails(Request $request)
    {
        // dd($request);
        $destination_country = $request->destination_country;
        $package_name = $request->package_name;
        $tour_length = $request->tour_length;
        $amount = $request->amount;
        $starting_date = $request->starting_date;
        $end_date = $request->end_date;

        return view('web.pages.passenger_details', compact('destination_country', 'package_name', 'tour_length', 'amount', 'starting_date', 'end_date'));
    }

    public function PassengerDetailsShow()
    {
    }
    public function PassengerDetailsStore(Request $request)
    {
        // dd($request);
        $package_booked = new PackageBooked();
        $packages = Package::with('hotels')->find($request->package_id);
        // dd($package_booked);

        $package_booked->title = $request->title;
        $package_booked->first_name = $request->firstname;
        $package_booked->last_name = $request->lastname;
        $package_booked->email = $request->email;
        $package_booked->country_code = $request->countrycode;
        $package_booked->mobile = $request->phone;
        $package_booked->passport = $request->passportno;
        $package_booked->passport_issue = $request->passportissue;
        $package_booked->passport_expdate = $request->passportexp;
        $package_booked->arrival_time = $request->arrival_time;
        $package_booked->arrival_point = $request->arrival_point;
        $package_booked->departure_time = $request->departure_time;
        $package_booked->departure_point = $request->departure_point;
        $package_booked->save();

        Alert::success('Success !!', 'Customer Information Successfully Insert ');

        return view('web.pages.passenger_details', compact('package_booked', 'packages'));
    }
    public function PackageDetails(Request $request)
    {
        // dd($request);
        $packages = Package::with('hotels')->find($request->package_id);
        // dd($packages);

        return view('web.pages.package_details', compact('packages'));
    }


    public function AboutView()
    {
        return view('web.pages.about');
    }
    public function BookAirTicketsView()
    {
        return view('web.pages.book_air_tickets');
    }
    public function ReserveHotelView()
    {
        return view('web.pages.reserve_hotel');
    }
    public function BookTrainTicketsView()
    {
        return view('web.pages.book_train_tickets');
    }

    public function BookBusTicketsView()
    {
        return view('web.pages.book_bus_tickets');
    }
    public function RestaurantReservasionView()
    {
        return view('web.pages.restaurant_reservasion');
    }
    public function TourServiceView()
    {
        return view('web.pages.tour_services');
    }
    public function ContactView()
    {
        return view('web.pages.contact');
    }
    public function FaqView()
    {
        return view('web.pages.faq');
    }
    public function PrivacyPolicyView()
    {
        return view('web.pages.privacy_policy');
    }
    public function TourDetailsView()
    {
        return view('web.pages.tour_details');
    }
    public function HotelDetailsView()
    {
        return view('web.pages.hotel_details');
    }
    public function RestaurantDetailsView()
    {
        return view('web.pages.restaurant_details');
    }

    public function TourListView()
    {
        return view('web.pages.tour_list');
    }
    public function LoginView()
    {
        return view('web.auth_pages.login');
    }
}
