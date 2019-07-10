@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-8 offset-md-2">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Pages and Features @isset($categoryInfo){{ $categoryInfo }}@endisset
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            <div class="kt-widget5">
                                @if(count($pages) > 0)
                                @foreach($pages as $page)
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__section">
                                            <a href="#" class="kt-widget5__title">
                                                {{ $page->label }}
                                            </a>
                                            <br>
                                            {!! \Illuminate\Support\Str::limit($page->value, 100) !!}
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('pages.show', ['page' => $page->id]) }}">view</a> \ </span>
                                        </div>
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('pages.edit', ['page' => $page->id]) }}">edit</a></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-xl-12 text-center">
                                            <p class="lead">No pages found. <a href="{{ route('pages.create') }}">Click here</a> to create pages</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $pages->links() }}
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection