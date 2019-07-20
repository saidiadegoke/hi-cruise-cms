@extends('layouts.cruise')


@section('content')
  <section class="" style="margin-top: 200px">
      <div class="container">
    <table class="table table-bordered">
        <thead>          
            <tr>
          <th scope="col">S/N</th>
          <th scope="col">Start Date</th>
          <th scope="col">Finish Date</th>
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
        <td>{{$reservation->finish_date}}</td>
        <td>{{$reservation->seats}}</td>
        <td><a href="#">View</a></td>
        </tr>
        @php 
            $index++;
        @endphp
    @endforeach
    
  </tbody>
</table>
      </div>
  </section>

@endsection