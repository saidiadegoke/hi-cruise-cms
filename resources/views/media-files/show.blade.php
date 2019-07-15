@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Media file
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
						<div class="form-group">
							<img class="responsive-img" src="{{ asset('public/storage/' . $mediaFile->file->filename) }}" />
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Title</th>
								<td>{{ $mediaFile->title }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $mediaFile->description !!}</td>
							</tr>
							<tr>
								<th>Purpose</th>
								<td>{{ $mediaFile->mediaFilePurpose->name }}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($mediaFile->published == 1) 
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
						<a href="{{ route('media-files.edit', ['mediaFile' => $mediaFile->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('media-files.destroy', ['mediaFile' => $mediaFile->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the Media File?')){document.getElementById('delete-file').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the file?');" id="delete-file" action="{{ route('media-files.destroy', ['mediaFile' => $mediaFile->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection