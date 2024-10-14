<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        {{-- <div class="d-flex justify-content-center pt-3">
            <img src="{{asset('web/assets/images/logo.png')}}" width="70%" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        </div> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
            <div class="image">
                {{-- <img src="{{ asset('web/assets/images/favicon.png') }}" class="img-circle elevation-2" alt="User Image"> --}}
                <img src="{{asset('storage/media/agent/company_logo/'.session()->get('COMPANY_LOGO'))}}" class="" alt="User Image">

            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('COMPANY_NAME')}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/agent/dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
{{--                             <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item @yield('booking_now')">
                    <a href="#" class="nav-link">
                        <i class="far fa-calendar-check"></i>
                        <p>
                            Book Now
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/flight_booking')}}" class="nav-link @yield('flight_booking')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flights</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/hotel_booking')}}" class="nav-link @yield('hotel_booking')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotels</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/agent_restaurant_booking')}}" class="nav-link @yield('restaurant_booking')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Restaurant</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('booking')">
                    <a href="#" class="nav-link">
                        <i class="far fa-calendar-check"></i>
                        <p>
                            Booking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link @yield('')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hold Queue</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link @yield('')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Air Tickets</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/agent_restaurant_booking/list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                   Restaurant Booking
                                </p>
                            </a>
                        </li>
                    </ul>


                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route('outlet.list')}} class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                Book Outlet
                                </p>
                            </a>
                        </li>
                    </ul>



                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/hotel-booking-data-list')}}" class="nav-link @yield('Hotel_Booking')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Booking</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item @yield('payments')">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>
                            Payments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/bank_details')}}" class="nav-link @yield('bank_details')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Details</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/offline_payments')}}" class="nav-link @yield('offline_payments')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Offline Payments</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('agent/online_payments')}}" class="nav-link @yield('online_payments')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Online Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('transaction')" >
                    <a href="#" class="nav-link ">
                        <i class="fas fa-dollar-sign"></i>
                        <p>
                            Transactions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/balance') }}" class="nav-link  @yield('balance')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/credit_request') }}" class="nav-link  @yield('credit_request')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Credit Request</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/voucher_debit') }}" class="nav-link  @yield('voucher_debit')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Voucher Debit</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/statement') }}" class="nav-link  @yield('statement')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statement</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('settings')" >
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cog"></i>
                        <p>
                             Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('agent/passenger_database') }}" class="nav-link  @yield('passenger_database')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Passenger Database</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('agent/profile') }}" class="nav-link  @yield('profile')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('agent/logout')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
