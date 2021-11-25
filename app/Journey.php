<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    //
    public function car()
    {
        return $this->belongsTo('App\Car','carid');
    }

    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','myrequests','journeyid','userid');
    }
}
