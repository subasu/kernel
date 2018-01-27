<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/v1'], function () {
    //categories routes
    Route::get('getMainCategories','CommonController@getMainCategories');
    Route::get('getSubCategories/{id}','CommonController@getSubCategories');
    Route::get('getSubmenu/{id}','CommonController@getSubmenu');
    Route::get('getBrands/{id}','CommonController@getBrands');
    Route::get('getExistedCategories/{id}','CommonController@getExistedCategories'); //get existed categories to show to shop manager not to be confused
    Route::post('findCategoryProduct','CommonController@findCategoryProduct');
    Route::get('getDisabledCategories/{id}','CommonController@getDisabledCategories');
    Route::get('getAllDisabledCategories','CommonController@getAllDisabledCategories');

    //unit counts routes
    Route::get('getSubunits/{id}','CommonController@getSubunits');
    Route::get('getMainUnits','CommonController@getMainUnits');
    Route::post('getSubunitsBySubUnitTitle','CommonController@getSubunitsBySubUnitTitle');

    //color routes
    Route::get('getColors','CommonController@getColors');

    //size routes
    Route::get('getSizes','CommonController@getSizes');

    //payment type routes
    Route::get('getPaymentTypes','CommonController@getPaymentTypes');
    Route::post('login','webService\LoginController@login');
});

//below routes are related to some special operation in index page such as add to basket or ...
Route::group(['prefix' => '/v1/user'],function (){

    Route::post('addToBasket','webService\UserController@addToBasket');
    Route::post('getBasketCountNotify','webService\UserController@getBasketCountNotify');
    Route::post('getBasketTotalPrice','webService\UserController@getBasketTotalPrice');
    Route::post('getBasketContent','webService\UserController@getBasketContent');
    Route::get('showProducts/{id}','webService\UserController@showProducts');
    Route::post('removeItemFromBasket','webService\UserController@removeItemFromBasket');
    Route::post('addOrSubCount','webService\UserController@addOrSubCount');
    Route::post('orderRegistration','webService\UserController@orderRegistration');
    Route::post('addCommentForEachProduct','webService\UserController@addCommentForEachProduct');

});

Route::group(['prefix' => '/v1/admin'],function(){
    //category routes
    Route::post('addNewCategory','webService\CategoryController@addNewCategory');// add new category in database
    Route::get('categoriesManagement','webService\CategoryController@categoriesManagement');
    Route::get('editCategory/{id}', 'webService\CategoryController@editCategory');//this route is related to edit main category
    Route::get('getSubCategories/{id}','webService\CategoryController@getSubCategories');
    Route::post('editCategoryTitle', 'webService\CategoryController@editCategoryTitle');//this route is related ti edit category title
    Route::post('editCategoryPicture', 'webService\CategoryController@editCategoryPicture');//this route is related to edit category picture
    Route::post('enableOrDisableCategory', 'webService\CategoryController@enableOrDisableCategory');//this route is related to make categories enable or disable

    //product routes
    Route::get('productsManagement','webService\ProductController@productsManagement');// productManagement
  //  Route::get('updateProduct','webService\ProductController@updateProduct');
    Route::post('addNewProduct', 'webService\ProductController@addNewProduct');// add new product in database

    //unit count routes
    Route::get('getMainUnits','webService\UnitController@getMainUnits');
    Route::post('editUnitCountTitle', 'webService\UnitController@editUnitCountTitle');
    Route::post('enableOrDisableUnitCount', 'webService\UnitController@enableOrDisableUnitCount');
    Route::post('enableOrDisableSubUnitCount', 'webService\UnitController@enableOrDisableSubUnitCount');
    Route::post('addNewUnit', 'webService\UnitController@addNewUnit');

    //color routes
    Route::get('colorsManagement', 'webService\ColorController@colorsManagement'); //this route is related to show all colors
    Route::post('editColorTitle', 'webService\ColorController@editColorTitle');//this route is related to edit color title
    Route::post('addNewColors', 'webService\ColorController@addNewColors');//this route is related to add new colors
    Route::post('enableOrDisableColor', 'webService\ColorController@enableOrDisableColor');

    //size routes
    Route::get('sizesManagement', 'webService\SizeController@sizesManagement');//this route is related to return view of size management
    Route::post('addNewSize', 'webService\SizeController@addNewSize');//this route is related to add new size in data base
    Route::post('editSizeTitle', 'webService\SizeController@editSizeTitle');//this route is related to edit size title
    Route::post('enableOrDisableSize', 'webService\SizeController@enableOrDisableSize');
});

//below routes are related to some general routes in index routes such menu and ...

Route::group(['prefix' => '/v1/general'],function(){

    Route::get('getMainMenu','webService\GeneralController@getMainMenu');
    Route::get('getSubMenu/{id}','webService\GeneralController@getSubMenu');
    Route::get('getBrands/{id}','webService\GeneralController@getBrands');
    Route::post('order','webService\GeneralController@order');

});



