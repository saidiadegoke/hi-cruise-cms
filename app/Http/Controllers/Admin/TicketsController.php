<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use App\Exports\TicketExport;

class TicketsController extends Controller
{
    public function index(Request $request) {
    	$from = $to = $q = null;
    	$tickets = Reservation::where('used', 1)->orderBy('updated_at', 'DESC');

    	if($request->from) {
            $from = Carbon::createFromDate($request->from)->toDateTimeString();
            $tickets->where('updated_at' , '>=', $from);
        }
        if($request->to) {
            $to = Carbon::createFromDate($request->to)->toDateTimeString();
            $tickets->where('updated_at' , '<=', $to);
        }
        if($request->q) {
            $q = $request->q;
            $tickets->where('reference' , 'LIKE', '%'.$q.'%');
        }
        $tickets = $tickets->paginate(10);
        //dd($tickets);
    	return view('tickets.index', compact('tickets', 'from', 'to', 'q'));
    }

    public function show($id) {
    	$reservation = Reservation::find($id);
    	return view('tickets.show', compact('reservation'));
    }

    public function export(Request $request) {
        return (new TicketExport($request->from, $request->to, $request->q))->download('tickets.xlsx');
    }
}
