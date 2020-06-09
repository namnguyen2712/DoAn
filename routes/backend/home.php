<?php

	Route::get('home',[
		'uses' => 'homeController@index',
		'as' => 'backend.home'
	])->middleware('CheckAcl:home');

 ?>
