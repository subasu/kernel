<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//main site
Route::get('/','IndexController@index');
Route::get('index','IndexController@home');
Route::get('productFiles','IndexController@productFiles');
Route::get('myLogin','IndexController@login');
Route::get('products','IndexController@products');

//categories
Route::get('addCategory','CategoryController@addCategory');//show add category view
Route::get('categoriesManagement','CategoryController@categoriesManagement');//show view of all category
Route::post('addNewCategory','CategoryController@addNewCategory');// add new category in database
Route::get('editCategory/{id}','CategoryController@editCategory');//this route is related to edit main category
Route::get('showSubCategory/{id}','CategoryController@showSubCategory');//this route is related to edit sub category
Route::post('editCategoryPicture','CategoryController@editCategoryPicture');//this route is related to edit category picture
Route::post('editCategoryTitle','CategoryController@editCategoryTitle');//this route is related ti edit category title
//units
Route::get('addUnit','UnitController@addUnit');//show add unit view
Route::get('unitCountManagement','UnitController@unitCountManagement');//show view of all units and subUnits
Route::post('addNewUnit','UnitController@addNewUnit');//show view of all units and subUnits
Route::get('subUnitManagement/{id}','UnitController@subUnitManagement');//show view of all units and subUnits
Route::get('editUnitCount/{id}','UnitController@editUnitCount');
Route::post('editUnitCountTitle','UnitController@editUnitCountTitle');

//productFiles
Route::get('addProduct','ProductController@addProduct');//show add product view
Route::get('productsManagement','ProductController@productsManagement');//show view of all product's details
Route::post('addNewProduct','ProductController@addNewProduct');// add new product in database
Route::get('productDetails/{id}','ProductController@productDetailsGet');
//users
Route::get('usersManagement','UserController@usersManagement');//show view of all customer's details

//orders
Route::get('ordersManagement','OrderController@ordersManagement');//show view of all orders

//deliveryMan
Route::get('addDeliveryMan','DeliveryManController@addDeliveryMan');//show add DeliveryMan view
Route::get('deliveryMansManagement','DeliveryManController@deliveryMansManagement');//show view of all deliveryMans's details
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
