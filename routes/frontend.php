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
Route::get('/xuatxu/{id}',[
	'uses'=>'FrontendController@nation',
	'as'=>'xuatxu'

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
	'uses'=>'FrontendController@login',
	'as'=>'login'
]);
Route::post('login',[
	'uses'=>'FrontendController@postLogin',
	'as'=>'login'
]);
Route::get('logout',[
	'uses'=>'FrontendController@logout',
	'as'=>'logout'
]);
Route::get('detail/{id}',[
	'uses'=>'FrontendController@detailpro',
	'as'=>'detail'
]);

Route::get('/order',[
	'uses'=>'FrontendController@history_order',
	'as'=>'order'
]);
Route::get('change-password/{id}',[
	'uses'=>'FrontendController@edit_password',
	'as'=>'change-password'
]);
Route::post('change-password/{id}',[
	'uses'=>'FrontendController@updatePassword',
	'as'=>'change-password'
]);


Route::get('/order-detail/{id}',[
	'uses'=>'FrontendController@order_detail',
	'as'=>'order-detail'
]);
?>
