<?php
	Route::get('products',[
	'uses' => 'productsController@index',
	'as' => 'backend.products'
	])->middleware('CheckAcl:product-view');
	Route::get('products-create',[
	'uses' => 'productsController@create',
	'as' => 'backend.products-create'
	])->middleware('CheckAcl:product-create');
	Route::post('products-create',[
		'uses'=>'productsController@store',
		'as'=>'backend.products-create'
	]);
	Route::get('products-index',[
		'uses'=>'productsController@index',
		'as'=>'backend.products-index'
	])->middleware('CheckAcl:product-view');
	Route::get('products-edit/{id}',[
		'uses'=>'productsController@edit',
		'as'=>'backend.products-edit'
	])->middleware('CheckAcl:product-edit');
	Route::post('products-edit/{id}',[
		'uses'=>'productsController@update',
		'as'=>'backend.products-edit'
	]);
	Route::get('products-delete/{id}',[
	'uses' => 'productsController@delete',
	'as' => 'backend.products-delete'
	])->middleware('CheckAcl:product-delete');

	Route::get('products-report',[
	'uses' => 'productsController@report',
	'as' => 'backend.products-report'
	]);

	Route::get('/search-product',[
		'uses' => 'productsController@search_product',
		'as' => 'backend.search-product'
	]);
	Route::get('/product-pricedesc',[
		'uses'=>'productsController@pricedesc',
		'as'=>'backend.product-pricedesc'
	]);
	Route::get('/product-priceasc',[
		'uses'=>'productsController@priceasc',
		'as'=>'backend.product-priceasc'
	]);
	Route::get('/product-nameasc',[
		'uses'=>'productsController@nameasc',
		'as'=>'backend.product-nameasc'
	]);
	Route::get('/product-namedesc',[
		'uses'=>'productsController@namedesc',
		'as'=>'backend.product-namedesc'
	]);


 ?>
