@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Page Item 
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('news.store') }}">
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
						<!--div class="form-group row">
							<label class="col-form-label col-sm-12">Select slide file</label>
							<div class="col-sm-12">
								<input type="file" name="slide">
								<div class="kt-dropzone dropzone" action="{{ route('dropzone.store') }}" id="m-dropzone-four">
									<div class="kt-dropzone__msg dz-message needsclick">
										<h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
										<span class="kt-dropzone__msg-desc">This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.</span>
									</div>
								</div>
							</div>
						</div-->
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Field</label>
							<div class="col-sm-12">
								<input type="text" name="field" value="{{ old('field') }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label>Label</label>
							<input type="text" class="form-control" name="label" placeholder="Label" value="{{ old('label') }}">
						</div>
						<div class="form-group">
							<label>Value</label>
							<textarea class="form-control" name="content" placeholder="Enter content">{{ old('content') }}</textarea>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label>Page</label>
							<select class="form-control" name="category">
								<option value="">Select category</option>
								<option value="studios_home">Studios Home</option>
								<option value="tv_home">TV home</option>
							</select>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish slide:</label>
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

								<div class="col-md-4">
									<label>Featured:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="featured" value="1" {{ old('featured') == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="featured" value="0" {{ old('featured') == '0'? 'checked': '' }}> No
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

			<!--end::Form-->
		</div>
	</div>
</div>

@endsection

@section('scripts')
	@parent

	<script src="{{ asset('public/js/demo1/pages/crud/forms/widgets/dropzone.js') }}" type="text/javascript"></script>
@endsection