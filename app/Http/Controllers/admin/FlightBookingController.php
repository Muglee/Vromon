<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationCity;
use App\Models\Info;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class FlightBookingController extends Controller
{
    public function FlightBookingView(Request $request)
    {
        //START GENERATE TOKEN ID
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
        //END GENERATE TOKEN ID

        // dd($TokenId);
        return view('admin.pages.flight_booking');
    }

    public function FlightSearchResultView(Request $request)
    {
        return view('admin.pages.flight_search_result');
    }

    public function OneWayFlightSearch(Request $request)
    {

        //for round ticket
        if ($request->ReturningDateTime != null) {
            $destination_form = $request->Origin;
            $destination_to = $request->Destination;
            $origin = session()->put('origin', $destination_form);
            $destination = session()->put('destination', $destination_to);
            $cabin_class = $request->CabinClass;
            $JourneyType = $request->JourneyType;
            $date = $request->DepartureDateTime;
            //date formating
            $flightDate = strtotime($date);
            $departing_on = date('Y-m-d', $flightDate);
            $adult = $request->AdultQuantity;
            $child = $request->ChildQuantity;
            $infant = $request->InfantQuantity;
            $clientIP = $request->EndUserIp;
            $authorization = $request->authorization;


            $date2 = $request->ReturningDateTime;
            $flightDate2 = strtotime($date2);
            $returning_on = date('Y-m-d', $flightDate2);
            $adult_count = Session::put('a_count', $adult);
            $child_count = Session::put('c_count', $child);
            $infant_count = Session::put('i_count', $infant);
            $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
            $total_count = Session::put('total_count_passenger', $total_count_passenger);

            $desination_from_array[0] = (object)[
                'Origin' => $destination_form,
                'Destination' => $destination_to,
                'CabinClass' => $cabin_class,
                'DepartureDateTime' => $departing_on
            ];
            $desination_from_array[1] = (object)[
                'Origin' => $destination_to,
                'Destination' => $destination_form,
                'CabinClass' => $cabin_class,
                'DepartureDateTime' => $returning_on
            ];

            $client = new Client();
            $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
            $params = [
                'AdultQuantity' => $adult,
                'ChildQuantity' => $child,
                'InfantQuantity' => $infant,
                'EndUserIp' => $clientIP,
                'JourneyType' => "2",
                'Segments' => $desination_from_array
            ];

            $headers = [
                'Authorization' => $authorization,
            ];

            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $params,
                'verify'  => false,
            ]);
            $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

            return response()->json($responseBody);
        }

        //for multi city

        if ($request['vars'] != null) {
            $new_array = [];
            $demo_array = [];
            $demo_array[0] = (object)[
                'Origin' => $request->Origin,
                'Destination' => $request->Destination,
                'CabinClass' => $request->CabinClass,
                'DepartureDateTime' => $request->DepartureDateTime
            ];

            for ($i = 1; $i < 3; $i++) {
                $vars = $request->vars;
                $destination_form = "destination_form" . "_" . $i;
                $destination_to = "destination_to" . "_" . $i;
                $departing_on = "departing_on" . "_" . $i;

                if ($vars[$destination_form]) {
                    $new_array['Origin'] = $vars[$destination_form];
                    $new_array['Destination'] = $vars[$destination_to];
                    $new_array['CabinClass'] = "1";
                    $new_array['DepartureDateTime'] = $vars[$departing_on];
                }
                $demo_array[$i] = (object)$new_array;

                $destination_form = $request->Origin;
                $destination_to = $request->Destination;
                $origin = session()->put('origin', $destination_form);
                $destination = session()->put('destination', $destination_to);
                $cabin_class = $request->CabinClass;
                $JourneyType = $request->JourneyType;
                $date = $request->DepartureDateTime;
                //date formating
                $flightDate = strtotime($date);
                $departing_on = date('Y-m-d', $flightDate);
                $adult = $request->AdultQuantity;
                $child = $request->ChildQuantity;
                $infant = $request->InfantQuantity;
                $clientIP = $request->EndUserIp;
                $authorization = $request->authorization;

                $adult_count = Session::put('a_count', $adult);
                $child_count = Session::put('c_count', $child);
                $infant_count = Session::put('i_count', $infant);

                $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
                $total_count = Session::put('total_count_passenger', $total_count_passenger);


                $client = new Client();
                $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
                $params = [
                    'AdultQuantity' => $adult,
                    'ChildQuantity' => $child,
                    'InfantQuantity' => $infant,
                    'EndUserIp' => $clientIP,
                    'JourneyType' => "3",
                    'Segments' => $demo_array,
                    "preferredAirlines" => null
                ];


                $headers = [
                    'Authorization' => $authorization,
                ];
                $response = $client->request('POST', $url, [
                    'headers' => $headers,
                    'json' => $params,
                    'verify'  => false,
                ]);
                $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
                // dd($responseBody);
                return response()->json($responseBody);
            }
        } else {
            // for single ticket

            $destination_form = $request->Origin;
            $destination_to = $request->Destination;
            $origin = session()->put('origin', $destination_form);
            $destination = session()->put('destination', $destination_to);
            $cabin_class = $request->CabinClass;
            $JourneyType = $request->JourneyType;
            $date = $request->DepartureDateTime;
            //date formating
            $flightDate = strtotime($date);
            $departing_on = date('Y-m-d', $flightDate);
            $adult = $request->AdultQuantity;
            $child = $request->ChildQuantity;
            $infant = $request->InfantQuantity;
            $clientIP = $request->EndUserIp;
            $authorization = $request->authorization;
            $adult_count = Session::put('a_count', $adult);
            $child_count = Session::put('c_count', $child);
            $infant_count = Session::put('i_count', $infant);
            $total_count_passenger = (int)$adult + (int)$child + (int)$infant;
            $total_count = Session::put('total_count_passenger', $total_count_passenger);
            $client = new Client();
            $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
            $params = [
                'AdultQuantity' => $adult,
                'ChildQuantity' => $child,
                'InfantQuantity' => $infant,
                'EndUserIp' => $clientIP,
                'JourneyType' => $JourneyType,
                'Segments' => [[
                    'Origin' => $destination_form,
                    'Destination' => $destination_to,
                    'CabinClass' => $cabin_class,
                    'DepartureDateTime' => $departing_on
                ]]
            ];
            $headers = [
                'Authorization' => $authorization,
            ];


            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $params,
                'verify'  => false,
            ]);
            $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
            return response()->json($responseBody);
        }
    }


    public function FlightSearchResultViewAjax()
    {
        $searchResults = $this->AirSearch();
        return response()->json($searchResults);
    }
    public function FlightHubBookView()
    {
        return view('admin.pages.flight_hub_book');
    }
    public function FlightHubReviewView()
    {
        return view('admin.pages.flight_hub_review');
    }

    //authenticion
    // public function Authenticate()
    // {
    //     $client = new Client();
    //     $url = "http://api.sandbox.flyhub.com/api/v1/Authenticate";

    //     $params = [
    //         'username' => 'rbtours.bd@gmail.com',
    //         'apikey' => 'zT~x0o72_v6x9Uwwe4MFXcvNvg73QDbxQ6faWqu_Kzn0tE27Q5'
    //     ];
    //     $response = $client->request('POST', $url, [
    //         'json' => $params,
    //         'verify'  => false,
    //     ]);
    //     $responseBody = json_decode($response->getBody());
    //     $TokenId = $responseBody->TokenId;

    //     //        return $responseBody;
    //     return response()->json($TokenId);
    // }

    //air search
    public function AirSearch()
    {
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirSearch";
        $params = [
            'AdultQuantity' => 1,
            'ChildQuantity' => 0,
            'InfantQuantity' => 0,
            'EndUserIp' => '10.201.201.66',
            'JourneyType' => 'Oneway',
            'Segments' => [[
                'Origin' => 'DEL',
                'Destination' => 'DXB',
                'CabinClass' => 'Economy',
                'DepartureDateTime' => '2022-05-25T09:20:18.154Z'
            ]]
        ];
        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InJidG91cnMuYmRAZ21haWwuY29tIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy91c2VyZGF0YSI6IjI0OHwyNjZ8MTExLjY4LjExMS4xOTcsMTE4LjE3OS4xNjUuMjQzIiwibmJmIjoxNjUyMzM3MzAwLCJleHAiOjE2NTI5NDIxMDAsImlhdCI6MTY1MjMzNzMwMCwiaXNzIjoiaHR0cDovL2FwaS5zYW5kYm94LmZseWh1Yi5jb20iLCJhdWQiOiJhcGkuc2FuZGJveC5mbHlodWIuY29tIn0.YfDEgQtBvD_SpZvx99E9A4f5I2g_BW5lKnyBm5iUq_g'
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        //         dump($responseBody);
        return response()->json($responseBody);
    }
    //air rule
    public function AirRule()
    {
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirRules";
        $params = [
            "SearchID" => "fc58957f-87e9-4e62-9697-96249c5bf55a",
            "ResultID" => "20ef0386-cc35-49c3-bb4a-4731634fc37cTPAI"
        ];
        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InJidG91cnMuYmRAZ21haWwuY29tIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy91c2VyZGF0YSI6IjI0OHwyNjZ8MTExLjY4LjExMS4xOTcsMTE4LjE3OS4yMjIuNDciLCJuYmYiOjE2NTIwMTIxOTksImV4cCI6MTY1MjYxNjk5OSwiaWF0IjoxNjUyMDEyMTk5LCJpc3MiOiJodHRwOi8vYXBpLnNhbmRib3guZmx5aHViLmNvbSIsImF1ZCI6ImFwaS5zYW5kYm94LmZseWh1Yi5jb20ifQ.Y6F0COH96trr_aY9bNoWjgl2KijNKrSGCGyJWuDIUUI'
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
    }

    //get balance
    public function GetBalance()
    {
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/GetBalance";
        $params = [
            'username' => 'rbtours.bd@gmail.com',
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        return response()->json($responseBody);
    }

    //air check promotion
    public function AirCheckPromotion()
    {
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirCheckPromotion";
        $params = [
            "Promocode" => "FS_1",
            "SearchID" => "fc58957f-87e9-4e62-9697-96249c5bf55a",
            "ResultID" => "20ef0386-cc35-49c3-bb4a-4731634fc37cTPAI"
        ];
        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InJidG91cnMuYmRAZ21haWwuY29tIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy91c2VyZGF0YSI6IjI0OHwyNjZ8MTAzLjM1LjE2OC4xNjAsMTE4LjE3OS4yMjIuNDciLCJuYmYiOjE2NTA5NjU3NTQsImV4cCI6MTY1MTU3MDU1NCwiaWF0IjoxNjUwOTY1NzU0LCJpc3MiOiJodHRwOi8vYXBpLnNhbmRib3guZmx5aHViLmNvbSIsImF1ZCI6ImFwaS5zYW5kYm94LmZseWh1Yi5jb20ifQ.RcJkah0eAwFFQ3glFnGmCdhJe4qnlcB91Sf-TgaTTnA'
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        dd($responseBody);
    }
    //air price
    public function AirPrice()
    {
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPrice";
        $params = [

            "SearchID" => "fc58957f-87e9-4e62-9697-96249c5bf55a",
            "ResultID" => "20ef0386-cc35-49c3-bb4a-4731634fc37cTPAI"
        ];
        $headers = [
            'Authorization' => '    '
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        dd($responseBody);
        // return $responseBody;
    }

    public function AirMiniRules()
    {
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirMiniRules";
        $params = [

            "SearchID" => "fc58957f-87e9-4e62-9697-96249c5bf55a",
            "ResultID" => "20ef0386-cc35-49c3-bb4a-4731634fc37cTPAI"
        ];

        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InJidG91cnMuYmRAZ21haWwuY29tIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy91c2VyZGF0YSI6IjI0OHwyNjZ8MTAzLjM1LjE2OC4xNjAsMTE4LjE3OS4yMjIuNDciLCJuYmYiOjE2NTA5NjU3NTQsImV4cCI6MTY1MTU3MDU1NCwiaWF0IjoxNjUwOTY1NzU0LCJpc3MiOiJodHRwOi8vYXBpLnNhbmRib3guZmx5aHViLmNvbSIsImF1ZCI6ImFwaS5zYW5kYm94LmZseWh1Yi5jb20ifQ.RcJkah0eAwFFQ3glFnGmCdhJe4qnlcB91Sf-TgaTTnA'
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
    }



    //call airrules after airsearch
    public function FlightAirRules(Request $req)

    {

        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirRules";
        $params = [
            "SearchID" => $req->searchId,
            "ResultID" => $req->resultId,
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);


        return response()->json($responseBody);
    }


    //air promotion
    //shows Invalid ResultID
    public function FlightAirPromotion(Request $req)
    {

        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPromotion";
        $params = [
            "SearchID" => $req->searchId,
            "ResultID" => $req->resultId,
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        dump($responseBody);
        return response()->json($responseBody);
    }

    public function FlightAirCheckPromotion(Request $req)
    {
        //set promocode in request from air promotion

        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPromotion";
        $params = [
            "Promocode" => $req->Promocode,
            "SearchID" => $req->searchId,
            "ResultID" => $req->resultId,
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        dump($responseBody);
        return response()->json($responseBody);
    }

    public function FlightAirPrice(Request $req)
    {
        $s_id = Session::put('s_id', $req->searchId);
        $r_id = Session::put('r_id', $req->resultId);
        // dd($s_id,$r_id);
        // dump($s_id);
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPrice";
        $params = [
            "SearchID" => $req->searchId,
            "ResultID" => $req->resultId
        ];
        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        $fares = $responseBody['Results'][0]['Fares'];
        $segments = $responseBody['Results'][0]['segments'];
        $totalfare = $responseBody['Results'][0]['TotalFare'];
        $discount = $responseBody['Results'][0]['Discount'];
        return view('admin.pages.prebook', compact('fares', 'segments', 'totalfare', 'discount'));
        // return $responseBody;

    }
    // {
    //     "SearchID": "string",
    //     "ResultID": "string",
    //     "Passengers": [
    //       {
    //         "Title": "string",
    //         "FirstName": "string",
    //         "LastName": "string",
    //         "PaxType": "Adult",
    //         "DateOfBirth": "2022-05-31T09:56:55.185Z",
    //         "Gender": "Male",
    //         "PassportNumber": "string",
    //         "PassportExpiryDate": "2022-05-31T09:56:55.185Z",
    //         "PassportNationality": "string",
    //         "Address1": "string",

    //         "CountryCode": "string",
    //         "Nationality": "string",
    //         "ContactNumber": "string",
    //         "Email": "string",
    //         "IsLeadPassenger": true,
    //         "FFAirline": "string",
    //         "FFNumber": "string",
    //         "Baggage": [
    //           {
    //             "BaggageID": "string"
    //           }
    //         ],
    //         "Meal": [
    //           {
    //             "MealID": "string"
    //           }
    //         ]
    //       }
    //     ],

    //   }
    public function FlightPreBook(Request $req)

    {

        // dd($req);
        $date_of_birth = $req->year . "-" . $req->month . "-" . $req->day;
        $s_id = Session::get('s_id');
        $r_id = Session::get('r_id');
        // dd($s_id,$r_id);
        $count_adult = Session::get("total_count_passenger");
        // dd($count_adult);
        $title = Session::put('title', $req->title);
        $firstName = Session::put('firstName', $req->FirstName);
        $lastName = Session::put('lastName', $req->LastName);
        $paxType = Session::put('paxType', $req->PaxType);
        $dateOfBirth = Session::put('dateOfBirth', "1995-10-06");
        $gender = Session::put('gender', $req->gender);
        $passportExpiryDate = Session::put('passportExpiryDate', "2024-10-20");
        $address1 = Session::put('address1', $req->Address1);
        $countryCode = Session::put('countryCode', $req->CountryCode);
        $nationality = Session::put('nationality', "BD");
        $contactNumber = Session::put('contactNumber', $req->ContactNumber);
        $email = Session::put('email', $req->Email);
        $isLeadPassenger = Session::put('isLeadPassenger', "true");
        $token_id = Session::get('TOKEN_ID');
        // dump( $token_id);
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirPreBook";
        //make all fields dynamic
        $p = [
            "Title" => $req->title,
            "FirstName" => $req->FirstName,
            "LastName" => $req->LastName,
            "PaxType" => $req->PaxType,
            "DateOfBirth" => $date_of_birth, //"1995-05-31T05:28:40.535Z"
            "Gender" => $req->gender,
            "Address1" => $req->Address1,
            "CountryCode" => $req->CountryCode,
            "Nationality" => $req->Nationality,
            "ContactNumber" => $req->ContactNumber,
            "Email" => $req->Email,
            "IsLeadPassenger" => true,
            "PassportNumber" => $req->PassportNumber,
            "PassportExpiryDate" => $req->PassportExpiryDate,
            "PassportNationality" => $req->PassportNationality
        ];
        $new_p = ((object)$p);
        // dd([$new_p]);
        $params = [
            "SearchID" =>  $s_id,
            "ResultID" => $r_id,
            // "SearchID"=> $req->searchId,
            // "ResultID"=> '886e2ea7-3a0b-408b-8621-56a7aa28f243',
            'Passengers' => [$new_p],
        ];
        $new_array = array();
        for ($i = 1; $i < (int)($count_adult); $i++) {
            //get day month and year and set it dynamic
            $passenger_no = ("passenger" . "_" . $i);

            $date_of_birth = $req->$passenger_no[7] . "-" . $req->$passenger_no[6] . "-" . $req->$passenger_no[5];
            $new_array['Title'] = $req->$passenger_no[0];
            $new_array['FirstName'] = $req->$passenger_no[1];
            $new_array['LastName'] = $req->$passenger_no[2];
            $new_array['PaxType'] = $req->$passenger_no[3];
            $new_array['DateOfBirth'] =  $date_of_birth;
            $new_array['Gender'] = $req->$passenger_no[4];
            $new_array['Address1'] = $req->$passenger_no[9];
            $new_array['CountryCode'] = $req->$passenger_no[10];
            $new_array['Nationality'] = $req->$passenger_no[8];
            $new_array['ContactNumber'] = $req->$passenger_no[11];
            $new_array['Email'] = "test@m.com";
            $new_array['IsLeadPassenger'] = false;
            $new_array['PassportNumber'] = $req->$passenger_no[13]; //to remove duplicate entry
            $new_array['PassportExpiryDate'] = $req->$passenger_no[14];
            $new_array['PassportNationality'] = $req->$passenger_no[15];
            $params['Passengers'][$i] =  (object)$new_array;
        }



        $users_info = Session::put('users_info', $params);


        $headers = [
            'Authorization' => $token_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);




        if ($responseBody['Error'] != null) {
            $errors = $responseBody['Error']['ErrorMessage'];

            return  view('admin.pages.error', compact('errors'));
        } else {

            if ($responseBody['RePriceStatus'] == "FareUnavailable") {
                $errors = "No ticket found,please try another flight";
                return view('admin.pages.error');
            }



            $fares = $responseBody['Results'][0]['Fares'];
            $segments = $responseBody['Results'][0]['segments'];
            $totalfare = $responseBody['Results'][0]['TotalFare'];
            $discount = $responseBody['Results'][0]['Discount'];
            // dd($responseBody['Results'][0]['segments']);
            return view('admin.pages.flight_hub_review', compact('fares', 'segments', 'totalfare', 'discount'));
        }
    }

    public function FlightAirBook(Request $req)

    {

        $get_users_info = Session::get('users_info');
        // dd($get_users_info);
        //no need//
        $s_id = Session::get('s_id');
        $r_id = Session::get('r_id');
        $title = Session::get('title');
        $firstName = Session::get('firstName');
        $lastName = Session::get('lastName');
        $paxType = Session::get('paxType');
        $gender = Session::get('gender');
        $email = Session::get('email');
        $contactNumber = Session::get('contactNumber');
        // $email=Session::get('email');
        // $isLeadPassenger=Session::get('isLeadPassenger');
        //no need//
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirBook";

        $headers = [
            'Authorization' => $token_id,
        ];

        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' =>  $get_users_info,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);


        $fares = Session::put('Fares', $responseBody['Results'][0]['Fares']);
        $segments = Session::put('segments', $responseBody['Results'][0]['segments']);
        $totalfare = Session::put('TotalFare', $responseBody['Results'][0]['TotalFare']);
        $discount = Session::put('Discount', $responseBody['Results'][0]['Discount']);
        // $dateOfBirth=Session::put('b_id',$responseBody['BookingID']);
        $booking_id = $responseBody['BookingID'];
        //new add setting booking id
        $set_booking_id = Session::put('b_id',  $booking_id);

        // dd( $responseBody);
        if (array_key_exists("BookingStatus", $responseBody)) {
            if ($responseBody['BookingStatus'] == "Booked") {


                //saving in databse
                $lead_pax = $responseBody['Passengers'][0]['PaxIndex'];
                $contact_no = $responseBody['Passengers'][0]['ContactNumber'];
                $booking_id = $responseBody['BookingID'];
                $origin = $responseBody['Results'][0]['segments'][0]['Origin']['Airport']['AirportCode'];
                $destination = $responseBody['Results'][0]['segments'][0]['Destination']['Airport']['AirportCode'];
                $amount = $responseBody['Results'][0]['TotalFare'];
                $status = $responseBody['BookingStatus'];
                //starts
                $airline = $responseBody['Results'][0]['segments'][0]['Airline']['AirlineName'];
                $duration = $responseBody['Results'][0]['segments'][0]['JourneyDuration'];
                $arrival_time = $responseBody['Results'][0]['segments'][0]['Destination']['ArrTime'];
                $departure_time = $responseBody['Results'][0]['segments'][0]['Origin']['DepTime'];
                $flight_no = $responseBody['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                $aircraft = (int)$responseBody['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                $class = $responseBody['Results'][0]['segments'][0]['Airline']['CabinClass'];
                $f_name = $responseBody['Passengers'][0]['FirstName'];
                $l_name = $responseBody['Passengers'][0]['LastName'];
                $baggage = $responseBody['Results'][0]['segments'][0]['Baggage'];
                $this->create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage);
                //saving in the database end

                $booked_fares = $responseBody['Results'][0]['Fares'];
                $booked_segments = $responseBody['Results'][0]['segments'];
                $booked_totalfare = $responseBody['Results'][0]['TotalFare'];
                $booked_discount = $responseBody['Results'][0]['Discount'];
                return view('admin.pages.flight_booked', compact('booked_fares', 'booked_segments', 'booked_totalfare', 'booked_discount'));
            }

            //solve this
            elseif ($responseBody['BookingStatus'] == "Pending" || $responseBody['BookingStatus'] == "InProcess") {
                // calling FlightAirRetrive api when its pending or inprocess

                $new_response = $this->FlightAirRetrive($booking_id);





                if ($new_response['BookingStatus'] == "InProcess") {

                    $lead_pax = $new_response['Passengers'][0]['PaxIndex'];
                    $contact_no = $new_response['Passengers'][0]['ContactNumber'];
                    $booking_id = $new_response['BookingID'];
                    $origin = $new_response['Results'][0]['segments'][0]['Origin']['Airport']['AirportCode'];
                    $destination = $new_response['Results'][0]['segments'][0]['Destination']['Airport']['AirportCode'];
                    $amount = $new_response['Results'][0]['TotalFare'];
                    $status = $new_response['BookingStatus'];

                    //starts
                    $airline = $new_response['Results'][0]['segments'][0]['Airline']['AirlineName'];
                    $duration = $new_response['Results'][0]['segments'][0]['JourneyDuration'];
                    $arrival_time = $new_response['Results'][0]['segments'][0]['Destination']['ArrTime'];
                    $departure_time = $new_response['Results'][0]['segments'][0]['Origin']['DepTime'];
                    $flight_no = $new_response['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                    $aircraft = (int)$new_response['Results'][0]['segments'][0]['Airline']['FlightNumber'];
                    $class = $new_response['Results'][0]['segments'][0]['Airline']['CabinClass'];
                    $f_name = $new_response['Passengers'][0]['FirstName'];
                    $l_name = $new_response['Passengers'][0]['LastName'];
                    $baggage = $new_response['Results'][0]['segments'][0]['Baggage'];


                    $this->create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage);
                    //saving in the database end

                    $booked_fares = $new_response['Results'][0]['Fares'];
                    $booked_segments = $new_response['Results'][0]['segments'];
                    $booked_totalfare = $new_response['Results'][0]['TotalFare'];
                    $booked_discount = $new_response['Results'][0]['Discount'];
                    return view('admin.pages.flight_booked', compact('booked_fares', 'booked_segments', 'booked_totalfare', 'booked_discount'));
                }
            } elseif ($responseBody['BookingStatus'] == "UnConfirmed") {
                dd("Your ticket is unconfirmed.Please call us");
            }
        } else {
            return view('admin.pages.hub_success');
        }
    }

    public function FlightAirRetrive($b_id)
    {

        $token_id = Session::get('TOKEN_ID');
        $booking_id = $b_id;
        // $fares=Session::get('Fares');
        // $segments=Session::get('segments');
        // $totalfare=Session::get('TotalFare');
        // $discount=Session::get('Discount');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirRetrieve";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [
            "BookingID" =>   $booking_id,
        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        return  $responseBody;
    }

    public function FlightAirTicket()
    {


        // $token_id = Session::get('TOKEN_ID');




        // $client = New Client();

        // $url = "http://api.sandbox.flyhub.com/api/v1/DownloadTicket";

        // $params = [

        //     "BookingID" => "FHB22071953805",
        //     "ResultID" => "e84c20dc-8cc3-4ee1-b27b-0d6e36215b2bTPBG",
        //     "PaxIndex"=> "P64821",
        //     "TicketNumber"=> "TN22071901",
        //     "ShowFare"=> 1,
        //     "ShowAllPax"=> 1,

        // ];



        // $request=$client->get($url,$params);
        // $response = $request->send();



        // $responseBody = json_decode($request->getBody(), JSON_PRETTY_PRINT);
        // dd($responseBody);


        // for booking
        $token_id = Session::get('TOKEN_ID');
        $b_id = Session::get('b_id');
        $fares = Session::get('Fares');
        $segments = Session::get('segments');
        // dd($segments);
        $airline = Session::get('Airline');
        $totalfare = Session::get('TotalFare');
        $discount = Session::get('Discount');

        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirTicketing";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" => "FHB22071953805",
            "IsAcceptedPriceChangeandIssueTicket" => 'true'

        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        // dd($responseBody);
        return view('admin.pages.hub_success', compact('fares', 'segments', 'totalfare', 'discount', 'airline'));
    }

    public function get_ticket($t_id)
    {

        // dd("hello");

        $get_ticket = DB::table('infos')->find($t_id);

        return view('admin.pages.flight_get_ticket', compact('get_ticket'));
    }

    public function download_ticket()
    {
        $token_id = Session::get('TOKEN_ID');


        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/DownloadTicket";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" => "FHB22071953805",
            "ResultID" => "e84c20dc-8cc3-4ee1-b27b-0d6e36215b2bTPBG",
            "PaxIndex" => "string",
            "TicketNumber" => "TN22071901",
            "ShowFare" => true,
            "ShowAllPax" => false,

        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        dd($responseBody);
    }

    public function FlightAirTicketCancel()
    {

        $b_id = Session::get('b_id');
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirCancel";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" =>  $b_id,
            "IsAcceptedPriceChangeandIssueTicket" => 'true'


        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        if ($responseBody['BookingStatus'] == "InProcess") {

            $cancel_response = "You can not cancel a ticket that is in process";
            return view('admin.pages.flight_cancel', compact('cancel_response'));
        } elseif ($responseBody['BookingStatus'] == "Cancelled") {
            return view('admin.pages.flight_cancel');
        }
    }


    public function  FlightShowInvoice($b_id)
    {
        $booking_id = $b_id;
        $token_id = Session::get('TOKEN_ID');
        $client = new Client();
        $url = "http://api.sandbox.flyhub.com/api/v1/AirCancel";
        $headers = [
            'Authorization' => $token_id,
        ];
        $params = [

            "BookingID" =>  $booking_id,
            "ShowPassenger" => 'true'


        ];
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $params,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);
        dd($responseBody);
    }

    public function create_infos($booking_id, $lead_pax, $origin, $destination, $contact_no, $amount, $status, $airline, $duration, $arrival_time, $departure_time, $flight_no, $aircraft, $class, $f_name, $l_name, $baggage)
    {

        // Validate the request...
        $flight = new Info;
        $flight->book_id = $booking_id;
        $flight->lead_pax = $lead_pax;
        $flight->origin = $origin;
        $flight->destination = $destination;
        $flight->amount = $amount;
        $flight->contact_no = $contact_no;
        $flight->status = $status;


        //starts
        $flight->airline = $airline;
        $flight->duration = $duration;
        $flight->arrival_time = $arrival_time;
        $flight->departure_time = $departure_time;
        $flight->flight_no = $flight_no;
        $flight->aircraft = $aircraft;
        $flight->class = $class;
        $flight->f_name = $f_name;
        $flight->l_name = $l_name;
        $flight->baggage = $baggage;
        $flight->save();
    }

    public function GetTicketView()
    {
        //  $token_id = Session::get('TOKEN_ID');
        // $client = new Client();
        // $url = "http://api.sandbox.flyhub.com/api/v1/AirCancel";
        // $headers = [
        //     'Authorization' => $token_id,
        // ];
        // $params = [

        //     "BookingID" =>  $booking_id,
        //     "ShowPassenger" => 'true'


        // ];
        // $response = $client->request('POST', $url, [
        //     'headers' => $headers,
        //     'json' => $params,
        //     'verify'  => false,
        // ]);
        // $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);

        // dd($token_id);
        //   return view('admin.pages.view_tickets');
    }



    //FHB22053042161

    //FHB22053042163

}
