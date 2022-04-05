<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use App\Common\ValidRecaptcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Notifications\CustomerRegistered;
use App\User;
use App\Models\MediaFile;
use App\Models\MediaFilePurpose;
use App\Models\SubscriptionList;
use App\Models\ContactLog;
use App\Models\Yacht;

class CruiseController extends Controller
{
    //
    public function testmail()
    {
        $user = User::where(['email' => 'rasheedsaidi@gmail.com'])->first();
        $customer = $user->customer;
        $customer->notify(new CustomerRegistered($customer));
        return view("cruise.about");
    }

    public function toc() {
        return view('cruise.toc');
    }

    public function subscribe(Request $request) {
        Validator::make($request->all(), ['email' => ['required', 'string', 'email', 'max:255']])->validate();

        SubscriptionList::updateOrCreate(['email' => $request->email]);

        return view('cruise.subscribed');
    }

    public function about()
    {
        $about = \App\Models\Page::byCategory(2);
        return view("cruise.about", compact('about')); 
    }

    public function contact(Request $request)
    {
        $contact = \App\Models\Page::byCategory(3);
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

            //mail($to,$subject,$txt,$headers);
            ContactLog::create(['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'comment' => htmlentities($request->comment)]);

            $request->session()->flash('submitted', 'Thank you for contacting us. We\'ll get back to you within 48 hours');
        }
        
        return view("cruise.contact", compact('contact'));
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
        $purpose = MediaFilePurpose::where(['name' => 'gallery'])->first();
        $galleries = $purpose? $purpose->mediaFiles: null;  

        return view("cruise.gallery", compact('galleries'));
    }

    public function packages()
    {
        $yachts = Yacht::where('purpose', 'yacht')->get();
        return view("cruise.packages", compact('yachts'));
    }
}
