<?php

	Route::get('user',[
	'uses' => 'UserController@index',
	'as' => 'backend.user'
]);
	Route::get('user-index',[
	'uses' => 'UserController@index',
	'as' => 'backend.user-index'
]);
	Route::get('user-info/{name}',[
	'uses' => 'UserController@show',
	'as' => 'backend.user-info'
]);

Route::get('user-create',[
	'uses' => 'UserController@create',
	'as' => 'backend.user-create'
])->middleware('CheckAcl:user-create');
Route::post('user-create',[
	'uses' =>'UserController@store',
	'as' => 'backend.user-create'
]);
Route::get('user-edit/{id}',[
	'uses'=>'userController@edit',
	'as'=>'backend.user-edit'
]);
Route::post('user-edit/{id}',[
	'uses'=>'userController@update',
	'as'=>'backend.user-edit'
]);
Route::get('user-delete/{id}',[
	'uses' => 'UserController@destroy',
	'as' => 'backend.user-delete'
])->middleware('CheckAcl:user-delete');

Route::get('/search-user',[
	'uses' => 'userController@search_user',
	'as' => 'backend.search-user'
]);
 ?>
