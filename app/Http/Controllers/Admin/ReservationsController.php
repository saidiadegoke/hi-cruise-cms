<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = $to = $q = null;
        $reservations = Reservation::orderBy('created_at', 'desc');

        if($request->from) {
            $from = Carbon::createFromDate($request->from)->toDateTimeString();
            $reservations->where('updated_at' , '>=', $from);
        }
        if($request->to) {
            $to = Carbon::createFromDate($request->to)->toDateTimeString();
            $reservations->where('updated_at' , '<=', $to);
        }
        if($request->q) {
            $reservations->orWhere('email' , 'LIKE', '%'.$request->q.'%');
            $reservations->orWhere('name' , 'LIKE', '%'.$request->q.'%');
            $reservations->orWhere('reference' , 'LIKE', '%'.$request->q.'%');
        }

        $reservations = $reservations->paginate(10);

        return view('reservations.index', compact('reservations', 'from', 'to', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $booking)
    {
        $reservation = $booking;
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function export_pdf(Request $request) {
        $reservation = Reservation::find($request->reservation);
        $data = $reservation;
        $pdf = PDF::loadView('pdf.reservation', compact('reservation'));
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('reservations.pdf');
    }
}
