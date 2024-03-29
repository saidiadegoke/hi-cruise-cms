@extends('layouts.admin')

@section("content_header")
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="{{ route('yachts.create') }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                Add New Yacht
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
						Add new Yacht
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('yachts.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group">
							{{-- <img class="responsive-img" src="{{ asset('public/storage/' . $slide->file->filename) }}" /> --}}
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<td>{{ $yacht->name }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $yacht->description !!}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($yacht->publish == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
							<tr>
								<th>Show on homepage</th>
								<td>
									@if($yacht->show_on_home == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('yachts.edit', ['yacht' => $yacht->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('yachts.destroy', ['yacht' => $yacht->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the yacht?')){document.getElementById('delete-yacht').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the yacht?');" id="delete-yacht" action="{{ route('yachts.destroy', ['yacht' => $yacht->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection