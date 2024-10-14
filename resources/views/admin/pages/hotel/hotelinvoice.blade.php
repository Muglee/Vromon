@extends('admin.layouts.app')
@section('title', 'Booked Rooms')
@section('booked_rooms', 'active')
@section('manage_room', 'menu-open')
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
    <div class="page-content fade-in-up print-seciton">
        <div class="row">
            <div class="col-md-12">

                <div class="ibox">
                    <div class="ibox-head">
                        {{-- <div class="ibox-title"><b>Purchase Order:</b> </div> --}}
                         <div class="ibox-tools"><b>Invoice No.:#3445434543 </b>
                        </div>
                    </div>
                    <div class="ibox-body">

                        <div class="col-xl-12">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th>Room Details</th>
                                        <th>Guest Details</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Branch Name: {{ $result['branch']['branch_name'] }}


                                        </td>
                                        <td>Persons : {{ $decoded_no_of_person['no_of_kids'] }} +
                                            {{ $decoded_no_of_person['no_of_guest'] }} +
                                            {{ $decoded_no_of_person['no_of_adult'] }} </td>
                                        <td>Name : {{ $result['result'][0]->name }}</td>
                                        <td>Check In:{{ $result['result'][0]->check_in }}</td>
                                        <td>Check Out:{{ $result['result'][0]->check_out }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>

                                            Adult : {{ $decoded_no_of_person['no_of_adult'] }}
                                            @foreach ($result as $key => $data)
                                                @php
                                                    // $no_of_person = json_decode($data->no_of_person);
                                                @endphp
                                            @endforeach
                                        </td>
                                        <td>Email:{{ $result['result'][0]->email }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>kids:{{ $decoded_no_of_person['no_of_kids'] }}</td>
                                        <td>Phone:{{ $result['result'][0]->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Guest: {{ $decoded_no_of_person['no_of_guest'] }}</td>
                                        <td>Nid:{{ $result['result'][0]->nid_number }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Beds: {{ $decoded_bed_distribution['no_of_single_bed'] }} +
                                            {{ $decoded_bed_distribution['no_of_double_bed'] }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Singels:{{ $decoded_bed_distribution['no_of_single_bed'] }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Double: {{ $decoded_bed_distribution['no_of_double_bed'] }}</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="col-xl-12 mt-1 text-justify">
                            <p class="font-size-14">Dear Concern, <br>
                                This purchase order is subject to Vromoon.Thank you for doing business with us.</p>
                        </div>
                        <div class="col-xl-12 mt-1">
                            <h5 class="font-strong"> <u>Item details:</u></h5>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name : {{ $result['result'][0]->room_name }}</th>
                                        <th class="text-center">Unit Price :{{ $result['result'][0]->room_price }}</th>
                                        <th class="text-center">Quantity : {{ $result['result'][0]->room_type }}</th>

                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td></td>
                                        <td> <br><small></small> </td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-right"></td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">PAYABLE
                                            :{{ $result['result'][0]->room_price }}</td>
                                        <td class="text-right"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">PAID
                                            :{{ $result['result'][0]->paid_amount }}</td>
                                        <td class="text-right"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">DUE :</td>
                                        <td class="text-right"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">TOTAL AMOUNT :
                                            {{ $result['result'][0]->room_price }}</td>
                                        <td class="text-right"> </td>
                                    </tr>
                                    {{-- <tr>
                                    <td colspan="4" class="text-right">TOTAL VAT:</td>
                                    <td class="text-right"> </td>
                                </tr> --}}
                                    {{-- <tr>
                                    <td colspan="4" class="text-right">SERVICE & OTEHRS CHARGE:</td>
                                    <td class="text-right"> </td>
                                </tr> --}}
                                    <tr>
                                        <th colspan="4" class="text-right">GRAND TOTAL
                                            :{{ $result['result'][0]->room_price }}</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-xl-12 mt-5">

                            <h6 class="font-strong">Conditions/Notes : Lorem ipsum dolor sit amet, consetetur sadipscing
                                elitr,
                                sed diam nonumy eirmod temp or invidunt ut labore et dolore magna aliquyam erat,
                                sed diam voluptua.
                                At vero eos et accusam et justo duo dolores et ea rebum.</h6>

                            <br>

                        </div>
                        
                        <div class="row no-print">
                            
                                <div class="col-xl-12 mt-3 pt-5 mb-5">
                                    <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                Prepared by <br>
                                                <b> </b> <br>
                                                <br>
                                                Vromoon
                                            </div>
                                            <div class="col-2">
                                                <a onclick="return window.print()" rel="noopener" target="_blank"
                                                    class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                            </div>
                                            <div class="col-5 text-right">
                                                Checked by <br>
                                                <b></b> <br>
                                                <br>
                                                Vromoon
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                window.print();
            });
        </script>
    @endpush
@endsection
