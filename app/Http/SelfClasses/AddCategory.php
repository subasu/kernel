<?php

namespace App\Http\SelfClasses;



use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class AddCategory
{
    //
    public function addNewCategory($category)
    {
        $latestCategories = DB::table('categories')->select('id')->orderBy('id','DESC')->first();

        $count = count($category);
        $i = 0;
        while($i < $count)
        {
            $insert = DB::table('categories')->insert
            ([
                 'title' => $category[$i]
            ]);
            $i++;
        }
        $newCategories = DB::table('categories')->select('id')->where('id', '>' ,$latestCategories->id)->get()->toArray();
        $len = count($newCategories);
        while($len > 0)
        {
            DB::table('categories')->where('id',$newCategories[$len])->update(['parent_id' => $newCategories[$len-1]]);
            $len--;
        }

    }
}

