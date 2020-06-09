<?php
Route::get('role_permission',[
    'uses' => 'role_permissionController@index',
    'as' => 'backend.role_permission'
]);
Route::get('role_permission-create/{r_id}',[
    'uses' => 'role_permissionController@create',
    'as' => 'backend.role_permission-create'
]);
Route::post('role_permission-create/{r_id}',[
    'uses'=>'role_permissionController@store',
    'as'=>'backend.role_permission-create'
]);
Route::get('role_permission-index',[
    'uses'=>'role_permissionController@index',
    'as'=>'backend.role_permission-index'
]);
Route::get('role_permission-edit/{id}',[
    'uses'=>'role_permissionController@edit',
    'as'=>'backend.role_permission-edit'
])->middleware('CheckAcl:role-permission');
Route::post('role_permission-edit/{id}',[
    'uses'=>'role_permissionController@update',
    'as'=>'backend.role_permission-edit'
]);
Route::get('role_permission-delete/{id}',[
    'uses' => 'role_permissionController@delete',
    'as' => 'backend.role_permission-delete'
]);
Route::get('add-role',[
	'uses' => 'role_permissionController@add_role',
	'as' => 'backend.add-role'
]);
?>
