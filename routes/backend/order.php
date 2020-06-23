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
Route::get('/search-customer-order',[
	'uses'=> 'orderController@search_customer_order',
	'as' => 'backend.search-customer-order'
]);
Route::get('/search-employee-order',[
	'uses'=> 'orderController@search_employee_order',
	'as' => 'backend.search-employee-order'
]);
Route::get('/search-order',[
	'uses'=> 'orderController@search_order',
	'as' => 'backend.search-order'
]);
Route::get('/order-get-date',[
	'uses'=> 'orderController@get_order_date',
	'as' => 'backend.order-get-date'
]);
Route::get('/order-get-month',[
	'uses'=> 'orderController@get_order_month',
	'as' => 'backend.order-get-month'
]);
Route::get('order-report',[
	'uses' => 'orderController@report',
	'as' => 'backend.order-report'
]);
Route::get('/sale-order-get-date',[
	'uses'=> 'orderController@get_sale_order_date',
	'as' => 'backend.sale-order-get-date'
]);
Route::get('/sale-order-get-month',[
	'uses'=> 'orderController@get_sale_order_month',
	'as' => 'backend.sale-order-get-month'
]);
