@extends('layouts.cruise')
@section('title') Offline Payment Details @endsection
@section('content')

    <section style="margin-top: 200px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4 class="text-center">
                        How did you pay?
                    </h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                     @if(count($errors->all()) > 0)
                      @foreach($errors->all() as $error)
                      <p class="alert alert-danger">{{$error}}</p>
                      @endforeach
                      @endif
                    <form method="post" action="{{ route('offlines.pay') }}">
                        @csrf
                        <div class="form-group row my-4">
                        <label for="reference" class="col-sm-4 col-form-label">Reference No</label>
                        <div class="col-sm-8">
                          {{ $reservation->reference }}
                          <input type="hidden" name="reference" value="{{ $reservation->reference }}">
                          <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="amount_paid" class="col-sm-4 col-form-label">Amount paid</label>
                        <div class="col-sm-8">
                          <input type="number" name="amount_paid" placeholder="Enter amount" class="form-control" value="{{ old('amount_paid') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label">Account paid to</label>
                        <div class="col-sm-8">
                          <select class="form-control" style="color: black; background: #fff;" name="account">
                              <option value="">Select account</option>
                              <option value="0014950454 - Diamond Bank" {{ old('account') == '0764970454 - First Bank'? 'selected': '' }}>7649750454 - Diamond Bank</option>
                              <option value="0764970454 - First Bank" {{ old('account') == '0764970454 - First Bank'? 'selected': '' }}>0764970454 - First Bank</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label">Transaction Date</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control datepicker" placeholder="dd-mm-yyy" name="date_paid_at" value="{{ old('date_paid_at') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="time" class="col-sm-4 col-form-label">Transaction Time</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="HH:MM" name="time_paid_at" value="{{ old('time_paid_at') }}">
                        </div>
                      </div>

                      @if($sessionUser->usertype == 1)
                      <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="approve" id="approve">
                          <label class="form-check-label" for="approve">
                            Approve this payment
                          </label>
                        </div>
                    </div>
                    @endif

                      <div class="form-group row">
                        <label for="time" class="col-sm-4 col-form-label">&nbsp;</label>
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-primary">Request approval</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection