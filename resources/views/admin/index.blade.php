@extends('layouts.admin')

@section('content')

<div class="row">
                                        <div class="col-xl-4">

                                            <!--begin:: Widgets/Profit Share-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Slides
                                                        </h3>
                                                        <span class="kt-widget14__desc">
                                                            Add, edit or remove site slides
                                                        </span>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div class="kt-widget14__stat">2</div>
                                                            <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                                                <span class="kt-widget14__stats">5 Registrations</span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                                <span class="kt-widget14__stats">Payments</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end:: Widgets/Profit Share-->
                                        </div>
                                        <div class="col-xl-4">

                                            <!--begin:: Widgets/Profit Share-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Slides
                                                        </h3>
                                                        <span class="kt-widget14__desc">
                                                            Add, edit, or delete slides
                                                        </span>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div class="kt-widget14__stat"></div>
                                                            <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                                                <span class="kt-widget14__stats"></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                                <span class="kt-widget14__stats"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end:: Widgets/Profit Share-->
                                        </div>
                                        <div class="col-xl-4">

                                            <!--begin:: Widgets/Revenue Change-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Packages
                                                        </h3>
                                                        <span class="kt-widget14__desc">
                                                            Add, edit or delete packages
                                                        </span>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div id="kt_chart_revenue_change" style="height: 150px; width: 150px;"></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                                                <span class="kt-widget14__stats">List of packages</span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                                <span class="kt-widget14__stats">Package categories</span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                                <span class="kt-widget14__stats">Subscriptions</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end:: Widgets/Revenue Change-->
                                        </div>
                                    </div>

                                    <!--End::Section-->

                                    <div class="row">
                                        <div class="col-xl-12">

                                            <!--begin:: Widgets/Best Sellers-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-portlet__head">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Slides
                                                        </h3>
                                                    </div>
                                                    
                                                </div>
                                                <div class="kt-portlet__body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                                            <div class="kt-widget5">
                                                                @if(count($slides) > 0)
                                                                @foreach($slides as $slide)
                                                                <div class="kt-widget5__item">
                                                                    <div class="kt-widget5__content">
                                                                        <div class="kt-widget5__pic">
                                                                            <img class="kt-widget7__img" src="{{ asset('public/storage/' . $slide->file->filename) }}" alt="">
                                                                        </div>
                                                                        <div class="kt-widget5__section">
                                                                            <a href="#" class="kt-widget5__title">
                                                                                {{ $slide->title }}
                                                                            </a>
                                                                            <p class="kt-widget5__desc">
                                                                                {!! $slide->description !!}
                                                                            </p>
                                                                            <div class="kt-widget5__info">
                                                                                <span>Date:</span>
                                                                                <span class="kt-font-info">{{ date('d F, Y', strtotime($slide->created_at)) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kt-widget5__content">
                                                                        <div class="kt-widget5__stats">
                                                                            <span class="kt-widget5__sales"><a href="{{ route('slides.edit', ['slide' => $slide->id]) }}">edit</a></span>
                                                                        </div>
                                                                        <div class="kt-widget5__stats">
                                                                            <span class="kt-widget5__sales"><a href="{{ route('slides.show', ['slide' => $slide->id]) }}">view</a></span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                    <div class="row">
                                                                        <div class="col-xl-12 text-center">
                                                                            <p class="lead">No slides found. <a href="{{ route('slides.create') }}">Click here</a> to create slides</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    

@endsection