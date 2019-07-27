@extends('layouts.pdf')

@section('content')
<img src="{{ asset('public/assets/img/logo-3h.png', true) }}">
<h1>Reservation</h1>
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

@endsection