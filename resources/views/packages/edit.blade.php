@extends('layouts.admin')

@section("styles")
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit Package
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form"  method="post" action="{{ route('packages.update', ['package' => $package->id]) }}">
				@csrf
				@method('PATCH')
				<div class="kt-portlet__body">
					@if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif

					<div class="kt-section kt-section--first">
						<!--div class="form-group">
							<img src="#" />
						</div-->

						<div class="form-group row">
							<label>Package Name</label>
							<input type="text" class="form-control" name="name" placeholder="Package name" value="{{ old('name')? old('name'): $package->name}}">
							<span class="form-text text-muted">Please enter Package name</span>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description') ? old('description') : $package->description}} </textarea>
							<span class="form-text text-muted">Optional</span>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yatch</label>
							<div class="col-sm-12">
								<select name="yatch" class="form-control">
									@foreach ($yatchs as $yatch)
										<option value="{{$yatch->id}}" {{ old('yatch') && old('yatch') == $yatch->id ? 'selected': '' }}>{{$package->yatch->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label>Package Price</label>
							<input type="text" class="form-control" name="price" placeholder="Package Price" value="{{ old('price') ? old('price') : $package->price }}">
							<span class="form-text text-muted">Please Enter Package Price</span>
						</div>

						<div class="form-group">
							<label>Package Available Days</label><br>
							<label>Current: {{ $package->available_days }}</label>
						<input type="input" class="form-control date" name="available_days">
							<span class="form-text text-muted">Select Availability Days</span>
						</div>

					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
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
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		$('.date').flatpickr({
			mode: "range",
			dateFormat: "l",
			// defaultDate: ["2016-10-10", "2016-10-20","2019-07-10"]
		});
		
	</script>
@endsection