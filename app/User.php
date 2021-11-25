<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Car;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cars()
    {
        return $this->hasOne('App\Car');
    }
    public function journeies()
    {
        return $this->hasMany('App\Journey');
    }
    public function journey_user()
    {
        return $this->belongsToMany('App\Journey','myrequests','userid','journeyid');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
    }

    public function hasRole($role)
    {
        if($this->roles()->where('role',$role)->first())
        {
            return true;
        }
        return false;
    }

}
