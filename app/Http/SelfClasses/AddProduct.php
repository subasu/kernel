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

class AddProduct
{
    public function addProduct($product)
    {
        if ($product) {
            $pr = new Product();
            $prices = new ProductFlag();
            $pr->title = $product->title;
            $pr->description = $product->description;
            $pr->discount = $product->discount;
            $pr->produce_date = $product->produce_date;
            $pr->expire_date = $product->expire_date;
            $pr->produce_place = $product->produce_place;
            $pr->unit_count_id = $product->unit_count_id;
            $pr->sub_unit_count_id = $product->sub_unit_count_id;
            $pr->ready_time = $product->ready_time;
            $pr->video_src = $product->video_src;
            $pr->delivery_volume = $product->delivery_volume;
            $pr->warehouse_count = $product->warehouse_count;
            $pr->warehouse_place = $product->warehouse_place;
            $pr->barcode = $product->barcode;
            $pr->save();

            $lastProductId = Product::orderBy('created_at', 'desc')->offset(0)->limit(1)->value('id');
            addProductFlag('price',$product->price,$lastProductId);

            if (!empty($product->special_price)) {
                addProductFlag('special_price',$product->special_price,$lastProductId);
//                $prices = new ProductFlag();
//                $prices->price = $product->special_price;
//                $prices->title = 'special_price';
//                $prices->id = $lastProductId;
//                $prices->active = 0;
//                $prices->save();

            }
            if (!empty($product->wholesale_price)) {
                addProductFlag('wholesale_price',$product->wholesale_price,$lastProductId);

            }
            if (!empty($product->sales_price)) {
                addProductFlag('sales_price',$product->sales_price,$lastProductId);
            }
            if (empty($product->subCategories)) {
                $subCategoriesId = Category::where([['parent_id', $product->categories], ['active', 1]])->where('title', '=', 'سایر')->value('id');
                if ($subCategoriesId != 0) {
                    addCategoryProduct($lastProductId,$subCategoriesId);
//                    $productCategory = new CategoryProduct();
//                    $productCategory->product_id = $lastProductId;
//                    $productCategory->category_id = $subCategoriesId;
//                    $productCategory->active = 1;
//                    $productCategory->save();
                } else {
                    $category = new Category();
                    $category->title = 'سایر';
                    $category->parent_id = $product->categories;
                    $category->depth = 0;
                    $category->save();
                    $subCategoriesId = Category::where([['parent_id', $product->categories], ['active', 1]])->where('title', '=', 'سایر')->value('id');
                    addCategoryProduct($lastProductId,$subCategoriesId);
                }
            } elseif (empty($product->brands)) {
                $brandId = Category::where([['parent_id', $product->subCategories], ['active', 1]])->where('title', '=', 'سایر')->value('id');
                if ($brandId != 0) {
                    addCategoryProduct($lastProductId,$brandId);

//                    $productCategory = new CategoryProduct();
//                    $productCategory->product_id = $lastProductId;
//                    $productCategory->category_id = $brandId;
//                    $productCategory->active = 1;
//                    $productCategory->save();
                } else {
                    $category = new Category();
                    $category->title = 'سایر';
                    $category->parent_id = $product->categories;
                    $category->depth = 0;
                    $category->save();
                    $brandId = Category::where([['parent_id', $product->subCategories], ['active', 1]])->where('title', '=', 'سایر')->value('id');
                    addCategoryProduct($lastProductId,$brandId);
                }
            }
            return (true);
        } else {
            return (false);
        }
        function addCategoryProduct($pId, $catId)
        {
            $productCategory = new CategoryProduct();
            $productCategory->product_id = $pId;
            $productCategory->category_id = $catId;
            $productCategory->active = 1;
            $productCategory->save();
        }
        function addProductFlag($title, $price ,$lastProductId)
        {
            $prices = new ProductFlag();
            $prices->price = $price;
            $prices->title = $title;
            $prices->id = $lastProductId;
            $prices->active = 0;
            $prices->save();
        }
    }
}