<div class="topbar">
    <div class="container position-relative z-index-1">
        <div class="row align-items-center">
            <div class="topbar-item topbar-item-left">
                <ul class="social-list">
                    <li>
                        <a href="" target="_blank"><i class="flaticon-facebook"></i></a>
                    </li>
                    <li>
                        <a href="" target="_blank"><i class="flaticon-instagram"></i></a>
                    </li>
                    <li>
                        <a href="" target="_blank"><i class="flaticon-twitter"></i></a>
                    </li>
                    <li>
                        <a href="" target="_blank"><i class="flaticon-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="topbar-item justify-content-end">
                <ul class="topbar-action">
                    <li>
                        <i class="flaticon-mail"></i>
                        vromoon21@gmail.com
                    </li>
                    <li>
                        <i class="flaticon-telephone"></i>
                        <a href="tel:+8801711977124">+8801711977124</a>
                        <i class="flaticon-telephone"></i>
                        <a href="tel:+8801958023880">+8801958023880</a>
                    </li>
                    <li>
                        <i class="flaticon-address"></i>
                        82/03 Sher-E-Bangla Road (2nd floor) (Amtola More), Khulna-91000.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="fixed-top">
    <div class="navbar-area">
        <div class="container">
            <div class="mobile-nav">
                <a href="{{url('/')}}" class="mobile-brand">
                    <img src="{{asset('web/assets/images/logo.png')}}" alt="logo" class="logo default-logo" />
                    <img src="{{asset('web/assets/images/logo.png')}}" alt="logo" class="sticky-logo" />
                </a>
                <div class="navbar-option">
                    <div class="navbar-option-item">
                        <ul class="navbar-option-list">
                            <li class="d-md-none">
                                <a href="#" class="mobile-option-dot">
                                    <i class="flaticon-ellipsis"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('web/assets/images/logo.png')}}" alt="logo" class="logo default-logo" />
                        {{-- <img src="{{asset('web/assets/images/logo.png')}}" alt="logo" class="sticky-logo" /> --}}
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a href="{{url('/')}}" class="nav-link @yield('home') ">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/about')}}" class="nav-link @yield('about')">About Us</a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle @yield('services')">Services</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{url('book_air_tickets')}}" class="nav-link ">Book Air Tickets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('reserve_hotel')}}" class="nav-link ">Reserve Hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('book_train_tickets')}}" class="nav-link">Book Train Tickets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('book_bus_tickets')}}" class="nav-link">Book Bus Tickets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('restaurant_reservasion')}}" class="nav-link">Restaurant Reservation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('tour_service')}}" class="nav-link">Tour Service</a>
                                    </li>

                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{url('/')}}" class="nav-link">Get a Ride</a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="{{url('contact')}}" class="nav-link @yield('contact')">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('login')}}" class="nav-link btn">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/agent/login')}}" class="nav-link" >Agent Login</a>
                            </li>


                        </ul>
                    </div>
                    {{--
                                <div class="navbar-option">
                                    <div class="navbar-option-item" style="margin-right: 10px;">
                                        <a href="authentication.html" class="btn main-btn main-btn-arrow">Log in <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                    <div class="navbar-option-item">
                                        <a href="authentication.html" class="btn main-btn main-btn-arrow">Log in <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                    --}}
                    {{-- <div class="navbar-option">
                        <div class="navbar-option-item">
                            <a href="authentication.html" class="btn main-btn main-btn-arrow">Agent Log in <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div> --}}
                </nav>
            </div>
        </div>
    </div>
</div>
