@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit page item
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('pages.update', ['page' => $page->id]) }}">
				@csrf
				@method('PATCH')
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Field</label>
							<div class="col-sm-12">
								<input type="text" name="field" value="{{ old('field')? old('field'): $page->field }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label>Label</label>
							<input type="text" class="form-control" name="label" placeholder="Label" value="{{ old('label')? old('label'): $page->label }}">
						</div>
						<div class="form-group">
							<label>Value</label>
							<textarea class="form-control" name="value" placeholder="Enter value">{{ old('value')? old('value'): $page->value }}</textarea>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label>Page</label>
							<select class="form-control" name="page_category_id">
								<option value="">Select category</option>
								@foreach(\App\Models\PageCategory::all() as $category)
								<option value="{{ $category->id }}" {{ old('page_category_id') == $category->id || $page->page_category_id == $category->id? 'selected': '' }}>{{ $category->label }}</option>
								@endforeach
							</select>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish content:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="published" value="1" {{ old('published') == '1' || $page->published == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="published" value="0" {{ old('published') == '0' || $page->published == '0'? 'checked': '' }}> No
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