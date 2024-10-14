@extends('web.layouts.app')
@section('title', 'Booking Success')
@section('booking', 'menu-open')
@section('flight_booking', 'active')
@section('content')


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Vromoon || The Best online travel agency in Bangladesh</title>
	<link href="https://secure.vromoon.com/uploads/Favicon(32x32)-01-01.png" rel="shortcut icon" type="image/png">
	<link href="https://secure.vromoon.com/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://secure.vromoon.com/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans|Roboto+Condensed" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link href="https://fonts.googleapis.com/css?family=Oswald|Rancho" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed" rel="stylesheet"> -->
	<style>
	.mmp{
	    color: #e51010;
    font-size: 16px;
	}
	body{
		font-family: 'Open Sans', sans-serif;
		padding-bottom:25px;
		font-size:14px;
	}
	.header{
		background-color:#F0F0F0 !important;
		border-bottom:2px solid #D0D0D0 !important;
	}
	h1{
		color:#DC143C;
		font-weight:bold;
		font-size: 56px;
		font-family: 'Libre Baskerville', serif;
	}
	.run-1{
		margin-left:35px;
	}

	.run{;
    margin-left: 0%;
	}
	ul li{
		list-style-type:none;
		padding:0px;
		display: inline-block;
	}
	table{
		border:1px solid #D4D4D4;
		/*border-spacing: 15px;*/
		box-shadow: 0px 0px 30px rgba(69, 101, 173, 0.1);
	}

	table, th, td {
		padding:5px;
	}
	th{
		/*border-bottom:1px dotted black;*/
		padding:10px 20px 10px 10px;
		font-size:20px;
		color:#929292;
		font-weight:normal;
	}
	th strong{
		color:#000;
	}
	td{
		padding: 4px 4px 4px 20px;
		font-size:12px;
		vertical-align: top;
	}
	.plug{
		margin:0px;
	}
	.modal-dialog {
            top: 415px;
	    right: 0px;
	    bottom: 0;
	    left: -16px;
	    z-index: 29747;
	    overflow: auto;
        }
    .full{
        font-size: 16px;
        cursor: pointer;
        width: 30% !important;
        border: 1px solid #c1bbbb;
        padding: 1px 20px;
        background: #ececec;
        height: 42px;
    }
    .process{
        margin: -5px 0 0 10px;
        font-size: 16px !important;
    }
    .reqbtn{
            box-shadow: 9px -6px 7px #00000096;
    border-radius: 3px;
     border:0px;
     background: #13a71f;
    }
    .reccenl{
            box-shadow: 9px -6px 7px #00000096;
    border-radius: 3px;
    background:#d81515eb;
    border:0px;
    }
    .regacc{
           box-shadow: 0px 2px 3px #00000096;
    border-radius: 3px;
    background:green;
    border:0px; 
    }
    .plug {
        background:#eee;
    }
    .plug2{
            border: 1px solid #a0a2a2;
    box-shadow: 1px 3px 5px #0000000d;
    }
	</style>
