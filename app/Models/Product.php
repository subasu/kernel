<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //relation of product and product_flags
    public function productFlags()
    {
        return $this->hasMany('App\Models\ProductFlag','product_id');
    }

    //relation of product and category n:m
    public function categories()
    {
        return $this->belongsToMany('Categories');
    }

    //relation of products and baskets
    public function baskets()
    {
        return $this->hasMany('App\Models\Basket','product_id');
    }

    //relation of warehouse and product
    public function warehouses()
    {
        return $this->hasOne('App\Models\Warehouse','product_id');
    }
    //relation of product and product_image
    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage','product_id');
    }

    //relation of product and comments
    public function comments()
    {
        return $this->hasMany('App\Models\ProductComment','product_id');
    }

    //relation of product and product_color
    public function productColors()
    {
        return $this->hasMany('App\Models\ProductColor','product_id');
    }

    //relation of product and product_size
    public function productSizes()
    {
        return $this->hasMany('App\Models\ProductSize','product_id');
    }

    //relation of products and unit_count
    public function unitCounts()
    {
        return $this->belongsTo('App\Models\UnitCount');
    }

    //relation of products and sub_unit_counts
    public function subUnitCounts()
    {
        return $this->belongsTo('App\Models\SubUnitCount');
    }

    //relation of product and score
    public function scores()
    {
        return $this->hasMany('App\Models\ProductScore','product_id');
    }

}
