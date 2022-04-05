<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead">
                    {!! $reservation->amount? "&#8358; " . number_format(doubleval($reservation->amount), 2): 'N/a' !!}

            </p>
            <input type="hidden" name="email" value="{{ $reservation->email }}"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{ $reservation->id }}">
            <input type="hidden" name="amount" value="{{ doubleval($reservation->amount) * 100 }}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="{{ $reservation->seats }}">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['reservation_id' => $reservation->id,]) }}" >  {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            @csrf {{-- works only when using laravel 5.1, 5.2 --}}

            <p>
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>