<?php
	Route::get('category',[
	'uses' => 'categoryController@index',
	'as' => 'backend.category'
	])->middleware('CheckAcl:category-view');
	Route::get('category-create',[
		'uses' => 'categoryController@create',
		'as' => 'backend.category-create'
	])->middleware('CheckAcl:category-create');
	Route::post('category-create',[
		'uses'=>'categoryController@store',
		'as'=>'backend.category-create'
	]);
	Route::get('category-index',[
		'uses'=>'categoryController@index',
		'as'=>'backend.category-index'
	])->middleware('CheckAcl:category-view');
	Route::get('category-edit/{id}',[
		'uses'=>'categoryController@edit',
		'as'=>'backend.category-edit'
	])->middleware('CheckAcl:category-edit');
	Route::post('category-edit/{id}',[
		'uses'=>'categoryController@update',
		'as'=>'backend.category-edit'
	]);
	Route::get('category-delete/{id}',[
		'uses' => 'categoryController@delete',
		'as' => 'backend.category-delete'
	])->middleware('CheckAcl:category-delete');

?>
