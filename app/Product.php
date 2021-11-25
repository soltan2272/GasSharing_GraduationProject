<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier','product_supplier_relationships','prod_id','supp_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','Cart','prod_id','user_id');
    }

    public function  category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }

   
}
