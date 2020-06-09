<?php
Route::get('nation',[
	'uses' => 'nationController@index',
	'as' => 'backend.nation'
])->middleware('CheckAcl:nation-view');
	Route::get('nation-create',[
	'uses' => 'nationController@create',
	'as' => 'backend.nation-create'
	])->middleware('CheckAcl:nation-create');
	Route::post('nation-create',[
		'uses'=>'nationController@store',
		'as'=>'backend.nation-create'
	]);
	Route::get('nation-index',[
		'uses'=>'nationController@index',
		'as'=>'backend.nation-index'
	])->middleware('CheckAcl:nation-view');
	Route::get('nation-edit/{id}',[
		'uses'=>'nationController@edit',
		'as'=>'backend.nation-edit'
	])->middleware('CheckAcl:nation-edit');
	Route::post('nation-edit/{id}',[
		'uses'=>'nationController@update',
		'as'=>'backend.nation-edit'
	]);
	Route::get('nation-delete/{id}',[
	'uses' => 'nationController@delete',
	'as' => 'backend.nation-delete'
]);



 ?>
