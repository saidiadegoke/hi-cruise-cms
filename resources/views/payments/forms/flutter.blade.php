<form method="POST" action="{{ route('flutterwave.pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead">
                    {!! $reservation->amount? "&#8358; " . number_format(doubleval($reservation->amount), 2): 'N/a' !!}

            </p>
            <input type="hidden" name="email" value="{{ $reservation->email }}"> {{-- required --}}
            <input type="hidden" name="customer" value="{{ json_encode(['email' => $reservation->email]) }}">
            <input type="hidden" name="amount" value="{{ doubleval($reservation->amount) }}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="{{ $reservation->seats }}">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="payment_options" value="card, account, banktransfer, ussd">
            <input type="hidden" name="redirect_url" value="{{ route('flutterwave.process') }}">
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}" >  {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="tx_ref" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            {{-- <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> required --}}
            <input type="hidden" name="customizations" value="{{ json_encode(['title' => 'Hi-Impact Cruise', 'logo' => 'https://hi-impactcruise.com/public/assets/img/logo.png', 'description' => 'description',]) }}">
              @csrf {{-- works only when using laravel 5.1, 5.2 --}}

            <p>
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>