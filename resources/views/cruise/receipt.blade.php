<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
    <div class="container">

    <h1>This would hold the receipt </h1>
    
    <div>Amount Paid: {{$payment->pluck('amount')->first()}}</div>
    <div>Payment Reference Code : {{$payment->pluck('reference')->first()}} </div>
    <div>Payment Date: {{$payment->pluck('created_at')->first()}}</div>
    <div>No Of Seats : {{$reservation->pluck('seats')->first()}}</div>
    <div>Booked For: {{$reservation->pluck('start_date')->first()}}</div>




    </div>
</section>

</body>

</html>