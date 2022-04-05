<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    //

    protected $fillable = ["fullname", "organization", "contact_email", "contact_number", "event_type", "guests", "event_date", "catering", "yacht_state", "event_duration", "event_setup_duration"];



    public function decorations()
    {
        return $this->hasMany(Decoration::class);
    }

    public function entertainments()
    {
        return $this->hasMany(EventEntertainment::class);
    }

    public function event_decoration() {
        $decorations = $this->decorations;
        $str = [];
        foreach($decorations as $item) {
            if($item)
                $str[] = $item->name;
        }
        return implode($str, ", ");
    }

    public function event_entertainment() {
        $decorations = $this->entertainments;
        $str = [];
        foreach($decorations as $item) {
            if($item)
                $str[] = $item->name;
        }
        return implode($str, ", ");
    }
}
