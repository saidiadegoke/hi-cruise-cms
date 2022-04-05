<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintPayment extends Model
{
    public $customer;
    public $package_name;
    public $package_description;
    public $date;
    public $amount;
    public $status;

    public function __construct($array) {
    	$this->customer = $array['customer'];
    	$this->package_name = $array['package_name'];
    	$this->package_description = $array['package_description'];
    	$this->date = $array['date'];
    	$this->amount = $array['amount'];
    	$this->status = $array['status'];
    }
}
