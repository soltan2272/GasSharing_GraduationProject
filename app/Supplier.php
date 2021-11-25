<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   
    public function products()
    {
        return $this->belongsToMany('App\Product','product_supplier_relationships','supp_id','prod_id');
    }
}

