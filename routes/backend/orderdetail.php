<?php 

	Route::get('orderdetail',[
		'uses' => 'order_detailController@index',
		'as' => 'backend.orderdetail'
	]);
	
 ?>