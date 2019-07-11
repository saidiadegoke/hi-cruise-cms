@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Package Details
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" method="post" action="{{ route('packages.store') }}">
				@csrf
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<td>{{ $package->name }}</td>
							</tr>
							<tr>
								<th>Descrition</th>
								<td>{!! $package->description !!}</td>
							</tr>
							<tr>
								<th>Yatch</th>
								<td>
									{{$package->yatch->name}}

								</td>
							</tr>
							<tr>
								<th>Price</th>
								<td>
									{{$package->price}}
								</td>
							</tr>
							<tr>
								<th>Available Days</th>
								<td>
									{{$package->available_days }}
								</td>
							</tr>
						</table>
						
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<a href="{{ route('packages.edit', ['package' => $package->id]) }}" class="btn btn-primary">Edit</a>
						<a href="{{ route('packages.destroy', ['package' => $package->id]) }}" class="btn btn-danger"
							onclick="event.preventDefault();
                                                      if(confirm('Continue with deleting the package?')){document.getElementById('delete-package').submit();}else {return false;}">
                                        Delete</a>
					</div>
				</div>
			</form>
			<form onsubmit="return confirm('Continue with deleting the package?');" id="delete-package" action="{{ route('packages.destroy', ['package' => $package->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
			<!--end::Form-->
		</div>
	</div>
</div>

@endsection