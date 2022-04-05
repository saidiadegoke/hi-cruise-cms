<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\CustomerMadeReservation;
use Illuminate\Support\Facades\Log;
use Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationBooked;
use App\Common\Utility;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Flutterwave;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FlutterwaveController extends Controller
{
    public function pay(Request $request) {
    	$validator = Validator::make($request->all(), [
    		'amount' => ['required'],
    		'email' => ['required'],
    		'tx_ref' => ['required'],
    		//'customizations' => ['required'],
    		'customer' => ['required'],
    	]);

    	$data = $request->all();
    	//unset ($data['_token']);
    	unset ($data['email']);
    	unset ($data['quantity']);
    	$data['customer'] = ['email' => $request->email];
    	$data['customizations'] = ['title' => 'Hi-Impact Cruise', 'logo' => 'https://hi-impactcruise.com/public/assets/img/logo-icon.png', 'description' => 'Pay to Hi-Impact Cruise',];
    	$data['meta'] = ['reservation_id' => $request->reservation_id, 'quantity' => $request->quantity];
    	//$data['amount'] = 20;

    	//$url = 'http://localhost/hi-cruise-cms/test'; //'https://api.flutterwave.com/v3/payments';
    	$url = getenv('FW_PAYMENTS_URL');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt(
          $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . getenv('FW_SECRET_KEY'),
            'Content-Type: application/json'
        ]
        );
        $requestData = curl_exec($ch);

        if(curl_error($ch)){
         //echo 'error:' . curl_error($ch);
            return [
                'error' => true,
                'message' => curl_error($ch),
            ];
         }
        curl_close($ch);

        if ($requestData) {
          $result = json_decode($requestData, true);
          //$data = array_key_exists('data', $result)? $result['data']: null;

          //dd($result);
          if($result && array_key_exists('data', $result)) {
          	return redirect($result['data']['link']);
          }

      }
      //dd('No record received');
      session()->flash('payment_response', 'Couldn\'t process your request. Please retry.');
      return redirect()->back();
    }

    public function process(Request $request) {
    	//dd($request->all());
    	$req = $request->all();
    	if($req && $req['status'] == 'completed' || $req['status'] == 'successful') {
    		$transactionRef = $req['tx_ref'];
    		$transactionId = $req['transaction_id'];

    		if($transactionId) {

    		$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => getenv('FW_TRANSACTION_URL') . $transactionId . "/verify",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "Content-Type: application/json",
			    "Authorization: Bearer " . getenv('FW_SECRET_KEY')
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			//dd ($response);
    	
    	$paymentDetails = json_decode($response, true);

    	if($paymentDetails && $paymentDetails['status'] == 'success') {

    		$data = $paymentDetails['data'];

        // Convert the amount back to Naira
        $amount = (int) $data['amount'];

//Log::info(json_encode($paymentDetails));

        if ($data['status'] == 'successful') {

            $metaData = $data['meta'];

            /*$reservation = Reservation::create([
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
            ]); */

            //$uniqueCode = Utility::generateReservationNo(); //'HC' . str_pad($reservation->id, 7, 0, STR_PAD_LEFT);
            //$reservation->reference = $uniqueCode;
            //$reservation->save();

            $flutterwave = Flutterwave::updateOrCreate([
                'reference' => $data['tx_ref'], ], [
                'transaction_date' => Carbon::parse($data['created_at']),
                'amount' => $amount,
                'currency' => $data['currency'],
                'transaction_id' => $data['id'],
                'status' => $data['status'],
            ]);

            Payment::updateOrCreate([
                'reference' => $data['tx_ref'],
                'customer_id' => auth()->user()->id,
                'reservation_id' => $metaData['reservation_id'],
            ], [
                'method' => 'flutterwave',
                'amount' => $amount,
                'status' => 1,
                'payable_id' => $flutterwave->id,
                'payable_type' => 'App\Models\Paystack',
            ]);

            $reservation = Reservation::where('id', $metaData['reservation_id'])->first();

            $user = Auth::user();
            $customer = $user->customer;
            //$customer->notify(new CustomerMadeReservation($customer, $reservation));
            try {
            $customer->notify(new CustomerMadeReservation($customer, $reservation));
} catch (\Exception $e) {
    Log::info(json_encode($e));
}

            /* Notification::route('mail', 'molatunde@solutionmi.com')
            ->route('mail', 'rasheedsaidi@yahoo.com')
            ->notify(new CustomerMadeReservation($customer, $reservation)); */

            $to = "info@hi-impactcruise.com";
            $subject = "Message from Contact Form";
            $txt = "A customer has just ordered a reservation. " . "\r\n";
            $txt .= "Please find the details below: " . "\r\n";
            $txt .= "Package: " . "\r\n";
            $txt .= "Payment: " . "\r\n";
            $txt .= "Status: " . "\r\n";
            $headers = "From: 'Reservation Booked' <info@hi-impactcruise.com>" . "\r\n" .
            "BCC: rasheedsaidi@yahoo.com";

            //mail($to,$subject,$txt,$headers);
try {
            Mail::to($reservation->email)
                ->bcc(config('mail.adminEmail1'))
                ->cc(config('mail.adminEmail'))
                ->send(new ReservationBooked($reservation));
} catch (Exception $e) {
    Log::info(json_encode($e));
}
            return redirect(route('response', ['reference' => $data['tx_ref'], 'reservation' => $reservation->id]))->with('success', 'Reservation Booked!');
        }
    }
    }
        }
        
        return redirect(route('response', ['reference' => null, 'reservation' => null]))->with('error', 'Payment unsuccessful, Try again!');
        
    }
}
