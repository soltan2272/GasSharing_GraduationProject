<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    public function journeies()
    {
        return $this->hasMany('App\Journey');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
