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
						Add new yacht
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('yachts.update', ['yacht' => $yacht->id]) }}">
				@csrf
				@method('PATCH')
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Yacht Name" value="{{ old('name')? old('name'): $yacht->name }}">
							<span class="form-text text-muted">Please enter yacht name</span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description')? old('description'): $yacht->description }}</textarea>
							<span class="form-text text-muted">Optional</span>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish yacht:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="publish" value="1" {{ old('publish') == '1' || $yacht->publish == 1? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="publish" value="0" {{ old('publish') == '0'  || $yacht->publish == 0? 'checked': '' }}> No
											<span></span>
										</label>
									</div>
								</div>

							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Show on homepage:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="show_on_home" value="1" {{ old('show_on_home') == '1' || $yacht->show_on_home == 1? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="show_on_home" value="0" {{ old('show_on_home') == '0' || $yacht->show_on_home == 0? 'checked': '' }}> No
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
						<button type="submit" class="btn btn-primary">Edit</button>
						<a href="{{ route('admin') }}" type="reset" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>

			<!--end::Form-->
		</div>
	</div>
</div>

@endsection

@section('scripts')
	@parent

	<script src="{{ asset('public/js/demo1/pages/crud/forms/widgets/dropzone.js') }}" type="text/javascript"></script>
@endsection