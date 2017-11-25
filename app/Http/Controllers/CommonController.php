<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    //below function is to get categories from database
    public function getMainCategories()
    {
        $mainCategories = Categories::where([['parent_id',0],['active',1]])->get();
        if(count($mainCategories) > 0 )
        {
            return response()->json($mainCategories);
        }
        else
            {
                return response()->json(0);
            }

    }
}
