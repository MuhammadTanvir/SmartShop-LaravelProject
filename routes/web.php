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

// Route::get('/', function () {
//    return view('welcome');
// });
Route::get('/','WelcomeController@index');
Route::get('/category-view/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');
Route::get('/contact','WelcomeController@contact');


Auth::routes();

Route::get('/dashboard', 'HomeController@index');



Route::group(['middleware'=>'AuthenticateMiddleware'],function(){

	//User info//
Route::get('/user/add', 'UserController@createCategory');
Route::post('/user/add', 'UserController@storeCategory');
Route::get('/user/manage', 'UserController@manageCategory');
Route::get('/user/edit/{id}', 'UserController@editCategory');
Route::post('/user/update', 'UserController@updateCategory');
Route::get('/user/delete/{id}', 'UserController@deleteCategory');




//Category info//
Route::get('/category/add', 'CategoryController@createCategory');
Route::post('/category/save', 'CategoryController@storeCategory');
Route::get('/category/manage', 'CategoryController@manageCategory');
Route::get('/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');

//Manufacture info//

Route::get('/manufacture/add', 'ManufactureController@createManufacture');
Route::post('/manufacture/save', 'ManufactureController@storeManufacture');
Route::get('/manufacture/manage', 'ManufactureController@manageManufacture');
Route::get('/manufacture/edit/{id}', 'ManufactureController@editManufacture');
Route::post('/manufacture/update', 'ManufactureController@updateManufacture');
Route::get('/manufacture/delete/{id}', 'ManufactureController@deleteManufacture');

//Product info//

Route::get('/product/add', 'ProductController@createProduct');
Route::post('/product/save', 'ProductController@storeProduct');
Route::get('/product/manage', 'ProductController@manageProduct');
Route::get('/product/view/{id}', 'ProductController@viewProduct');
Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::post('/product/update', 'ProductController@updateProduct');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct');

});