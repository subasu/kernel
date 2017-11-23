<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //relation of product and product_colors
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
