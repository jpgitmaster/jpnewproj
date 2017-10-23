<?php

Auth::routes();

Route::group(['middleware' => 'role:vwr'], function(){
	Route::get('login', 'WebController@login_v');
	Route::post('login', 'WebController@login');
	Route::post('register', 'WebController@register');
	Route::get('{name?}', [
		'as' => 'home_index', 'uses' => 'WebController@index'
	])->where('name', 'home');
});

Route::group(['middleware' => ['auth:jp_user', 'role:usr']], function(){
	Route::get('jobs', [
	    'as' => 'usr_jobs', 'uses' => 'UsrController@jobs'
	]);

	Route::post('validate_dp', [
	    'as' => 'validate_dp', 'uses' => 'UsrController@validate_dp'
	]);
	Route::post('upload_dp', [
	    'as' => 'upload_dp', 'uses' => 'UsrController@upload_dp'
	]);
	Route::prefix('user')->group(function () {
		Route::get('dashboard', [
		    'as' => 'usr_dashboard', 'uses' => 'UsrController@dashboard'
		]);
		Route::get('profile', [
		    'as' => 'usr_profile', 'uses' => 'UsrController@profile'
		]);
		Route::get('logout', [
		    'as' => 'usr_logout', 'uses' => 'UsrController@logout'
		]);
	});
});

Route::group(['middleware' => ['auth:jp_admin', 'role:admn']], function(){
	Route::prefix('admin')->group(function () {
		Route::get('dashboard', [
		    'as' => 'admn_dashboard', 'uses' => 'AdmnController@dashboard'
		]);
		Route::get('users', [
		    'as' => 'admn_users', 'uses' => 'AdmnController@users'
		]);
		Route::get('jobs', [
		    'as' => 'admn_jobs', 'uses' => 'AdmnController@jobs'
		]);
		Route::get('logout', [
		    'as' => 'admn_logout', 'uses' => 'AdmnController@logout'
		]);
	});
});
