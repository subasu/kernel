<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    //relation of product and product_size
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
