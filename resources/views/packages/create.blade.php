@extends('layouts.admin')

@section("content_header")
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="{{ route('packages.create') }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                Add New Package
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
@section("styles")
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new package
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			@if(isset($message) && strlen(trim($message)) > 0)
		              
		              <p class="alert alert-danger">{{$message}}</p>
					
			@else
			<form class="kt-form" method="post" action="{{ route('packages.store') }}">
				@csrf
				<div class="kt-portlet__body">

					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif
					
					<div class="kt-section kt-section--first">
						<!--div class="form-group">
							<img src="#" />
						</div-->

						<div class="form-group row">
							<label>Package Name</label>
							<input type="text" class="form-control" name="name" placeholder="Package name" value="{{ old('name') }}">
							<span class="form-text text-muted">Please enter Package name</span>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
							<span class="form-text text-muted">Optional</span>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yacht</label>
							<div class="col-sm-12">
								<select name="yacht" class="form-control">
									<option value="">Select Yacht</option>
									@foreach ($yachts as $yacht)
										<option value="{{$yacht->id}}" {{ old('yacht') && old('yacht') == $yacht->id ? 'selected': '' }}>{{$yacht->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label>Package Price</label>
							<input type="text" class="form-control" name="price" placeholder="Package Price" value="{{ old('price') }}">
							<span class="form-text text-muted">Please Enter Package Price</span>
						</div>

						<div class="form-group">
							<label>Package Available Days</label>
							<div class="col-md-5 col-md-offset-1">
								@foreach ($days as $key => $day)
									<div class="form-check">
										<input id="day{{$day->id}}" class="form-check-input" type="checkbox" name="available_days[]" value="{{$day->id}}" {{ old('available_days')? (in_array($day->id, old('available_days')) ? 'checked': '') : '' }}>
										<label for="day{{$day->id}}" class="form-check-label">{{$day->name}}</label>
                                    </div>
								@endforeach
                            </div>
							<span class="form-text text-muted">Select Multiple Where Applicable</span>
						</div>

						<div class="form-group">
							<label>Total available</label>
							<input type="number" class="form-control" name="total_available" placeholder="Total available" value="{{ old('total_available') }}">
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish package:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="publish" value="1" {{ old('publish') == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="publish" value="0" {{ old('publish') == '0'? 'checked': '' }}> No
											<span></span>
										</label>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</form>
		@endif
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection

@section('scripts')
	@parent

	<script src="{{ asset('public/js/demo1/pages/crud/forms/widgets/dropzone.js') }}" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		$('.date').flatpickr({
			mode: "range",
			minDate: "today",
			dateFormat: "l"
			
		});
		
	</script>
@endsection

