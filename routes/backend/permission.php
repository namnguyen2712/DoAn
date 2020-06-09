<?php
Route::get('permission',[
    'uses' => 'permissionController@index',
    'as' => 'backend.permission'
]);
Route::get('permission-create',[
    'uses' => 'permissionController@create',
    'as' => 'backend.permission-create'
]);
Route::post('permission-create',[
    'uses'=>'permissionController@store',
    'as'=>'backend.permission-create'
]);
Route::get('permission-index',[
    'uses'=>'permissionController@index',
    'as'=>'backend.permission-index'
]);
Route::get('permission-edit/{id}',[
    'uses'=>'permissionController@edit',
    'as'=>'backend.permission-edit'
]);
Route::post('permission-edit/{id}',[
    'uses'=>'permissionController@update',
    'as'=>'backend.permission-edit'
]);
Route::get('permission-delete/{id}',[
    'uses' => 'permissionController@delete',
    'as' => 'backend.permission-delete'
]);
?>
