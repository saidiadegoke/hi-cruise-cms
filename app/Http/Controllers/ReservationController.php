<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Payment;

use Paystack;
use PDF;

class ReservationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function all(Customer $customer)
    {
        // $reservations = $customer;
        $reservations = $customer->reservations;
        return view('cruise.reservations', compact('reservations'));
    }

    public function printReciept(Reservation $reservation)
    {
        $payment = Payment::where('reservation_id', '=', $reservation->id)->get();
        $pdf = PDF::loadView('cruise.receipt', compact('payment', 'reservation'));
        return $pdf->download('reservation_receipt.pdf');
    }

    public function fetchDetails()
    {
        $yatch = request('type');
        return redirect()->route('package_details', ['yatch' => request('type'), 'package' => request('package')]);
    }


    public function details($yatch, $package)
    {
        $prices = [
            "eugene"  => [
                "1" => 30000,
                "2" => 35000
            ],
            "eugene1" => [
                "1" => 35000,
                "2" => 40000,
                "3" => 50000
            ]
        ];

        $amount = (float) $prices[request('yatch')][request('package')];

        $yatch_info = ["yatch" => $yatch, "package" => $package, 'amount' => $amount];
        return view('cruise.book', compact('yatch_info'));
    }
}