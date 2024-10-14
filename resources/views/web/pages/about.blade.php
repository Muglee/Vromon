
@extends('web.layouts.app')
@section('about','active')
@section('content')
    <header class="inner-page-header inner-page-header-1">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <section class="about-section position-relative pb-70">
        <div class="map-shapes">
            <div class="map-shape map-shape-1 map-shape-top">
                <img src="{{asset('web/assets/images/shapes/map-1.png')}}" alt="shape">
            </div>
        </div>
        <div class="container">
            <div class="section-title">
                <small>Who We Are</small>
                <h2>Know More About Ourselves</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 pb-30">
                    <div class="about-content-details desk-pad-right-40">
                        <h3>We Are Your Travel Mate</h3>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod temp or invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</li>
                            <li>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor</li>
                            <li>Diam nonumy eirmod tempor invidunt ut labore et dolore magna</li>
                            <li>Labore et dolore magna aliquyam erat, sed diam voluptua.</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod temp or invidunt ut labore et dolore magna. aliquyam erat, sed diam voluptua. </p>
                    </div>
                </div>
                <div class="col-lg-6 pb-30">
                    <div class="about-content-image border-radius-10">
                        <img src="{{asset('web/assets/images/about-us-image.jpg')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tour-section bg-offwhite pt-100 pb-70 animate-section position-relative overflow-hidden" id="animateSection">
        <div class="radial-animation-shape radial-animation-shape-active">
            <img src="{{asset('web/assets/images/shapes/compass.png')}}" alt="compass">
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
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                            </div>
                        </div>
                        <div class="about-content-item">
                            <div class="about-content-thumb">
                                <i class="flaticon-compass"></i>
                            </div>
                            <div class="about-content-texts">
                                <h3>We Guide You All Over The World</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                            </div>
                        </div>
                        <div class="text-center text-lg-start">
                            <a href="{{url('about')}}" class="btn main-btn main-btn-arrow">Discover More <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pb-30">
                    <div class="about-content-image text-center">
                        <img src="{{asset('web/assets/images/tour-about.png')}}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