</head>
<body>
<div class="container" id="dpdfs">
       
	<div class="row" id="printableArea">
		<div class="col-sm-12" style="border-style: ridge; margin-top: 10px;">
			<div class="header">
				<div class="row">
					<div class="col-sm-12" style="width:100%;">
										  <div class="run-1" style="width:45%;"><img src="https://secure.vromoon.com/uploads/coplogo.jpeg" style="margin: 10px 0 10px 0; width:50%;height:160px;"></div>
						<div style="width: 40%;margin-left: 57%;position: absolute;margin-top: -60px;">
						   <div class="run"><h4 style=" margin-left: 52px;">Vromoon</h4></div>
						   <ul>
						       <li><i class="fa fa-home" aria-hidden="true"></i> 82/03 Sher-E-Bangla Road (2nd floor) (Amtola More), Khulna-91000.</li>
							</ul>
						   </div>
					      </div>
						</div>
			            </div>
						 <div class="row plug">
			            
				        <div class="col-sm-offset-3 col-sm-3" style="margin-left: 10%;">
						<form action="https://secure.vromoon.com/flights/do_hub_book_and_pay_later" method="post">
                        <input type="hidden" name="request_for" value="Order" />
                        <button type="submit" class="btn btn-info btn-lg reqbtn" style="margin: 6px 0 6px 5px;">Issue Ticket</button>
                    </form>
                	</div>
					<div class="col-sm-3">
        			<form action="" method="post">
                    <input type="hidden" name="request_for" value="Cancel" />
                        <button type="submit" class="btn btn-info btn-lg reccenl" style="margin: 6px 0 0 20px;">Cancel Ticket</button>
                        </form>
        			</div>
			</div>
					
				<div class="row plug plug2 col-sm-12">
				<div class="col-sm-2">
				<h4 style="font-size: 14px;">FLIGHT E-TICKET</h4>
				</div>
				<div class="col-sm-4">
				<h4 style="font-size: 14px;">Booking Ref: {{isset($get_ticket->status)}}</h4>
				</div>
				<div class="col-sm-4">
				<h4 style="font-size: 14px;">Issue Date: {{isset($get_ticket->date)}} | PNR: <b>{{isset($get_ticket->pnr)}}</b></h4>
				</div>
			</div>
				<div class="row">
				<div class="col-sm-12">
					<table style="width:100%; border-collapse: inherit !important;">
					  <tr style="background-color:#7de4ff;">
						<th colspan="6">
							<strong></strong>
							<i class="fa fa-fighter-jet"></i>
							<strong></strong>
																	
						</th>
					  </tr>
					  <tr>
						<td>AIRLINE</td>
						<td>DEPARTURE</td>
						<td>ARRIVAL</td>
						<td>DURATION</td>
						<td>FLIGHT No.</td>
						<td>AIRCRAFT</td>
					  </tr>
					  <tr style="background-color: #e4fcff;">
						<td>
						<img class="middle-item" alt="" src="https://secure.vromoon.com/images/airlines/BG.jpg">
						</td>
						<td>{{isset($get_ticket->origin)}}						
						<br />{{$get_ticket->departure_time}}<br/>21:00Hrs<br />
						</td>
			            <td>{{isset($get_ticket->destination)}}</strong>
						<br />{{isset($get_ticket->arrival_time)}}<br />21:45Hrs<br />
						</td>
						
						<td>{{isset($get_ticket->duration)}}</td>
						
						<td>{{isset($get_ticket->flight_no)}}</td>
						
						<td>{{isset($get_ticket->aircraft)}}</td>
						
					  </tr>
					  <tr>
                        <td>
                        {{$get_ticket->airline}} </td>
						<td>(Terminal : )</td>
						<td>(Terminal : )</td>
						<td>{{isset($get_ticket->class)}}</td>
						<td style="margin-left:12%; font-size:12px; width:100px;">Airline Ref : </td>
				        <td>KQQBNM</td></tr>
				</table>
			</div>
			</div><br />
						
			<div class="row">
				<div class="col-sm-12">
					<table style="width:100%">
						<tr style="background-color:#7de4ff;">
						<th colspan="6">PASSENGERS DETAILS</th>
					</tr>
						  <tr>
							<td>NAME</td>
							<td>DESTINATION</td>
						    <td>Ticket No</td>
							<td>MEALS</td>
							<td>BAGGAGE</td>
							<td>SEAT</td>
						  </tr>
						  		<tr style='background-color:#e4fcff;'>
								<td>{{$get_ticket->f_name}}	 {{$get_ticket->l_name}}(Adult)</td>
								<td>DAC <i class="fa fa-fighter-jet"></i> CGP																</td>
								<td> HOLD TICKET</td>
                                <td>NA</td>
                                <td>{{$get_ticket->baggage}}</td>
                                <td>NA</td>
					
							</tr>
						        
				</table>
				</div>
			  </div><br/>
			  <!-------------------->
			  	<div class="row">
	    
	    <div class="col-xs-6" style="margin-left: 25px;">
	        <span><a href="javascript:void(0);" onClick="dis();" id="a1">P</a><a href="javascript:void(0);" onClick="hid();" id="a2" style="display:none;">H</a></span>
    	   	<table  id="tf1" style="display:none;">
    	       <tr>
    	           <td>Base Fare</td>
    	           <td>Tax</td>
    	           <td>Other Charge</td>
    	           <td>Total Fare</td>
    	       </tr>
    	       <tr>
    	           <td><span style="background-color: #f0f0f0; font-weight: 600;">BDT 5275</span></td>
    	           <td><span style="background-color: #f0f0f0; font-weight: 600;">BDT 725</span></td>
    	           <td><span style="background-color: #f0f0f0; font-weight: 600;">BDT 0</span></td>
    	           <td><span style="background-color: #f0f0f0; font-weight: 600;">BDT 6,000.00</span></td>
    	       </tr>
    	   </table>
	    </div>
	</div>
	<div class="row">
	  <div class="col-sm-12">
	     <table style="width:100%;">
		<tr><br/><br/>
		    <p><b>This is an Electronic ticket. Please carry a positive identification for Check in.<span class="mmp">Ticket Expair DateTime: 24-07-2022 20:07:45</span></b></p>
		</tr>
		<tr>
		    <p style="font-size: 12px;">Note :- Carriage and other services provided by the carrier are subject to conditions of carriage which hereby incorporated by reference. These conditions may be obtained from the issuing carrier. If the passengers journey involves an ultimate destination or stop in a country other than country of departure the Warsaw convention may be applicable and the convention governs and in most cases limits the liability of carriers for death or personal injury and in respect of loss of or damage to baggage.</p>
		</tr>
	   </table>
          </div>
	 </div><br />			  
			  <!------------------------------>
			</div>
		</div>
