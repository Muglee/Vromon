<aside class="main-sidebar elevation-4" style="background: #042642d9; ">
    <!-- Brand Logo -->
    {{-- <a href="{{ url('vendor/hotel/dashboard') }}" class="brand-link">
        <img src="{{asset('web/assets/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vromoon</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 p-2 mb-3 d-flex" style="background: white;align-items:center;justify-content:center">
            <div class="image">
                <img src="{{ asset('web/assets/images/favicon.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('NAME')}}</a>
            </div>
        </div>

        {{-- <!-- SidebarSearch Form -->
        <div class="form-inline">
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
                    <a href="{{ url('admin/dashboard') }}" class="nav-link text-white @yield('dashboard')" style="font-size: 14px;" >
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('booking')" >
                    <a href="#" class="nav-link text-white " style="font-size: 14px;" >
                        <i class="far fa-calendar nav-icon"></i>
                        <p>
                             Booking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ url('admin/flight_booking') }}" class="nav-link text-white  @yield('flight_booking')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flight Booking</p>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/flight_package') }}" class="nav-link  @yield('flight_package')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Booking</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

                {{-- new --}}

                <li class="nav-item @yield('hotel')" >
                    <a href="{{ url('admin/hotel_booking') }}" class="nav-link text-white @yield('hotel')" style="font-size: 14px;">
                        <i class="far fa-calendar nav-icon"></i>
                        <p>
                            Hotel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
             <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.AvailableRoomsView')}}" class="nav-link text-white @yield('hotel')" style="font-size: 14px;">
                        <i class="fa fa-square nav-icon"></i>
                        <p>
                           Manage  Rooms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route('admin.getVendor')}} class="nav-link @yield('available_rooms')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Available Rooms</p>
                            </a>
                        </li>
                    </ul>
                    <ul  class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.getVendor.bookedRooms')}}" class="nav-link @yield('booked_rooms')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booked Rooms</p>
                            </a>
                        </li>
                        {{-- {{route('admin.BookedRoomsView')}} --}}
                    </ul>
                    <ul  class="nav nav-treeview">
                        <li class="nav-item">
                            <a href= "{{route('admin.getVendor.RoomsList')}}" class="nav-link @yield('room_list')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Rooms</p>
                            </a>
                            {{-- {{route('admin.roomView')}} --}}
                        </li>
                    </ul>
                    <ul  class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.getVendor.ManageRoom')}}" class="nav-link @yield('create_room')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crete Room</p>
                                
                                {{-- {{route('manage_room')}} --}}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.BranchView')}}" class="nav-link text-white @yield('hotel')" style="font-size: 14px;">
                        <i class="fas fa-square nav-icon"></i>
                        <p>
                          Create Branch
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.getVendor.BranchList')}}" class="nav-link  @yield('branch_list')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Branch List</p>
                                {{-- {{route('admin.BranchListView')}} --}}
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.getVendor.BranchManage')}}" class="nav-link  @yield('create_branch')  text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Branch</p>   
                                {{-- "{{ route('admin.BranchView') }}" --}}
                            </a>
                        </li>
                    </ul>
                </li>
             </ul>
            </li>

                <li class="nav-item @yield('booked')">
                    <a href="#" class="nav-link text-white" style="font-size: 14px;">
                        <i class="far fa-calendar-check nav-icon"></i>
                        <p>
                            Booked
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/hub_booking') }}" class="nav-link text-white @yield('hub_booking')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booked tickets</p>
                            </a>
                        </li>
                    </ul>
                        {{--ornob  addition --}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('booked_hotels')}}" class="nav-link text-white @yield('boooked_hotels')" style="font-size: 14px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Booked hotels</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('booked_restaurant')}}" class="nav-link text-white @yield('boooked_restaurants')" style="font-size: 14px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Booked reataurant</p>
                                </a>
                            </li>
                        </ul>
                        {{--ornob addition end --}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/hold_queue') }}" class="nav-link text-white @yield('hold_queue')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hold Queue</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/air_tickets') }}" class="nav-link text-white @yield('air_tickets')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Air Tickets</p>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/hotel_booking') }}" class="nav-link text-white @yield('hotel_booking')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Booking</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.HotelBookingView')}}" class="nav-link text-white  @yield('hotel_booking')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Booking</p>
                            </a>
                        </li>  
                    </ul> --}}
                    <li class="nav-item @yield('transaction')" >
                        <a href="{{ url('admin/hotel_booking') }}" class="nav-link text-white @yield('hotel_booking')" style="font-size: 14px;">
                            <i class="far fa-calendar nav-icon"></i>
                            <p>
                                Restaurant
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">          
                            </li>
                        </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.res.booking')}}" class="nav-link text-white  @yield('restaurant_booking')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Restaurant Booking</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/balance') }}" class="nav-link text-white  @yield('balance')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Restaurant Add</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('food_menu')" >
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>
                                    Food Menu
                                    <i class=" fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/food_categories') }}" class="nav-link text-white  @yield('categories')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/meal_items') }}" class="nav-link text-white  @yield('meals')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Meal Items</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item @yield('manage_table')">
                            <a href="#" class="nav-link text-white">
                                <i class="  fas fa-table nav-icon"></i>
                                <p>
                                    Manage Table
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- admin/table_list --}}
                                    <a href="{{route('admin.Vendor.Table.List')}}" class="nav-link text-white @yield('table_list')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.Vendor.Table')}}" class="nav-link text-white @yield('create_table')">
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>Create table</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item @yield('manage_slot')" >
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>
                                    Manage Slot
                                    <i class=" fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    {{-- url('admin/slot_list') --}}
                                    <a href="{{route('admin.Vendor.Slot') }}" class="nav-link text-white  @yield('slot_list')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Slot</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href= "{{route('admin.Vendor.Slot.List') }}" class="nav-link text-white  @yield('create_slot')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slot List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item @yield('manage_outlet')">
                          
                            {{-- url('admin/outlet_list') --}}
                            <a href="{{route('admin.getVendor.outlet')}}" class="nav-link">
                                <i class="   fas fa-store nav-icon"></i>
                                <p>
                                    Manage Outlet
                                </p>
                            </a>
                        </li>     
                    </ul>

             {{--restaurant add end  --}}

             {{-- tour start --}}
             <li class="nav-item @yield('transaction')" >
                <a href="{{ url('admin/tour_booking') }}" class="nav-link text-white @yield('tour_booking')" style="font-size: 14px;">
                    <i class="far fa-calendar nav-icon"></i>
                    <p>
                        Tour
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>   
                <ul class="nav nav-treeview">
                    <li class="nav-item">          
                    </li>
                </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin/tour_search')}}" class="nav-link text-white  @yield('tour_search')" style="font-size: 14px;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tour Booking</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.package_list')}}" class="nav-link text-white  @yield('package_list')" style="font-size: 14px;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Package List</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.create_package') }}" class="nav-link text-white  @yield('create_package')" style="font-size: 14px;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Packages Add</p>
                    </a>
                </li>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.CreateHotel') }}" class="nav-link text-white  @yield('create_hotel')" style="font-size: 14px;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hotel Add</p>
                    </a>
                </li>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>     
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.hotel_list') }}" class="nav-link text-white  @yield('hotel_list')" style="font-size: 14px;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hotel List</p>
                    </a>
                </li>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>     
            </ul>
             {{-- tour end --}}
                <li class="nav-item @yield('transaction')" >
                    <a href="#" class="nav-link text-white" style="font-size: 14px;">
                        <i class="fas fa-dollar-sign nav-icon"></i>
                        <p>
                            Transactions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/balance') }}" class="nav-link text-white  @yield('balance')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">          
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/offline_payments')}}" class="nav-link text-white @yield('offline_pay')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Offline Payments</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/online_payments')}}" class="nav-link text-white @yield('online_payments')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Online Payments</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/credit_payments') }}" class="nav-link text-white  @yield('credit_payments')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Credit Payments</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/credit_request') }}" class="nav-link text-white  @yield('credit_request')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Credit Request</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/main_statement') }}" class="nav-link text-white  @yield('main_statement')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Statement</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/agent_statement') }}" class="nav-link text-white  @yield('agent_statement')" style="font-size: 14px;">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Agent Statement</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/payment_receipts') }}" class="nav-link text-white  @yield('payment_receipts')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Receipts</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/boubble_statement') }}" class="nav-link text-white  @yield('boubble_statement')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boubble Statements</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/customer_statement') }}" class="nav-link text-white  @yield('customer_statement')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Statements</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('commission')" >
                    <a href="#" class="nav-link text-white" style="font-size: 14px;">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                             Commissions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/flight_package') }}" class="nav-link text-white  @yield('flight_package')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flight Packages</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/hotel_package') }}" class="nav-link text-white  @yield('hotel_package')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Packages</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/hotel_commission') }}" class="nav-link text-white  @yield('hotel_commission')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel Commission</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/payment_commission') }}" class="nav-link text-white  @yield('payment_commission')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Commission</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/payment_commission_B2B') }}" class="nav-link text-white  @yield('payment_commission_B2B')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Commission B2B</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('master')" >
                    <a href="#" class="nav-link text-white " style="font-size: 14px;">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                             Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/cities') }}" class="nav-link text-white  @yield('cities')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/banks') }}" class="nav-link text-white  @yield('banks')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banks</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/customer') }}" class="nav-link text-white  @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('settings')" >
                    <a href="#" class="nav-link text-white" style="font-size: 14px;">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>
                             Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/currency') }}" class="nav-link text-white  @yield('currency')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Currency</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/notice') }}" class="nav-link text-white  @yield('notice')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/service') }}" class="nav-link  text-white @yield('service')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/source') }}" class="nav-link text-white  @yield('source')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Source</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/wallet') }}" class="nav-link text-white  @yield('wallet')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wallet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/passenger_database') }}" class="nav-link text-white  @yield('passenger_database')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Passenger Database</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/profile') }}" class="nav-link text-white  @yield('profile')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{url('admin/logout')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item @yield('sale')" >
                    <a href="#" class="nav-link text-white" style="font-size: 14px;">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                             Sale
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item text-white">
                            <a href="{{ url('admin/cities') }}" class="nav-link  @yield('cities')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Additional Sale</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item text-white">
                            <a href="{{ url('admin/banks') }}" class="nav-link  @yield('banks')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Refund Payment</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item text-white">
                            <a href="{{ url('admin/customer') }}" class="nav-link  @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bubble Additional Sale</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item text-white">
                            <a href="{{ url('admin/customer') }}" class="nav-link  @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bubble Refund Payment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('users')" >
                    <a href="#" class="nav-link text-white " >
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                             Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href={{route('setvendor_view')}} class="nav-link text-white @yield('bank_details')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Set vendor</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route('setagent_view')}} class="nav-link text-white @yield('bank_details')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Set agent</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/customer') }}" class="nav-link text-white @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bubble </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/customer') }}" class="nav-link text-white @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Web Users</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/customer') }}" class="nav-link text-white  @yield('customer')" style="font-size: 14px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Registration</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
