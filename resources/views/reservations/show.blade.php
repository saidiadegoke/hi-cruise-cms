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

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Customer</th>
								<td>{{ $reservation->name }}</td>
							</tr>
							<tr>
								<th>Package name</th>
								<td>{{$reservation->package? $reservation->package->name: 'N/a'}}</td>
							</tr>
							<tr>
								<th>Reservation Code</th>
								<td>{{ $reservation->reference }}</td>
							</tr>
							<tr>
								<th>Package description</th>
								<td>{!! $reservation->package? $reservation->package->description: 'N/a' !!}</td>
							</tr>
							<tr>
								<th>Date</th>
								<td>{{ date('d F, Y', strtotime($reservation->created_at)) }}</td>
							</tr>
							<tr>
								<th>Payment made</th>
								<td>{{ $reservation->payment? 'Yes': 'No' }}</td>
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