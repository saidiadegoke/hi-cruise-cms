@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
<div class="row">
	<div class="col-lg-6 offset-md-3">

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Settings
                    </h3>
                </div>
            </div>
            
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h6>Available days</h6>
                        </div>
                    </div>
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($availableDays) > 0)
                            <ul class="list-group">
  
                            @foreach($availableDays as $availableDay)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $availableDay->long }}

                                <div class="pull-right">
                                    <div class="input-group-text">
                                      <input type="checkbox" aria-label="{{ $availableDay->long }}" {{ $availableDay->available == 1? 'checked': '' }} name="days[{{ $availableDay->id }}]">
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                            @else
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <p class="lead">No available days set.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h6>Date items</h6>
                        </div>
                    </div>
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($cruiseDateSettings) > 0)
                            <ul class="list-group">
  
                            @foreach($cruiseDateSettings as $cruiseDateSetting)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ strtoupper($cruiseDateSetting->key) }}

                                <div class="pull-right">
                                    <div class="input-group">
                                      <input type="text" class="form-control" name="settings[{{ $cruiseDateSetting->id }}]" aria-label="{{ strtoupper($cruiseDateSetting->key) }}" value="{{ old($cruiseDateSetting->key)?: !strlen($cruiseDateSetting->value) == 0? $cruiseDateSetting->value: $cruiseDateSetting->default }}">
                                    </div>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                            @else
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <p class="lead">No available days set.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
                        <button type="submit" class="btn btn-success">Save Settings</button>
					</div>
				</div>
            </div>
        </div>
    </form>
	</div>
</div>

@endsection

@section('scripts')
@parent

@endsection