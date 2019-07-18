@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit news item
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('news.update', ['news' => $news->id]) }}">
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
							@if($news->file && $news->cover_type == 'image')
		                      <img class="responsive-img" src="{{ asset('public/storage/' . $news->file->filename) }}" />
		                    @else
		                    <div class="view-box">
		                        <iframe width="100%" height="auto" frameborder="0" allowfullscreen="allowfullscreen" src="{{ $news->cover }}?autoplay=0&amp;start=0&amp;rel=0"></iframe>
		                    </div>
		                    @endif
						</div>
						<!--div class="form-group row">
							<label class="col-form-label col-sm-12">Select news file</label>
							<div class="col-sm-12">
								<input type="file" name="news">
							</div>
						</div-->
						<div class="form-group row">
							<label class="col-form-label col-sm-12">YouTube code (https://www.youtube.com/embed/judmiOhG9xI)</label>
							<div class="col-sm-12">
								<input type="text" name="cover" value="{{ old('cover')? old('cover'): $news->cover }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="title" placeholder="Slide title" value="{{ old('title')? old('title'): $news->title }}">
							<span class="form-text text-muted">Please enter news title</span>
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea class="form-control" name="content" placeholder="Enter content">{{ old('content')? old('content'): $news->content }}</textarea>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="category">
								<option value="">Select category</option>
								<option value="news" {{ old('category') == 'news' || $news->category == 'news'? 'selected': '' }}>News</option>
								<option value="specials">Hi-Impact Specials</option>
							</select>
							<span class="form-text text-muted"></span>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label>Publish news:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="published" value="1" {{ old('published') == '1' || $news->published == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="published" value="0" {{ old('published') == '0' || $news->published == '0'? 'checked': '' }}> No
											<span></span>
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<label>Featured:</label>
									<div class="kt-radio-list">
										<label class="kt-radio">
											<input type="radio" name="featured" value="1" {{ old('featured') == '1' || $news->featured == '1'? 'checked': '' }}> Yes
											<span></span>
										</label>
										<label class="kt-radio">
											<input type="radio" name="featured" value="0" {{ old('featured') == '0' || $news->featured == '0'? 'checked': '' }}> No
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