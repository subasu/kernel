<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 12/2/2017
 * Time: 1:25 PM
 */

namespace App\Http\SelfClasses;


use App\Models\Category;
use App\Models\Product;

class NotToBeRepeated
{
    public function notToBeRepeated($request,$parameter)
    {
        switch ($parameter)
        {
            //below block of code is to check title of products not to be repeated
            case 'product' :
                $titles = '';
                $products = Product::all();
                foreach ($products as $product)
                {
                    if($product->title == $request->title)
                    {
                        $titles .= $request->title;
                    }
                }
                if($titles != '')
                {
                    return 'محصولی با این عنوان قبلا ذخیره شده است';
                }else
                    {
                        return true;
                    }

            break;

            //below block of code is to check title of categories not to be repeated
            case 'category':
                $titles = '';
                $categories = Category::all();
                $count      = count($request->category);
                $i = 0;
                while($i < $count)
                {
                    foreach ($categories as $category)
                    {
                       if($category->title == $request->category[$i])
                       {
                          $titles .="\n". $request->category[$i];
                       }
                    }
                    $i++;
                }

                if($titles != '')
                {
                    return 'دسته یا دسته های زیر قبلا ذخیره شده اند'. "\n".$titles;
                }else
                    {
                        return true;
                    }
            break;
        }
    }
}