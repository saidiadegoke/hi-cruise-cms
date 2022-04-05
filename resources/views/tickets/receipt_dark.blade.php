<style>
.text-dark {
    color: black;
}
</style>

<div class="row">

	<div class="col-md-4 col-md-offset-4">
		<div class="container" style="background-color: white">
			<div class="receipt-wrapper">
		<p class="logo"><img src="{{ asset('public/assets/img/logo.png') }}"></p>
		<h4 class="text-dark">Electronic ticket | 0818 8245 734</h4>
		<p class="text-center text-dark">www.hi-impactcruise.com</p>
		
			<div class="container text-center">
    {!! QrCode::size(120)->margin(0)->generate($booking->reference) !!}
    <p>FLASH PASS</p>

    <div class="table text-dark">
    	<div class="row">
    		<div class="col-md-7">
    			<small>Cruise Date</small>
    			<big>{!! date('l, jS M Y', strtotime($booking->start_date)) !!}</big>
    		</div>
    		<div class="col-md-5">
    			<small>Cruise Time</small>
    			<big>{{ ucfirst($booking->session) }}</big>
    		</div>
    	</div>
    	<div class="row color-gold">
    		<div class="col-md-7">
    			<small>Port of departure</small>
    			<big>Marina, Lagos</big>
    		</div>
    		<div class="col-md-5">
    			<small>Time</small>
    			<big>{{ $booking->session == 'day'? '11:00 AM': '4:00 PM' }}</big>
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
        <div class="row">
            <div class="col-md-7">
                <small>Package</small>
                <big>{{ $booking->package? $booking->package->name: 'N/a' }}</big>
            </div>
            <div class="col-md-5">
                <small>Ticket value</small>
                <big>{!! $booking->amount? "&#8358; " . number_format(doubleval($booking->amount), 2): 'N/a' !!}</big>
            </div>
        </div>
    </div>

    <div style="overflow: hidden; margin: 2em auto; width: 150px;">
        <div style="background-color: #fff; width: 100%;">{!! DNS1D::getBarcodeHTML($booking->reference, "C128", 1.2) !!}</div>
    </div>
    <p class="text-dark">Upon purchasing a ticket, the Hi-Impact Cruise ticket holder is insured.</p>
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

