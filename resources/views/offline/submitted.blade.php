@extends('layouts.cruise')
@section('title') Reservation Details @endsection
@section('content')

    <section style="margin-top: 200px">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h4 class="text-center">
                        Reservation Reservation
                    </h4>
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered">
                    <tr>
                        <td>Customer name</td>
                        <td>{{ ucfirst($reservation->name) }}</td>
                    </tr>

                    <tr>
                        <td>Phone number</td>
                        <td>{{ $reservation->phone }}</td>
                    </tr>

                    <tr>
                        <td>Reference number</td>
                        <td>{{ $reservation->reference }}</td>
                    </tr>

                    <tr>
                        <td>Reservation value</td>
                        <td>{!! $reservation->amount? "&#8358; " . number_format(doubleval($reservation->amount), 2): 'N/a' !!}</td>
                    </tr>

                     <tr>
                        <td>Reservation date</td>
                        <td>{{ $reservation->created_at? date('d M, Y H:i A', strtotime($reservation->created_at)): 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Payment status</td>
                        <td>
                    <tr>
                        <td colspan="2" class="text-center lead">How to pay</td>
                    </tr>

                    <tr>
                        <td> 
                            Bank Name :
                        </td>
                        <td>
                            Some Bank Name
                        </td>
                    </tr>

                    <tr>
                        <td> 
                            Account Name :
                        </td>
                        <td>
                            Some Account Name
                        </td>
                    </tr>



                    <tr>
                        <td> 
                            Account Num :
                        </td>
                        <td>
                            Some Account Num
                        </td>
                    </tr>



                    <tr>
                        <td> 
                            Amount :
                        </td>
                        <td>
                            Payable Amount
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center lead">Have you paid?</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a class="btn btn-primary" href="{{ route('offlines.create', ['id' => $reservation->id]) }}">Provide payment details</a>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
    </section>

@endsection