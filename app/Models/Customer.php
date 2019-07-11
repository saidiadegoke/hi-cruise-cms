<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Fillables
     */
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'email', 'address', 'city', 'state', 'country_id',
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
}
