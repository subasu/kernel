<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubUnitCount;
use App\Models\UnitCount;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    //below function is to get main categories from database
    public function getMainCategories()
    {
        $mainCategories = Category::where([['parent_id',0],['active',1]])->get();
        if(count($mainCategories) > 0 )
        {
            return response()->json($mainCategories);
        }
        else
            {
                return response()->json(0);
            }

    }
    //below function is to get sub categories from database
    public function getSubCategories($id)
    {
        $subCategories = Category::where([['parent_id',$id],['active',1]])->get();
        if(count($subCategories) > 0 )
        {
            return response()->json($subCategories);
        }
        else
        {
            return response()->json(0);
        }

    }

    //below function is to get brands from database
    public function getBrands($id)
    {
        $brands = Category::where([['parent_id',$id],['active',1]])->get();
        if(count($brands) > 0 )
        {
            return response()->json($brands);
        }
        else
        {
            return response()->json(0);
        }
    }
    //below function is to get main categories from database
    public function getMainUnits()
    {
        $mainUnits = UnitCount::all();
        if(count($mainUnits) > 0 )
        {
            return response()->json($mainUnits);
        }
        else
        {
            return response()->json(0);
        }

    }
    //below function is to get sub categories from database
    public function getSubunits($id)
    {
        $subUnits = SubUnitCount::where('id','=',$id)->get();
        if(count($subUnits) > 0 )
        {
            return response()->json($subUnits);
        }
        else
        {
            return response()->json(0);
        }

    }
}
