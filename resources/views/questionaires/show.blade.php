@extends('layouts.admin')
@section("content_header")
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="{{ route('events.create') }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                Add New Event
            </a>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                    <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                    <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                    <i class="flaticon2-calendar-1"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Event Form Detail
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
						<div class="row p-2">
                    <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Name</th><td>{{ $event['fullname'] }}</td>
                        </tr>
                        <tr>
                          <th>Organization</th><td>{{ $event['organization'] }}</td>
                        </tr>
                        <tr>
                          <th>Email</th><td>{{ $event['contact_email'] }}</td>
                        </tr>
                        <tr>
                          <th>Phone</th><td>{{ $event['contact_number'] }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Event Type</th><td>{{ $event['event_type'] }}</td>
                        </tr>
                        <tr>
                          <th>No of Guests</th><td>{{ $event['guests'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Date</th><td>{{ $event['event_date'] }}</td>
                        </tr>
                        <tr>
                          <th>Catering</th><td>{{ $event['catering'] }}</td>
                        </tr>
                        <tr>
                          <th>Yacht State<td>{{ $event['yacht_state'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Duration</th><td>{{ $event['event_duration'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Setup Duration</th><td>{{ $event['event_setup_duration'] }}</td>
                        </tr>
                        <tr>
                          <th>Event Decoration</th><td>{{ $event->event_decoration() }}</td>
                        </tr>
                        <tr>
                          <th>Event Entertainment</th><td>{{ $event->event_entertainment() }}</td>
                        </tr>
                      </table>
                 </div>
              </div>
						
					</div>
				</div>
				{{-- <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('events.edit', ['event' => $event->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('events.destroy', ['event' => $event->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the event?')){document.getElementById('delete-event').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div> --}}
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