<?php

Route::get('order',[
	'uses' => 'orderController@index',
	'as' => 'backend.order'
])->middleware('CheckAcl:order-view');
Route::get('order-create/{s_id}',[
	'uses' => 'orderController@create',
	'as' => 'backend.order-create'
])->middleware('CheckAcl:order-create');

Route::post('order-create/{s_id}',[
	'uses' => 'orderController@store',
	'as' => 'backend.order-create'
]);

Route::get('order-delete/{id}',[
	'uses' => 'orderController@destroy',
	'as' => 'backend.order-delete'
])->middleware('CheckAcl:order-delete');

Route::get('order-add-product/{s_id}',[
	'uses' => 'orderController@add_product',
	'as' => 'backend.order-add-product'
]);

Route::get('order-add-supply',[
	'uses' => 'orderController@add_supply',
	'as' => 'backend.order-add-supply'
]);

Route::get('/order-search-customer',[
	'uses' => 'orderController@search_customer',
	'as' => 'backend.order-search-customer'
]);
Route::get('/order-search-product/{s_id}',[
	'uses' => 'orderController@search_product',
	'as' => 'backend.order-search-product'
]);

// Route::post('order-detail',[
// 	'uses' => 'orderController@update',
// 	'as' => 'backend.order-detail'
// ]);

Route::get('add-order/{id}/{s_id}',[
	'uses'=> 'orderController@add_order',
	'as' => 'backend.add-order'
]);

Route::get('remove-order/{id}/{s_id}',[
	'uses'=> 'orderController@remove_order',
	'as' => 'backend.remove-order'
]);
Route::get('clear-order/{s_id}',[
	'uses'=> 'orderController@clear_order',
	'as' => 'backend.clear-order'
]);
Route::get('update-order/{id?}/{quantity?}',[
	'uses'=> 'orderController@update_order',
	'as' => 'backend.update-order'
]);
Route::get('order-reciept/{s_id}',[
	'uses'=> 'orderController@reciept',
	'as' => 'backend.order-reciept'
]);

Route::get('order-detail/{id}',[
	'uses'=> 'orderController@show',
	'as' => 'backend.order-detail'
]);
