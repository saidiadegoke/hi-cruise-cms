<?php

namespace App\Http\Controllers;

use App\Models\Offline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Common\Utility;
use App\Models\Payment;
use App\Models\Reservation;
use Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationBooked;
use \Carbon\Carbon;

class OfflinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reservation = Reservation::where('id', $request->id)->first();

        if(!$reservation) {
            return redirect()->back();
        }

        return view('offline.create', compact('reservation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email'],
            'phone' => 'required',
            'address' => 'required',
            'num_seat' => 'required',
            'payment_method' => ['required'],
            'start_date' => 'required',
            'terms_and_conditions' => ['accepted'],
            'session' => 'required',
        ])->validate();

        $metaData = $request->all();
        $uniqueCode = Utility::generateReservationNo();
        $totalPayable = (double) $request->amount * (double) request('num_seat');

        $reservation = Reservation::create([
            'customer_id' => auth()->user()->id,
            'seats' => $metaData['num_seat'],
            'name' => $metaData['name'],
            'phone' => $metaData['phone'],
            'email' => $metaData['email'],
            'address' => $metaData['address'],
            'start_date' => Carbon::parse($metaData['start_date'])->format('Y-m-d'),
            'package_id' => $metaData['package'],
            'used' => 0,
            'session' => $metaData['session'],
            'reference' => $uniqueCode,
            'amount' => $totalPayable,
        ]);

        return redirect()->route('offlines.submitted', ['id' => $reservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offline  $offline
     * @return \Illuminate\Http\Response
     */
    public function show(Offline $offline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offline  $offline
     * @return \Illuminate\Http\Response
     */
    public function edit(Offline $offline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offline  $offline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offline $offline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offline  $offline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offline $offline)
    {
        //
    }

    public function submitted(Request $request)
    {
        $reservation = Reservation::where('id', $request->id)->first();
        
        return view('offline.submitted', compact('reservation'));
    }

    public function pay(Request $request) {

        Validator::make($request->all(), [
            'amount_paid' => ['required'],
            'account' => ['required'],
            'date_paid_at' => ['required'],
        ])->validate();

        $reservation = Reservation::where('id', $request->reservation_id)->first();

        $offline = Offline::create([
            'amount_paid' => $request->amount_paid,
            'account' => $request->account,
            'date_paid_at' => date('Y-m-d', strtotime($request->date_paid_at)),
            'time_paid_at' => $request->time_paid_at,
            'reference_no' => $request->reference,
            'status' => $request->approve? 1: 2
        ]);

        if($offline) {
            $payment = Payment::create([
                'reference' => $request->reference,
                'customer_id' => $reservation->customer_id,
                'reservation_id' => $reservation->id,
                'method' => 'offline',
                'amount' => $request->amount_paid,
                'status' => $offline->status,
                'payable_id' => $offline->id,
                'payable_type' => 'App\Models\Offline',
            ]);
        }

        return redirect()->route('offlines.reservation', ['id' => $reservation->id]);
    }

    public function reservation(Request $request) {

        $reservation = Reservation::where('id', $request->id)->first();
        if(!$reservation) {
            throw new Exception("Page not found!");
        }
        return view('offline.reservation', compact('reservation'));

    }
}
