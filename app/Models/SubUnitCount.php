<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubUnitCount extends Model
{
    //relation of unit_count and sub_unit_count
    public function unitCounts()
    {
        return $this->belongsTo('App\Models\UnitCount');
    }

    //relation of products and sub_unit_counts
    public function products()
    {
        return $this->hasMany('App\Models\Product','sub_unit_count_id');
    }
}
