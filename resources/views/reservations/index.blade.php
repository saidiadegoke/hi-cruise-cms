@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
<div class="row">
	<div class="col-lg-6 offset-md-3">


		<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Reservations
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <input placeholder="From date" id="from" type="text" class="form-control date" name="from">
                                </div>
                                <div class="col-md-3">
                                    <input placeholder="To date" id="to" type="text" class="form-control date" name="to">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Search term" type="text" value="{{ old('q') }}" class="form-control" name="q">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-info" value="Search">
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @if(count($reservations) > 0)
                            @foreach($reservations as $reservation)
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Customer: {{$reservation->name}}
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Package: {{$reservation->package? $reservation->package->name: 'N/a'}}
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Cruise date:</span>
                                            <span class="kt-font-info">{{ date('d F, Y', strtotime($reservation->start_date)) }}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Reference: {{$reservation->reference}}
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Paid at: {{ $reservation->payment? date('d M, Y H:i A', strtotime($reservation->payment->created_at)): 'N/A' }}
                                        </p>
                                        <p class="kt-widget5__desc">
                                            Cruise time: {{ ucfirst($reservation->session) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__sales"><a href="{{ route('bookings.show', ['reservation' => $reservation->id]) }}">view</a></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                        <p class="lead">No reservation found.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						{{ $reservations->links() }}
                        <a href="{{ route('export.reservation', ['from' => $from, 'to' => $to, 'q' => $q]) }}" class="btn btn-success">Export to Excel</a>
					</div>
				</div>
            </div>
        </div>
	</div>
</div>

@endsection

@section('scripts')
@parent
<script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
        console.log(date)
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );

  //console.log($.datepicker.formatDate( "yy-mm-dd", new Date( 2007, 1 - 1, 26 ) ));
  </script>

@endsection