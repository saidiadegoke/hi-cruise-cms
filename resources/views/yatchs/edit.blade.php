@extends('layouts.admin')

@section("content_header")
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <a href="{{ route('yatchs.create') }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                Add New Yacht
            </a>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                    <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                    <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                    <i class="flaticon2-calendar-1"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add new yatch
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" enctype="multipart/form-data" method="post" action="{{ route('yatchs.update', ['yatch' => $yatch->id]) }}">
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
							<p>Yatch Banner</p>
							@if($yatch->images)
							<div class="row">
								@foreach ($yatch->images as $image)
									@if($image->type == 'banner')
									<img src="{{ asset('public/storage/' . $image->filename) }}" />
									@endif
									@php
										break;
									@endphp
								@endforeach
								</div>
							@endif
						</div>


						<div class="form-group">
							<p>Yatch Slides</p>
							@if($yatch->images)
							<div class="row">
								@foreach ($yatch->images as $image)
                              @if($image->type == 'slides')
                                  <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/storage/' . $image->filename) }}" alt="" class="thumbs-list">
                                  </div>
                              @endif

						  @endforeach
						  </div>
							@endif
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yatch Banner Image</label>
							<div class="col-sm-12">
								<input type="file" name="banner">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-12">Select Yatch Slider Images</label>
							<div class="col-sm-12">
								<input type="file" name="slides[]" multiple>
							</div>
						</div>

						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Yatch Name" value="{{ old('name')? old('name'): $yatch->name }}">
							<span class="form-text text-muted">Please enter yatch name</span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter description">{{ old('description')? old('description'): $yatch->description }}</textarea>
							<span class="form-text text-muted">Optional</span>
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
@endsection