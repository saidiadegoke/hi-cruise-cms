<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Paystack as AppPaystack;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
        return view('cruise.response', compact('reservation'));
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
                'package_id' => $metaData['package_id']
            ]);


            AppPaystack::create([
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
                'status' => 1
            ]);

            return redirect(route('response', ['reference' => $paymentDetails['data']['reference'], 'reservation' => $reservation->id]))->with('success', 'Reservation Booked!');
        } else {
            return redirect('response')->with('error', 'Payment unsuccessful, Try again!');
        }


        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
