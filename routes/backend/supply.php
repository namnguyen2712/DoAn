<?php
	Route::get('supply',[
	'uses' => 'supplyController@index',
	'as' => 'backend.supply'
	])->middleware('CheckAcl:supply-view');
	Route::get('supply-create',[
	'uses' => 'supplyController@create',
	'as' => 'backend.supply-create'
	])->middleware('CheckAcl:supply-create');
	Route::post('supply-create',[
		'uses'=>'supplyController@store',
		'as'=>'backend.supply-create'
	]);
	Route::get('supply-index',[
		'uses'=>'supplyController@index',
		'as'=>'backend.supply-index'
	])->middleware('CheckAcl:supply-view');
	Route::get('supply-edit/{id}',[
		'uses'=>'supplyController@edit',
		'as'=>'backend.supply-edit'
	])->middleware('CheckAcl:supply-edit');
	Route::post('supply-edit/{id}',[
		'uses'=>'supplyController@update',
		'as'=>'backend.supply-edit'
	]);
	Route::get('supply-delete/{id}',[
	'uses' => 'supplyController@delete',
	'as' => 'backend.supply-delete'
	])->middleware('CheckAcl:supply-delete');

	Route::get('/search-supply',[
		'uses' => 'supplyController@search_supply',
		'as' => 'backend.search-supply'
	]);


 ?>
