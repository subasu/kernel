<?php

namespace App\Http\Controllers\webService;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    //below function is related to get main menu
    public function getMainMenu()
    {
        $mainMenu  = Category::where([['parent_id',null],['grand_parent_id',null],['depth','<>',0]])->get();
        return response()->json(['mainMenu' => $mainMenu]);
    }

    //below function is related to get sub menu
    public function getSubMenu($id)
    {
        $subMenu  = Category::where('parent_id',$id)->get();
        return response()->json(['subMenu' =>$subMenu ]);
    }

    //below function is related to get brands
    public function getBrands($id)
    {
        $brands = Category::where('parent_id',$id)->get();
        return response()->json(['brands' => $brands]);
    }
}
