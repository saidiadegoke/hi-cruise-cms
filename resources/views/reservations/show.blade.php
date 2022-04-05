@extends('layouts.admin')
@section("content_header")

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label" style="width: 100%;display: flex; justify-content: space-between;">
					<h3 class="kt-portlet__head-title">
						Reservation detail
					</h3>
					<p class="">
						<a class="btn btn-default" href="{{ route('bookings.export_pdf', ['reservation' => $reservation->id]) }}">Export to PDF</a>
					</p>
				</div>
			</div>

			<!--begin::Form-->
			
				<div class="kt-portlet__body">
					@if(session()->has('sendMail'))
						<div class="alert alert-info">{{session("sendMail")}}</div>
					@endif

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Customer</th>
								<td>{{ $reservation->name }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $reservation->email }}</td>
							</tr>
							<tr>
								<th>Phone</th>
								<td>{{ $reservation->phone }}</td>
							</tr>
							<tr>
								<th>Package name</th>
								<td>{{$reservation->package? $reservation->package->name: 'N/a'}}</td>
							</tr>
							<tr>
								<th>Reservation code</th>
								<td>{{ $reservation->reference }}</td>
							</tr>
							<tr>
								<th>Package description</th>
								<td>{!! $reservation->package? $reservation->package->description: 'N/a' !!}</td>
							</tr>
							<tr>
								<th>Paid at</th>
								<td>{{ $reservation->payment? date('d M, Y H:i A', strtotime($reservation->payment->created_at)): 'N/A' }}</td>
							</tr>
							<tr>
								<th>Cruise date</th>
								<td>{{ date('d F, Y', strtotime($reservation->start_date)) }}</td>
							</tr>
							<tr>
								<th>Cruise time</th>
								<td>{{ ucfirst($reservation->session) }}</td>
							</tr>
							<tr>
								<th>Payment made</th>
								<td>{{ $reservation->payment? 'Yes': 'No' }}</td>
							</tr>
							<tr>
								<th>Amount {!! $reservation->payment && $reservation->payment && $reservation->payment->status == 1 && $reservation->amount? "paid": 'to pay' !!} </th>
								<td>{!! $reservation->amount? "&#8358; " . number_format(doubleval($reservation->amount), 2): 'N/a' !!}</td>
							</tr>
							<tr>
								<th>Actions</th>
								<td><div>
@if($reservation) 
	@if($reservation->payment)
		@if($reservation->payment->status == 1)
			Paid
			<form method="POST" action="{{ route('reservation.sendMail') }}">
					@csrf
					<input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
					<input type="hidden" name="payable_id" value="{{ $reservation->payment->payable_id }}">
					<button type="submit" class="btn btn-success btn-sm">Send Mail</button>
				</form>
			@elseif($reservation->payment->payable && $reservation->payment->payable->status == 1)
					Paid
					<form method="POST" action="{{ route('reservation.sendMail') }}">
					@csrf
					<input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
					<input type="hidden" name="payable_id" value="{{ $reservation->payment->payable_id }}">
					<button type="submit" class="btn btn-success btn-sm">Send Mail</button>
				</form>
		@else
			@if($reservation->payment->payable_type == "App\\Models\\Offline")
				@if($reservation->payment->payable && $reservation->payment->payable->status == 2)
				<form method="POST" action="{{ route('offlines.approve') }}">
					@csrf
					<input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
					<input type="hidden" name="payable_id" value="{{ $reservation->payment->payable_id }}">
					<button type="submit" class="btn btn-success btn-sm">Approve</button>
				</form>
				@elseif($reservation->payment->payable && $reservation->payment->payable->status == 1)
					Paid
					<form method="POST" action="{{ route('reservation.sendMail') }}">
					@csrf
					<input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
					<input type="hidden" name="payable_id" value="{{ $reservation->payment->payable_id }}">
					<button type="submit" class="btn btn-success btn-sm">Send Mail</button>
				</form>
				@else
					<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a>
				@endif
			@else
				@include('cruise.includes._paystack_form')
			@endif

		@endif

	@else
		<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a> / @include('cruise.includes._paystack_form')
	@endif
@else
<a class="btn btn-success btn-sm" href="{{ route('offlines.submitted', ['id' => $reservation->id, 'mode' => 'offline']) }}">Pay Offline</a> / @include('cruise.includes._paystack_form')
@endif
</div>
</td>
							</tr>
						</table>
						
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection