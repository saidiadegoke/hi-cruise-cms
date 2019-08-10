@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Page Content Item (<a href="{{ route('pages.create') }}">Add new page content</a>)
					</h3>
				</div>
			</div>

			
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Content Slug</th>
								<td>{{ $page->field }}</td>
							</tr>
							<tr>
								<th>Page Label</th>
								<td>{{ $page->label }}</td>
							</tr>
							<tr>
								<th>Value</th>
								<td>{!! $page->value !!}</td>
							</tr>
							<tr>
								<th>Page Category</th>
								<td>{{ $page->category !== null? $page->category->label: 'N/a' }}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($page->published == 1) 
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
						<a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('pages.destroy', ['page' => $page->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the page?')){document.getElementById('delete-page').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>

			<form onsubmit="return confirm('Continue with deleting the page?');" id="delete-page" action="{{ route('pages.destroy', ['page' => $page->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection