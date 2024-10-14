@extends('web.layouts.app')

<section id="content" class="gray-area">
            <div class="container-2">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            
                            <form class="booking-form" method="post" action="{{route('user.passenger_details.show')}}">
                                @csrf
                                <div class="alert small-box" style="display: none;"></div>
                                <div class="person-information">
                                    <h2>Enter Traveller Details  &nbsp;&nbsp; Room 1 Guest 1 (Adult) - Lead Passenger</h2>
                                    <div class="form-group row">
                                        {{-- <div class="col-sm-4 col-md-4">
                                            <label>Title<span class="text-danger"> *</span></label>
                                            <div class="form-control selector">
                                                <select name="title" class="full-width">
                                                    <option value="Mr">MR</option>
                                                    <option value="Ms">MS</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <label>Title<span class="text-danger"> *</span></label>
                                            <select name="title" class="full-width">
                                                <option value="Mr">MR</option>
                                                <option value="Ms">MS</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-4 col-md-4">
                                            <label>first name<span class="text-danger"> *</span></label>
                                            <input type="text" name="firstname" class="input-text full-width alphabet" value="" placeholder="" required>
                                            <span style="color:red">@error('firstname'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <label>last name<span class="text-danger"> *</span></label>
                                            <input type="text" name="lastname" class="input-text full-width alphabet" value="" placeholder="" required>
                                            <span style="color:red">@error('lastname'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4">
                                            <label>email address<span class="text-danger"> *</span></label>
                                            <input type="text" name="email" id="txtemail" class="input-text full-width" value="" placeholder="" required onChange="javascript:checkEmail();">
                                            <span class="text-danger" id="teg"></span>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Country code<span class="text-danger"> *</span></label>
                                                <div class="#">
                                                <select name="countrycode" class="full-width">
                                                    <option value="Bangladesh (+880) ">Bangladesh (+88)</option>
                                                    <option value="India (+91) ">India (+91)</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-sm-4">
                                                <label>Title<span class="text-danger"> *</span></label>
                                                <select name="title" class="full-width">
                                                    <option value="Mr">MR</option>
                                                    <option value="Ms">MS</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <label>Mobile number<span class="text-danger"> *</span></label>
                                            <input type="text" name="phone" maxlength="11" class="input-text full-width" value="" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-md-4">
                                            <label>Passport No</label>
                                            <input type="text" name="passportno" class="input-text full-width" value="" placeholder="">
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <label>Passport IssueDate</label>
                                                <input type="text" name="passportissue" class="input-text full-width" value="" placeholder="">
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <label>Passport ExpDate</label>
                                            <input type="text" name="passportexp" class="input-text full-width" value="" placeholder="">
                                        </div>
                                    </div>
                                 </div>
                                <hr/>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <label>Arrival Time</label>
                                            <input type="time" class="input-text full-width" name="arrival_time" value="" placeholder="" style="text-align: center;">
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Arrival Point</label>
                                            <div class="#">
                                                <select name="arrival_point">
                                                    <option value="">Select Arrival Point</option>
                                                    <option value="By Airport">By Airport</option>
                                                    <option value="By Railway Station">By Railway Station</option>
                                                    <option value="By Bus Stand">By Bus Stand</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <label>Departure Time</label>
                                            <input type="time" class="input-text full-width" name="departure_time" value="" placeholder="" style="text-align: center;">
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Departure Point</label>
                                            <div class="#">
                                                <select name="departure_point">
                                                    <option value="">Select Departure Point</option>
                                                    <option value="By Airport">By Airport</option>
                                                    <option value="By Railway Station">By Railway Station</option>
                                                    <option value="By Bus Stand">By Bus Stand</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
            			        	<button type="submit" class="full-width btn-large" name="resultID" value="">NEXT</button>      
                                     <input type="hidden" name="noofadult0" value="1" />
                                     <input type="hidden" name="noofchild0" value="0" />
                                     <input type="hidden" name="childage10" value="" />
                                     <input type="hidden" name="childage20" value="" />                            
                                    <input type="hidden" name="country" value="Bangladesh" />
                            					<input type="hidden" name="hotel_star" value="3" />
                            					<input type="hidden" name="tourID" value="12" />
                            					<input type="hidden" name="pprice" value="6420.1995" />
                            					<input type="hidden" name="tour_rate" id="ppricezy" value="6420.1995"/>
                            					<input type="hidden" name="add_act0" id="add_act0" value="None"/>
                            					<input type="hidden" name="oprice" value="5999.805" />
                            					<input type="hidden" name="ex_bed" value="0" />
                            					<input type="hidden" name="acount" value="1" />
                            					<input type="hidden" name="chcount" value="0" />
                            					<input type="hidden" name="incount" value="0" />
                            					<input type="hidden" name="date_from" value="31 Aug 2022" />
                            					<input type="hidden" name="date_to" value="1/undefined/undefined" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3 hidden-xs hidden-sm">
                        <div class="booking-details travelo-box">
                            <h4>Tour Booking Details</h4>
                            <article class="tour-detail">
                                <figure class="clearfix">
                                    <a title="" href="tour-detailed1.html" class="middle-block"><img class="middle-item" alt="" src="https://secure.vromoon.com/images/crop/caa8feefde1f9581fd185c3484e2cd24.jpg"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title">{{$package_name}}<small>{{$tour_length}}</small></h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="soap-icon-calendar"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Date</dt>
                                            <dd>{{ $starting_date }}
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Duration</dt>
                                            <dd>{{ $tour_length }}</dd>
                                        </dl>
                                    </div>
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="soap-icon-departure"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Major Area</dt>
                                            <dd>
                                                Bandarban<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Thanchi<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Remakri                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </article>
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Tour:</dt><dd class="value">{{ $tour_length }} </dd>
                                <dt class="feature">Default Active:</dt><dd class="value">None</dd>
                                <dt class="feature">Add Active:</dt><dd class="value">None</dd>
                                <dt class="feature">taxes and fees:</dt><dd class="value">Free</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">BDT&nbsp;{{ $amount }}</dd>
                            </dl>
                        </div>                
                       <div class="travelo-box contact-box">
                            <h4>Need Vromoon  Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i>01958023880</span><br>
                                <a class="contact-email" href="#"> vromoon21@gmail.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<div class="text-center hidden-md hidden-lg">
		<button type="button" class="btn btn-demo filter-options-btn" data-toggle="modal" data-target="#myModal2">
		    <span>Booking Details</span></br> <span class="absulate-deg"><span class="opt-arw-sign">>></span></span> 	
		</button>
	</div>
	<!-- Modal -->
	<div class="modal left fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Booking Details</h4>
				</div>
				<div class="modal-body">
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Tour Booking Details</h4>
                            <article class="tour-detail">
                                <figure class="clearfix">
                                    <a title="" href="tour-detailed1.html" class="middle-block"><img class="middle-item" alt="" src="https://secure.vromoon.com/images/crop/caa8feefde1f9581fd185c3484e2cd24.jpg"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title">#<small>3 Days, 2 Nights Tour</small></h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="soap-icon-calendar"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Date</dt>
                                            <dd>31 Aug 2022 To 
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="soap-icon-clock"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Duration</dt>
                                            <dd>3 Days, 2 Nights Tour</dd>
                                        </dl>
                                    </div>
                                    <div class="icon-box style11 full-width">
                                        <div class="icon-wrapper">
                                            <i class="soap-icon-departure"></i>
                                        </div>
                                        <dl class="details">
                                            <dt class="skin-color">Major Area</dt>
                                            <dd>
                                                Bandarban<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Thanchi<i class='soap-icon-longarrow-right' style='color: #fdb714;'></i>Remakri                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </article>
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Tour:</dt><dd class="value">3 days, 2 Nights </dd>
                                <dt class="feature">Default Active:</dt><dd class="value">None</dd>
                                <dt class="feature">Add Active:</dt><dd class="value">None</dd>
                                <dt class="feature">taxes and fees:</dt><dd class="value">Free</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">BDT&nbsp;6420.1995</dd>
                            </dl>
                        </div>               
                        <div class="travelo-box contact-box">
                            <h4>Need Vromoon  Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 01958023880 </span>
                                <br>
                                 <span class="contact-phone"><i class="soap-icon-phone"></i></span>
                                <br>
                                <a class="contact-email" href="#"> vromoon21@gmail.com</a>
                            </address>
                        </div>
                    </div>
				</div>
				 <p class="close shut-down" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><<</span></p>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
</body>
</html>
