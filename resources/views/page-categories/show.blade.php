@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						News Item
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
						<div class="form-group">
							{{-- <img class="responsive-img" src="{{ asset('public/storage/' . $news->file->filename) }}" /> --}}
							@if($news->file && $news->cover_type == 'image')
		                      <img class="responsive-img" src="{{ asset('public/storage/' . $news->file->filename) }}" />
		                    @else
		                    <div class="view-box">
		                        <iframe width="100%" height="auto" frameborder="0" allowfullscreen="allowfullscreen" src="{{ $news->cover }}?autoplay=0&amp;start=0&amp;rel=0"></iframe>
		                    </div>
		                    @endif
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Title</th>
								<td>{{ $news->title }}</td>
							</tr>
							<tr>
								<th>Content</th>
								<td>{!! $news->content !!}</td>
							</tr>
							<tr>
								<th>Video</th>
								<td>{{ $news->cover }}</td>
							</tr>
							<tr>
								<th>Category</th>
								<td>{{ $news->category == 'news'? 'News': 'Hi-Impact Specials' }}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($news->published == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
							<tr>
								<th>Show on Studios page?</th>
								<td>
									@if($news->featured == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
							<tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('news.edit', ['news' => $news->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('news.destroy', ['news' => $news->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the news?')){document.getElementById('delete-news').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the news?');" id="delete-news" action="{{ route('news.destroy', ['news' => $news->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection