@extends('layouts.admin')
@section("content_header")

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Payment detail
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('payments.store') }}">
				@csrf
				<div class="kt-portlet__body">

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Customer</th>
								<td>{{ $payment->reservation? $payment->reservation->name: '' }}</td>
							</tr>
							<tr>
								<th>Package name</th>
								<td>{{$payment->reservation && $payment->reservation->package? $payment->reservation->package->name: 'N/a'}}</td>
							</tr>
							<tr>
								<th>Package name</th>
								<td>{!! $payment->reservation && $payment->reservation->package? $payment->reservation->package->description: 'N/a' !!}</td>
							</tr>
							<tr>
								<th>Amount</th>
								<td>{!! "&#8358; " . number_format($payment->amount, 2) !!}</td>
							</tr>
							<tr>
								<th>Date</th>
								<td>{{ date('d F, Y', strtotime($payment->created_at)) }}</td>
							</tr>
							<tr>
								<th>Status</th>
								<td>{{ $payment->status == 1? 'Successful': 'Failed' }}</td>
							</tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('payments.edit', ['payment' => $payment->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('payments.destroy', ['payment' => $payment->id]) }}" class="btn btn-danger"
							onclick="payment.prpaymentDefault();
                                                      if(confirm('Continue with deleting the payment?')){document.getElementById('delete-payment').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the payment?');" id="delete-payment" action="{{ route('payments.destroy', ['payment' => $payment->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection