@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit programme category
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('categories.update', ['category' => $category->id]) }}">
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
							@if($category->file && $category->cover_type == 'image')
		                      <img class="responsive-img" src="{{ asset('public/storage/' . $category->file->filename) }}" />
		                    @elseif($category->file && $category->cover_type == 'image')
		                    <div class="view-box">
		                        <iframe width="100%" height="auto" frameborder="0" allowfullscreen="allowfullscreen" src="{{ $category->cover }}?autoplay=0&amp;start=0&amp;rel=0"></iframe>
		                    </div>
		                    @endif
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select cover image</label>
							<div class="col-sm-12">
								<input type="file" name="category">
							</div>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Category name" value="{{ old('name')? old('name'): $category->name }}">
							<span class="form-text text-muted">Please enter news title</span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description')? old('description'): $category->description }}</textarea>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label>Slug</label>
							<input type="text" class="form-control" name="slug" placeholder="Category slug" value="{{ old('slug')? old('slug'): $category->slug }}">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish news:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="published" value="1" {{ old('published') == '1' || $category->published == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="published" value="0" {{ old('published') == '0' || $category->published == '0'? 'checked': '' }}> No
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