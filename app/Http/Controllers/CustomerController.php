<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Reservation;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $customer = $user->customer;
        $customer['email'] = $customer->email?: $user->email;
        $customer['usertype'] = $user->usertype;

        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ])->validate();

        $customer->update($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function reservations() {
        $user = Auth::user();
        $customer = $user->customer;

        return redirect()->route('reservations', ['customer' => $customer->id]);
    }

    public function notifications() {
        $user = Auth::user();
        $notifications = $user->customer->notifications;
        return view('customer.notifications', compact('notifications'));
    }

    public function reservation(Request $request) {
        $reservation = Reservation::find($request->reservation);
        //dd($reservation);
        if(!$reservation) {
            return redirect()->back();
        }

        $user = Auth::user();
        $id = $reservation->customer? $reservation->customer->user_id: null;
        if(!($user->id == $id || $user->usertype == 1)) {
            return Auth::check()? redirect('/customer'): redirect('/');
        }

        return view('customer.reservation', compact('reservation'));
    }
}
