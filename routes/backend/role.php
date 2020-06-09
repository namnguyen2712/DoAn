<?php
Route::get('role',[
    'uses' => 'roleController@index',
    'as' => 'backend.role'
])->middleware('CheckAcl:role-view');
Route::get('role-create',[
    'uses' => 'roleController@create',
    'as' => 'backend.role-create'
])->middleware('CheckAcl:role-create');
Route::post('role-create',[
    'uses'=>'roleController@store',
    'as'=>'backend.role-create'
]);
Route::get('role-index',[
    'uses'=>'roleController@index',
    'as'=>'backend.role-index'
])->middleware('CheckAcl:role-view');
Route::get('role-edit/{id}',[
    'uses'=>'roleController@edit',
    'as'=>'backend.role-edit'
])->middleware('CheckAcl:role-edit');
Route::post('role-edit/{id}',[
    'uses'=>'roleController@update',
    'as'=>'backend.role-edit'
]);
Route::get('role-delete/{id}',[
    'uses' => 'roleController@delete',
    'as' => 'backend.role-delete'
]);
Route::get('add-user/{r_id}',[
	'uses'=> 'roleController@add_user',
	'as' => 'backend.add-user'
])->middleware('CheckAcl:role-add-user');
Route::get('post-user/{r_id}/{user_id}',[
	'uses'=> 'roleController@post_user',
	'as' => 'backend.post-user'
]);
Route::get('info-user-role/{r_id}',[
	'uses'=> 'roleController@info_user_role',
	'as' => 'backend.info-user-role'
])->middleware('CheckAcl:role-info');
?>
