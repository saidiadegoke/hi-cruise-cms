<div>
@if($reservation) 
	@if($reservation->payment)
		@if($reservation->payment->status == 1)
			Paid
		@else
			@if($reservation->payment->payable_type == "App\\Models\\Offline")
				{{ $reservation->payment->payable && $reservation->payment->payable->status == 1? 'Paid': 'Awaiting approval' }}
			@else
				<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a> / @include('cruise.includes._paystack_form')
			@endif

		@endif

	@else
		<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a> / @include('cruise.includes._paystack_form')
	@endif
@else
<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a> / @include('cruise.includes._paystack_form')
@endif
</div>