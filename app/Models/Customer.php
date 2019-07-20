<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'email', 'address', 'city', 'state_id', 'country_id',
    ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function state() {
        return $this->belongsTo('App\Models\State');
    }

    public function country() {
        return $this->belongsTo('App\Models\Country');
    }
}
