@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add New Yatch
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" method="post" action="{{ route('yatchs.store') }}">
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
						{{-- <div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yatch Image</label>
							<div class="col-sm-12">
								<input type="file" name="slide">
							</div>
						</div> --}}
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="name" placeholder="Yatch title" value="{{ old('title') }}">
							<span class="form-text text-muted">Please enter yatch name</span>
						</div>
						<div class="form-group">
							<label>Yatch Description</label>
							<textarea class="form-control" name="description" placeholder="Enter Yatch Description">{{ old('description') }}</textarea>
							<span class="form-text text-muted">Optional</span>
						</div>
						{{-- <div class="form-group row">
							<label class="col-form-label col-sm-12">Page</label>
							<div class="col-sm-12">
								<select name="page" class="form-control">
									<option value="">Select page</option>
									<option value="home" {{ old('page') && old('page') == 'home'? 'selected': '' }}>Home</option>
								</select>
							</div>
						</div> --}}
						{{-- <div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish yatch:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="published" value="1" {{ old('published') == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="published" value="0" {{ old('published') == '0'? 'checked': '' }}> No
											<span></span>
										</label>
									</div>
								</div>

							</div>
						</div> --}}
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
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