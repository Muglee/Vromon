<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{ url('vendor/hotel/dashboard') }}" class="brand-link">
        <img src="{{asset('public/web/assets/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vromoon</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('VENDOR_COMPANY_NAME')}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{--  <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>  --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('vendor/restaurant/dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
{{--                             <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item @yield('book')">
                    <a href="{{ url('vendor/restaurant/restaurant_booking') }}" class="nav-link">
                        <i class="fas fa-bell nav-icon"></i>
                        <p>
                            Book Now
                        </p>
                    </a>

                </li>

                <li class="nav-item @yield('booking_list')">
                    <a href="{{ url('vendor/restaurant/restaurant_booking/list') }}" class="nav-link">
                        <i class="fas fa-bell nav-icon"></i>
                        <p>
                           All Booking
                        </p>
                    </a>

                </li>

                <li class="nav-item @yield('food_menu')" >
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Food Menu
                            <i class=" fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('vendor/restaurant/food_categories') }}" class="nav-link  @yield('categories')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('vendor/restaurant/meal_items') }}" class="nav-link  @yield('meals')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meal Items</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('manage_table')">
                    <a href="#" class="nav-link">
                        <i class="  fas fa-table nav-icon"></i>
                        <p>
                            Manage Table
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{url('vendor/restaurant/available_table')}}" class="nav-link @yield('available_table')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Available table</p>
                            </a>
                        </li> --}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{url('vendor/restaurant/booked_table')}}" class="nav-link @yield('booked_table')">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Booked table</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{url('vendor/restaurant/table_list')}}" class="nav-link @yield('table_list')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendor/restaurant/manage_table')}}" class="nav-link @yield('create_table')">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>Crete table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('manage_slot')" >
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Manage Slot
                            <i class=" fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('vendor/restaurant/slot_list') }}" class="nav-link  @yield('slot_list')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slot List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('vendor/restaurant/manage_slot') }}" class="nav-link  @yield('create_slot')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Slot</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('manage_outlet')">
                    <a href="{{ url('vendor/restaurant/outlet_list') }}" class="nav-link">
                        <i class="   fas fa-store nav-icon"></i>
                        <p>
                            Manage Outlet
                        </p>
                    </a>

                </li>

                <li class="nav-item @yield('settings')" >
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                             Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ url('vendor/restautant/profile') }}" class="nav-link  @yield('profile')">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Profile</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        {{-- <li class="nav-item">
                            <a href="{{url('vendor/logout')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="text-danger" style="font-weight: 600;" >Logout</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('vendor/restaurant/profile') }}" class="nav-link  @yield('profile')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
