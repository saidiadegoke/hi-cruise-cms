@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new media file
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('media-files.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select media file</label>
							<div class="col-sm-12">
								<input type="file" name="file">
							</div>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="title" placeholder="File title" value="{{ old('title') }}">
							<span class="form-text text-muted">Please enter title</span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
							<span class="form-text text-muted">Optional</span>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Purpose</label>
							<div class="col-sm-12">
								<select name="purpose" class="form-control">
									<option value="">Select Purpose</option>
									@foreach(\App\Models\MediaFilePurpose::all() as $purpose)
										<option value="{{ $purpose->id }}" {{ old('purpose') == $purpose->id? 'selected': '' }}>{{ $purpose->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yatch (Optional)</label>
							<div class="col-sm-12">
								<select name="yacht_id" class="form-control">
									<option value="">Select Yacht</option>
									@foreach(\App\Models\Yacht::all() as $yacht)
										<option value="{{ $yacht->id }}" {{ old('yacht_id') == $yacht->id? 'selected': '' }}>{{ $yacht->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish file:</label>
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