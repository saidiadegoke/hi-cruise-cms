<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Questionaire;
use App\Common\ValidRecaptcha;

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
use Illuminate\Support\Facades\Validator;
use App\Common\Utility;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventFormSubmitted;
use App\Mail\EventFormSubmissionConfirmed;
use App\Mail\ReservationFormSubmitted;
use App\Common\CruiseDateItem;
use App\Mail\ReservationBooked;
use Illuminate\Support\Facades\Auth;

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
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ]);


        $decoration = request('decoration');
        $entertainment = request('entertainment');
        $questionaire = Questionaire::create(request()->all());

        $event = $request->all();
        $event['decoration'] = implode(", ", $decoration);
        $event['entertainment'] = implode(", ", $entertainment);

        foreach([config('mail.adminEmail'), config('mail.adminEmail1')] as $recipient) {
            Mail::to($recipient)->send(new EventFormSubmitted($event));
        }

        Mail::to($request->contact_email)->send(new EventFormSubmissionConfirmed($event));

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
        $user = Auth::user();
        if(!($user->id == $customer->user_id || $user->usertype == 1)) {
            return redirect('/customer');
        }

        $reservations = Reservation::where('customer_id', $customer->id)->orderBy('created_at', 'desc')->paginate(10);
        //$reservations = $customer->reservations->orderBy('created_at', 'desc');
        return view('cruise.reservations', compact('reservations'));
    }

    public function printReciept(Reservation $reservation)
    {
        $user = Auth::user();
        $id = $reservation->customer? $reservation->customer->user_id: null;
        if(!($user->id == $id || $user->usertype == 1)) {
           // return Auth::check()? redirect('/customer'): redirect('/');
        }

        if(!$reservation->payment || intval($reservation->payment->status) != 1) {
            return redirect('/customer');
        }

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
        //$dateItem = new CruiseDateItem("2020-10-01", 0, 1, 1);
//dd($dates);
        $dates = collect($dates)->filter(function($value, $key) {
            return $value->isAvailable();
        });
        //$dates = [$dateItem];

        if(!$package || intval($package->publish) != 1) {
            return redirect()->back();
        }

        if($package->type == 'event') {
            return view('cruise.event');
        }
        $pac = $dates;
        //var_dump(old());
        return view('cruise.book', compact('package', 'dates', 'pac'));
    }

    public function book(Request $request) {
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
            'g-recaptcha-response' => ['required', new ValidRecaptcha]

        ])->validate();

        $metaData = $request->all();
        $uniqueCode = Utility::generateReservationNo();
        $totalPayable = (double) $request->amount * (double) request('num_seat');
        $request->date = $metaData['start_date'];
        $request->package_id = $metaData['package'];
        
        $package = Package::find($metaData['package']);
        if($this->check_availability($request) + intval($metaData['num_seat']) > intval($package->total_available)) {
            $remaining = intval($package->total_available) - $this->check_availability($request);
            $left = $remaining > 0? $remaining: 0;
            return back()->withInput()->with('seat_limit', 'Maximum no of seats reached! ' . $left . ' seat(s) remaining.');
        }

        $reservation = Reservation::create([
            'customer_id' => auth()->user()->customer? auth()->user()->customer->id : '',
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
            'payment_method' => $request->payment_method,
        ]);

        Mail::to($request->email)->send(new ReservationFormSubmitted($reservation));

        return redirect()->route('reservation.submitted', ['id' => $reservation, 'mode' => $request->payment_method]);
    }

    public function submitted(Request $request)
    {
        $reservation = Reservation::where('id', $request->id)->first();
        $mode = $request->mode;
        //dd($reservation);
        return view('reservations.submitted', compact('reservation', 'mode'));
    }

     public function sendMail(Request $request) {
        $reservation = Reservation::find($request->reservation_id);
        if($reservation) {
            Mail::to($reservation->email)
                    ->bcc(config('mail.adminEmail1'))
                    ->cc(config('mail.adminEmail'))
                    ->send(new ReservationBooked($reservation));

            session()->flash('sendMail', 'Email sent successfully');
        } else {
            session()->flash('sendMail', 'Reservation info not found!');
        }
        return redirect()->back();
     }

     public function check_availability(Request $request) {
        if($request->package_id == 3 || $request->package_id == 19) {
            $reservations1 = Reservation::where('start_date', $request->date)->where('package_id', '3')->get();
            $sum1 = 0;
            foreach($reservations1 as $res) {
                if($res->payment && $res->payment->status == 1) {
                    $sum1 += intval($res->seats);
                }
            }
            $reservations = Reservation::where('start_date', $request->date)->where('package_id', '19')->get();
            $sum = 0;
            foreach($reservations as $res1) {
                if($res1->payment && $res1->payment->status == 1) {
                    $sum += intval($res1->seats);
                }
            }

            $total = $sum1 + $sum;
            return $total;
        } else if($request->package_id == 1 || $request->package_id == 17) {
            $reservations1 = Reservation::where('start_date', $request->date)->where('package_id', '1')->get();
            $sum1 = 0;
            foreach($reservations1 as $res) {
                if($res->payment && $res->payment->status == 1) {
                    $sum1 += intval($res->seats);
                }
            }
            $reservations = Reservation::where('start_date', $request->date)->where('package_id', '17')->get();
            $sum = 0;
            foreach($reservations as $res1) {
                if($res1->payment && $res1->payment->status == 1) {
                    $sum += intval($res1->seats);
                }
            }

            $total = $sum1 + $sum;
        } else if($request->package_id == 2 || $request->package_id == 18) {
            $reservations1 = Reservation::where('start_date', $request->date)->where('package_id', '2')->get();
            $sum1 = 0;
            foreach($reservations1 as $res) {
                if($res->payment && $res->payment->status == 1) {
                    $sum1 += intval($res->seats);
                }
            }
            $reservations = Reservation::where('start_date', $request->date)->where('package_id', '18')->get();
            $sum = 0;
            foreach($reservations as $res1) {
                if($res1->payment && $res1->payment->status == 1) {
                    $sum += intval($res1->seats);
                }
            }

            $total = $sum1 + $sum;
        } else {
            $reservations = Reservation::where('start_date', $request->date)->where('package_id', $request->package_id)->get();
            $sum = 0;
            foreach($reservations as $res1) {
                if($res1->payment && $res1->payment->status == 1) {
                    $sum += intval($res1->seats);
                }
            }

            $total = $sum;
        }
        return $total;
     }
}
