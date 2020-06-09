<?php

Route::get('/',[
	'uses' => 'FrontendController@index',
	'as' => 'home'
]);

Route::get('/index',[
	'uses' => 'FrontendController@index',
	'as' => 'index'
]);

Route::get('/search',[
	'uses' => 'FrontendController@search',
	'as' => 'search'
]);


Route::get('/danhmuc/{id}',[
	'uses'=>'FrontendController@category',
	'as'=>'danhmuc'

]);
Route::get('/sanpham',[
	'uses'=>'FrontendController@product',
	'as'=>'sanpham'

]);
Route::get('/pricedesc',[
	'uses'=>'FrontendController@pricedesc',
	'as'=>'pricedesc'
]);
Route::get('/priceasc',[
	'uses'=>'FrontendController@priceasc',
	'as'=>'priceasc'
]);
Route::get('/nameasc',[
	'uses'=>'FrontendController@nameasc',
	'as'=>'nameasc'
]);
Route::get('/namedesc',[
	'uses'=>'FrontendController@namedesc',
	'as'=>'nameasc'
]);
Route::get('login',[
	'uses'=>'Backend\AuthController@login',
	'as'=>'login'
]);
Route::post('login',[
	'uses'=>'Backend\AuthController@postLogin',
	'as'=>'login'
]);
Route::get('logout',[
	'uses'=>'Backend\AuthController@logout',
	'as'=>'logout'
]);
Route::get('detail/{id}',[
	'uses'=>'FrontendController@detailpro',
	'as'=>'detail'
]);


?>
