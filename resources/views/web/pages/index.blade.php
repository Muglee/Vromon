@extends('web.layouts.app')
@section('home', 'active')

@section('content')
                <header class="header-banner fixed-header-banner">
                    <div class="container-fluid">
                        <div class="header-content">
                            <h1>Plan Your Best Holiday With Us & Enjoy</h1>
                            <a href="{{ url('tour_service') }}" class="btn main-btn main-btn-arrow">See All Tour <i
                                    class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="scroll-parallax" id="parallax">
                        <div class="parallax-layer parallax-layer-0 parallax" data-speed="66"></div>
                        <div class="parallax-layer parallax-layer-1 parallax" data-speed="50"></div>
                        <div class="parallax-layer parallax-layer-2 parallax" data-speed="40"></div>
                        <div class="parallax-layer parallax-layer-3 parallax" data-speed="33"></div>
                        <div class="parallax-layer parallax-layer-4 parallax" data-speed="20"></div>
                        <div class="parallax-layer parallax-cover"></div>
                    </div>
                </header>

                <!-- booking services -->

                <section class="about-section pb-70 position-relative" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pb-30">
                                <div class="about-selection-content">
                                    <ul class="about-selection-list">
                                        <li data-about-list="1">
                                            <span><i class="fas fa-plane-departure"></i></span>
                                            <span>Flights</span>
                                        </li>
                                        <li data-about-list="2">
                                            <span><i class="fas fa-hotel"></i></span>
                                            <span>Hotels</span>
                                        </li>
                                        <li data-about-list="6">
                                            <span><i class="fas fa-utensils"></i></span>       
                                            <span>Restaurant</span>
                                        </li>
                                        <li data-about-list="3">
                                            <span><i class="fas fa-subway"></i></span>
                                            <span>Train</span>
                                        </li>
                                        <li data-about-list="4">
                                            <span><i class="fas fa-bus-alt"></i></span>
                                            <span>Bus</span>
                                        </li>
                                        <li data-about-list="5">
                                            <span><i class="fas fa-umbrella-beach"></i></span>
                                            <span>Tour</span>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="about-selection-details">
                                                <div class="about-selection-details-item active" data-about-details="1">
                                                    <div class="forum-details">
                                                        <!-- ===========Flights========== -->
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        {{-- <form method="get" action="" class="authentication-form mb-20">
                                                                            @csrf --}}
                
                                                                        <div class="row pb-4">
                                                                            <div class="col-md-12">
                                                                                <ul class="about-selection-list float-start">
                                                                                    <li class="active" data-about-list="one_way">One Way</li>
                                                                                    <li data-about-list="round_trip">Round Trip</li>
                                                                                    <li data-about-list="multicity">Multicity</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <!-- ========one way====== -->
                                                                        <div class="about-selection-details-item active"
                                                                            data-about-details="one_way">
                
                                                                            <form class="authentication-form mb-20">
                
                                                                                {{-- <input type="hidden" id="mode_of_flight" value="Oneway">
                                                                                <input type="hidden" class="user_ip"> --}}
                                                                                <input type="hidden" id="mode_of_flight" value="Oneway">
                                                                                <input type="hidden" class="user_ip" value="10.201.201.66">
                
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">FORM</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" name="destination_form" id="destination_form"
                                                                                            class="form-control " placeholder="From"
                                                                                            aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">TO</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" name="destination_to" id="destination_to"
                                                                                            class="form-control" placeholder="To"
                                                                                            aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                                            <select name="cabin_class"
                                                                                        class="input-group input-group-bg mb-20 form-control"
                                                                                        id="cabin_class">
                                                                                        <option value="Economy">Economy</option>
                                                                                        <option value="Business">Business</option>
                                                                                    </select>
                                                                                        {{-- <select
                                                                                            class="input-group input-group-bg mb-20 form-control">
                                                                                            <option selected>Select One</option>
                                                                                            <option value="Economy">Economy</option>
                                                                                            <option value="Business">Business</option>
                                                                                        </select> --}}
                                                                                    </div>
                
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">DEPARTING ON</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="date" name="departing_on" class="form-control"
                                                                                            id="departing_on" placeholder="DEPARTING ON"
                                                                                            aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">ADULT</label>
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
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">CHILD</label>
                                                                                                    <select name="child"
                                                                                                    class="input-group input-group-bg mb-20 form-control"id="child">
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">KIDS</label>
                                                                                                    <select name="infant"
                                                                                                    class="input-group input-group-bg mb-20 form-control"id="infant">
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button onclick="getFlights()" type="button"
                                                                                            style="text-decoration: none;"
                                                                                            class="btn-info main-btn-lg">Search Flight</button>                                                                   
                                                                            </form>
                                                                        </div>
                                                                        <!-- ========/one way====== -->
                
                                                                        <!-- ========round trip====== -->
                                                                        <div class="about-selection-details-item"
                                                                            data-about-details="round_trip">
                                                                            <form class="authentication-form mb-20">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">FORM</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text"
                                                                                                class="form-control " name="destination_form_round" id="destination_form_round" placeholder="From"
                                                                                                aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">TO</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text"
                                                                                            class="form-control" name="destination_to_round"  id="destination_to_round" placeholder="To"
                                                                                            aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">DEPARTING
                                                                                            ON</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="date" name="departing_on_round" id="departing_on_round" placeholder="DEPARTING ON" class="form-control"
                                                                                            aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">RETURNING
                                                                                            ON</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="date" name="returning_on_round" class="form-control"id="returning_on_round"
                                                                                              placeholder="RETURNING ON" aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">SEAT
                                                                                            TYPE</label>
                                                                                            <select name="cabin_class_round"
                                                                                            class="input-group input-group-bg mb-20 form-control"
                                                                                            id="cabin_class_round">
                                                                                            <option value="Economy">Economy</option>
                                                                                            <option value="Business">Business</option>
                                                                                        </select>
                                                                                    </div>
                
                                                                                    <div class="col-md-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">ADULT</label>
                                                                                                    <select name="adult_round" id="adult_round"
                                                                                                    class="input-group input-group-bg mb-20 form-control">
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
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">CHILD</label>
                                                                                                    <select name="child_round"
                                                                                                    class="input-group input-group-bg mb-20 form-control"id="child_round">
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <label
                                                                                                    class="mb-2 custom-label">KIDS</label>
                                                                                                    <select name="infant_round"
                                                                                                    class="input-group input-group-bg mb-20 form-control"id="infant_round">
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                
                                                                                    </div>
                                                                                </div>
                                                                                <button onclick="getFlightsRound()" type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn-info main-btn-lg">Search
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                        <!-- ========/round trip====== -->
                
                                                                        <!-- ========multicity====== -->
                                                                        <div class="about-selection-details-item"
                                                                            data-about-details="multicity">
                                                                            <form class="authentication-form mb-20">
                                                                                <div class="row">
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
                                                                                {{-- <div class="row">
                
                                                                                    <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">FORM</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" class="form-control"
                                                                                                placeholder="From"
                                                                                                aria-label="Name" />
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    {{-- <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">TO</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" class="form-control"
                                                                                                placeholder="To" aria-label="Name" />
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    {{-- <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">DATE</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="date" class="form-control"
                                                                                                aria-label="Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div> --}}
                                                                                {{-- <div class="row">
                
                                                                                    <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">FORM</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" class="form-control"
                                                                                                placeholder="From"
                                                                                                aria-label="Name" />
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    {{-- <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">TO</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="text" class="form-control"
                                                                                                placeholder="To" aria-label="Name" />
                                                                                        </div> --}}
                                                                                    {{-- </div>
                                                                                    <div class="col-md-4">
                                                                                        <label class="mb-2 custom-label">DATE</label>
                                                                                        <div class="input-group input-group-bg mb-20">
                                                                                            <input type="date" class="form-control"
                                                                                                aria-label="Name" />
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>
                                                                                <button onclick="getFlightsMulti()" type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn-info main-btn-lg">Search
                                                                                Flight</button>
                                                                                <button type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn-info main-btn-lg" onclick="add()">Add City</button>
                                                                                <button type="button"
                                                                                style="text-decoration: none;"
                                                                                class="btn-info main-btn-lg" onclick="remove()">Remove City</button>
                                                                            </form>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                                                        aria-labelledby="profile-tab">                                                            
                                                                        <!-- ========/multicity ====== -->
                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ===========/Flights========== -->
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- ===========Hotels========== -->
                                                <div class="about-selection-details-item" data-about-details="2">
                                                    <div class="forum-details">
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        <form method="get" action="{{ route('user.SearchHotel') }}" class="authentication-form mb-20">
                                                                            @csrf                   
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label for="inputEmail3" class="col-form-label">Destinaion City</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="text" name="branch_city" autocomplete="off"  class="form-control typeahead" placeholder="Destinaion City" required>
                                                                                </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">CHECK IN</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="date" name="checkin_date"
                                                                                            class="form-control" aria-label="Name"
                                                                                            required />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">CHECK OUT</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="date" name="checkout_date"
                                                                                        class="form-control" aria-label="Name"
                                                                                        required />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">ROOM</label>
                                                                                                <select class="form-control" name="no_of_room" id="membership-members">
                                                                                                    @foreach ($no_of_rooms as $no_of_room)
                                                                                                        <option value=" {{ $no_of_room->no_of_rooms }} "> {{ $no_of_room->no_of_rooms }} </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                        </div>
                                                                                        <div class="form-group row addMembers">
                                        
                                                                                        </div>
                                                                                        
                                                                                    </div>
                
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn-info main-btn-lg hotel-search">Search Hotel</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ===========/Hotels========== -->
                
                                                <!-- ===========train========== -->
                                                <div class="about-selection-details-item" data-about-details="3">
                                                    <div class="forum-details">
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        <form class="authentication-form mb-20">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">FORM</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="text" class="form-control"
                                                                                            placeholder="From" aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">TO</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="text" class="form-control"
                                                                                            placeholder="To" aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <!-- <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                                        <select class="input-group input-group-bg mb-20 form-control">
                                                                                            <option selected>Select One</option>
                                                                                            <option value="Economy">Economy</option>
                                                                                            <option value="Business">Business</option>
                                                                                        </select>
                                                                                    </div> -->
                
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">DEPARTING
                                                                                        ON</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="date" class="form-control"
                                                                                            placeholder="DEPARTING ON"
                                                                                            aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">ADULT</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                
                                                                                                <option selected value="1">1
                                                                                                </option>
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
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">CHILD</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">KIDS</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn-info main-btn-lg">Search Train</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ===========/train========== -->
                                                <!-- ===========bus========== -->
                                                <div class="about-selection-details-item" data-about-details="4">
                                                    <div class="forum-details">
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        <form class="authentication-form mb-20">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">FORM</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="text" class="form-control"
                                                                                            placeholder="Enter City" aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">TO</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="text" class="form-control"
                                                                                            placeholder="Enter City" aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <!-- <div class="col-md-6">
                                                                                        <label class="mb-2 custom-label">SEAT TYPE</label>
                                                                                        <select class="input-group input-group-bg mb-20 form-control">
                                                                                            <option selected>Select One</option>
                                                                                            <option value="Economy">Economy</option>
                                                                                            <option value="Business">Business</option>
                                                                                        </select>
                                                                                    </div> -->
                
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">Date of Journey</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="date" class="form-control"
                                                                                            placeholder="DEPARTING ON"
                                                                                            aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">Date of Return (Optional)</label>
                                                                                    <div class="input-group input-group-bg mb-20">
                                                                                        <input type="date" class="form-control"
                                                                                            placeholder="DEPARTING ON"
                                                                                            aria-label="Name" />
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">ADULT</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                
                                                                                                <option selected value="1">1
                                                                                                </option>
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
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">CHILD</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label
                                                                                                class="mb-2 custom-label">KIDS</label>
                                                                                            <select
                                                                                                class="input-group input-group-bg mb-20 form-control">
                
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                
                                                                                </div> --}}
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn-info main-btn-lg">Search Bus</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ===========/bus========== -->
                                                <!-- ===========tour========== -->
                                                <div class="about-selection-details-item" data-about-details="5">
                                                    <div class="forum-details">
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        <form action="{{ route('user.tour_search') }}" method="post">
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">DESTINATION
                                                                                        COUNTRY</label>
                                                                                        <select class="form-control" name="destination_country">
                
                                                                                            <option>Select Item</option>
                                                                                          
                                                                                            @foreach ($countries as $key=>$value)
                                                                                              <option value="{{ $key + 1}}"> {{ $value }}</option>
                                                                                            @endforeach    
                                                                                        </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="mb-2 custom-label">LOCATION</label>
                                                                                        <select name="location_id" class="input-group input-group-bg mb-20 form-control"  >
                                                                                            <option value="" selected="" disabled="">Select Location</option>
                                                                                        </select>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn-info main-btn-lg">Search Tour</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ===========/tour========== -->
                
                                                <div class="about-selection-details-item" data-about-details="6">
                                                    <div class="forum-details">
                                                        <div class="authentication-form-box">
                                                            <div class="authentication-form-box-item active">
                                                                <div class="authentication-box">
                                                                    <div class="authentication-box-inner">
                                                                        <form action="{{ route('user.restaurant.search') }}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ Session::get('AGENT_ID') }}" id="agent_id">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                     <div class="form-group">
                                                                                            <label>Search City / Location</label>
                                                                                            <input type="text" value="" name="search_city" class="form-control input-group input-group-bg mb-20 "  required />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Date:</label>
                                                                                        <div class="input-group date" id="dateForBooking" data-target-input="nearest">
                                                                                            <input type="date" value="" name="checkin_date"
                                                                                                   class="form-control" data-target="#dateForBooking"
                                                                                                   required />
                                                                                            <div class="input-group-append" data-target="#dateForBooking"
                                                                                                 data-toggle="datetimepicker">
                                                                                               
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                <button type="submit" class="btn-info main-btn-lg">Search Restaurant</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                            </div>
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
                                                <marquee behavior="scroll" direction="left" class="fly"></marquee>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        

    
    <!-- /booking services -->


    <section class="holiday-planning-section pt-min-100 pb-70 position-relative">
        <div class="map-shapes">
            <div class="map-shape map-shape-1">
                <img src="{{ asset('web/assets/images/shapes/map-1.png') }}" alt="shape" />
            </div>
            <div class="map-shape map-shape-2">
                <img src="{{ asset('web/assets/images/shapes/map-2.png') }}" alt="shape" />
            </div>
        </div>
        <div class="container">
            <div class="section-title">
                <small>Check out the latest offers!</small>
                <h2>Planning Your Holiday</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-1.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        02 Feb
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        04 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Milan
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Rome</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(100 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-2.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        28 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        03 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Vetican
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Vatican</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(112 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-3.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        28 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        02 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Milan
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Milan</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(114 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-4.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        27 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        03 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Winter
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Winter</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(51 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-5.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        26 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        03 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Island
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Island</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(32 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-6.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        26 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        04 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Milan
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Corfu</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(112 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30 offset-lg-2 offset-xl-0">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="{{ url('tour_list') }}">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-7.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        25 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        02 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Milan
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Seville</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(100 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 pb-30">
                    <div class="card-1">
                        <div class="card-1-image">
                            <div class="card-1-overlay">
                                <a href="">
                                    <img src="{{ asset('web/assets/images/holiday/holiday-place-8.jpg') }}"
                                        alt="holiday" />
                                </a>
                                <ul class="card-1-entry">
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        24 Jan
                                    </li>
                                    <li>
                                        <i class="flaticon-user-1"></i>
                                        04 +
                                    </li>
                                    <li>
                                        <i class="flaticon-placeholder-point"></i>
                                        Winter
                                    </li>
                                </ul>
                            </div>
                            <div class="card-1-redirect">
                                <a href="{{ url('tour_list') }}">
                                    <i class="flaticon-export"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-1-content">
                            <div class="card-1-info">
                                <h3>
                                    <a href="{{ url('tour_list') }}">Varadero</a>
                                </h3>
                                <div class="card-1-reviews">
                                    <ul class="review-star">
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                        <li class="full-star"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <span>(101 Reviews)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tour-section bg-offwhite pt-100 pb-70 animate-section position-relative overflow-hidden"
        id="animateSection">
        <div class="radial-animation-shape radial-animation-shape-active">
            <img src="{{ asset('web/assets/images/shapes/compass.png') }}" alt="compass" />
        </div>
        <div class="container-fluid custom-container-fluid position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 pb-30">
                    <div class="max-685 ms-auto me-auto me-lg-0">
                        <div class="section-title section-title-left about-title">
                            <small>We Are Specialized In</small>
                            <h2>Tour & Travel Arrangement</h2>
                        </div>
                        <div class="about-content-item">
                            <div class="about-content-thumb">
                                <i class="flaticon-map"></i>
                            </div>
                            <div class="about-content-texts">
                                <h3>We Can Be A Great Travel Planner For You</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>
                        </div>
                        <div class="about-content-item">
                            <div class="about-content-thumb">
                                <i class="flaticon-compass"></i>
                            </div>
                            <div class="about-content-texts">
                                <h3>We Guide You All Over The World</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>
                        </div>
                        <div class="text-center text-lg-start">
                            <a href="{{ url('about') }}" class="btn main-btn main-btn-arrow">Discover More <i
                                    class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pb-30">
                    <div class="about-content-image text-center">
                        <img src="{{ asset('web/assets/images/tour-about.png') }}" alt="about" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-package-section pt-100 pb-80 line-shape-bg">
        <div class="container">
            <div class="section-title section-title-lg">
                <small>Popular Tour Package</small>
                <h2>Amazing Tours Liked By The Adventurous</h2>
            </div>
        </div>
        <div class="popular-package-carousel owl-carousel">
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-1.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                05 Days
                            </li>
                        </ul>
                        <div class="card-2-info">
                            <h3>
                                <a href="{{ url('tour_details') }}">Maldives Super Resort</a>
                            </h3>
                            <div class="card-2-info-price">$350<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(101 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-2.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                03 Days
                            </li>
                        </ul>
                        <div class="card-2-info">
                            <h3>
                                <a href="{{ url('tour_details') }}">Best Of Cuba</a>
                            </h3>
                            <div class="card-2-info-price">$1500<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(100 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-3.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                06 Days
                            </li>
                        </ul>
                        <div class="card-2-info">
                            <h3>
                                <a href="{{ url('tour_details') }}">African Forest Tour</a>
                            </h3>
                            <div class="card-2-info-price">$3500<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(103 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-4.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                02 Days
                            </li>
                        </ul>
                        <div class="card-2-info">
                            <h3>
                                <a href="{{ url('tour_details') }}">Sea Side</a>
                            </h3>
                            <div class="card-2-info-price">$500<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(104 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-5.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                05 Days
                            </li>
                        </ul>
                        <div class="card-2-info">{{ url('tour_details') }} <h3>
                                <a href="{{ url('tour_details') }}">Dream Bali Tour</a>
                            </h3>
                            <div class="card-2-info-price">$3500<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(98 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-2">
                    <div class="card-2-image">
                        <img src="{{ asset('web/assets/images/popular-package/popular-package-6.jpg') }}"
                            alt="popular package" />
                    </div>
                    <div class="card-2-content">
                        <ul class="card-2-entry">
                            <li>
                                <i class="flaticon-calendar"></i>
                                06 Days
                            </li>
                        </ul>
                        <div class="card-2-info">
                            <h3>
                                <a href="{{ url('tour_details') }}">City Tour Lisbon</a>
                            </h3>
                            <div class="card-2-info-price">$2500<span>/per</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consetetu regal sadip scing elitr, sed diam.</p>
                        <div class="card-2-footer">
                            <div class="card-2-reviews">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(101 Reviews)</span>
                            </div>
                            <div class="card-2-action">
                                <a href="{{ url('tour_details') }}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tour-video-section position-relative">
        <div class="map-shapes">
            <div class="map-shape map-shape-2 map-shape-top">
                <img src="{{ asset('web/assets/images/shapes/map-2.png') }}" alt="shape" />
            </div>
        </div>
        <div class="tour-video-contents">
            <div class="tour-video-item desk-pad-right-70 order-2 order-lg-1">
                <div class="tour-video-bg">
                    <div class="video-icon">
                        <a href="" class="video-popup">
                            {{-- <i class="flaticon-play"></i> --}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="tour-video-item tour-video-item-details pt-100 order-1 order-lg-2 tab-pt-0">
                <div class="max-685 m-auto me-lg-0 ms-lg-0">
                    <div class="section-title section-title-left about-title">
                        <small>Among The All</small>
                        <h2>Choose Your Favorite Tour</h2>
                    </div>
                    <div class="about-content-item">
                        <div class="about-content-thumb">
                            <i class="flaticon-gallery"></i>
                        </div>
                        <div class="about-content-texts">
                            <h3>We Suggest You The Best Tour Collection</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </div>
                    <div class="text-center text-lg-start">
                        <a href="{{ url('tour_service') }}" class="btn main-btn main-btn-arrow">Book A Tour <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container tour-category">
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-blue">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-hiking"></i>
                            <h3>Adventure</h3>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-pink">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-beach"></i>
                            <h3>Sea Beach</h3>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-green">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-adventure"></i>
                            <h3>Mountain</h3>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-yellow">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-bagpack"></i>
                            <h3>Couple Tour</h3>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-purple">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-fire"></i>
                            <h3>Night Fall</h3>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-2 pt-30">
                    <div class="tour-category-card tour-category-card-greendark">
                        <a href="{{ url('tour_service') }}">
                            <i class="flaticon-signpost"></i>
                            <h3>Popular</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section image-bg image-bg-1 p-tb-100">
        <div class="container-fluid position-relative z-index-1">
            <div class="section-title section-title-white">
                <small>Testimonials Of The Traveller</small>
                <h2>Some Good Talk About Us</h2>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="testimonial-card text-center">
                        <div class="testimoial-quote">
                            <i class="flaticon-left-quote"></i>
                        </div>
                        <p class="testimonial-feedback">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor</p>
                        <div class="testimonial-client-info">
                            <img src="{{ asset('web/assets/images/clients/client-1.jpg') }}" alt="client" />
                            <ul class="review-star">
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                            </ul>
                            <h3 class="testimonial-name">Amrita Roy</h3>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-card text-center">
                        <div class="testimoial-quote">
                            <i class="flaticon-left-quote"></i>
                        </div>
                        <p class="testimonial-feedback">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor</p>
                        <div class="testimonial-client-info">
                            <img src="{{ asset('web/assets/images/clients/client-2.jpg') }}" alt="client" />
                            <ul class="review-star">
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                            </ul>
                            <h3 class="testimonial-name">John Abril</h3>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-card text-center">
                        <div class="testimoial-quote">
                            <i class="flaticon-left-quote"></i>
                        </div>
                        <p class="testimonial-feedback">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor</p>
                        <div class="testimonial-client-info">
                            <img src="{{ asset('web/assets/images/clients/client-3.jpg') }}" alt="client" />
                            <ul class="review-star">
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                            </ul>
                            <h3 class="testimonial-name">Jane Anderson</h3>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-card text-center">
                        <div class="testimoial-quote">
                            <i class="flaticon-left-quote"></i>
                        </div>
                        <p class="testimonial-feedback">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor</p>
                        <div class="testimonial-client-info">
                            <img src="{{ asset('web/assets/images/clients/client-4.jpg') }}" alt="client" />
                            <ul class="review-star">
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                                <li class="full-star"><i class="flaticon-star"></i></li>
                            </ul>
                            <h3 class="testimonial-name">Devit Kotlin</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partner-section pt-100 pb-70 line-shape-bg line-shape-bg-right position-relative overflow-hidden">
        <div class="map-shapes">
            <div class="map-shape map-shape-1 map-shape-top map-shape-sm">
                <img src="{{ asset('web/assets/images/shapes/map-1.png') }}" alt="shape" />
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 pb-30 desk-pad-right-40">
                    <div class="section-title about-title section-title-left m-0">
                        <small>Our Royal Partners</small>
                        <h2>Meet Our Partners</h2>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                            ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        <a href="{{ url('about') }}" class="btn main-btn main-btn-arrow">More About Us <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-1.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-1.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-2.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-2.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-3.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-3.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-4.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-4.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-5.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-5.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-6.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-6.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="offset-sm-2 offset-md-0 col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-7.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-7.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 pb-30">
                            <div class="partner-image">
                                <a href="{{ url('contact') }}">
                                    <img src="{{ asset('web/assets/images/partners/partner-8.png') }}"
                                        alt="partner" class="partner-default" />
                                    <img src="{{ asset('web/assets/images/partners/partner-hover-8.png') }}"
                                        alt="partner" class="partner-hover" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



      {{-- for disable previous date --}}
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
      <script>
          $(document).ready(function(){
               $('.check_out').attr('disabled', true);
  
              var minDate = new Date();
  
              $("#checkIn").datepicker({
                  showAnim: 'drop',
                  numberOfMonth: 1,
                  minDate: minDate,
                  onClose: function(selectedDate){
                      $('#checkOut').datepicker("option", "minDate", selectedDate);
                  }
              });
  
              $("#checkOut").datepicker({
                  showAnim: 'drop',
                  numberOfMonth: 1,
                  onClose: function(selectedDate){
                      $('#checkIn').datepicker("option", selectedDate);
                  }
              });
  
              $(function() {
                  $(".check_in").on("change",function(){
                      var selected = $(this).val();
                      if ( selected == '') {
                          $('.check_out').attr('disable', true);
                      }else{
                          $('.check_out').attr('disabled', false);
                      }
                  });
              });
          });   
      </script>
      <script>
          $(document).ready(function(){
          function displayVals() {
              var html = `<div class="col-sm-6">
                              <label for="inputEmail3" class=" col-form-label">Adults</label>
                              <select class="form-control" name="no_of_adult[]" id="count_adults">
                                  @foreach ($adults as $adult)
                                      <option  value="{{ $adult->no_of_adult }}"> {{ $adult->no_of_adult }} </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-sm-6">
                              <label for="inputEmail3" class=" col-form-label">Kids</label>
                              <select class="form-control" name="no_of_kid[]" id="count_kidss">
                                  @foreach ($kids as $kid)
                                      <option value="{{ $kid->no_of_kids }}"> {{ $kid->no_of_kids }} </option>
                                  @endforeach
                              </select>
                          </div>`;
              fhtml = ``;
            
              var ProjectValues = $("#membership-members").val();
              for (let i = 0; i < ProjectValues; i++) {
                  fhtml = fhtml + html;
              }
              $(".addMembers").html(fhtml);
          }
          $("select").change(displayVals);
          displayVals();
      });
      </script>            
<script>
    $(document).ready(function() {
        getIp();
    });
    function getIp() {
        $.get("http://ip-api.com/json/", function(response) {
            var ip=$('.user_ip').val("10.201.201.66");
            console.log (ip);
            // $('.user_ip').val(response.query);
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
                                        </dip>`;
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

<script type="text/javascript">
            $(document).ready(function() {
              $('select[name="destination_country"]').on('change', function(){
                console.log('ssddd');
                  var destination_country_id = $(this).val();
                  if(destination_country_id ) {
                      $.ajax({
                          url: "{{ url('/user/country/location/ajax') }}/"+destination_country_id ,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                             var d =$('select[name="location_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="location_id"]').append('<option value="'+ value.id +'">' + value.location + '</option>');
                                });
                          },
                      });
                  } else {
                      alert('danger');
                  }
              });
          });
</script>



@endsection