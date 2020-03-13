<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css" media="all">
.receipt-wrapper {
	display: block;
	padding: 20px 0;
	width: 100%;
}

.receipt-wrapper .table {
	margin-top: 20px;
	width: 100%;
	margin-bottom: 20px;
}

.receipt-wrapper .logo {
	height: auto; 
	width: 250px;
	margin: auto;
}

.receipt-wrapper .logo img {
	height: auto;
	width: 100%;
}

.receipt-wrapper .table td small, .receipt-wrapper .table td big {
	text-align: left;
	display: block;
	font-size: 9px;
}

.receipt-wrapper .table td big {
	font-size: 12px;
	white-space: nowrap;
	font-weight: 600;
}

.receipt-wrapper .table td {
    padding-bottom: 10px;
    padding-top: 10px;
}

.receipt-wrapper .table tr {
	background-color: #efefef;
	border-bottom: 1px solid #efefef;
	margin-bottom: 10px;
}

.receipt-wrapper p {
    margin: 0 0 0;
    font-size: 9px;
}

.receipt-wrapper h4 {
	margin: 0 0 0 0;
	font-size: 14px;
	font-weight: 600;
	margin-bottom: 20px;
	text-align: center;
	text-transform: uppercase;
}

.receipt-wrapper h4:after {
	display: none;
}

.color-gold {
	color: #e0ae63;
}

.receipt-footer {
	display: block;
	text-align: center;
	margin: 20px;
}
.receipt-wrapper .row, .row {
    padding: 0px;
    margin: 0px;
    clear: both;
    width: 100%;
    display: block;
}
.col-md-offset-4 {
    margin-left: 25%;
}
.col-md-4 {
    width: 50%;
}
.col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
    float: left;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
div.container {
    width: 90%;
    margin: 0% 5%;
    float: left;
    display: block;
    position: relative;
    /*z-index: 999;*/
}
.text-center {
    text-align: center;
}
.btn-group, .btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}
div.col-md-7 {
    padding: 0px;
    margin: 0px;
}
.col-md-7 {
    width: 58.33333333%;
}
.btn-group-vertical > .btn-group::after, .btn-group-vertical > .btn-group::before, .btn-toolbar::after, .btn-toolbar::before, .clearfix::after, .clearfix::before, .container-fluid::after, .container-fluid::before, .container::after, .container::before, .dl-horizontal dd::after, .dl-horizontal dd::before, .form-horizontal .form-group::after, .form-horizontal .form-group::before, .modal-footer::after, .modal-footer::before, .nav::after, .nav::before, .navbar-collapse::after, .navbar-collapse::before, .navbar-header::after, .navbar-header::before, .navbar::after, .navbar::before, .pager::after, .pager::before, .panel-body::after, .panel-body::before, .row::after, .row::before {
    display: table;
    content: " ";
}
.col-md-5 {
    width: 41.66666667%;
}
</style>
</head>

<body>
    
    <div class="row">

	<div class="col-md-4 col-md-offset-4">
		<div class="container" style="border: 1px solid #e0ae63; float: left; width: 100%; clear: both;">
			<div class="receipt-wrapper">
		<p class="logo"><img src="{{ asset('public/assets/img/logo.png') }}"></p>
		<h4>Electronic ticket | 0818 8245 734</h4>
		<p class="text-center">www.hi-impactcruise.com</p>
		
			<div class="container1 text-center">
			    <p class="qrcode"><img src="{{ asset($qrpath) }}"></p>
			    
			    <p>FLASH PASS</p>

			

			<table class="table">
    	<tr class="ro">
    		<td class="col-md-7">
    			<small>Cruise Date</small>
    			<big>{!! date('l, jS M Y', strtotime($reservation->start_date)) !!}</big>
    		</td>
    		<td class="col-md-5">
    			<small>Cruise Time</small>
    			<big>{{ ucfirst($reservation->session) }}</big>
    		</td>
    	</tr>
    	<tr class="ro color-gold">
    		<td class="col-md-7">
    			<small>Port of departure</small>
    			<big>Marina, Lagos</big>
    		</td>
    		<td class="col-md-5">
    			<small>Time</small>
    			<big>{{ $reservation->session == 'day'? '11:00 AM': '5:00 PM' }}</big>
    		</td>
    	</tr>
    	<tr class="ro">
    		<td class="col-md-7">
    			<small>{{ ucwords($reservation->name) }}</small>
    			<big>{{ $reservation->phone }}</big>
    		</td>
    		<td class="col-md-5">
    			<small>No of seats</small>
    			<big>{{ $reservation->seats }}</big>
    		</td>
    	</tr>
    </table>

    <div style="overflow: hidden; margin: 2em auto; width: 160px;">
        <div style="background-color: #fff; width: 100%; text-align: center;">{!! DNS1D::getBarcodeHTML($reservation->reference, "C128", 1.2) !!}</div>
    </div>
<p>Upon purchasing a ticket, the Hi-Impact Cruise ticket holder is insured.</p>
<p>Bring this ticket printed on a paper or as saved image at your smart phone screen</p>
		
	</div>
</div>
</div>
</div>
</div>

</body>

</html>

<!--div class="container">

    <h1>This would hold the receipt </h1>
    
    <div>Amount Paid: {{$payment->pluck('amount')->first()}}</div>
    <div>Payment Reference Code : {{$payment->pluck('reference')->first()}} </div>
    <div>Payment Date: {{$payment->pluck('created_at')->first()}}</div>
    <div>No Of Seats : {{$reservation->pluck('seats')->first()}}</div>
    <div>Booked For: {{$reservation->pluck('start_date')->first()}}</div>




    </div-->