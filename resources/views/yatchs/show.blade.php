@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new Yatch
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('yatchs.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<div class="form-group">
							{{-- <img class="responsive-img" src="{{ asset('public/storage/' . $slide->file->filename) }}" /> --}}
						</div>
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<td>{{ $yatch->name }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $yatch->description !!}</td>
							</tr>
							{{-- <tr>
								<th>Published</th>
								<td>
									@if($yatch->published == 1) 
										Yes 
									@else 
										No 
									@endif

								</td>
							</tr> --}}
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('yatchs.edit', ['yatch' => $yatch->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('yatchs.destroy', ['yatch' => $yatch->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the yatch?')){document.getElementById('delete-yatch').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the yatch?');" id="delete-yatch" action="{{ route('yatchs.destroy', ['yatch' => $yatch->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection