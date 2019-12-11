<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\CustomerRegistered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'min:10', 'max:15']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => isset($data['usertype'])? $data['usertype']: 2,
        ]);

        // Create a new Customer In Here and hen return the user so you can log them in by default;
        
        if($user) {
            $customer = Customer::create([
                'user_id' => $user->id,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'email' => $data['email']
            ]);

            $customer->notify(new CustomerRegistered($customer));


        }
        
        return $user;
    }

    public function redirectTo() {
        return (session()->has('name') && session()->has('package'))? url('/package/' . session('package')): url('/customer');
    }

    protected function registered(Request $request, $user)
    {
        $request->session()->flash('registered', true);
        $request->session()->flash('registeredMessage', 'Thank you registering. Your account has been created successfully');


    }
}
