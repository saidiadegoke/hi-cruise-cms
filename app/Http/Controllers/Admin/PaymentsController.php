<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = $to = $q = null;
        $payments2 = Payment::with('reservation')->orderBy('created_at', 'desc');
        $payments1 = DB::table('payments')
            ->join('reservations', 'payments.reservation_id', '=', 'reservations.id')
            ->select('payments.*', 'reservations.start_date')
            ->orderBy('created_at', 'desc');
            //->paginate(2);

        $payments = Payment::whereHas('reservation', function(Builder $query) use ($request) {
            if($request->from) {
                $from = Carbon::createFromDate($request->from)->toDateTimeString();
                $query->where('start_date' , '>=', $from);
            }
            if($request->to) {
                $to = Carbon::createFromDate($request->to)->toDateTimeString();
                $query->where('start_date' , '<=', $to);
            }
        })->orderBy('updated_at', 'desc');

        /*
        if($request->from) {
            $from = Carbon::createFromDate($request->from)->toDateTimeString();
            $payments = $payments->where('updated_at' , '>=', $from);
        }
        if($request->to) {
            $to = Carbon::createFromDate($request->to)->toDateTimeString();
            $payments = $payments->where('updated_at' , '<=', $to);
        } */
        if($request->q) {
            $payments = $payments->orWhere('status' , 'LIKE', '%'.$request->q.'%');
            $payments = $payments->orWhere('reference' , 'LIKE', '%'.$request->q.'%');
            $payments = $payments->orWhere('amount' , 'LIKE', '%'.$request->q.'%');
        }

        $payments = $payments->paginate(10);
        $from = $request->from;
        $to = $request->to;
        $q = $request->q;
        
        return view('payments.index', compact('payments', 'from', 'to', 'q'));
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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
