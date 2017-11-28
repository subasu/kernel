<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/28/2017
 * Time: 3:28 PM
 */

namespace App\Http\SelfClasses;


use Illuminate\Support\Facades\DB;

class CheckCategoryFiles
{
    public function checkCategoryFiles($request)
    {
        if($request->hasFile('file'))
        {
            $allowedExtension = array('png','jpg');
            foreach ($request->file as $file)
            {
                if(!in_array($file->getClientOriginalExtension(),$allowedExtension))
                {
                    if($file->getClientSize() < 150000)
                    {
                        return true;
                    }else
                        {
                             return false;

                        }
                }else
                    {
                        return false;

                    }

            }

        }

//                $extension = $request->image->getClientOriginalExtension();
//                $size      = $request->image->getClientSize();

   }

}