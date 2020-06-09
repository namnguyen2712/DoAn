<?php
Route::get('unit',[
	'uses' => 'unitController@index',
	'as' => 'backend.unit'
])->middleware('CheckAcl:unit-view');
	Route::get('unit-create',[
	'uses' => 'unitController@create',
	'as' => 'backend.unit-create'
	])->middleware('CheckAcl:unit-create');
	Route::post('unit-create',[
		'uses'=>'unitController@store',
		'as'=>'backend.unit-create'
	]);
	Route::get('unit-index',[
		'uses'=>'unitController@index',
		'as'=>'backend.unit-index'
	])->middleware('CheckAcl:unit-view');
	Route::get('unit-edit/{id}',[
		'uses'=>'unitController@edit',
		'as'=>'backend.unit-edit'
	])->middleware('CheckAcl:unit-edit');
	Route::post('unit-edit/{id}',[
		'uses'=>'unitController@update',
		'as'=>'backend.unit-edit'
	]);
	Route::get('unit-delete/{id}',[
	'uses' => 'unitController@delete',
	'as' => 'backend.unit-delete'
])->middleware('CheckAcl:unit-delete');



 ?>
