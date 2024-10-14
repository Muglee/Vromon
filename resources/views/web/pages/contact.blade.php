
@extends('web.layouts.app')
@section('contact','active')
@section('content')
    <header class="inner-page-header inner-page-header-3">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>



    <div class="contact-section pt-100 pb-70 position-relative">
{{--        <div class="map-shapes">--}}
{{--            <div class="map-shape map-shape-1 map-shape-top">--}}
{{--                <img src="assets/images/shapes/map-1.png" alt="shape">--}}
{{--            </div>--}}
{{--            <div class="map-shape map-shape-2 map-shape-bottom">--}}
{{--                <img src="assets/images/shapes/map-2.png" alt="shape">--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-6 pb-30">
                    <div class="contact-grid-item contact-grid-bg"></div>
                </div>
                <div class="col-lg-6 pb-30 desk-pad-left-40">
                    <div class="contact-grid-item">
                        <div class="section-title about-title section-title-left text-start">
                            <small>Contact With Us</small>
                            <h2>We'll Love To Hear From You</h2>
                        </div>
                        <form class="contact-form" id="contactForm">
                            <div class="form-group mb-20">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required data-error="Please Enter Your Name" />
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group mb-20">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address*" required data-error="Please Enter Your Email" />
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group mb-20">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No." />
                            </div>
                            <div class="form-group mb-20">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Email Subject*" required data-error="Please Enter Your Subject" />
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group mb-20">
                                <textarea name="message" class="form-control" id="message" rows="6" placeholder="Your Message"></textarea>
                            </div>
                            <div class="input-checkbox mb-20">
                                <input type="checkbox" id="check1">
                                <label for="check1">I have read all <a href="">terms & condition</a> & <a href="{{url('privacy_policy')}}">privacy policy</a>.</label>
                            </div>
                            <div class="col-12">
                                <button class="btn main-btn main-btn-arrow" type="submit">Send Message <i class="flaticon-right-arrow"></i></button>
                                <div id="msgSubmit"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
