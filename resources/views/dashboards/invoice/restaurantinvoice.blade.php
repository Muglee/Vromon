    @extends('dashboards.restaurant_reservation.layouts.app')
    @section('title', 'Resturant Invoice')
    @section('food_menu', 'menu-open')
    @section('meals', 'active')

    @push('styles')
    <style>
        @media print {

            /*  .pagebreak { page-break-before: always; } /* page-break-after works, as well */
            /* .print-seciton { margin-top: 50px; } */
            .preloader-backdrop {
                display: none
            }

            .font-size-14 {
                font-size: 14px;
            }
        }
    </style>
    @endpush

    @section('content')


    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    </ol>
    </div>
    </div>
    </div>
    </section>
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="invoice p-3 mb-3">
    <div class="row">
    <div class="col-12">
    <h4>
    <i class="fas fa-globe"></i> Vromoon, Inc.
    <small class="float-right">Date:{{\Carbon\Carbon::now()->format('Y-m-d')}} </small>
    {{-- <strong>Auction close at: </strong>{{\Carbon\Carbon::createFromFormat('m/d/Y', $article->auction_end)}}<br> --}}

    </h4>
    </div>

    </div>

    <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
    <address>
    <strong>name: {{$get_restaurant['first_name']}} {{$get_restaurant['last_name']}}</strong><br>
    Table Booked: {{$get_restaurant['is_booked']}}<br>
    Booked Table: {{$get_restaurant['selected_tables']}}<br>
    Phone: {{$get_restaurant['phone_no']}}<br>
    Email: {{$get_restaurant['email']}}
    </address>
    </div>




    <div class="col-sm-4 invoice-col">
    <b>Invoice #007612</b><br>
    <br>
    <b>Order ID:</b> 4F3S8J<br>
    <b>Check In: {{$get_restaurant['checking_date']}}
    </div>

    </div>


    <div class="row">
    <div class="col-12 table-responsive">
    <table class="table table-striped">
    <thead>
    <tr>
    <th>Qty</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Description</th>
    <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>

    {{$total_amount=0;}}
        @foreach ($all_items as $item)
            

            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item['item_name']}}</td>
            <td>{{$item['is_status_active']}}</td>
            <td>{{$item['id']}}</td>
            <td>{{$item['item_price']}}</td>
            <td hidden>{{$total_amount+=$item['item_price']}}</td>
            </tr>
        @endforeach

    </tbody>
    </table>
    </div>

    </div>

    <div class="row">

    <div class="col-6">
    <p class="lead">Payment Methods:</p>
    <img src="../../dist/img/credit/visa.png" alt="Visa">
    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
    <img src="../../dist/img/credit/american-express.png" alt="American Express">
    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
    </div>

    <div class="col-6">
    <p class="lead">Amount</p>
    <div class="table-responsive">
    <table class="table">
    <tr>
    <th style="width:50%">Subtotal:</th>
    <td>{{$item['item_price']}}</td>
    </tr>
    <tr>
    <th>Tax (5%)</th>
    <td>$10.34</td>
    </tr>
    <tr>
    <th>Shipping:</th>
    <td>$5.80</td>
    </tr>
    <tr>
    <th>Total:</th>
    <td>{{$total_amount}}</td>
    </tr>
    </table>
    </div>
    </div>

    </div>


    <div class="row no-print">
    <div class="col-12">

    <a onclick="return window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
    Payment
    </button>
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
    <i class="fas fa-download"></i> Generate PDF Ctrl+p
    </button>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </section>

    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>

    </div>


    {{-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="../../dist/js/demo.js"></script> --}}
    </body>
    </html>


    @push('scripts')
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
    @endpush
    @endsection