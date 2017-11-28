<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitCount extends Model
{
    protected $table="unit_count";
    //relation of unit_count and products
    public function products()
    {
        return $this->hasMany('App\Models\Product','unit_count_id');
    }
}
