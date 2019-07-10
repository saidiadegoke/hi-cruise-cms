@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new slide
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('slides.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group">
							<img class="responsive-img" src="{{ asset('public/storage/' . $slide->file->filename) }}" />
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Title</th>
								<td>{{ $slide->title }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $slide->description !!}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($slide->published == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
							<tr>
								<th>Show on Studios</th>
								<td>
									@if($slide->studios == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr>
							<tr>
								<th>Show on TV</th>
								<td>
									@if($slide->tv == 1) 
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
						<a href="{{ route('slides.edit', ['slide' => $slide->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('slides.destroy', ['slide' => $slide->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the slide?')){document.getElementById('delete-slide').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the slide?');" id="delete-slide" action="{{ route('slides.destroy', ['slide' => $slide->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection