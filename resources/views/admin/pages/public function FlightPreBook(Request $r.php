public function FlightPreBook(Request $req)

{



    $s_id=Session::get('s_id');
    $r_id=Session::get('r_id');
    // dd($s_id,$r_id);
    $count_adult=Session::get("a_count");

    $title=Session::put('title', $req->title);
    $firstName=Session::put('firstName', $req->FirstName);
    $lastName=Session::put('lastName',$req->LastName);
    $paxType=Session::put('paxType', $req->PaxType);
    $dateOfBirth=Session::put('dateOfBirth',"1995-10-06");
    $gender=Session::put('gender', $req->gender);
    $passportExpiryDate=Session::put('passportExpiryDate', "2024-10-20");
    $address1=Session::put('address1', $req->Address1);
    $countryCode=Session::put('countryCode', $req->CountryCode);
    $nationality=Session::put('nationality', "BD");
    $contactNumber=Session::put('contactNumber', $req->ContactNumber);
    $email=Session::put('email', $req->Email);
    $isLeadPassenger=Session::put('isLeadPassenger', "true");

    $token_id = Session::get('TOKEN_ID');
    // dump( $token_id);
    $client = new Client();
    $url = "http://api.sandbox.flyhub.com/api/v1/AirPreBook";

    $params = [

        "SearchID" =>  $s_id,
        "ResultID" =>$r_id,
        // "SearchID"=> $req->searchId,
        // "ResultID"=> '886e2ea7-3a0b-408b-8621-56a7aa28f243',
        'Passengers' => [[
            "Title"=> $req->title,
            "FirstName"=> $req->FirstName,
            "LastName"=>$req->LastName,
            "PaxType"=> $req->PaxType,
            "DateOfBirth"=> "1995-05-31T05:28:40.535Z",
            "Gender"=> $req->gender,
            "Address1"=> "test",
            "CountryCode"=> "BD",
            "Nationality"=> "BD",
            "ContactNumber"=> $req->ContactNumber,
            "Email"=>"test@m.com",
            "IsLeadPassenger"=> true,
            "PassportNumber"=>"123",
            "PassportExpiryDate"=>"2023-05-31T05:28:40.535Z",
            "PassportNationality"=>"BD"

        ]],

    ];


    $new_array=[];

    for ($i=$count_adult-1; $i >=1; $i--) {

        $passenger_no=("passenger"."_".$i);

        foreach ( $req[$passenger_no] as $key=>$value) {


            array_push($new_array,$value);



            // $params['Passengers'][][$i]= $new_array;
            // dd($params['Passengers'][][$i]);

        }




    }
    dd($new_array);



    //PREBOOKING DATA
    // {
    //     "SearchID": $req->searchId,
    //     "ResultID": $req->resultId,
    //     "Passengers": [
    //       {
    //         "Title": "$req->title",
    //         "FirstName": "$req->FirstName",
    //         "LastName": "$req->LastName",
    //         "PaxType": "$req->PaxType",
    //         "DateOfBirth": "2022-05-29T09:44:23.827Z",
    //         "Gender": "$req->gender",
    //         "PassportNumber": "string",
    //         "PassportExpiryDate": "2022-05-29T09:44:23.827Z",
    //         "PassportNationality": "string",
    //         "Address1": "$req->Address1",
    //         "Address2": "string",
    //         "CountryCode": "$req->CountryCode",
    //         "Nationality": "$req->Nationality",
    //         "ContactNumber": "$req->ContactNumber",
    //         "Email": "$req->Email",
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
    //     "PromotionCode": "string"
    //   }



            // foreach($req->passenger_{{$i}}){

            //     dd()

            // }


        # code...









    // if($count_adult=="2"){
    //     $params = [

    //         "SearchID" =>  $s_id,
    //         "ResultID" =>$r_id,
    //         // "SearchID"=> $req->searchId,
    //         // "ResultID"=> '886e2ea7-3a0b-408b-8621-56a7aa28f243',
    //         'Passengers' => [[
    //             "Title"=> $req->title,
    //             "FirstName"=> $req->FirstName,
    //             "LastName"=>$req->LastName,
    //             "PaxType"=> $req->PaxType,
    //             "DateOfBirth"=> "1995-05-31T05:28:40.535Z",
    //             "Gender"=> $req->gender,
    //             "Address1"=> "test",
    //             "CountryCode"=> "BD",
    //             "Nationality"=> "BD",
    //             "ContactNumber"=> $req->ContactNumber,
    //             "Email"=>"test@m.com",
    //             "IsLeadPassenger"=> true,
    //             "PassportNumber"=>"123",
    //             "PassportExpiryDate"=>"2023-05-31T05:28:40.535Z",
    //             "PassportNationality"=>"BD"
    //         ]],

    //     ];

    // }











    $headers = [
        'Authorization' => $token_id,
    ];
    $response = $client->request('POST', $url, [
        'headers' => $headers,
        'json' => $params,
        'verify'  => false,
    ]);
    $responseBody = json_decode($response->getBody(), JSON_PRETTY_PRINT);


    $fares=$responseBody['Results'][0]['Fares'];


    $segments=$responseBody['Results'][0]['segments'];
    $totalfare=$responseBody['Results'][0]['TotalFare'];
    $discount=$responseBody['Results'][0]['Discount'];

    // dd($responseBody['Results'][0]['segments']);




    return view('admin.pages.flight_hub_review',compact('fares','segments','totalfare','discount'));

}
