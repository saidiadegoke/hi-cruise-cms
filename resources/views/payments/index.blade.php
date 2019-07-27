@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Payments
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($payments) > 0)
                            @foreach($payments as $payment)
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Customer: {{$payment->reservation->name}}
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Package: {{$payment->reservation && $payment->reservation->package? $payment->reservation->package->name: 'N/a'}}
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Date:</span>
                                            <span class="kt-font-info">{{ date('d F, Y', strtotime($payment->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Amount: {!! "&#8358; " . number_format($payment->amount, 2) !!}
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Status: {{ $payment->status == 1? 'Successful': 'Failed' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__sales"><a href="{{ route('payments.show', ['payment' => $payment->id]) }}">view</a></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <p class="lead">No payment found. <a href="{{ route('payments.create') }}">Click here</a> to create payments</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $payments->links() }}
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection