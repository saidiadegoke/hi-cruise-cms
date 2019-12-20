<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'usertype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer() {
        return $this->hasOne('App\Models\Customer');
    }

    public function routeNotificationForMail()
    {
        return $this->emailsToArray();
    }

    public function emailsToArray() {
        $adminEmail = config('mail.adminEmail');
        $emails = null;
        if($adminEmail) { 
            $emails = array_map('trim', explode(',', config('mail.adminEmail')));         
            if($this->email) {
                $emails[] = $this->email; 
            }
        }
        //perform more checks that you need
        return $emails?: [$this->email];
    }
}
