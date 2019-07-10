@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-8 offset-md-2">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        FAQs
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            <div class="kt-widget5">
                                @if(count($faqs) > 0)
                                @foreach($faqs as $faq)
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__section">
                                            <a href="#" class="kt-widget5__title">
                                                {{ $faq->question }}
                                            </a>
                                            <br>
                                            {!! \Illuminate\Support\Str::limit($faq->answer, 100) !!}
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('faqs.show', ['faq' => $faq->id]) }}">view</a> \ </span>
                                        </div>
                                        <div class="kt-widget5__info">
                                            <span class="kt-widget5__sales"><a href="{{ route('faqs.edit', ['faq' => $faq->id]) }}">edit</a></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-xl-12 text-center">
                                            <p class="lead">No faqs found. <a href="{{ route('faqs.create') }}">Click here</a> to create faqs</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $faqs->links() }}
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection