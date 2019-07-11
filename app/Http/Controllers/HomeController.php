<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yatch;
use App\Models\SupportTicket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $yatchs = Yatch::all();
        return view('cruise.home', compact('yatchs'));
    }

    public function contactSupport(Request $request)
    {
        $this->validate(request(), [
            "title" => "required|min:4",
            "body" => "required|min:10"
        ]);
        // dd(request());
        $request->request->set("user_id", auth()->user()->id);
        SupportTicket::create(request()->all());
        return redirect()->route("support")->with("success", "Your Ticket has been submitted. Hang on we will respond shortly");
    }

    public function support()
    {
        return view('cruise.support');
    }
}
