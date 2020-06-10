<?php

Route::get('import',[
	'uses' => 'importController@index',
	'as' => 'backend.import'
])->middleware('CheckAcl:import-view');
Route::get('import-create/{s_id}',[
	'uses' => 'importController@create',
	'as' => 'backend.import-create'
])->middleware('CheckAcl:import-create');

Route::post('import-create/{s_id}',[
	'uses' => 'importController@store',
	'as' => 'backend.import-create'
]);

Route::get('import-delete/{id}',[
	'uses' => 'importController@destroy',
	'as' => 'backend.import-delete'
])->middleware('CheckAcl:import-delete');

Route::get('import-add-product/{s_id}',[
	'uses' => 'importController@add_product',
	'as' => 'backend.import-add-product'
]);

Route::get('import-add-supply',[
	'uses' => 'importController@add_supply',
	'as' => 'backend.import-add-supply'
]);

Route::get('/import-search-supply',[
	'uses' => 'importController@search_supply',
	'as' => 'backend.import-search-supply'
]);
Route::get('/import-search-product/{s_id}',[
	'uses' => 'importController@search_product',
	'as' => 'backend.import-search-product'
]);


// Route::post('import-detail',[
// 	'uses' => 'importController@update',
// 	'as' => 'backend.import-detail'
// ]);
Route::get('/import-get-date',[
	'uses'=> 'importController@get_import_date',
	'as' => 'backend.import-get-date'
]);
Route::get('/import-get-month',[
	'uses'=> 'importController@get_import_month',
	'as' => 'backend.import-get-month'
]);
Route::get('add-import/{id}/{s_id}',[
	'uses'=> 'importController@add_import',
	'as' => 'backend.add-import'
]);

Route::get('remove-import/{id}/{s_id}',[
	'uses'=> 'importController@remove_import',
	'as' => 'backend.remove-import'
]);
Route::get('clear-import/{s_id}',[
	'uses'=> 'importController@clear_import',
	'as' => 'backend.clear-import'
]);
Route::get('update-import/{id?}/{quantity?}',[
	'uses'=> 'importController@update_import',
	'as' => 'backend.update-import'
]);
Route::get('import-reciept/{s_id}',[
	'uses'=> 'importController@reciept',
	'as' => 'backend.import-reciept'
]);

Route::get('import-detail/{id}',[
	'uses'=> 'importController@show',
	'as' => 'backend.import-detail'
]);

Route::get('/search-supply-import',[
	'uses'=> 'importController@search_supply_import',
	'as' => 'backend.search-supply-import'
]);
