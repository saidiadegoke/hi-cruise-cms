<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Paystack as AppPaystack;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomerMadeReservation;
use Illuminate\Support\Facades\Log;
use Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationBooked;

class PaymentController extends Controller
{

    public function __construct(Request $request)
    {
        //dd($request->all());
        //$this->middleware('web');
        //$request->session()->put('booking', $request->all());
        $this->middleware('auth');
    }

    public function response($reference, $reservation)
    {
        $booking = Reservation::where(['id' => $reservation])->first();

        return view('cruise.response', compact('reservation', 'booking'));
    }

    public function offlinePayment(Request $request)
    {
        return view('cruise.offline');
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email'],
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => ['required'],
            'start_date' => 'required',
        ])->validate();

        if (request('payment_method') !== 'paystack') {
            return redirect()->route('offline_payment');
        }

        $totalPayable = (int) $request->amount * (int) request('num_seat') * 100;
        $request->request->set('email', auth()->user()->email);
        $request->request->set('amount', $totalPayable);
        $request->request->set('reference', Paystack::genTranxRef());
        $request->request->set('key', config('paystack.secretKey'));

        $request->request->set('metadata', [
            'package_id' => request('package'),
            'seats' => request('num_seat'),
            'start_date' => Carbon::createFromFormat('Y-m-d', request('start_date')),
            //'finish_date' => Carbon::createFromFormat('Y-m-d', request('finish_date')),
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
            'session' => request('session'),
        ]);
        $request->request->set('quantity', (int) request('num_seat'));
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();


        // Convert the amount back to Naira
        $amount = (int) $paymentDetails['data']['amount'] / 100;

//Log::info(json_encode($paymentDetails));

        if ($paymentDetails['data']['status'] == 'success') {

            $metaData = $paymentDetails['data']['metadata'];

            $reservation = Reservation::create([
                'customer_id' => auth()->user()->id,
                'seats' => $metaData['seats'],
                'name' => $metaData['name'],
                'phone' => $metaData['phone'],
                'email' => $metaData['email'],
                'address' => $metaData['address'],
                'start_date' => Carbon::parse($metaData['start_date'])->format('Y-m-d'),
                //'finish_date' => Carbon::parse($metaData['finish_date'])->format('Y-m-d'),
                'package_id' => $metaData['package_id'],
                'used' => 0,
                'session' => $metaData['session'],
            ]);

            $uniqueCode = 'HC' . str_pad($reservation->id, 7, 0, STR_PAD_LEFT);
            $reservation->reference = $uniqueCode;
            $reservation->save();

            $paystack = AppPaystack::create([
                'reference' => $paymentDetails['data']['reference'],
                'transaction_date' => Carbon::parse($paymentDetails['data']['transaction_date']),
                'amount' => $amount,
                'channel' => $paymentDetails['data']['channel']
            ]);


            Payment::create([
                'reference' => $paymentDetails['data']['reference'],
                'customer_id' => auth()->user()->id,
                'reservation_id' => $reservation->id,
                'method' => 'paystack',
                'amount' => $amount,
                'status' => 1,
                'payable_id' => $paystack->id,
                'payable_type' => 'App\Models\Paystack',
            ]);

            $user = Auth::user();
            $customer = $user->customer;
            $customer->notify(new CustomerMadeReservation($customer, $reservation));

            /*Notification::route('mail', 'molatunde@solutionmi.com')
            ->route('mail', 'rasheedsaidi@yahoo.com')
            ->notify(new CustomerMadeReservation($customer, $reservation));*/

            $to = "info@hi-impactcruise.com";
            $subject = "Message from Contact Form";
            $txt = "A customer has just ordered a reservation. " . "\r\n";
            $txt .= "Please find the details below: " . "\r\n";
            $txt .= "Package: " . "\r\n";
            $txt .= "Payment: " . "\r\n";
            $headers = "From: 'Reservation Booked' <info@hi-impactcruise.com>" . "\r\n" .
            "BCC: rasheedsaidi@yahoo.com";

            //mail($to,$subject,$txt,$headers);

            Mail::to(config('mail.adminEmail'))
                ->bcc(config('mail.adminEmail1'))
                ->send(new ReservationBooked($reservation));

            return redirect(route('response', ['reference' => $paymentDetails['data']['reference'], 'reservation' => $reservation->id]))->with('success', 'Reservation Booked!');
        } else {
            return redirect('response')->with('error', 'Payment unsuccessful, Try again!');
        }


        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function verifyTicket() {
        return view("payments.verify-ticket");
    }

    public function verifyCode(Request $request) {
        $reference = $request->post("reference");
        $reservation = Reservation::where(['reference' => $reference])->first();
        if($reservation && $reservation->used == 0) {
            $reservation->used = 1;
            $reservation->save();
            return [
                "error" => false,
                "message" => "Ticket validated!"
            ];
        } else {
            $reservation->used = 0;
            $reservation->save();
            return [
                "error" => true,
                "message" => "Invalid ticket"
            ];
        }
    }
}
