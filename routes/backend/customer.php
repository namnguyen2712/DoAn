<?php
	Route::get('customer',[
	'uses' => 'customerController@index',
	'as' => 'backend.customer'
	])->middleware('CheckAcl:customer-view');
	Route::get('customer-create',[
	'uses' => 'customerController@create',
	'as' => 'backend.customer-create'
	])->middleware('CheckAcl:customer-create');
	Route::post('customer-create',[
		'uses'=>'customerController@store',
		'as'=>'backend.customer-create'
	]);
	Route::get('customer-index',[
		'uses'=>'customerController@index',
		'as'=>'backend.customer-index'
	])->middleware('CheckAcl:customer-view');
	Route::get('customer-edit/{id}',[
		'uses'=>'customerController@edit',
		'as'=>'backend.customer-edit'
	])->middleware('CheckAcl:customer-edit');
	Route::post('customer-edit/{id}',[
		'uses'=>'customerController@update',
		'as'=>'backend.customer-edit'
	]);
	Route::get('customer-delete/{id}',[
	'uses' => 'customerController@delete',
	'as' => 'backend.customer-delete'
	]);

	Route::get('/search-customer',[
		'uses' => 'customerController@search_customer',
		'as' => 'backend.search-customer'
	]);
 ?>
