@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-8 offset-md-2">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Media File Purposes(<a href="{{ route('media-file-purposes.create') }}">Add new</a>)
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            <div class="kt-widget5">
                                @if(count($mediaFilePurposes) > 0)
                                @foreach($mediaFilePurposes as $mediaFilePurpose)
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content">

                                        <div class="kt-widget5__section">
                                            <a href="#" class="kt-widget5__title">
                                                {{ $mediaFilePurpose->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('media-file-purposes.show', ['mediaFilePurpose' => $mediaFilePurpose->id]) }}">view</a>&nbsp; &nbsp;</span>
                                        </div>
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('media-file-purposes.edit', ['mediaFilePurpose' => $mediaFilePurpose->id]) }}">edit</a></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-xl-12 text-center">
                                            <p class="lead">No mediaFilePurposes. <a href="{{ route('media-file-purposes.create') }}">Click here</a> to create mediaFilePurposes</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $mediaFilePurposes->links() }}
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection