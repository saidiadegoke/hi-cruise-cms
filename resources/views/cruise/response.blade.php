@extends('layouts.cruise')

@section('content')

<section style="margin-top: 200px">
    <div class="container styled">

        
        <div class="row">
            @include('layouts.partials.flash')
        </div>

        @if(isset($booking) && isset($reservation))
        @include('reservations.receipt_dark')
        @else
        <div class="alert alert-info">
            Payment record not found! Please go back and retry. Or try another payment method
        </div>
        @endif

    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
    function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
@endsection