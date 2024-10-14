<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{ url('vendor/hotel/dashboard') }}" class="brand-link">
        <img src="{{asset('web/assets/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vromoon</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('VENDOR_COMPANY_NAME')}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('vendor/hotel/dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
{{--                             <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item @yield('manage_room')">
                    <a href="#" class="nav-link">
                        <i class="fas fa-door-closed"></i>
                        <p>
                            Manage Room
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('vendor/hotel/available_rooms')}}" class="nav-link @yield('available_rooms')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Available Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendor/hotel/booked_rooms')}}" class="nav-link @yield('booked_rooms')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booked Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendor/hotel/roomlist')}}" class="nav-link @yield('room_list')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendor/hotel/manage_room')}}" class="nav-link @yield('create_room')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Room</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('manage_branch')" >
                    <a href="#" class="nav-link ">
                        <i class="fas fa-building"></i>
                        <p>
                            Manage Branch
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('vendor/hotel/branch_list') }}" class="nav-link  @yield('branch_list')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Branch List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('vendor/hotel/manage_branch') }}" class="nav-link  @yield('create_branch')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Branch</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('manage_branch')" >
                    <a href="#" class="nav-link ">
                        <i class="fas fa-cog"></i>
                        <p>
                             Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('vendor/hotel/profile') }}" class="nav-link  @yield('profile')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('vendor/logout')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                {{-- <button type="button" style="width: 80%" class="btn bg-gradient-info btn-sm  btn-flat">Logout</button> --}}
                                <p>Logout All Session</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
