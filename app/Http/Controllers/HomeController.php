<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yacht;
use App\ModeDbls\SupportTicket;
use Illuminate\Support\Str;

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
        $about = \App\Models\Page::byCategory(2);
        $yachts = Yacht::all();
        $rdn = Str::random(6);
        return view('cruise.home', compact('yachts', 'about', 'rdn'));
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
