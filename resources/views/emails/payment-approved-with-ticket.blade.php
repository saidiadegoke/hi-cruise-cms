<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hi-Impact Cruise') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--link href="http://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"-->

    <!-- Styles -->
    <!--link href="{{ asset('public/css/app.css') }}" rel="stylesheet"-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div id="app" class="text-center mt-4">
        Dear Esteemed Guest,

        <p>Dear Esteemed Guest,</p>

            <p>Please find attached your ticket for the Hi-Impact Cruise event coming up on the date you selected.</p>

            <p style="margin: 20px; text-align: center;"><a href="{{route('print_receipt', ['reservation' => $reservation->id])}}">Print ticket</a></p>

            <p>
                ENSURE you have this ticket with you either printed out on paper or downloaded on your mobile device, as it is required to board. We look forward to seeing you!
            </p>

            <p>Departure is strictly by 4pm.</p>

            <p>Dream, Discover, Explore.</p>

    </div>
</body>
</html>
