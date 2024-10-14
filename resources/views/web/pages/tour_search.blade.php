@extends('web.layouts.app')
@section('services','active')
@section('content')

<div class="container-2" >
        <div class="row" style="margin-top:100px">
            <div id="main">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="sort-by-section box clearfix">
                            <label><a href="#" id="modifySearch">Modify Search</a></label>
                        </div>
                        <div class="cruise-list listing-style3 cruise" id="cust_data">
                            @foreach ($package as $item)
                            {{-- {{ dd($item) }} --}}
                            <article class="box">
                                <figure class="col-sm-2">
                                    <a title="" href="javascript:void(0);" class="hover-effect popup-gallery" style="padding: 4px 2px;">
                                        <img width="270" height="160" alt="" src="https://secure.vromoon.com/images/crop/caa8feefde1f9581fd185c3484e2cd24.jpg">
                                    </a>
                                </figure>
                                <div class="details col-sm-9">
                                    <div class="clearfix">
                                        <h4 class="box-title pull-left">{{ $item->package_name }}<small>
                                            <i class="soap-icon-flexible"></i>
                                            <a href="javascript:;" data-toggle="tooltip" title="3" days,="" &nbsp;2="" nights'="">{{ $item->tour_length }}</a>
                                            <span class="tour-loc" style="margin-left: 118px;color: #47cbf5;font-size: 12px;">{{ $item->location }}<i class="soap-icon-longarrow-right"></i>Thanchi<i class="soap-icon-longarrow-right"></i>Remakri</span></small>
                                        </h4>
                                        <span class="price pull-right">
                                            <small>from</small>BDT&nbsp;{{ $item->amount }}</span>
                                            <input type="hidden" value="amount" id="pccr">
                                            <span class="offer_fare pull-right" style="font-weight:normal;display:none;margin: 27px -80px 0 0;">{{ $item->amount }}</span>
                                    </div>
                                    <div class="character clearfix">
                                        <div class="col-xs-2 departure">
                                            <i class="fa fa-umbrella-beach" style="zoom:4;"></i>
                                        </div>
                                        <div class="col-xs-6 date">
                                            <i class="fa fa-map-marker"></i>
                                            <div><span class="skin-color">StarPointt </span><br>{{ $item->starting_point }}</div>
                                        </div>
                                        <div class="col-xs-3 departure"><i class="fa fa-map-marker"></i>
                                            <div><span class="skin-color">End Point</span><br>{{ $item->end_point }}</div>
                                        </div>
                                        <div class="col-xs-3 departure"><i class="fa fa-check yellow-color"></i>
                                            <div><span class="skin-color">Default Activity</span><br>None</div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="review pull-left">
                                            <div class="five-stars-container">
                                                <span class="five-stars" style="width: 3 * 20%;"></span>
                                            </div><span>786 reviews</span>
                                        </div>
                                        <form action="{{ route('user.package_details') }}" method="post">
                                            @csrf
                                            
                                            <input type="hidden" name="package_id" value="{{ $item->id }}">
                                            
                                            <button type="submit" class="button btn-small pull-right" name="resultID" value="">SELECT PACKAGE</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        <!--<a href="#" class="uppercase full-width button btn-large">load more listing</a>-->
                        <div class="load-more" style="display: none;text-align: center;">
                            <img src="https://secure.vromoon.com/images/loader.gif" width="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection    