<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/29/2017
 * Time: 8:26 AM
 */

namespace App\Http\SelfClasses;


use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductFlag;
use App\Models\ProductImage;
use Hekmatinasser\Verta\Verta;

class AddProduct
{
    public function addProduct($product)
    {
        function addCategoryProduct($pId, $cateId)
        {
            $productCategory = new CategoryProduct();
            $productCategory->product_id = $pId;
            $productCategory->category_id = $cateId;
            $productCategory->active = 1;
            $productCategory->save();
        }
        //add a flags with flag's price in product flags
        function addProductFlag($title, $price, $lastProductId)
        {
            $prices = new ProductFlag();
            $prices->title = $title;
            $prices->product_id = $lastProductId;
            $prices->active = 0;
            $prices->price = str_replace(',','',$price);
            $prices->save();
        }
        $videoSrc='';
        if (!empty($product->video_src)) {
            $file = $product->video_src;
            $videoSrc = $file->getClientOriginalName();
            $file->move('public/dashboard/productFiles/video/', $videoSrc);
        }
        $jDate = $request->date;
        if ($date = explode('/', $jDate)) {
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];
        }
        $gDate = $this->jalaliToGregorian($year, $month, $day);
        $gDate1 = $gDate[0] . '-' . $gDate[1] . '-' . $gDate[2];
        //add a new product in product table
        $pr = new Product();
        $pr->title = $product->title;
        $pr->description = $product->description;
        $pr->discount = $product->discount;
        $pr->produce_date = $this->dateConvert($product->produce_date);
        $pr->expire_date = $this->dateConvert($product->expireDate);
        $pr->produce_place = $product->produce_place;
        $pr->unit_count = $product->unit_count;
        $pr->sub_unit_count = $product->sub_unit_count;
        $pr->ready_time = $product->ready_time;
        $pr->video_src = $videoSrc;
        $pr->delivery_volume = $product->delivery_volume;
        $pr->warehouse_count = $product->warehouse_count;
        $pr->warehouse_place = $product->warehouse_place;
        $pr->barcode = $product->barcode;
        $pr->save();

        $lastProductId = Product::orderBy('created_at', 'desc')->offset(0)->limit(1)->value('id');

        $count = count($product->file);
        if($count)
        {
            for($i=0;$i<$count;$i++)
            {
                $productPicture=new ProductImage();
                $productPicture->product_id=$lastProductId;
                $imageName=$product->file[$i]->getClientOriginalName();
                $productPicture->image_src=$imageName;
                $product->file[$i]->move('public/dashboard/productFiles/picture/',$imageName);
                $productPicture->active=1;
                $productPicture->save();

            }

        }
        addProductFlag('price', $product->price, $lastProductId);

        if (!empty($product->special_price)) {
            addProductFlag('special_price', $product->special_price, $lastProductId);
        }
        if (!empty($product->wholesale_price)) {
            addProductFlag('wholesale_price', $product->wholesale_price, $lastProductId);

        }
        if (!empty($product->sales_price)) {
            addProductFlag('sales_price', $product->sales_price, $lastProductId);
        }
        if (!empty($product->free_price)) {
            addProductFlag('free_price', $product->free_price, $lastProductId);
        }
        /**this section check user select which level of categories
         * if didn't select lastest level make a subcategiries with 'سایر' title in category table
         *and then insert row to category_product table with this product_id and category_id
         **/
        $catId=0;
        if (empty($product->subCategories))
            $catId=$product->categories;
        elseif (empty($product->brands))
            $catId=$product->subCategories;
        //check 'سایر' category exist or not
        $subCatId = Category::where([['parent_id', $catId], ['active', 1]])->where('title', '=', 'سایر')->value('id');
        if ($subCatId != 0) {
            addCategoryProduct($lastProductId, $subCatId);
        } else {
            $category = new Category();
            $category->title = 'سایر';
            $category->parent_id = $product->categories;
            $category->depth = 0;
            $category->save();
            $subCategoriesId = Category::where([['parent_id', $product->categories], ['active', 1]])->where('title', '=', 'سایر')->value('id');
            addCategoryProduct($lastProductId, $subCategoriesId);
        }
        return (true);
    }

    function dateConvert($jalaliDate)
    {
        if ($date = explode('/', $jalaliDate)) {
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];
        }
        $gDate = $this->jalaliToGregorian($year, $month, $day);
        $gDate = $gDate[0] . '-' . $gDate[1] . '-' . $gDate[2];
        return $gDate;
    }

    public function jalaliToGregorian($year, $month, $day)
    {
        return Verta::getGregorian($year, $month, $day);
    }
}