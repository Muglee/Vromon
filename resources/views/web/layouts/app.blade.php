<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Vromoon" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Vromoon || The Best online travel agency in Bangladesh</title>
  <link rel="icon" href="{{asset('web/assets/images/favicon.png')}}" type="image/png" sizes="16x16" />
  <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/animate.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/owl.carousel.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/owl.theme.default.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/meanmenu.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/jquery-ui.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/selectize.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/magnific-popup.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/icofont.min.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/flaticon.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset('web/assets/css/responsive.css')}}" type="text/css" media="all" />
  {{-- <link rel="stylesheet" href="{{asset('web/assets/css/all.css')}}" type="text/css" media="all" /> --}}
  <!-- Tempusdominus Bootstrap 4 -->
  {{-- 24 line comment out --}}
  <link rel="stylesheet" href="{{ asset('vendor_hotel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
  {{-- <link rel="stylesheet" href="{{asset('web/assets/css/tours.css')}}" type="text/css" media="all" /> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



</head>

<body>
  <div class=" preloader">
    <div class="preloader-wrapper">
      <div class="preloader-grid">
        <div class="preloader-grid-item preloader-grid-item-1"></div>
        <div class="preloader-grid-item preloader-grid-item-2"></div>
        <div class="preloader-grid-item preloader-grid-item-3"></div>
        <div class="preloader-grid-item preloader-grid-item-4"></div>
        <div class="preloader-grid-item preloader-grid-item-5"></div>
        <div class="preloader-grid-item preloader-grid-item-6"></div>
        <div class="preloader-grid-item preloader-grid-item-7"></div>
        <div class="preloader-grid-item preloader-grid-item-8"></div>
        <div class="preloader-grid-item preloader-grid-item-9"></div>
      </div>
    </div>
  </div>


  {{-- <div class="preloader">
        <div class="preloader-wrapper">
            <div class="preloader-grid">
                <div class="preloader-grid-item preloader-grid-item-1"></div>
                <div class="preloader-grid-item preloader-grid-item-2"></div>
                <div class="preloader-grid-item preloader-grid-item-3"></div>
                <div class="preloader-grid-item preloader-grid-item-4"></div>
                <div class="preloader-grid-item preloader-grid-item-5"></div>
                <div class="preloader-grid-item preloader-grid-item-6"></div>
                <div class="preloader-grid-item preloader-grid-item-7"></div>
                <div class="preloader-grid-item preloader-grid-item-8"></div>
                <div class="preloader-grid-item preloader-grid-item-9"></div>
                <div class="d-flex justify-content-center">

                    <img class="animation__shake" src="{{ asset('web/assets/images/favicon.png') }}" alt="vromoon">
  </div>
  </div>
  </div>
  </div> --}}
  {{--=======top-bar======--}}
  @include('web.layouts.topbar')
  {{--=======top-bar======--}}

  {{--=======content=======--}}
  @yield('content')
  {{--=======/content=======--}}

  {{--======footer======--}}
  @include('web.layouts.footer')
  {{--======/footer======--}}

  {{--======top-side-bar======--}}
  @include('web.layouts.top_side_bar')
  {{--======/top-side-bar======--}}


  <div class="scroll-top" id="scrolltop">
    <div class="scroll-top-inner">
      <i class="icofont-long-arrow-up"></i>
    </div>
  </div>

  @include('sweetalert::alert')

  <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{asset('web/assets/js/jquery-3.6.0.min.js')}}"></script>
  {{-- 100 line comment out --}}
  <script src="{{asset('web/assets/js/bootstrap.bundle.min.js')}}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}

  <script src="{{asset('web/assets/js/jquery-ui.js')}}"></script>

  <script src="{{asset('web/assets/js/selectize.min.js')}}"></script>

  <script src="{{asset('web/assets/js/jquery.magnific-popup.min.js')}}"></script>

  <script src="{{asset('web/assets/js/owl.carousel.min.js')}}"></script>

  <script src="{{asset('web/assets/js/jquery.ajaxchimp.min.js')}}"></script>

  <script src="{{asset('web/assets/js/form-validator.min.js')}}"></script>

  <script src="{{asset('web/assets/js/contact-form-script.js')}}"></script>

  <script src="{{asset('web/assets/js/jquery.meanmenu.min.js')}}"></script>

  <script src="{{asset('web/assets/js/script.js')}}"></script>
</body>

</html>