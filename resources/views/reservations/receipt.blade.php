<div class="row">

	<div class="col-md-4 col-md-offset-4" style="border: 1px solid #fff">
		<div class="container">
			<div class="receipt-wrapper">
		<p class="logo"><img src="{{ asset('public/assets/img/logo.png') }}"></p>
		<h4>Electronic ticket | 0818 8245 734</h4>
		<p class="text-center">www.hi-impactcruise.com</p>
		
			<div class="container text-center">
    {!! QrCode::size(120)->margin(0)->generate($booking->reference) !!}
    <p>FLASH PASS</p>

    <div class="table">
    	<div class="row">
    		<div class="col-md-7">
    			<small>Cruise Date</small>
    			<big>{!! date('l, jS M Y', strtotime($booking->start_date)) !!}</big>
    		</div>
    		<div class="col-md-5">
    			<small>Time</small>
    			<big>{{ $booking->session == 'day'? '11:00 AM': '5:00 PM' }}</big>
    		</div>
    	</div>
    	<div class="row color-gold">
    		<div class="col-md-7">
    			<small>Port of departure</small>
    			<big>Marina, Lagos</big>
    		</div>
    		<div class="col-md-5">
    			<small>Time</small>
    			<big>9:00 AM</big>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-7">
    			<small>{{ ucwords($booking->name) }}</small>
    			<big>{{ $booking->phone }}</big>
    		</div>
    		<div class="col-md-5">
    			<small>No of seats</small>
    			<big>{{ $booking->seats }}</big>
    		</div>
    	</div>
    </div>

    <div style="overflow: hidden; margin: 2em auto; width: 150px;">
        <div style="background-color: #fff; width: 100%;">{!! DNS1D::getBarcodeHTML($booking->reference, "C128", 1.2) !!}</div>
    </div>
    <p>Upon purchasing a ticket, the Hi-Impact Cruise ticket holder is insured.</p>
<p>Bring this ticket printed on a paper or as saved image at your smart phone screen</p>

</div>
		</div>
	</div>

</div>

</div>

<div class="receipt-footer">
<div class="btn-group" role="group" aria-label="Button group">
            <a href="{{route('reservations', ['customer'=> auth()->user()? auth()->user()->id: '']) }}" class="btn btn-secondary">View Reservations</a>
            <a href="{{route('print_receipt',['reservation' => $reservation]) }}" class="btn btn-secondary">Print Receipt</a>
        </div>
    </div>

