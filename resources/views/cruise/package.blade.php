@extends('layouts.cruise')
@section('content')

@if($yatch->id == 1)
  @include('cruise.includes._eugene1')
@elseif($yatch->id == 2)
  @include('cruise.includes._eugene')
@endif

@endsection