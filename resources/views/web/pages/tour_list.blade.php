@extends('web.layouts.app')
@section('services','active')
@section('content')
    <!-- booking services -->
    <header class="inner-page-header inner-page-header-4">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Tour List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tour List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>


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
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-30 hotel-more-item">
                    <div class="destination-card">
                        <div class="destination-card-image">
                            <a href="{{url('tour_details')}}">
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
                                <a href="{{url('tour_details')}}">Explore Tour <i class="flaticon-export"></i></a>
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
