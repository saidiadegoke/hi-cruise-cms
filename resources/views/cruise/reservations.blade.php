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
          <th scope="col">Cruise Date</th>
          <th scope="col">No of Seats</th>
          <th>&nbsp;</th>
        </tr>
        
    </thead>
  <tbody>
      @php  
        $index = 1;
      @endphp
      
    @foreach ($reservations as $reservation)
        <tr>
            <th scope="row">{{$index}}</th>
        <td>{{$reservation->start_date}}</td>
        <td>{{$reservation->seats}}</td>
        <td><a href="{{ route('customer.reservation', ['reservation' => $reservation->id]) }}">View</a></td>
        </tr>
        @php 
            $index++;
        @endphp
    @endforeach

    
  </tbody>
</table>
@else
    <div class="alert alert-info">No reservations made yet</div>
    @endif
      </div>
  </section>

@endsection