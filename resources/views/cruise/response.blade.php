@extends('layouts.cruise')

@section('content')

<section style="margin-top: 200px">
    <div class="container styled">

        
        <div class="row">
            @include('layouts.partials.flash')
        </div>

        <div class="btn-group" role="group" aria-label="Button group">
            <a href="{{route('reservations', ['customer'=> auth()->user()->id]) }}" class="btn btn-primary" type="button">View Reservations</a>
            <a href="{{route('print_receipt',['reservation' => $reservation]) }}" class="btn btn-secondary">Print Receipt</a>
        </div>
        
    
        
    </div>
</section>
@endsection