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
//categories
Route::get('addCategory','IndexController@addCategory');//show add category view
Route::get('categoriesManagement','ProductController@categoriesManagement');//show view of all category
Route::post('addNewCategory','ProductController@addNewCategory');// add new category in database
//units
Route::get('addUnit','ProductController@addUnit');//show add unit view
Route::get('unitsManagement','ProductController@unitsManagement');//show view of all units and subUnits
//products
Route::get('addProduct','ProductController@addProduct');//show add product view
Route::get('productsManagement','ProductController@productsManagement');//show view of all product's details
//users
Route::get('usersManagement','ProductController@usersManagement');//show view of all customer's details
//orders
Route::get('ordersManagement','ProductController@ordersManagement');//show view of all orders
//deliveryMan
Route::get('addDeliveryMan','ProductController@addDeliveryMan');//show add DeliveryMan view
Route::get('deliveryMansManagement','ProductController@deliveryMansManagement');//show view of all deliveryMans's details