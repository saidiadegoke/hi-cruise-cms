@extends('layouts.cruise')

@section('title') Reservations @endsection

@section('content')
  <section class="" style="margin-top: 200px">
      <div class="container">
        @if(count($reservations) > 0)
    <table class="table table-bordered">
        <thead>          
            <tr>
          <th scope="col">S/N</th>
          <th scope="col">Package</th>
          <th scope="col">No of Seats</th>
          <th scope="col">Cruise Date</th>
          <th scope="col">Payment</th>
          <th>&nbsp;</th>
        </tr>
        
    </thead>
  <tbody>
      @php  
        $index = 1;
      @endphp
      
    @foreach ($reservations as $reservation)
        <tr>
            <td scope="row">{{$index}}</td>
            <td>{{ $reservation->package? $reservation->package->name: 'N/a' }}
              <td>{{$reservation->seats}}</td>
        <td>{!! date('l, jS M Y', strtotime($reservation->start_date)) !!}</td>
        <td>@include('cruise.includes._payment_info')</td>
        <td><a href="{{ route('customer.reservation', ['reservation' => $reservation->id]) }}">View</a></td>
        </tr>
        @php 
            $index++;
        @endphp
    @endforeach

    
  </tbody>
</table>
<div>
  {{ $reservations->links() }}
  </div>
  
@else
    <div class="alert alert-info">No reservations made yet</div>
    @endif
      </div>
  </section>

@endsection