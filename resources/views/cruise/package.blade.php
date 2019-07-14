@extends('layouts.cruise')
@section('content')

@if($yacht->id == 1)
  @include('cruise.includes._eugene1')
@elseif($yacht->id == 2)
  @include('cruise.includes._eugene')
@endif

@endsection