<div class="container">
        <div class="row" style="margin: 0 -15px 0 -43px;">
				<div class="col-sm-12">				   
					<table style="width:100%">
						  <tr style="background-color:#fff;">
							<td style="width: 18%;">
							<a href="#" target="_blank" onclick="printDiv('printableArea')"><button type="button" name="hold" class="btn btn-info btn-lg">Print E-Ticket</button></a></td>
							
                    							<td style="width: 20%;">
					<!--<a href="https://secure.vromoon.com/flights_dwn/download_pdf/1002" target="_blank"><button type="button" name="invoice" class="btn btn-info btn-lg">Download PDF</button></a>-->
					<div id="editors"></div>
                    <!--<button id="cmds" class="btn btn-info btn-lg">Download PDF</button>-->
                    <!--<a href="https://secure.vromoon.com/flights/download_pdf/1002" target="_blank"><button type="button" name="invoice" class="btn btn-info btn-lg">Download PDF</button></a>-->
					</td>
												<!--<td>
				<a href="javascript:void(0);"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">E-Mail Ticket</button></a>
							</td>-->
						</tr>
					     </table>
				        </div>
				</div>
				<div class="modal fade" id="myModal" role="dialog">
				
			
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width: 41%;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Enter Email Address</h4>
				        </div>
				        <div class="modal-body">
				        <form method="post" name="modal_form" action="https://secure.vromoon.com/flights/m_email/1002">
				        <input type="text" name="to_mail" id="to_mail"/>
				    </form>
				       </div><!--modal_body--->
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" onClick="submitForm()" id="send">Send Email</button>
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				          
				      </div>				      
				    </div>
				   
				  </div>
		</div>
		
<script>


function dis(){
document.getElementById("tf1").style.display="block";
document.getElementById("a1").style.display="none";
document.getElementById("a2").style.display="block";
}
function hid(){
document.getElementById("tf1").style.display="none";
document.getElementById("a1").style.display="block";
document.getElementById("a2").style.display="none";
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

function submitForm(){
var email=$("#to_mail").val();
if(email == ""){
alert("Please enter Your mail");
$("#to_mail").focus();
return false;
}
else{
$.ajax({
type: "POST",
url: 'https://secure.vromoon.com/flights/m_email',
data: 'to_email='+email,
beforeSend:function(){
$("#send").attr("disabled","disabled");
},
success:function(msg){
alert(msg);
}

});

}

}
</script>
<!--<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script>
   var doc = new jsPDF('p','pt','a4');
   
var specialElementHandlers = {
    '#editors': function (element, renderer) {
        return true;
    }
};

$('#cmds').click(function () {
    doc.fromHTML($('#dpdfs')[0], 15, 15, {
	'width': 624, 
	'elementHandlers': specialElementHandlers
    });
    doc.save('E-Ticket.pdf');
});
</script>
</body>
</html>
</section>
@endsection