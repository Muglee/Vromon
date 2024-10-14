@extends('web.layouts.app')
@section('title', 'Flight Booking')
@section('booking', 'menu-open')
@section('flight_booking', 'active')
@section('content')
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Flight Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking </li>
                        <li class="breadcrumb-item active">Flight booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <style>
                @import url(https://fonts.googleapis.com/css?family=Poiret+One);
                /********************  Loading Page ************************/
                .loadFont {
                    font-family: 'Poiret One', cursive;
                }
                /* Progress Bar Placement & Styling */
                #progressive {
                    position: absolute;
                    width: 300px;
                    height: 200px;
                    z-index: 15;
                    top: 50%;
                    left: 50%;
                    margin: -100px 0 0 -150px;
                }
                
                /* Transition speed for progress bar */
                .six-sec-ease-in-out {
                    -webkit-transition: width 6s ease-in-out;
                    -moz-transition: width 6s ease-in-out;
                    -ms-transition: width 6s ease-in-out;
                    -o-transition: width 6s ease-in-out;
                    transition: width 6s ease-in-out;
                }
                
                #shadow {
                    border-radius: 10px;
                
                    box-shadow: 5px 5px 10px rgba(194, 84, 84, 0.5);
                }
                
                .loading {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 50%;
                    width: 100px;
                    color: #FFF;
                    margin: auto;
                    -webkit-transform: translateY(-50%);
                    -moz-transform: translateY(-50%);
                    -o-transform: translateY(-50%);
                    transform: translateY(-50%);
                }
                .loading span {
                    position: absolute;
                    height: 20px;
                    width: 100px;
                    top: 50px;
                    overflow: hidden;
                }
                .loading span > i {
                    position: absolute;
                    height: 10px;
                    width: 8px;
                    border-radius: 50%;
                    -webkit-animation: wait 4s infinite;
                    -moz-animation: wait 4s infinite;
                    -o-animation: wait 4s infinite;
                    animation: wait 4s infinite;
                }
                .loading span > i:nth-of-type(1) {
                    left: -28px;
                    background: #042642d9;
                }
                .loading span > i:nth-of-type(2) {
                    left: -21px;
                    -webkit-animation-delay: 0.8s;
                    animation-delay: 0.8s;
                    background: red;
                }
                
                @-webkit-keyframes wait {
                    0%   { left: -7px  }
                    30%  { left: 52px  }
                    60%  { left: 22px  }
                    100% { left: 100px }
                }
                @-moz-keyframes wait {
                    0%   { left: -7px  }
                    30%  { left: 52px  }
                    60%  { left: 22px  }
                    100% { left: 100px }
                }
                @-o-keyframes wait {
                    0%   { left: -7px  }
                    30%  { left: 52px  }
                    60%  { left: 22px  }
                    100% { left: 100px }
                }
                @keyframes wait {
                    0%   { left: -7px  }
                    30%  { left: 52px  }
                    60%  { left: 22px  }
                    100% { left: 100px }
                }
                
                </style>
                @section('content')
                
                    @csrf
                    <!-- Content Header (Page header) -->
                    <div class="container">
                        <div id="progressive" style="display: none">
                            <div>
                                <h1 class="loadFont text-center">Please Wait...</h1>
                            </div>
                            {{-- <div class="progress" id="shadow"  >
                                <div class="progress-bar progress-bar-danger six-sec-ease-in-out" role="progressbar" data-transitiongoal="100"></div>
                            </div> --}}
                
                            <div class="loading">
                
                                <span><i></i><i></i></span>
                            </div>
                         </div>
                    </div>
                    {{-- <div id="loaderIcon"  class="spinner-border text-primary" style="display:none;margin:30%;padding:10%" role="status">
                        <span class="sr-only">Loading...</span>
                    </div> --}}
                    <div class="divToggle1" style="font-size: 14px">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        {{-- <h1 class="m-0">Cities</h1> --}}
                                        {{-- <a class="btn btn-primary" href="{{ url('user/manage_hotel_package') }}">Add Hotel Package </a> --}}
                                    </div><!-- /.col -->
                                    <div class="col-sm-10">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item">Dashboard</li>
                                            <li class="breadcrumb-item active">Booking </li>
                                            <li class="breadcrumb-item active">Flight Booking</li>
                                        </ol>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->
                
                
                        <!-- Main content -->
                
                        <section class="content" class="content">
                            <div class="container-fluid">
                                <div class="callout callout">
                                    <div class="container my-4">
                                        <div class="row">
                                            <!-- Grid column -->
                                            <div class="col-xl-12 mb-4 mb-xl-0">
                                                <!-- Section: Live preview -->
                                                <section>
                
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li style="text-decoration:none" class="nav-item ">
                                                            <a style="text-decoration: none" class="nav-link active" id="contact-tab"
                                                                data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                                                aria-selected="true"> <i class="far fa-dot-circle"></i> One Way </a>
                                                        </li>
                
                                                        <li class="nav-item ">
                                                            <a style="text-decoration: none" class="nav-link" id="profile-tab"
                                                                data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                                aria-selected="false"> <i class="far fa-dot-circle"></i> Round Trip </a>
                                                        </li>
                                                        <li class="nav-item ">
                                                            <a style="text-decoration: none" class="nav-link" id="home-tab"
                                                                data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                                                aria-selected="false"> <i class="far fa-dot-circle"></i> Multi City</a>
                                                        </li>
                
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                                                            {{-- <h3>Mulyi City</h3> --}}
                
                                                            <form class="authentication-form mt-4">
                                                                <input type="hidden" id="mode_of_flight_multi" value="Multicity">
                                                                <input type="hidden" class="user_ip">
                                                                <div class="row mb-3 mb-3">
                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">FORM</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text"  name="destination_form_multi" id="destination_form_multi" class="form-control"   placeholder="From"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">TO</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text" name="destination_to_multi"  id="destination_to_multi" class="form-control" placeholder="To"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label class="mb-2 custom-label">DATE</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date"  name="departing_on_multi" id="departing_on_multi"  class="form-control" aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                
                                                                <div class="row mb-3"  id="new_chq">
                
                                                                    <input type="hidden" value="1" id="total_chq">
                
                                                                </div>
                
                
                                                                <div class="row">
                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="mb-2 custom-label">ADULT</label>
                                                                        <select name="adult_multi"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="adult_multi">
                                                                            <option selected value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                            <option value="7">7</option>
                                                                            <option value="8">8</option>
                                                                            <option value="9">9</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="mb-2 custom-label">CHILD</label>
                                                                        <select name="child_multi"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="child_multi">
                
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="mb-2 custom-label">KIDS</label>
                                                                        <select name="infant_multi"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="infant_multi">
                
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                        <select name="cabin_class_multi"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="cabin_class_multi">
                                                                            <option value="Economy">Economy</option>
                                                                            <option value="Business">Business</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-4">
                                                                    {{-- <a class="btn btn-primary"  href="{{ url('user/flight_search_result') }}">Search Flight </a> --}}
                
                
                                                                    {{-- <a href="{{ url('user/flight_search_result') }}"
                                                                        style="text-decoration: none;"
                                                                        class="btn btn-outline-primary btn-flat">Search Flight</a> --}}
                
                                                                        <button onclick="getFlightsMulti()" type="button"
                                                                        style="text-decoration: none;"
                                                                        class="btn btn-outline-primary btn-flat">Search
                                                                        Flight</button>
                                                                </div>
                
                
                
                
                                                            </form>
                                                            <div class="mt-4" style="float: right">
                                                            <button type="button"
                                                            style="text-decoration: none;"
                                                            class="btn btn-outline-primary btn-flat" onclick="add()">Add City</button>
                
                                                            <button type="button"
                                                            style="text-decoration: none;"
                                                            class="btn btn-outline-primary btn-flat" onclick="remove()">Remove City</button>
                                                             </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                                            aria-labelledby="profile-tab">
                                                            {{-- <h3> round trip</h3> --}}
                
                                                            <form class="authentication-form mt-4">
                                                                <input type="hidden" id="mode_of_flight_round" value="Return">
                                                                <input type="hidden" class="user_ip">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">LEAVING FORM</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text"
                                                                                class="form-control " name="destination_form_round" id="destination_form_round" placeholder="From"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">GOING TO</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text"
                                                                                class="form-control" name="destination_to_round"  id="destination_to_round" placeholder="To"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                        <select name="cabin_class_round"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="cabin_class_round">
                                                                            <option value="Economy">Economy</option>
                                                                            <option value="Business">Business</option>
                                                                        </select>
                                                                    </div>
                
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">DEPARTING ON</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" name="departing_on_round" id="departing_on_round" placeholder="DEPARTING ON" class="form-control"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">RETURNING ON</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" name="returning_on_round" class="form-control"
                                                                            id="returning_on_round"
                                                                                placeholder="RETURNING ON" aria-label="Name" />
                                                                        </div>
                                                                    </div>
                
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">ADULT</label>
                                                                        <select name="adult_round" id="adult_round"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                          >
                                                                            <option selected value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                            <option value="7">7</option>
                                                                            <option value="8">8</option>
                                                                            <option value="9">9</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                
                                                                            <div class="col-md-6 mb-3">
                                                                                <label class="mb-2 custom-label">CHILD</label>
                                                                                <select name="child_round"
                                                                                    class="input-group input-group-bg mb-20 form-control"
                                                                                    id="child_round">
                
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 mb-3">
                                                                                <label class="mb-2 custom-label">KIDS</label>
                                                                                <select name="infant_round"
                                                                                    class="input-group input-group-bg mb-20 form-control"
                                                                                    id="infant_round">
                
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            {{-- <button href="{{ url('user/flight_search_result') }}"
                                                                            style="text-decoration: none;"
                                                                            class="btn btn-outline-primary btn-flat">Search Flight</button> --}}
                                                                            <button onclick="getFlightsRound()" type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn btn-outline-primary btn-flat">Search
                                                                                Flight</button>
                
                                                                            {{-- <button href="{{ url('user/flight_search_result') }}" style="text-decoration: none;" class ="btn btn-outline-primary btn-flat">Search Flight</button> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                
                                                            </form>
                
                                                        </div>
                                                        <div class="tab-pane fade active show" id="contact" role="tabpanel"
                                                            aria-labelledby="contact-tab">
                                                            {{-- one way --}}
                                                            {{-- <form action="{{ route('user.OneWayFlightSearch') }}" method="get" --}}
                                                            <form class="mt-4">
                
                                                                <input type="hidden" id="mode_of_flight" value="Oneway">
                                                                <input type="hidden" class="user_ip">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">LEAVING FORM</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text" name="destination_form" id="destination_form"
                                                                                class="form-control " placeholder="From"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">GOING TO</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text" name="destination_to" id="destination_to"
                                                                                class="form-control" placeholder="To"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                        <select name="cabin_class"
                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                            id="cabin_class">
                                                                            <option value="Economy">Economy</option>
                                                                            <option value="Business">Business</option>
                                                                        </select>
                                                                    </div>
                
                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="mb-2 custom-label">DEPARTING ON</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" name="departing_on" class="form-control"
                                                                                id="departing_on" placeholder="DEPARTING ON"
                                                                                aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4 mb-3">
                                                                                <label class="mb-2 custom-label">ADULT</label>
                                                                                <select name="adult"
                                                                                    class="input-group input-group-bg mb-20 form-control"
                                                                                    id="adult">
                                                                                    <option selected value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4 mb-3">
                                                                                <label class="mb-2 custom-label">CHILD</label>
                                                                                <select name="child"
                                                                                    class="input-group input-group-bg mb-20 form-control"
                                                                                    id="child">
                
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4 mb-3">
                                                                                <label class="mb-2 custom-label">KIDS</label>
                                                                                <select name="infant"
                                                                                    class="input-group input-group-bg mb-20 form-control"
                                                                                    id="infant">
                
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            {{-- <button href="{{ url('user/flight_search_result') }}"
                                                                            style="text-decoration: none;"
                                                                            class="btn btn-outline-primary btn-flat">Search Flight</button> --}}
                                                                            <button onclick="getFlights()" type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn btn-outline-primary btn-flat">Search
                                                                                Flight</button>
                
                                                                            {{-- <button href="{{ url('user/flight_search_result') }}" style="text-decoration: none;" class ="btn btn-outline-primary btn-flat">Search Flight</button> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                
                                                </section>
                
                                            </div>
                                            <!-- Grid column -->
                                        </div>
                
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                    </div>
                
                    <div class="divToggle2" style="display: none">
                
                
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        {{-- <h1 class="m-0">Cities</h1> --}}
                                        {{-- <a class="btn btn-primary" href="{{ url('user/manage_hotel_package') }}">Add Hotel Package </a> --}}
                                    </div><!-- /.col -->
                                    <div class="col-sm-10">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item">Dashboard</li>
                                            <li class="breadcrumb-item active">Booking </li>
                                            <li class="breadcrumb-item active">Flight Booking </li>
                                            <li class="breadcrumb-item active">Flight Search Result</li>
                                        </ol>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->
                
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="callout callout-info">
                                            <h5>Flight Search Results DAC- Dhaka CGP- Chittagong, 10 May 2022, 1 Adult</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Flight Types</h3>
                
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item active px-3 pt-3">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">Refundable</button>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">Non
                                                                    Refundable</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Flight Stops</h3>
                
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item active px-3 pt-3">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">Non Stop</button>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">1 Stop</button>
                
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">2 or more</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Flight Times</h3>
                
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item active px-3 py-3">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">14:00 -
                                                                    11:00</button>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">11:00 -
                                                                    16:00</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">16:00 -
                                                                    21:00</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button style="font-size:12px;"
                                                                    class="btn btn-block btn-outline-secondary btn-flat">21:000 -
                                                                    24:00</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                
                
                                    </div>
                                    <div class="col-md-9">
                                        {{-- @foreach ($responseBody['Results'] as $response) --}}
                                        {{-- {{dd($response['ResultID'])}} --}}
                                        {{-- Flight-cart --}}
                                        <div class="card">
                                            {{-- <p>Result id: {{ $response['ResultID'] }} </p>
                                            <p>Search id: </p> --}}
                                        </div>
                                        <div class="allCards">
                
                                        </div>
                                        {{-- <div class="card">
                                            <div class="row p-3">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="text-danger text-bold"> Special Fare </h6>
                
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="d-flex justify-content-end" style="font-size: 15px;">
                                                                <span class="pr-2 "> <small>Fare Rule :</small> </span>
                
                                                                <span class="pr-3 text-bold text-success">Refundable</span>
                
                
                                                                <span class="pr-1 "><i class="fas fa-luggage-cart"></i> </span>
                                                                <span class=" "> 20 KG </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="padding: 0; margin: 0;">
                                                    <div class="row pt-3 pb-3 " style="font-size: 14px;">
                                                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo"
                                                                width="65" height="65">
                                                        </div>
                                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Bangladesh
                                                                    Novo Air</p>
                                                                <p style="padding: 0;margin: 0;">BG-147, Aircrft-773</p>
                                                                <p style="padding: 0;margin: 0;">Seat: Economy, G-9</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-departure"></i></i> Take Off</p>
                                                                <p style="padding: 0;margin: 0;">BG-147, Aircrft-773</p>
                                                                <p style="padding: 0;margin: 0;">Seat: Economy, G-9</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-center">
                                                                <p class="text-bold " style="padding: 0;margin: 0;">9:00 <i
                                                                        class="fas fa-clock"></i> 9:00 </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-arrival"></i> DAC (Dhaka)</p>
                                                                <p style="padding: 0;margin: 0;">CGP (Chittagong)</p>
                                                                <p style="padding: 0;margin: 0;">Tue, 10 May 2022</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Flight Time
                                                                </p>
                                                                <p style="padding: 0;margin: 0;">0H 45M</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="rate pt-2 pb-2"
                                                                style="background-color: #00b2c9;width: 100%; border-radius: 15px ; ">
                                                                <p class="text-center text-light"
                                                                    style="padding: 0;margin: 0; font-size: 12px;">TOTAL FARE</p>
                                                                <p class="text-light text-center"
                                                                    style=" padding: 0;margin: 0; font-size: 18px;font-weight: 600;">BDT
                                                                    3000</p>
                                                            </div>
                                                            <div>
                                                                <p style="padding: 0;margin: 0;font-size: 12px;text-decoration: line-through"
                                                                    class="text-center text-danger">BDT 3500</p>
                                                            </div>
                                                            <div>
                                                                <a href="{{ url('user/flight_hub_book') }}" style="font-size: 15px;"
                                                                    class="btn btn-block btn-outline-success btn-flat">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                
                                        {{-- flight-cart end --}}
                                        <div class="container">
                                            <marquee behavior="scroll" direction="left" class="fly">
                                            </marquee>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                    </div>
                
                @endsection
                
                @section('extra-js')
                
                    <script>
                        $(document).ready(function() {
                
                            getIp();
                        });
                
                        function getIp() {
                            $.get("http://ip-api.com/json/", function(response) {
                                $('.user_ip').val(response.query);
                            });
                        }
                
                        function add(){
                                var new_chq_no = parseInt($('#total_chq').val())+1;
                                var new_input=`
                
                                            <div class="col-md-4 from_${new_chq_no}">
                                <label class="mb-2 custom-label">FORM</label>
                                <div class="input-group input-group-bg mb-20">
                                    <input type="text"  name="destination_form_multi_${new_chq_no}" id="destination_form_multi_${new_chq_no}" class="form-control"   placeholder="From"
                                        aria-label="Name" / >
                                </div>
                                            </div>
                                <div class="col-md-4 to_${new_chq_no}">
                                    <label class="mb-2 custom-label">TO</label>
                                    <div class="input-group input-group-bg mb-20">
                                        <input type="text" name="destination_to_multi_${new_chq_no}" id="destination_to_multi_${new_chq_no}" class="form-control" placeholder="To"
                                            aria-label="Name" />
                                    </div>
                                </div>
                                <div class="col-md-4 date_${new_chq_no}">
                                    <label class="mb-2 custom-label">DATE</label>
                                    <div class="input-group input-group-bg mb-20">
                                        <input type="date"  name="departing_on_multi_${new_chq_no}" id="departing_on_multi_${new_chq_no}"  class="form-control" aria-label="Name" />
                                    </div>
                                </div>
                
                                `;
                                $('#new_chq').append(new_input);
                                $('#total_chq').val(new_chq_no)
                    }
                
                
                
                    function remove() {
                            var last_chq_no = $('#total_chq').val();
                            console.log(last_chq_no);
                            if (last_chq_no > 1) {
                                $('.from_' + last_chq_no).html('');
                                $('.to_' + last_chq_no).html('');
                                $('.date_' + last_chq_no).html('');
                                $('#total_chq').val(last_chq_no - 1);
                            }
                }
                        function parseMiliSecond(milliseconds){
                            //Get hours from milliseconds
                            var hours = milliseconds / (1000*60*60);
                            var absoluteHours = Math.floor(hours);
                            var h = absoluteHours > 9 ? absoluteHours : '0' + absoluteHours;
                
                            //Get remainder from hours and convert to minutes
                            var minutes = (hours - absoluteHours) * 60;
                            var absoluteMinutes = Math.floor(minutes);
                            var m = absoluteMinutes > 9 ? absoluteMinutes : '0' +  absoluteMinutes;
                
                            //Get remainder from minutes and convert to seconds
                            var seconds = (minutes - absoluteMinutes) * 60;
                            var absoluteSeconds = Math.floor(seconds);
                            var s = absoluteSeconds > 9 ? absoluteSeconds : '0' + absoluteSeconds;
                
                
                            return h + 'Hr ' + m + 'M';
                        }
                
                
                        function getFlightsMulti(e) {
                            $("#progressive").show();
                            $('.content').hide();
                            var ip = $('.user_ip').val();
                            var vars = {};
                            var destination_form = $('#destination_form_multi').val();
                            var toatal_check = $('#total_chq').val();
                            // console.log(toatal_check);
                
                            for (i = 1;i< toatal_check; i++){
                                // console.log($('#destination_form_multi_'+(i+1)+'').val());
                                // var window['destination_form_'+i]=$('#destination_form_'+(i+1)).val();
                                vars['destination_form_'+i] = $('#destination_form_multi_'+(i+1)+'').val();
                                vars['destination_to_'+i] = $('#destination_to_multi_'+(i+1)+'').val();
                                vars['departing_on_'+i] = $('#departing_on_multi_'+(i+1)+'').val();
                
                
                                // console.log(vars['destination_form_1']);
                            }
                            // console.log(vars);
                            var destination_to = $('#destination_to_multi').val();
                            var cabin_class = $('#cabin_class_multi').val();
                            var departing_on = $('#departing_on_multi').val();
                            var adult =$('#adult_multi').find(":selected").text();
                            var child = $('#child_multi').val();
                            var infant = $('#infant_multi').val();
                            var mode_of_flight = $('#mode_of_flight_multi').val();
                            var _token = $('input[name=_token]').val();
                            $(".preloader").show();
                            console.log(destination_form,destination_to, cabin_class,departing_on, adult ,child,infant,mode_of_flight);
                            $.ajax({
                                method: "POST",
                                url: "{{ route('user.OneWayFlightSearch') }}",
                                data: {
                                    AdultQuantity: adult,
                                    ChildQuantity: child,
                                    InfantQuantity: infant,
                                    EndUserIp: ip,
                                    TotalCheck:toatal_check,
                                    JourneyType: mode_of_flight,
                                    Origin: destination_form,
                                    vars:vars,
                                    Destination: destination_to,
                                    CabinClass: cabin_class,
                                    DepartureDateTime: departing_on,
                                    authorization: "{{ Session::get('TOKEN_ID') }}",
                                    _token: _token
                                },
                                // console.log(data);
                                success: function(response) {
                                    $(".divToggle1").hide();
                                    $(".divToggle2").show();
                
                                    var htmlDiv = "";
                
                                    console.log(response);
                                    console.log(response.SearchId);
                
                                    for (var i = 0; i < response.Results.length; i++) {
                
                                        var LandingSegment = "";
                
                                        for (var j = 0; j < response.Results[i].Fares.length; j++) {
                                            // console.log( response.Results[i].Fares[j].BaseFare);
                                        }
                
                                        // console.log(response.Results[i].segments.length);
                                        for (var k = 0; k < response.Results[i].segments.length; k++) {
                
                                            var OriginTimeStart = new Date();
                                            var DestTimeEnd = new Date();
                
                                            var LayOverTimeOne = new Date();
                                            var LayOverTimeTwo = new Date();
                
                                            var LayOverTime = '';
                
                                            var Availablity = response.Results[i].Availabilty;
                                            var AirlineName = response.Results[i].segments[k].Airline['AirlineName'];
                                            var AirlineCode = response.Results[i].segments[k].Airline['AirlineCode'];
                                            var BookingClass = response.Results[i].segments[k].Airline['BookingClass'];
                                            var FlightNumber = response.Results[i].segments[k].Airline['FlightNumber'];
                                            var AirportCode = response.Results[i].segments[k].Destination['Airport'].AirportCode;
                                            var AirportName = response.Results[i].segments[k].Destination['Airport'].AirportName;
                                            var BaseFare = response.Results[i].Fares[0].BaseFare;
                
                                            if (response.Results[i].Fares[0] != null) {
                                                var AdultCount = response.Results[i].Fares[0].PassengerCount;
                                                var AdultFare = response.Results[i].Fares[0].BaseFare;
                                                var Tax = response.Results[i].Fares[0].Tax;
                                            } else {
                                                var AdultCount  = '0';
                                                var AdultFare = '0';
                                                var Tax = '0';
                                            }
                
                                            if (response.Results[i].Fares[1] != null) {
                                                var ChildCount = response.Results[i].Fares[1].PassengerCount;
                                                var ChildFare = response.Results[i].Fares[1].BaseFare;
                                                var ChildTax = response.Results[i].Fares[1].Tax;
                                            } else {
                                                var ChildCount = '0';
                                                var ChildFare = '0';
                                                var ChildTax = '0';
                                            }
                
                                            if (response.Results[i].Fares[2] != null) {
                                                var InfantCount = response.Results[i].Fares[2].PassengerCount;
                                                var InfantFare = response.Results[i].Fares[2].BaseFare;
                                                var InfantTax = response.Results[i].Fares[2].Tax;
                                            } else {
                                                var InfantCount = '0';
                                                var InfantFare = '0';
                                                var InfantTax = '0';
                                            }
                
                                            var OtherCharges = response.Results[i].Fares[0].OtherCharges;
                                            var ServiceFee = response.Results[i].Fares[0].ServiceFee;
                
                                            // **********************************************************************************
                                            var DestAirTime = response.Results[i].segments[k].Destination['ArrTime'];
                                                DestAirTime = DestAirTime.split("T");
                
                                            var DestExactTime = DestAirTime[1];
                                            var TimeValueEnd = DestExactTime.split(':');
                
                                                DestAirTime = Date.parse(DestAirTime[0]).toString();
                
                                            var DestTimeFinal = DestAirTime.split("00:00:00");
                                                DestTimeFinal = DestTimeFinal[0];
                                            var OriginTime = response.Results[i].segments[k].Origin['DepTime'];
                                                OriginTime = OriginTime.split("T");
                
                                            var OriginExactTime = OriginTime[1];
                                            var TimeValueStart = OriginExactTime.split(':');
                                                OriginTime = Date.parse(OriginTime[0]).toString();
                
                                            var OriginTimeFinal = OriginTime.split("00:00:00");
                                                OriginTimeFinal = OriginTimeFinal[0];
                
                                            OriginTimeStart = OriginTimeStart.setHours(TimeValueStart[0], TimeValueStart[1], TimeValueStart[2], 0);
                                            DestTimeEnd = DestTimeEnd.setHours(TimeValueEnd[0], TimeValueEnd[1], TimeValueEnd[2], 0);
                
                                            var FlightHour = DestTimeEnd - OriginTimeStart;
                                                FlightHour = parseMiliSecond(FlightHour);
                
                                            //***********************************************************************************
                
                                            if (LayoverLastTime != 0) {
                
                                                if(LayoverFutureOriginTime != undefined) {
                                                    LayoverLastTime = LayoverLastTime.split(':');
                                                    var LayoverLatestTime = LayoverFutureOriginTime.split(':');
                                                    LayOverTimeOne = LayOverTimeOne.setHours(LayoverLastTime[0], LayoverLastTime[1], LayoverLastTime[2], 0);
                                                    LayOverTimeTwo = LayOverTimeTwo.setHours(LayoverLatestTime[0], LayoverLatestTime[1], LayoverLatestTime[2], 0);
                
                                                    LayOverTime = LayOverTimeTwo - LayOverTimeOne;
                                                    LayOverTime = parseMiliSecond(LayOverTime);
                                                }
                
                                            } else {
                
                                            }
                
                                            //***********************************************************************************
                                            var BaggageAllowed = response.Results[i].segments[k].Baggage;
                
                
                
                                            var DiscountAmount = response.Results[i].Discount;
                
                                            DiscountAmount = parseInt(DiscountAmount);
                                            //console.log(DiscountAmount);
                                            var TotalFare = response.Results[i].TotalFare;
                
                                            if (response.Results[i].segments.length == k) {
                                                var LayoverLastTime = 0;
                                            } else if (response.Results[i].segments.length > 1 && response.Results[i].segments.length != k) {
                                                var LayoverLastTime = DestExactTime;
                                                var lt = k+1;
                                                if(response.Results[i].segments[lt] != undefined) {
                                                    var LayoverFutureOriginTime = response.Results[i].segments[lt].Origin['DepTime'];
                                                        LayoverFutureOriginTime = LayoverFutureOriginTime.split("T");
                
                                                    var LayoverFutureOriginTime = LayoverFutureOriginTime[1];
                
                                                    //console.log(response.Results[i].segments[lt]);
                                                }
                
                                            } else {
                                                var LayoverLastTime = 0;
                                            }
                
                                            if (k == 0) {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo" width="65" height="65">
                                                            </div>`;
                                            } else {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center"></div>`;
                                            }
                
                                                    LandingSegment += `<div class="row pt-3 pb-3" style="font-size: 14px;">`
                                                        +ImageVar+
                                                        `<div class="col-md-3 col-sm-3 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">`+AirlineName+`</p>
                                                                <p style="padding: 0;margin: 0;">`+AirlineCode+`-`+FlightNumber+`, Aircrft-  </p>
                                                                <p style="padding: 0;margin: 0;">Seat: `+ cabin_class +`,</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-departure"></i></i> Take Off</p>
                                                                <p style="padding: 0;margin: 0;">`+ AirportCode + `</p>
                                                                <p style="padding: 0;margin: 0;">`+ OriginTimeFinal + `</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-center">
                                                                <p class="text-bold " style="padding: 0;margin: 0;">`+OriginExactTime+` <i
                                                                        class="fas fa-clock"></i> `+DestExactTime+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-arrival"></i> Landing</p>
                                                                <p style="padding: 0;margin: 0;">`+ AirportCode +`</p>
                                                                <p style="padding: 0;margin: 0;">`+DestTimeFinal+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Flight Time
                                                                </p>
                                                                <p style="padding: 0;margin: 0;">`+ FlightHour +`</p>
                                                            </div>
                                                        </div>
                                                    </div><hr>
                                                    <p style="position: relative;top: -33px;padding: 5px 18px;background: #000;color: #fff;width: 210px;border-radius: 30px;left: 40%;">
                                                        Layover Time: `+LayOverTime+`
                                                    </p>`;
                
                
                                                    if (DiscountAmount > 0) {
                                                        var CutOutFare = "BDT "+TotalFare;
                                                        var MainFare = parseInt(TotalFare) - DiscountAmount;
                                                    } else {
                                                        var CutOutFare = "";
                                                        var MainFare = TotalFare;
                                                    }
                
                                            }
                                            htmlDiv = htmlDiv + `<div class="card">
                                            <div class="row p-3">
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4">
                                                            <h6 class="text-danger text-bold"> Special Fare </h6>
                
                                                        </div>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="d-flex justify-content-end" style="font-size: 15px;">
                                                                <span class="pr-2 "> <small>Fare Rule :</small> </span>
                
                                                                <span class="pr-3 text-bold text-success">Refundable</span>
                
                
                                                                <span class="pr-1 "><i class="fas fa-luggage-cart"></i> </span>
                                                                <span class=" "> `+BaggageAllowed+` </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="padding: 0; margin: 0;">`+LandingSegment+`
                
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="rate pt-2 pb-2" style="background-color: #00b2c9;width: 100%; border-radius: 15px ; ">
                                                                <p class="text-center text-light" style="padding: 0;margin: 0; font-size: 12px;">TOTAL FARE</p>
                                                                <p class="text-light text-center" style=" padding: 0;margin: 0; font-size: 18px;font-weight: 600;">BDT `+MainFare+`</p>
                                                            </div>
                                                            <div>
                                                                <p style="padding: 0;margin: 0;font-size: 12px;text-decoration: line-through" class="text-center text-danger"> `+ CutOutFare + `</p>
                                                            </div>
                
                                                            <div style="margin-top: 45px">
                                                                <a href="{{ url('user/flight_hub_book?SearchId=`+response.SearchId+`&ResultID=`+response.Results[i].ResultID+`&AirlineName=`+AirlineName+`&BaseFare=`+BaseFare+`&Tax=`+Tax+`&OtherCharges=`+OtherCharges+`&AdultCount=`+AdultCount+`&ChildCount=`+ChildCount+`&InfantCount=`+InfantCount+`&AdultFare=`+AdultFare+`&ChildFare=`+ChildFare+`&InfantFare=`+InfantFare+`&ChildTax=`+ChildTax+`&InfantTax=`+InfantTax+`&MainFare=`+MainFare+`') }}" style="font-size: 15px;"
                                                                    class="btn btn-block btn-outline-success btn-flat">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                
                                    }
                                    $(".allCards").html(htmlDiv);
                
                                },
                                complete: function(){
                            $('#progressive').hide();
                            $('.content').show();
                        },
                                error: function(xhr, status, error) {}
                            });
                        }
                
                
                
                        function getFlights(e) {
                            $("#progressive").show();
                            $('.content').hide();
                            var ip = $('.user_ip').val();
                            var destination_form = $('#destination_form').val();
                            var destination_to = $('#destination_to').val();
                            var cabin_class = $('#cabin_class').val();
                            var departing_on = $('#departing_on').val();
                            var adult =$('#adult').find(":selected").text();
                            var child = $('#child').val();
                            var infant = $('#infant').val();
                            var mode_of_flight = $('#mode_of_flight').val();
                            var _token = $('input[name=_token]').val();
                            $(".preloader").show();
                            console.log(destination_form, destination_to,cabin_class,mode_of_flight,child,infant);
                            $.ajax({
                                method: "POST",
                                url: "{{ route('user.OneWayFlightSearch') }}",
                                data: {
                                    AdultQuantity: adult,
                                    ChildQuantity: child,
                                    InfantQuantity: infant,
                                    EndUserIp: ip,
                                    JourneyType: mode_of_flight,
                                    Origin: destination_form,
                                    Destination: destination_to,
                                    CabinClass: cabin_class,
                                    DepartureDateTime: departing_on,
                                    authorization: "{{ Session::get('TOKEN_ID') }}",
                                    _token: _token
                                },
                                // console.log(data);
                                success: function(response) {
                                    $(".divToggle1").hide();
                                    $(".divToggle2").show();
                
                                    var htmlDiv = "";
                
                                    console.log(response);
                                    console.log(response.SearchId);
                
                                    for (var i = 0; i < response.Results.length; i++) {
                
                                        var LandingSegment = "";
                
                                        for (var j = 0; j < response.Results[i].Fares.length; j++) {
                                            // console.log( response.Results[i].Fares[j].BaseFare);
                                        }
                
                                        // console.log(response.Results[i].segments.length);
                                        for (var k = 0; k < response.Results[i].segments.length; k++) {
                
                                            var OriginTimeStart = new Date();
                                            var DestTimeEnd = new Date();
                
                                            var LayOverTimeOne = new Date();
                                            var LayOverTimeTwo = new Date();
                
                                            var LayOverTime = '';
                
                                            var Availablity = response.Results[i].Availabilty;
                
                                            var IsRefundable = response.Results[i].IsRefundable;
                
                                            if(IsRefundable == 1)
                                            {
                                                Is_Refundable="Refundable" ;                            }
                                            else
                                            {
                                                Is_Refundable="Non Refundable" ;
                                            }
                
                                            var AirlineName = response.Results[i].segments[k].Airline['AirlineName'];
                                            var AirlineCode = response.Results[i].segments[k].Airline['AirlineCode'];
                                            var BookingClass = response.Results[i].segments[k].Airline['BookingClass'];
                                            var FlightNumber = response.Results[i].segments[k].Airline['FlightNumber'];
                
                                            var AirportCode = response.Results[i].segments[k].Destination['Airport'].AirportCode;
                                            var AirportName = response.Results[i].segments[k].Destination['Airport'].AirportName;
                                            var CityName = response.Results[i].segments[k].Destination['Airport'].CityName;
                
                                            var OriginAirportCode = response.Results[i].segments[k].Origin['Airport'].AirportCode;
                                            var OriginAirportName = response.Results[i].segments[k].Origin['Airport'].AirportName;
                                            var OriginCityName = response.Results[i].segments[k].Origin['Airport'].CityName;
                
                                            var BaseFare = response.Results[i].Fares[0].BaseFare;
                
                                            if (response.Results[i].Fares[0] != null) {
                                                var AdultCount = response.Results[i].Fares[0].PassengerCount;
                                                var AdultFare = response.Results[i].Fares[0].BaseFare;
                                                var Tax = response.Results[i].Fares[0].Tax;
                                            } else {
                                                var AdultCount  = '0';
                                                var AdultFare = '0';
                                                var Tax = '0';
                                            }
                
                                            if (response.Results[i].Fares[1] != null) {
                                                var ChildCount = response.Results[i].Fares[1].PassengerCount;
                                                var ChildFare = response.Results[i].Fares[1].BaseFare;
                                                var ChildTax = response.Results[i].Fares[1].Tax;
                                            } else {
                                                var ChildCount = '0';
                                                var ChildFare = '0';
                                                var ChildTax = '0';
                                            }
                
                                            if (response.Results[i].Fares[2] != null) {
                                                var InfantCount = response.Results[i].Fares[2].PassengerCount;
                                                var InfantFare = response.Results[i].Fares[2].BaseFare;
                                                var InfantTax = response.Results[i].Fares[2].Tax;
                                            } else {
                                                var InfantCount = '0';
                                                var InfantFare = '0';
                                                var InfantTax = '0';
                                            }
                
                                            var OtherCharges = response.Results[i].Fares[0].OtherCharges;
                                            var ServiceFee = response.Results[i].Fares[0].ServiceFee;
                
                                            // **********************************************************************************
                                            var DestAirTime = response.Results[i].segments[k].Destination['ArrTime'];
                                                DestAirTime = DestAirTime.split("T");
                
                                            var DestExactTime = DestAirTime[1];
                                            var TimeValueEnd = DestExactTime.split(':');
                
                                                DestAirTime = Date.parse(DestAirTime[0]).toString();
                
                                            var DestTimeFinal = DestAirTime.split("00:00:00");
                                                DestTimeFinal = DestTimeFinal[0];
                                            var OriginTime = response.Results[i].segments[k].Origin['DepTime'];
                                                OriginTime = OriginTime.split("T");
                
                                            var OriginExactTime = OriginTime[1];
                                            var TimeValueStart = OriginExactTime.split(':');
                                                OriginTime = Date.parse(OriginTime[0]).toString();
                
                                            var OriginTimeFinal = OriginTime.split("00:00:00");
                                                OriginTimeFinal = OriginTimeFinal[0];
                
                                            OriginTimeStart = OriginTimeStart.setHours(TimeValueStart[0], TimeValueStart[1], TimeValueStart[2], 0);
                                            DestTimeEnd = DestTimeEnd.setHours(TimeValueEnd[0], TimeValueEnd[1], TimeValueEnd[2], 0);
                
                                            var FlightHour = DestTimeEnd - OriginTimeStart;
                                                FlightHour = parseMiliSecond(FlightHour);
                
                                            //***********************************************************************************
                
                                            if (LayoverLastTime != 0) {
                
                                                if(LayoverFutureOriginTime != undefined) {
                                                    LayoverLastTime = LayoverLastTime.split(':');
                                                    var LayoverLatestTime = LayoverFutureOriginTime.split(':');
                                                    LayOverTimeOne = LayOverTimeOne.setHours(LayoverLastTime[0], LayoverLastTime[1], LayoverLastTime[2], 0);
                                                    LayOverTimeTwo = LayOverTimeTwo.setHours(LayoverLatestTime[0], LayoverLatestTime[1], LayoverLatestTime[2], 0);
                
                                                    LayOverTime = LayOverTimeTwo - LayOverTimeOne;
                                                    LayOverTime = parseMiliSecond(LayOverTime);
                                                }
                
                                            } else {
                
                                            }
                
                                            //***********************************************************************************
                                            var BaggageAllowed = response.Results[i].segments[k].Baggage;
                
                                            var Equipment = response.Results[i].segments[k].Equipment;
                
                                            var DiscountAmount = response.Results[i].Discount;
                                            DiscountAmount = parseInt(DiscountAmount);
                                            //console.log(DiscountAmount);
                                            var TotalFare = response.Results[i].TotalFare;
                
                                            if (response.Results[i].segments.length == k) {
                                                var LayoverLastTime = 0;
                                            } else if (response.Results[i].segments.length > 1 && response.Results[i].segments.length != k) {
                                                var LayoverLastTime = DestExactTime;
                                                var lt = k+1;
                                                if(response.Results[i].segments[lt] != undefined) {
                                                    var LayoverFutureOriginTime = response.Results[i].segments[lt].Origin['DepTime'];
                                                        LayoverFutureOriginTime = LayoverFutureOriginTime.split("T");
                
                                                    var LayoverFutureOriginTime = LayoverFutureOriginTime[1];
                
                                                    //console.log(response.Results[i].segments[lt]);
                                                }
                
                                            } else {
                                                var LayoverLastTime = 0;
                                            }
                
                                            if (k == 0) {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo" width="65" height="65">
                                                            </div>`;
                                            } else {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center"></div>`;
                                            }
                
                                                    LandingSegment += `<div class="row pt-3 pb-3" style="font-size: 14px;">`
                                                        +ImageVar+
                                                        `<div class="col-md-3 col-sm-3 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">`+AirlineName+`</p>
                
                                                                <p style="padding: 0;margin: 0;">`+AirlineCode+`-`+FlightNumber+` , Aircrft- `+Equipment+` </p>
                                                                <p style="padding: 0;margin: 0;">Seat: `+ cabin_class +`, </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-departure"></i></i> Take Off</p>
                                                                <span style="padding: 0;margin: 0;">`+ OriginAirportCode + `</span>
                                                                <span style="padding: 0;margin: 0;">(`+ OriginCityName + `)</span>
                                                                <p style="padding: 0;margin: 0;">`+ OriginAirportName + `</p>
                                                                <p style="padding: 0;margin: 0;">`+ OriginTimeFinal + `</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-center">
                                                                <p class="text-bold " style="padding: 0;margin: 0;">`+OriginExactTime+` </p>
                                                                <p class="text-bold " style="padding: 0;margin: 0;"> <i class="fas fa-clock"></i></p>
                                                                <p class="text-bold " style="padding: 0;margin: 0;"> `+DestExactTime+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-arrival"></i></i>Landing</p>
                                                                <span style="padding: 0;margin: 0;">`+ AirportCode + `</span>
                                                                <span style="padding: 0;margin: 0;">(`+ CityName + `)</span>
                                                                <p style="padding: 0;margin: 0;">`+ AirportName + `</p>
                                                                <p style="padding: 0;margin: 0;">`+DestTimeFinal+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Flight Time
                                                                </p>
                                                                <p style="padding: 0;margin: 0;">`+ FlightHour +`</p>
                                                            </div>
                                                        </div>
                                                    </div><hr>
                                                    <p style="position: relative;top: -33px;padding: 5px 18px;background: #000;color: #fff;width: 210px;border-radius: 30px;left: 40%;">
                                                        Layover Time: `+LayOverTime+`
                                                    </p>`;
                
                
                                                    if (DiscountAmount > 0) {
                                                        var CutOutFare = "BDT "+TotalFare;
                                                        var MainFare = parseInt(TotalFare) - DiscountAmount;
                                                    } else {
                                                        var CutOutFare = "";
                                                        var MainFare = TotalFare;
                                                    }
                                                    // console.log(response.Results[i].segments[k].Airline['FlightNumber']);
                                                    // console.log(response.Results[i].segments[k].Destination['Airport'].AirportCode);
                                                    // console.log(response.Results[i].segments[k].Origin['Airport'].AirportName);
                                                    // console.log(BaggageAllowed);
                                            }
                                            htmlDiv = htmlDiv + `<div class="card">
                                            <div class="row p-3">
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4">
                                                            <h6 class="text-danger text-bold"> Special Fare </h6>
                
                                                        </div>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="d-flex justify-content-end" style="font-size: 15px;">
                                                                <span class="pr-2 "> <small>Fare Rule :</small> </span>
                
                                                                <span class="pr-3 text-bold text-success">`+ Is_Refundable +`</span>
                
                                                                <span class="pr-1 "><i class="fas fa-luggage-cart"></i> </span>
                                                                <span class=" "> `+BaggageAllowed+` </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="padding: 0; margin: 0;">`+LandingSegment+`
                
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="rate pt-2 pb-2" style="background-color: #00b2c9;width: 100%; border-radius: 15px ; ">
                                                                <p class="text-center text-light" style="padding: 0;margin: 0; font-size: 12px;">TOTAL FARE</p>
                                                                <p class="text-light text-center" style=" padding: 0;margin: 0; font-size: 18px;font-weight: 600;">BDT `+MainFare+`</p>
                                                            </div>
                                                            <div>
                                                                <p style="padding: 0;margin: 0;font-size: 12px;text-decoration: line-through" class="text-center text-danger"> `+ CutOutFare + `</p>
                                                            </div>
                
                                                            <div style="margin-top: 45px">
                                                                <a href="{{ url('user/flight_hub_book?SearchId=`+response.SearchId+`&ResultID=`+response.Results[i].ResultID+`&AirlineName=`+AirlineName+`&BaseFare=`+BaseFare+`&Tax=`+Tax+`&OtherCharges=`+OtherCharges+`&AdultCount=`+AdultCount+`&ChildCount=`+ChildCount+`&InfantCount=`+InfantCount+`&AdultFare=`+AdultFare+`&ChildFare=`+ChildFare+`&InfantFare=`+InfantFare+`&ChildTax=`+ChildTax+`&InfantTax=`+InfantTax+`&MainFare=`+MainFare+`') }}" style="font-size: 15px;"
                                                                    class="btn btn-block btn-outline-success btn-flat">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                
                                    }
                                    $(".allCards").html(htmlDiv);
                
                                },
                                complete: function(){
                            $('#progressive').hide();
                            $('.content').show();
                        },
                                error: function(xhr, status, error) {}
                            });
                        }
                
                
                
                        function getFlightsRound(e) {
                            $("#progressive").show();
                            $('.content').hide();
                            var ip = $('.user_ip').val();
                            var destination_form = $('#destination_form_round').val();
                            var destination_to = $('#destination_to_round').val();
                            var cabin_class = $('#cabin_class_round').val();
                            var departing_on = $('#departing_on_round').val();
                            var returning_on = $('#returning_on_round').val();
                            console.log(returning_on);
                            var adult =$('#adult_round').find(":selected").text();
                            var child = $('#child_round').val();
                            var infant = $('#infant_round').val();
                            var mode_of_flight = $('#mode_of_flight_round').val();
                            var _token = $('input[name=_token]').val();
                            $(".preloader").show();
                
                            console.log(destination_form, destination_to,cabin_class,mode_of_flight,child,infant,departing_on,returning_on);
                            $.ajax({
                                method: "POST",
                                url: "{{ route('user.OneWayFlightSearch') }}",
                                data: {
                                    AdultQuantity: adult,
                                    ChildQuantity: child,
                                    InfantQuantity: infant,
                                    EndUserIp: ip,
                                    JourneyType: mode_of_flight,
                                    Origin: destination_form,
                                    Destination: destination_to,
                                    ReturningDateTime: returning_on,
                                    CabinClass: cabin_class,
                                    DepartureDateTime: departing_on,
                                    authorization: "{{ Session::get('TOKEN_ID') }}",
                                    _token: _token
                                },
                                // console.log(data);
                                success: function(response) {
                                    $(".divToggle1").hide();
                                    $(".divToggle2").show();
                
                                    var htmlDiv = "";
                
                                    console.log(response);
                                    console.log(response.SearchId);
                
                                    for (var i = 0; i < response.Results.length; i++) {
                
                                        var LandingSegment = "";
                
                                        for (var j = 0; j < response.Results[i].Fares.length; j++) {
                                            // console.log( response.Results[i].Fares[j].BaseFare);
                                        }
                
                                        // console.log(response.Results[i].segments.length);
                                        for (var k = 0; k < response.Results[i].segments.length; k++) {
                
                                            var OriginTimeStart = new Date();
                                            var DestTimeEnd = new Date();
                
                                            var LayOverTimeOne = new Date();
                                            var LayOverTimeTwo = new Date();
                
                                            var LayOverTime = '';
                
                                            var Availablity = response.Results[i].Availabilty;
                                            var AirlineName = response.Results[i].segments[k].Airline['AirlineName'];
                                            var AirlineCode = response.Results[i].segments[k].Airline['AirlineCode'];
                                            var BookingClass = response.Results[i].segments[k].Airline['BookingClass'];
                                            var FlightNumber = response.Results[i].segments[k].Airline['FlightNumber'];
                                            var AirportCode = response.Results[i].segments[k].Destination['Airport'].AirportCode;
                                            var AirportName = response.Results[i].segments[k].Destination['Airport'].AirportName;
                                            var BaseFare = response.Results[i].Fares[0].BaseFare;
                
                                            if (response.Results[i].Fares[0] != null) {
                                                var AdultCount = response.Results[i].Fares[0].PassengerCount;
                                                var AdultFare = response.Results[i].Fares[0].BaseFare;
                                                var Tax = response.Results[i].Fares[0].Tax;
                                            } else {
                                                var AdultCount  = '0';
                                                var AdultFare = '0';
                                                var Tax = '0';
                                            }
                
                                            if (response.Results[i].Fares[1] != null) {
                                                var ChildCount = response.Results[i].Fares[1].PassengerCount;
                                                var ChildFare = response.Results[i].Fares[1].BaseFare;
                                                var ChildTax = response.Results[i].Fares[1].Tax;
                                            } else {
                                                var ChildCount = '0';
                                                var ChildFare = '0';
                                                var ChildTax = '0';
                                            }
                
                                            if (response.Results[i].Fares[2] != null) {
                                                var InfantCount = response.Results[i].Fares[2].PassengerCount;
                                                var InfantFare = response.Results[i].Fares[2].BaseFare;
                                                var InfantTax = response.Results[i].Fares[2].Tax;
                                            } else {
                                                var InfantCount = '0';
                                                var InfantFare = '0';
                                                var InfantTax = '0';
                                            }
                
                                            var OtherCharges = response.Results[i].Fares[0].OtherCharges;
                                            var ServiceFee = response.Results[i].Fares[0].ServiceFee;
                
                                            // **********************************************************************************
                                            var DestAirTime = response.Results[i].segments[k].Destination['ArrTime'];
                                                DestAirTime = DestAirTime.split("T");
                
                                            var DestExactTime = DestAirTime[1];
                                            var TimeValueEnd = DestExactTime.split(':');
                
                                                DestAirTime = Date.parse(DestAirTime[0]).toString();
                
                                            var DestTimeFinal = DestAirTime.split("00:00:00");
                                                DestTimeFinal = DestTimeFinal[0];
                                            var OriginTime = response.Results[i].segments[k].Origin['DepTime'];
                                                OriginTime = OriginTime.split("T");
                
                                            var OriginExactTime = OriginTime[1];
                                            var TimeValueStart = OriginExactTime.split(':');
                                                OriginTime = Date.parse(OriginTime[0]).toString();
                
                                            var OriginTimeFinal = OriginTime.split("00:00:00");
                                                OriginTimeFinal = OriginTimeFinal[0];
                
                                            OriginTimeStart = OriginTimeStart.setHours(TimeValueStart[0], TimeValueStart[1], TimeValueStart[2], 0);
                                            DestTimeEnd = DestTimeEnd.setHours(TimeValueEnd[0], TimeValueEnd[1], TimeValueEnd[2], 0);
                
                                            var FlightHour = DestTimeEnd - OriginTimeStart;
                                                FlightHour = parseMiliSecond(FlightHour);
                
                                            //***********************************************************************************
                
                                            if (LayoverLastTime != 0) {
                
                                                if(LayoverFutureOriginTime != undefined) {
                                                    LayoverLastTime = LayoverLastTime.split(':');
                                                    var LayoverLatestTime = LayoverFutureOriginTime.split(':');
                                                    LayOverTimeOne = LayOverTimeOne.setHours(LayoverLastTime[0], LayoverLastTime[1], LayoverLastTime[2], 0);
                                                    LayOverTimeTwo = LayOverTimeTwo.setHours(LayoverLatestTime[0], LayoverLatestTime[1], LayoverLatestTime[2], 0);
                
                                                    LayOverTime = LayOverTimeTwo - LayOverTimeOne;
                                                    LayOverTime = parseMiliSecond(LayOverTime);
                                                }
                
                                            } else {
                
                                            }
                
                                            //***********************************************************************************
                                            var BaggageAllowed = response.Results[i].segments[k].Baggage;
                
                
                
                                            var DiscountAmount = response.Results[i].Discount;
                                            DiscountAmount = parseInt(DiscountAmount);
                                            //console.log(DiscountAmount);
                                            var TotalFare = response.Results[i].TotalFare;
                                            var Currency = response.Results[i].Currency;
                
                                            if (response.Results[i].segments.length == k) {
                                                var LayoverLastTime = 0;
                                            } else if (response.Results[i].segments.length > 1 && response.Results[i].segments.length != k) {
                                                var LayoverLastTime = DestExactTime;
                                                var lt = k+1;
                                                if(response.Results[i].segments[lt] != undefined) {
                                                    var LayoverFutureOriginTime = response.Results[i].segments[lt].Origin['DepTime'];
                                                        LayoverFutureOriginTime = LayoverFutureOriginTime.split("T");
                
                                                    var LayoverFutureOriginTime = LayoverFutureOriginTime[1];
                
                                                    //console.log(response.Results[i].segments[lt]);
                                                }
                
                                            } else {
                                                var LayoverLastTime = 0;
                                            }
                
                                            if (k == 0) {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('web/assets/images/favicon.png') }}" alt="logo" width="65" height="65">
                                                            </div>`;
                                            } else {
                                                ImageVar = `<div class="col-md-1 d-flex align-items-center justify-content-center"></div>`;
                                            }
                
                                                    LandingSegment += `<div class="row pt-3 pb-3" style="font-size: 14px;">`
                                                        +ImageVar+
                                                        `<div class="col-md-3 col-sm-3 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">`+AirlineName+`</p>
                                                                <p style="padding: 0;margin: 0;">`+AirlineCode+`-`+FlightNumber+`</p>
                                                                <p style="padding: 0;margin: 0;">Seat: `+ cabin_class +`,</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-departure"></i></i> Take Off</p>
                                                                <p style="padding: 0;margin: 0;">`+ AirportCode + `</p>
                                                                <p style="padding: 0;margin: 0;">`+ OriginTimeFinal + `</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-center">
                                                                <p class="text-bold " style="padding: 0;margin: 0;">`+OriginExactTime+` <i
                                                                        class="fas fa-clock"></i> `+DestExactTime+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;"> <i
                                                                        class="fas fa-plane-arrival"></i> Landing</p>
                                                                <p style="padding: 0;margin: 0;">`+ AirportCode +`</p>
                                                                <p style="padding: 0;margin: 0;">`+DestTimeFinal+`</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                                                            <div class="text-left">
                                                                <p class="text-bold text-success" style="padding: 0;margin: 0;">Flight Time
                                                                </p>
                                                                <p style="padding: 0;margin: 0;">`+ FlightHour +`</p>
                                                            </div>
                                                        </div>
                                                    </div><hr>
                                                    <p style="position: relative;top: -33px;padding: 5px 18px;background: #000;color: #fff;width: 210px;border-radius: 30px;left: 40%;">
                                                        Layover Time: `+LayOverTime+`
                                                    </p>`;
                
                
                                                    if (DiscountAmount > 0) {
                                                        var CutOutFare = "BDT "+TotalFare;
                                                        var MainFare = parseInt(TotalFare) - DiscountAmount;
                                                    } else {
                                                        var CutOutFare = "";
                                                        var MainFare = TotalFare;
                                                    }
                                                    // console.log(response.Results[i].segments[k].Airline['FlightNumber']);
                                                    // console.log(response.Results[i].segments[k].Destination['Airport'].AirportCode);
                                                    // console.log(response.Results[i].segments[k].Origin['Airport'].AirportName);
                                                    // console.log(BaggageAllowed);
                                            }
                                            htmlDiv = htmlDiv + `<div class="card">
                                            <div class="row p-3">
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4">
                                                            <h6 class="text-danger text-bold"> Special Fare </h6>
                
                                                        </div>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="d-flex justify-content-end" style="font-size: 15px;">
                                                                <span class="pr-2 "> <small>Fare Rule :</small> </span>
                
                                                                <span class="pr-3 text-bold text-success">Refundable</span>
                
                
                                                                <span class="pr-1 "><i class="fas fa-luggage-cart"></i> </span>
                                                                <span class=" "> `+BaggageAllowed+` </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="padding: 0; margin: 0;">`+LandingSegment+`
                
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="rate pt-2 pb-2" style="background-color: #00b2c9;width: 100%; border-radius: 15px ; ">
                                                                <p class="text-center text-light" style="padding: 0;margin: 0; font-size: 12px;">TOTAL FARE</p>
                                                                <p class="text-light text-center" style=" padding: 0;margin: 0; font-size: 18px;font-weight: 600;"> `+Currency+`  `+MainFare+`</p>
                                                            </div>
                                                            <div>
                                                                <p style="padding: 0;margin: 0;font-size: 12px;text-decoration: line-through" class="text-center text-danger"> `+ CutOutFare + `</p>
                                                            </div>
                
                                                            <div style="margin-top: 45px">
                                                                <a href="{{ url('user/flight_hub_book?SearchId=`+response.SearchId+`&ResultID=`+response.Results[i].ResultID+`&AirlineName=`+AirlineName+`&BaseFare=`+BaseFare+`&Tax=`+Tax+`&OtherCharges=`+OtherCharges+`&AdultCount=`+AdultCount+`&ChildCount=`+ChildCount+`&InfantCount=`+InfantCount+`&AdultFare=`+AdultFare+`&ChildFare=`+ChildFare+`&InfantFare=`+InfantFare+`&ChildTax=`+ChildTax+`&InfantTax=`+InfantTax+`&MainFare=`+MainFare+`') }}" style="font-size: 15px;"
                                                                    class="btn btn-block btn-outline-success btn-flat">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                
                                    }
                                    $(".allCards").html(htmlDiv);
                
                                },
                                complete: function(){
                            $('#progressive').hide();
                            $('.content').show();
                        },
                                error: function(xhr, status, error) {}
                            });
                        }
                    </script>
                
                @endsection
                



        </div><!-- /.container-fluid -->
    </section>
@endsection

