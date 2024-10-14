@extends('agent.layouts.app')
@section('title', 'Passenger Details')
@section('booking', 'menu-open')
@section('flight_booking', 'active')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">



                        <form   method="get" action="{{ route('agent.FlightAirRetrive') }}" enctype="multipart/form-data">





                                <div class="col-md-4 p-2 m-2">
                                    <button type="submit" class="btn btn-primary">Continue</button>
                                </div>


                        </div>

                        </form>
                    </div>
                </div>


    </section>



@endsection


<script type="text/javascript">
    window.onbeforeunload = function() {
        return "Are you sure you want to leave?";
    }
</script>

