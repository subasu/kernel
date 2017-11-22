<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addNewCategory()
    {
        $add = new AddCategory();
        $name="sabre ayoob";
        $add->addNewCategory($name,null);
    }
}
