@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Media File Purpose
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			
				@csrf
				<div class="kt-portlet__body">

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<td>{{ $mediaFilePurpose->name }}</td>
							</tr>
							<tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('media-file-purposes.edit', ['mediaFilePurpose' => $mediaFilePurpose->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('media-file-purposes.destroy', ['mediaFilePurpose' => $mediaFilePurpose->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the news?')){document.getElementById('delete-mediaFilePurpose').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>

			<form onsubmit="return confirm('Continue with deleting the mediaFilePurpose?');" id="delete-mediaFilePurpose" action="{{ route('media-file-purposes.destroy', ['mediaFilePurpose' => $mediaFilePurpose->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection