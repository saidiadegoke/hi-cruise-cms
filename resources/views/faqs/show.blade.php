@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						FAQ Item
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('news.store') }}">
				@csrf
				<div class="kt-portlet__body">

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Question</th>
								<td>{{ $faq->question }}</td>
							</tr>
							<tr>
								<th>Answer</th>
								<td>{!! $faq->answer !!}</td>
							</tr>
							<tr>
								<th>Published</th>
								<td>
									@if($faq->published == 1) 
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
						<a href="{{ route('faqs.edit', ['faq' => $faq->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('faqs.destroy', ['faq' => $faq->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the faq?')){document.getElementById('delete-faq').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the faq?');" id="delete-faq" action="{{ route('faqs.destroy', ['faq' => $faq->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection