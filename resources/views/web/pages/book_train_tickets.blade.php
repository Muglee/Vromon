@extends('web.layouts.app')
@section('services','active')
@section('content')
    <!-- booking services -->
    <header class="inner-page-header inner-page-header-4">
        <div class="inner-header-shape"></div>

        <div class="container">
            <div class="header-content m-auto">
                <h1>Book Train Tickets</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Book Train Tickets</li>
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

                                    <!-- ===========train========== -->
                                    <div class="about-selection-details-item active" data-about-details="3">
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
                                                                            <input type="text" class="form-control" placeholder="From" aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="mb-2 custom-label">TO</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="text" class="form-control" placeholder="To" aria-label="Name" />
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
                                                                        <label class="mb-2 custom-label">DEPARTING ON</label>
                                                                        <div class="input-group input-group-bg mb-20">
                                                                            <input type="date" class="form-control" placeholder="DEPARTING ON" aria-label="Name" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label class="mb-2 custom-label">ADULT</label>
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
                                                                            <div class="col-md-4">
                                                                                <label class="mb-2 custom-label">CHILD</label>
                                                                                <select class="input-group input-group-bg mb-20 form-control">

                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="mb-2 custom-label">KIDS</label>
                                                                                <select class="input-group input-group-bg mb-20 form-control">

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
                                                                <button type="submit" class="btn main-btn main-btn-lg">Search Train</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===========/train========== -->
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

@endsection
