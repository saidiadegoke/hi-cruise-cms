@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
<div class="row">
	<div class="col-lg-6 offset-md-3">

        <form method="POST" action="{{ route('admin.settings.cruise.update') }}">
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
                            <h6>Available Days</h6>
                        </div>
                    </div>
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($dates) > 0)
                            <ul class="list-group">
  
                            @foreach($dates as $date)
                            <li class="list-group-item d-flex justify-content-between align-items-center row">
                                <div class="col-md-6">
                                    <p>{{ $date->getLabel() }} &nbsp;
                                    <input type="checkbox" aria-label="{{ $date->getLabel() }}" {{ $date->isAvailable() == 1? 'checked': '' }} rel="dates[{{ $date->getDate() }}]"></p>
                                </div>
                                <div class="col-md-6">
                                <div class="pull-right1 row">
                                    <div class="col-md-6">
                                        <label>Day</label>&nbsp;
                                      <input type="checkbox" aria-label="{{ $date->getLabel() }}" {{ $date->isDay() == 1? 'checked': '' }} rel="days[{{ $date->getDate() }}]">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Night</label>&nbsp;
                                      <input type="checkbox" aria-label="{{ $date->getLabel() }}" {{ $date->isNight() == 1? 'checked': '' }} rel="nights[{{ $date->getDate() }}]">
                                    </div>
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
<script>
var chk = $('input[type="checkbox"]');
chk.each(function(){
        var v = $(this).attr('checked') == 'checked'? 1: 0;
        $(this).after('<input type="hidden" name="'+$(this).attr('rel')+'" value="'+v+'" />');
    });
chk.change(function(){ 
        var v = $(this).is(':checked')? 1: 0;
        $(this).next('input[type="hidden"]').val(v);
    });
</script>
@endsection