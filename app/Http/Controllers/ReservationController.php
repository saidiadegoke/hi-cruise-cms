<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Questionaire;

use Paystack;
use PDF;
use App\Models\Package;
use App\Models\Decoration;
use App\Models\EventEntertainment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\CruiseAvailableDay;
use App\Models\CruiseDateSetting;
use App\Common\CruiseDate;
use App\Models\CustomDay;

class ReservationController extends Controller
{
    //

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function store(Request $request)
    {

        $this->validate(request(), [
            "fullname" => "required",
            "organization" => "required",
            "contact_email" => "required|email",
            "contact_number" => "required",
            "event_type" => "required",
            "guests" => "required",
            "event_date" => "required",
            "catering" => "required",
            "yacht_state" => "required",
            "event_duration" => "required",
            "event_setup_duration" => "filled",
        ]);


        $decoration = request('decoration');
        $entertainment = request('entertainment');
        $questionaire = Questionaire::create(request()->all());


        foreach ($entertainment as $key => $value) {
            if ($value === null) continue;
            $questionaire->entertainments()->save(new EventEntertainment(["name" => $value]));
        }

        foreach ($decoration as $key => $value) {
            if ($value === null) continue;
            $questionaire->decorations()->save(new Decoration(["name" => $value]));
        }

        return view('cruise.bookings_confirmation');
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
        $qrcode_name = time();
        $qrpath = 'storage/app/public/qrcodes/' . $qrcode_name . '.png';
        QrCode::encoding('UTF-8')->format('png')->size(120)->margin(0)->generate($reservation->reference, $qrpath);
        $pdf = PDF::loadView('cruise.receipt', compact('payment', 'reservation', 'qrpath'));
        return $pdf->download('reservation_receipt.pdf');
    }

    public function fetchDetails()
    {
        $type = request('type');
        if ($type == 'event') {
            return view('cruise.event');
        }
        return redirect()->route('package_details', ['package' => request('package')]);
    }


    public function details(Package $package)
    {
        $setting = new CruiseDateSetting();
        $startDate = $setting->getItem("cruise_start_date")? : date('Y-m-d');
        $date = new CruiseDate($startDate);
        
        $days = CruiseAvailableDay::all();
        $customDates = CustomDay::all();
        $activeDays = [];
        foreach($days as $d) {
            if($d->available == 1)
                $activeDays[] = strtolower($d->short);
        }

        $dates = $date->cruiseDateItems($setting->getItem("days_per_page"), $activeDays, $customDates);

        if($package->type == 'event') {
            return view('cruise.event');
        }
        //var_dump(old());
        return view('cruise.book', compact('package', 'dates'));
    }
}
