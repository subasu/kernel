<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baskets extends Model
{
    //relation of product and basket
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    //relation of basket and user
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
