@extends('web.layouts.app')
@section('content')
    <header class="inner-page-header inner-page-header-1">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Hotel Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('reserve_hotel')}}">Reserve Hotel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hotel Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>


    <section class="tour-section pt-100 pb-100 position-relative">
        <div class="map-shapes">
            <div class="map-shape map-shape-1 map-shape-top">
                <img src="{{asset('web/assets/images/shapes/map-1.png')}}" alt="shape">
            </div>
            <div class="map-shape map-shape-2 map-shape-bottom">
                <img src="{{asset('web/assets/images/shapes/map-2.png')}}" alt="shape">
            </div>
        </div>
        <div class="container">
            <div class="details-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="details-card-image-carousel owl-carousel owl-theme default-owl-theme">
                            <div class="item">
                                <img src="{{asset('web/assets/images/tours/tour-1.jpg')}}" alt="tour">
                            </div>
                            <div class="item">
                                <img src="{{asset('web/assets/images/tours/tour-2.jpg')}}" alt="tour">
                            </div>
                            <div class="item">
                                <img src="{{asset('web/assets/images/tours/tour-3.jpg')}}" alt="tour">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 desk-pad-left-40">
                        <div class="details-card-content">
                            <div class="card-2-info">
                                <h3>Maldives Super Resort</h3>
                                <div class="card-2-info-price">$350<span>/per</span></div>
                            </div>
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
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam.</p>
                            <div class="details-card-info">
                                <h4>Tour Details</h4>
                                <div class="details-card-info-list">
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Covered Places</div>
                                        <div class="details-card-list-texts">Denpasar, Ubud, Kuta, Canggu, Jimbaran & Uluwatu (Bukit Peninsula)</div>
                                    </div>
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Duration</div>
                                        <div class="details-card-list-texts">05 Days 06 Nights</div>
                                    </div>
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Starting</div>
                                        <div class="details-card-list-texts">01 March 2021</div>
                                    </div>
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Ending</div>
                                        <div class="details-card-list-texts">07 March 2021</div>
                                    </div>
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Person</div>
                                        <div class="details-card-list-texts">50 Person In Total</div>
                                    </div>
                                    <div class="details-card-list-item">
                                        <div class="details-card-list-label">Available Seat</div>
                                        <div class="details-card-list-texts">12</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn main-btn main-btn-arrow">Book This Hotel <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
