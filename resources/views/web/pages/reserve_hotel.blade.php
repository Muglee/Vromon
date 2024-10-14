@extends('web.layouts.app')
@section('services','active')
@section('content')
    <!-- booking services -->
    <header class="inner-page-header inner-page-header-4">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Reserve Hotel</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reserve Hotel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <section class="about-section pb-70 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb-30">
                    <div class="about-selection-content">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="about-selection-details">
                                    <!-- ===========testaurauent========== -->
                                    <div class="about-selection-details-item active" data-about-details="5">
                                        <div class="forum-details">
                                            <div class="authentication-form-box">
                                                <div class="authentication-form-box-item active">
                                                    <div class="authentication-box">
                                                        <div class="authentication-box-inner">
                                                            <form class="authentication-form mb-20">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="mb-2 custom-label">DESTINATION COUNTRY</label>
                                                                        <select class="input-group input-group-bg mb-20 form-control">
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
                                                                    <div class="col-md-6">
                                                                        <label class="mb-2 custom-label">LOCATION</label>
                                                                        <select class="input-group input-group-bg mb-20 form-control">
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
                                                                </div>
                                                                <button type="submit" class="btn main-btn main-btn-lg">Search Tour</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===========/testaurauent========== -->
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /booking services -->
    <section class="blog-section pb-100 position-relative">
        <div class="map-shapes">
            <div class="map-shape map-shape-1 map-shape-top">
                <img src="{{asset('web/assets/images/shapes/map-1.png')}}" alt="shape">
            </div>
            <div class="map-shape map-shape-2 map-shape-vertical-center">
                <img src="{{asset('web/assets/images/shapes/map-2.png')}}" alt="shape">
            </div>
        </div>
        <div class="container">
            <div class="section-title">
                <small>Choose Your Destination</small>
                <h2>Live Where You Want</h2>
            </div>
            <div class="row load-more-gallery">
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-1.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Ikos Olivia</h3>
                                <div class="destination-price">$32<span>/Night</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(100 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}{{url('hotel_details')}} class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-2.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Tamassa Resort</h3>
                                <div class="destination-price">$39<span>/Night</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(99 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-3.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Kurumba Maldives</h3>
                                <div class="destination-price">$52<span>/Night</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(102 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-19.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Southamp Mountain</h3>
                                <div class="destination-price">$23<span>/Day</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(99 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-20.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Glamp Beach</h3>
                                <div class="destination-price">$56<span>/Night</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(109 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('hotel_details')}}">
                                <img src="{{asset('web/assets/images/destinations/destination-21.jpg')}}" alt="destination">
                            </a>
                        </div>
                        <div class="destination-card-content">
                            <div class="destination-card-header">
                                <h3>Watel Vesels</h3>
                                <div class="destination-price">$23<span>/Night</span></div>
                            </div>
                            <div class="destination-card-review">
                                <ul class="review-star">
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                    <li class="full-star"><i class="flaticon-star"></i></li>
                                </ul>
                                <span>(88 Reviews)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetu regal sadipscing elitr, sed diam.</p>
                            <div class="destination-redirect">
                                <a href="{{url('hotel_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{--            <div class="text-center load-more">--}}
            {{--                <button class="btn main-btn main-btn-arrow load-more-btn">Load More <i class="flaticon-right-arrow"></i></button>--}}
            {{--            </div>--}}

        </div>
    </section>

@endsection
