@extends('web.layouts.app')
                                       
            <section id="content">
                        <div class="container-2" id="container">
                            <div class="row">
                                    <div id="main" class="col-md-9">
                                    <div class="tab-container style1" id="hotel-main-content">
                                        <ul class="tabs">
                                            <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                                            <li class="pull-right"><a href="javascript:void(0);" onclick="Export2Doc(12, 'Tour_2601')" class="btn btn-success">Download word file</a></li>
                                            <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#hotel-description">Vromoon  GUIDE</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="photos-tab" class="tab-pane fade in active">
                                                <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                                    <ul class="slides" id="slides">
                                                    <li><img src="https://secure.vromoon.com/images/tours/f7c829124ca385b8edc16f0c36968fc8.jpg" alt="" style="height: 520px;" /></li><!--width: 870px;-->
                                                    </ul>
                                                </div>
                                                <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                                    <ul class="slides">
                                                    <li><img src="https://secure.vromoon.com/images/tours/f7c829124ca385b8edc16f0c36968fc8.jpg" alt="" /></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="map-tab" class="tab-pane fade" style="height: 522px; position: relative; overflow: hidden;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="lati" value="35.033478" />
                                    <input type="hidden" id="long" value="75.915786" />
                                        <div id="hotel-features" class="tab-container">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-selected="true">Description</a>
                                            </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="pills-itinerary-tab" data-toggle="pill" href="#pills-itinerary" role="tab" aria-controls="pills-itinerary" aria-selected="false">itinerary</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="pills-term-condition-tab" data-toggle="pill" href="#pills-term-condition" role="tab" aria-controls="pills-term-condition" aria-selected="false">Term &amp; Conditions</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="pills-hotel-availability-tab" data-toggle="pill" href="#pills-hotel-availability" role="tab" aria-controls="pills-hotel-availability" aria-selected="false">Hotel Availability</a>
                                              </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade in active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                                <div class="intro table-wrapper full-width hidden-table-sms">
                                                    <div class="col-sm-5 col-lg-4 features table-cell">
                                                        <ul>
                                                            <li><label>Hotel Type:</label>{{ $packages->hotel_rating }}</li>
                                                            <li><label>Extra people/BED:</label>0</li>
                                                            <li><label>Minimum Stay:</label>{{ $packages->tour_length }}</li>
                                                            <li><label>Total Tour Cost:</label>BDT&nbsp;{{ $packages->amount }}</li>
                                                            <li><label>Country:</label>{{ $packages->destination_country }}</li>
                                                            <li><label>Package Name:</label>{{ $packages->package_name }}</li>
                                                            <li><label>Default Activity:</label>None</li>
                                                            <li><label>Major Area:</label>Bandarban<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Thanchi<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Remakri</li>
                                                        </ul>
                                                    </div>
                                                    <input type="hidden" id="acount" value="1" />
                                                    <input type="hidden" id="chcount" value="0" />
                                                    <input type="hidden" id="incount" value="0" />
                                                    <input type="hidden" id="pprice" value="6446.154" />
                                                    <input type="hidden" id="night" value="2" />
                                                    <div class="col-sm-7 col-lg-8 table-cell features" style="padding: 24px 22px;">
                                                        <ul>
                                                            <li><label>Activity &amp; Cost :</label>
                                                            </li>
                                                            <li><label>&nbsp;</label>&nbsp;</li>
                                                            <li><label>Activity Name:</label><b style="color: #fdb714;font-size: 12px;">Local site seeing</b>
                                                            <span style="float: right;">
                                                                <button type="button" id="add0" class="button btn-small text-center" onclick="myfun(0);">ADD NOW</button>
                                                                <button type="button" id="remove0" class="button btn-small text-center" onclick="myfunre(0);" style="background-color: #ef0909;display:none;">REMOVE</button>
                                                            </span></li>
                                                            <li><label>&nbsp;</label>
                                                            <b>Adults Price : </b><input type="hidden" id="act_name0" value="Local site seeing" />
                                                            <input type="hidden" id="actaprice0" value="1070" />
                                                            <span style="color: #fdb714;font-size: 12px;">1070</span>&nbsp;&nbsp;&nbsp;
                                                            <b>Childs Price : </b><input type="hidden" id="actcprice0" value="856" />
                                                            <span style="color: #fdb714;font-size: 12px;">856</span></li>
                                                            <li><label>&nbsp;</label>
                                                            <b>Infants Price : </b><input type="hidden" id="actiprice0" value="642" />
                                                            <span style="color: #fdb714;font-size: 12px;">642</span></li>
                                                            </ul>
                                                    </div>
                                                </div>
                                                <div class="long-description">
                                                    <h2>About Bandarban Tour: The Adventure in Hill Traces and tribal lifestyle</h2>
                                                    <p>Bandarban is located in the south-eastern part of Bangladesh on the Chittagong division. Important to realize, among the three Chittagong Hill Tracks districts, Bandarban is one of them. In addition, it is the most beautiful and picturesque place in Bangladesh. It is one of the attractive travel destinations is just 77 km away from the Chittagong city. In Bandarban, the most beautiful tourist spots are Boga Lake, Chimbuk Hill and Tribal Villages,  Buddha Dhatu Jadi, Keokradong, Nilachal Tourist Spot, Mirinja Parjatan, Meghla Tourist Spot, Nafakhum and Remakri, Nilgiri and Thanchi, Rijuk Waterfall, Prantik Lake, Sangu River, Tajingdong, Shoilo Propat, and Upabon Parjatan.In this 03 days and 02 nights tour of Travel Mate, we will cover the most scenic and coolest spot including Meghla tourist spot,  Nilgiri, Nilachal  & Golden Temple, and Chimbuk Hill (Darjeeling of Bengal) & Waterfalls.To emphasize, Bandarban is popular for the hills, waterfalls and ethnic people. In particular, we find 12 communities of the ethnic people in Bandarban. Each tribe has their individual culture, religions, tradition, dress code, food, and language. To clarify, you will find the tribe villages in every tourist spot. It is very amazing to hear the story of them. By the same token, you will find the highest peaks in Bangladesh named Tajingdong (Height 4632 feet).The tour of Travel Mate covers the main attraction spot of Bandarban including hills, waterfalls and ethnic villages. Moreover, if you consider the package, you will realize the matter. Let’s check the packages of Travel Mate in details. (See the Itinerary section for the complete guideline of the tours)</p>
                                                </div>
                                            </div>
                                          
                                            <div class="tab-pane" id="pills-itinerary" role="tabpanel" aria-labelledby="pills-itinerary-tab">
                                                <h2>Day 1 : Night 01 Dhaka to Bandarban by bus journey</h2>
                                                <p>We will start the journey at 10:30 PM. So, you need to reach the previously mentioned place at 9:30 PM. Check if everything is okay and if you have finished the dinner. After reaching the bus station, confirm your seat. Now the guide will describe the tour plan. At 10:30 PM the bus will start from Dhaka. Check everything is fine. Now take sleep to start the day with refreshment.We will depart for Bandarban by AC bus at 10:30 PM.Overnight bus journey.</p>
                                                <br />
                                                 <h2>Day 2 : Day 01, a Site visit to Bandarban.</h2>
                                                <p>Day 01 Bandarban (Nilachal and Golden Temple):We will arrive at Bandarban in the early morning (Before 7:00 AM). Likewise, we will check in our hotel and will take breakfast as early as possible. Now we will visit Meghla tourist spot on foot as it is walking distance from the hotel. We will finish visiting the Meghla Tourist Spot before 12:00 PM. Now we will finish our launch in any restaurant. After taking a break for 30 minutes, we will go to visit Nilachal and Golden Temple. We will explore the Nilachal and Golden Temple before the evening. Really it will be a fantastic day for storing in your memory. Then we will return to the hotel. Accordingly, take sleep and prepare yourself for the next day.We will reach early in the morning. Checking in the hotel BPC and take breakfast at RestaurantStart for sightseeing on foot to Meghla tourist spot.After lunch start visit to Nilachal and Golden Temple.Back to hotel and overnight at the hotel.</p>
                                                <br />
                                                <h2>Day 3 : Day 02 Nilgiri nad chimbuk</h2>
                                                <p>Day 02 Bandarban (Nilgiri & Chimbuk Hill):In the 2nd day, after finishing our breakfast we will start our journey for Nilgiri with a reserved jeep. On the way, we will finish exploring the Chimbuk Hill. Then we will go to the Nilgiri. Not to mention, Nilgiri Hill is a very beautiful place to take the fresh breath and feeling the touch of nature. We will stay here till evening. Thus we will finish another amazing day in Bandarban. Now we will come back to the hotel. Be organized, complete your dinner and go to sleep for starting the next day.After breakfast start for sightseeing by reserved jeep, Nilgiri on the way visiting Chimbuk Hill (Darjeeling of Bengal) & Waterfalls.Back hotel and overnight stay.</p>
                                                <br/>
                                                <h2>Day 4 : Day 03 Self-time and free</h2>
                                                <p>Day 03 Bandarban – Dhaka:The third day of the tour is only for yours. You can go and do what you want. You can explore the surroundings and can meet the local tribe. At the same time, you can take the taste of the local foods. At 8 PM, you need to check out from the hotel. After completing our dinner, we will start back to Dhaka at 10:00 PM. We will arrive early in the morning. Back to your sweet home and start your daily task.Easy & free day up to the evening.Check out hotel at  8:00 PMStart back to Dhaka at 10:00 PMOvernight Bus journeyArrive Dhaka at early in the morningGo back to your sweet home & End the tripThanks all from the Travel Mate family. Hope you have enjoyed the Bandarban journey. We will start planning for another place for you. Stay connected with us.</p>
                                                <br />
                                            </div>
                                            <div class="tab-pane" id="pills-term-condition" role="tabpanel" aria-labelledby="pills-term-condition-tab">
                                          
                                                <h2>Term &amp; Conditions</h2>
                                                <ul>
                                                    <li><p>Don't make any hazard with any people in the tour.</p></li>
                                                </ul>                                                    
                                            </div>
                                            <div class="tab-pane" id="pills-hotel-availability" role="tabpanel" aria-labelledby="pills-hotel-availability-tab">
       
                                                <form>
                                                <div class="update-search clearfix">
                                                    <div class="col-md-5">
                                                        <h4 class="title">Where</h4>
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <label>PACKAGE NAME</label>
                                                                <div class="selector">
                                                                    <input type="text" name="date_from" readonly value="{{ $packages->package_name }}" class="input-text full-width" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <label>COUNTRY</label>
                                                                <div class="selector">
                                                                    <input type="text" name="date_to" readonly value="{{ $packages->destination_country }}" class="input-text full-width" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-7">
                                                        <h4 class="title">Who</h4>
                                                        <div class="row">
                                                            <div class="col-xs-4">
                                                                <label>ROOMS</label>
                                                                <div class="selector">
                                                                    <input type="text" name="room" readonly value="1" class="input-text full-width" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <label>ADULTS</label>
                                                                <div class="selector">
                                                                    <input type="text" name="adult" readonly value="1" class="input-text full-width" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <label>CHILDS</label>
                                                                <div class="selector">
                                                                    <input type="text" name="child" readonly value="0" class="input-text full-width" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                <h2>Available Rooms</h2>
                                                <div class="room-list listing-style3 hotel">
                                                        <article class="box">
                                                        <figure class="col-sm-4 col-md-1">
                                                            <a class="hover-effect" href="javascript:void(0);" title=""><img width="230" height="160" src="https://secure.vromoon.com/images/rooms.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="details col-xs-12 col-sm-8 col-md-11">
                                                            <div>
                                                                <div>
                                                                    <div class="box-title">
                                                                            <h4 class="title">Any 3 start hotel</h4>
                                                                            <dl class="description">
                                                                            <dt>With BreakFast &amp; WiFi</dt>
                                                                            <dd>&nbsp;</dd>
                                                                        </dl>
                                                                    </div>
                                                                    <div class="amenities">
                                                                        <a data-toggle="tooltip" title="" data-original-title="WiFi"><i class="soap-icon-wifi circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="Room Service"><i class="soap-icon-phone circle circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="BreakFast"><i class="soap-icon-fork circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="TV"><i class="soap-icon-television circle"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="price-section">
                                                                    <span class="price"><small>2&nbsp;NIGHT</small></span>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="action-section">
                                                                    <!--<a href="tour-booking" title="" class="button btn-small full-width text-center">BOOK NOW</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                        <article class="box">
                                                        <figure class="col-sm-4 col-md-1">
                                                            <a class="hover-effect" href="javascript:void(0);" title=""><img width="230" height="160" src="https://secure.vromoon.com/images/rooms.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="details col-xs-12 col-sm-8 col-md-11">
                                                            <div>
                                                                <div>
                                                                    <div class="box-title">
                                                                            <h4 class="title">Any 3 Star Hotel</h4>
                                                                            <dl class="description">
                                                                            <dt>With BreakFast &amp; WiFi</dt>
                                                                            <dd>&nbsp;</dd>
                                                                        </dl>
                                                                    </div>
                                                                    <div class="amenities">
                                                                        <a data-toggle="tooltip" title="" data-original-title="WiFi"><i class="soap-icon-wifi circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="Room Service"><i class="soap-icon-phone circle circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="BreakFast"><i class="soap-icon-fork circle"></i></a>
                                                                        <a data-toggle="tooltip" title="" data-original-title="TV"><i class="soap-icon-television circle"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="price-section">
                                                                    <span class="price"><small>3&nbsp;NIGHT</small></span>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="action-section">
                                                                    <!--<a href="tour-booking" title="" class="button btn-small full-width text-center">BOOK NOW</a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>                                        
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </div>
                                        <div class="sidebar col-md-3 hidden-xs hidden-sm">
                                        <article class="detailed-logo">
                                        <figure>
                                            <img width="114" height="85" src="https://secure.vromoon.com/images/crop/caa8feefde1f9581fd185c3484e2cd24.jpg" alt="">
                                        </figure>
                                            <div class="details">
                                            <h2 class="box-title">{{ $packages->package_name }}<small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space">
                                                Bandarban<i class='soap-icon-longarrow-right'></i>Thanchi<i class='soap-icon-longarrow-right'></i>Remakri</span></small></h2>
                                            <span class="price clearfix">
                                                <small class="pull-left">FROM</small>
                                                <span class="pull-right">BDT&nbsp;<span id="ppricez">{{ $packages->amount }}</span></span>
                                            </span>
                                            <div class="feedback clearfix">
                                                <div title="3 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 60%;"></span></div>
                                                <span class="review pull-right">929 reviews</span>
                                            </div>
                                            <p class="description">Bandarban is located in the south-eastern part of Bangladesh on the Chittagong division. Important to realize, among the three Chittagong Hill Tracks ....</p>
                                            <form action="{{ route('user.user_package_details') }}" method="post">
                                                @csrf
                                
                                                            <input type="hidden" name="destination_country" value="{{ $packages->destination_country }}" />
                                                            <input type="hidden" name="package_name" value="{{ $packages->package_name }}" />
                                                            <input type="hidden" name="amount" value="{{ $packages->amount }}" />
                                                            <input type="hidden" name="tour_length" value="{{ $packages->tour_length }}" />
                                                            <input type="hidden" name="starting_date" value="{{ $packages->starting_date }}" />
                                                            <input type="hidden" name="end_date" value="{{ $packages->end_date }}" />
                                                            
                                                            
                                                            
                                                            

                                                            <div class="col-xs-12" style="padding: 0 0 7px 0;">
                                                                <label class="uppercase">Start Date</label>
                                                                <div class="#">
                                                                    <input type="date" name="starting_date" id="departing_on_round" placeholder="DEPARTING ON" class="form-control"
                                                                    aria-label="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12" style="padding: 0 0 7px 0;">
                                                                <label class="uppercase">End Date</label>
                                                                <div class="">
                                                                    <input type="date" name="end_date" id="departing_on_round" placeholder="DEPARTING ON" class="form-control"
                                                                                aria-label="Name" />
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-warning" name="resultID" value="">Book Package</button>
                                                        </form>
                                        </div>
                                    </article>
                                    <div class="travelo-box contact-box">
                                        <h4>Need Vromoon  Help?</h4>
                                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                                        <address class="contact-details">
                                            <span class="contact-phone">
                                                <i class="soap-icon-phone">
                                                    </i> 01958023880 </span><br>
                                            <a class="contact-email" href="#"> vromoon21@gmail.com</a>
                                        </address>
                                    </div>
                                    <div class="travelo-box book-with-us-box">
                                        <h4>Cancellation Policy </h4>
                                        <ul>
                                            <li>
                                                <i class="soap-icon-check circle"></i>
                                                <p>Before 4 days of the tour</p>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </section>