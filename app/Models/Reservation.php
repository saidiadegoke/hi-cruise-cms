<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'package_id', 'name', 'phone', 'email', 'address', 'start_date', 'finish_date',  'seats', 'customer_id', 'reference', 'used',
    ];

    protected $appends = ['package_name', 'package_description', 'date', 'payment_made', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function package() {
    	return $this->belongsTo('App\Models\Package');
    }

    public function payment() {
    	return $this->hasOne('App\Models\Payment');
    }

    public function getPackageNameAttribute() {
       return $this->package? $this->package->name: 'n-a';
    }

    public function getPackageDescriptionAttribute() {
        return $this->package? $this->package->description: '';
    }

    public function getDateAttribute() {
        return date('d F, Y', strtotime($this->created_at));
    }

    public function getPaymentMadeAttribute() {
        return $this->payment? 'Yes': 'No';   
    }

    public function getAmountAttribute() {
        return $this->payment? "&#8358; " . number_format($this->payment->amount, 2): 'N/a';
    }

}
