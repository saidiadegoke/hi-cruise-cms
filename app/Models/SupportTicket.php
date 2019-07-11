<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    /*
     * Fillables
     */

    protected $fillable = ["user_id", "title", "body"];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
