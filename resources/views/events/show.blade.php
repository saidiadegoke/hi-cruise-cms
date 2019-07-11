@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new event
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('events.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<td>{{ $event->name }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $event->description !!}</td>
							</tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('events.edit', ['event' => $event->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('events.destroy', ['event' => $event->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the event?')){document.getElementById('delete-event').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the event?');" id="delete-event" action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection