<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UploadedFile as FileUpload;
use Illuminate\Support\Facades\Storage;
use App\Models\SubscriptionList;
use Illuminate\Support\Carbon;
use App\Exports\MailListExport;
use App\Exports\ReservationExport;
use App\Exports\PaymentExport;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slides = Slide::where(['published' => 1])->orderBy('updated_at', 'desc')->paginate(5);

        return view('admin.index', compact('slides'));
    }

    public function emaillist(Request $request) {
        $from = $to = $q = null;
        $emaillist = SubscriptionList::orderBy('updated_at', 'desc');
        if($request->from) {
            $from = Carbon::createFromDate($request->from)->toDateTimeString();
            $emaillist->where('updated_at' , '>=', $from);
        }
        if($request->to) {
            $to = Carbon::createFromDate($request->to)->toDateTimeString();
            $emaillist->where('updated_at' , '<=', $to);
        }
        if($request->q) {
            $q = $request->q;
            $emaillist->orWhere('email' , 'LIKE', '%'.$q.'%');
        }
        
        $emaillist = $emaillist->paginate(10);

        return view('admin.emaillist', compact('emaillist', 'from', 'to', 'q'));
    }

    public function export(Request $request) {
        return (new MailListExport($request->from, $request->to, $request->q))->download('maillist.xlsx');
    }

    public function exportReservations(Request $request) {
        return (new ReservationExport($request->from, $request->to, $request->q))->download('reservations.xlsx');
    }

    public function exportPayments(Request $request) {
        return (new PaymentExport($request->from, $request->to, $request->q))->download('payments.xlsx', null, 
            [
                'Customer Name',
                'Package Name',
                'Cruise Date',
                'Payment Date',
                'Payment Method',
                'Amount Paid',
                'Payment Status'
            ]);
    }

    public function export_maillist_pdf(Request $request) {
        $from = $to = $q = null;
        $emaillist = SubscriptionList::orderBy('updated_at', 'desc');
        if($request->from) {
            $from = Carbon::createFromDate($request->from)->toDateTimeString();
            $emaillist->where('updated_at' , '>=', $from);
        }
        if($request->to) {
            $to = Carbon::createFromDate($request->to)->toDateTimeString();
            $emaillist->where('updated_at' , '<=', $to);
        }
        if($request->q) {
            $q = $request->q;
            $emaillist->orWhere('email' , 'LIKE', '%'.$q.'%');
        }
        
        $data = $emaillist->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.maillist', $data);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('maillist.pdf');
    }

    public function export_reservations_pdf(Request $request) {
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
        }

        $data = $reservations->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.reservations', $data);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('reservations.pdf');
    }
    
}
