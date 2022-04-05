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
						Ticket detail
					</h3>
					<p class="">
						<a class="btn btn-default" href="{{ route('tickets.export', ['reservation' => $reservation->id]) }}">Export to PDF</a>
					</p>
				</div>
			</div>

			<!--begin::Form-->
			
				<div class="kt-portlet__body">

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
								<th>Scanned at</th>
								<td>{{ $reservation->payment? date('d M, Y H:i A', strtotime($reservation->payment->updated_at)): 'N/A' }}</td>
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
							
						</table>
						
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection