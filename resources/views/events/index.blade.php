@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-6 offset-md-3">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Events
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($events) > 0)
                            @foreach($events as $event)
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            {{$event->name}}
                                        </a>
                                        <p class="kt-widget5__desc">
                                            {{$event->description}}
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Date:</span>
                                            <span class="kt-font-info">{{ date('d F, Y', strtotime($event->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__sales"><a href="{{ route('events.show', ['event' => $event->id]) }}">view</a></span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__sales"><a href="{{ route('events.edit', ['event' => $event->id]) }}">edit</a></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <p class="lead">No Event found. <a href="{{ route('events.create') }}">Click here</a> to create events</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $events->links() }}
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection