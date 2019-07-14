<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use App\Common\ValidRecaptcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contact;

class CruiseController extends Controller
{
    //
    public function about()
    {
        return view("cruise.about");
    }

    public function contact(Request $request)
    {
        if($request->submit) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => ['required', 'string', 'email'],
                'phone' => 'required',
                'comment' => 'required',
                'g-recaptcha-response' => ['required', new ValidRecaptcha]
            ])->validate();

            //if($request['g-recaptcha-response']);

            Contact::create($request->all());
            $to = "info@hi-impactcruise.com";
            $subject = "Message from Contact Form";
            $txt = "Name: " . $request->name . "\r\n";
            $txt .= "Email: " . $request->email . "\r\n";
            $txt .= "Phone: " . $request->phone . "\r\n";
            $txt .= "Comment: " . $request->comment . "\r\n";
            $headers = "From: 'Hi-Impact Cruise' <info@hi-impactcruise.com>" . "\r\n" .
            "BCC: rasheedsaidi@gmail.com";

            mail($to,$subject,$txt,$headers);

            $request->session()->flash('submitted', 'Thank you for contacting us. We\'ll get back to you within 48 hours');
        }
        
        return view("cruise.contact");
    }

    public function eugene()
    {
        return view("cruise.eugene");
    }

    public function eugene1()
    {
        return view("cruise.eugene1");
    }

    public function gallery()
    {
        return view("cruise.gallery");
    }

    public function packages()
    {
        return view("cruise.packages");
    }
}
