<?php

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\products;
use App\Models\category;
use App\Models\supply;
use App\Models\unit;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//

// lấy dữ liệu
Route::get('user','userAPIController@index');
//
Route::get('user/{id}','userAPIController@show');
// Tạo mới
Route::post('create-user','userAPIController@store');
//Sửa
Route::put('update-user/{id}','userAPIController@update');
//Xóa
Route::delete('delete-user/{id}','userAPIController@destroy');


Route::get('customer','customerAPIController@index');
//
Route::get('customer/{id}','customerAPIController@show');
// Tạo mới
Route::post('create-customer','customerAPIController@store');
//Sửa
Route::put('update-customer/{id}','customerAPIController@update');
//Xóa
Route::delete('delete-customer/{id}','customerAPIController@destroy');


Route::get('category','categoryAPIController@index');
//
Route::get('category/{id}','categoryAPIController@show');
// Tạo mới
Route::post('create-category','categoryAPIController@store');
//Sửa
Route::put('update-category/{id}','categoryAPIController@update');
//Xóa
Route::delete('delete-category/{id}','categoryAPIController@destroy');



Route::get('products','productsAPIController@index');
//
Route::get('products/{id}','productsAPIController@show');
// Tạo mới
Route::post('create-products','productsAPIController@store');
//Sửa
Route::put('update-products/{id}','productsAPIController@update');
//Xóa
Route::delete('delete-products/{id}','productsAPIController@destroy');




Route::get('supply','supplyAPIController@index');
//
Route::get('supply/{id}','supplyAPIController@show');
// Tạo mới
Route::post('create-supply','supplyAPIController@store');
//Sửa
Route::put('update-supply/{id}','supplyAPIController@update');
//Xóa
Route::delete('delete-supply/{id}','supplyAPIController@destroy');






Route::get('unit','unitAPIController@index');
//
Route::get('unit/{id}','unitAPIController@show');
// Tạo mới
Route::post('create-unit','unitAPIController@store');
//Sửa
Route::put('update-unit/{id}','unitAPIController@update');
//Xóa
Route::delete('delete-unit/{id}','unitAPIController@destroy')->middleware('CheckAcl:unit-delete');



Route::get('nation','nationAPIController@index');
//
Route::get('nation/{id}','nationAPIController@show');
// Tạo mới
Route::post('create-nation','nationAPIController@store');
//Sửa
Route::put('update-nation/{id}','nationAPIController@update');
//Xóa
Route::delete('delete-nation/{id}','nationAPIController@destroy');






Route::get('frcategory','FrontendAPIController@category');

?>
