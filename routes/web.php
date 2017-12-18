<?php

// Auth::routes();

Route::group(['middleware' => 'role:vwr'], function(){
	Route::get('login', 'WebController@login_v');
	Route::post('login', 'WebController@login');
	Route::get('activation/{token}', 'WebController@email_confirmation')->name('activation');
	Route::post('register', 'WebController@register');
	Route::get('{name?}', [
		'as' => 'home_index', 'uses' => 'WebController@index'
	])->where('name', 'home');

	Route::get('activation/{token}', 'WebController@email_confirmation')->name('activation');
});

Route::group(['middleware' => ['auth:jp_user', 'role:usr']], function(){
	Route::get('user', [
	    'as' => 'current_user', 'uses' => 'UsrController@get_current_user'
	]);
	Route::get('countries', [
	    'as' => 'get_countries', 'uses' => 'UsrController@get_countries'
	]);

	
	Route::get('jobs', [
	    'as' => 'usr_jobs', 'uses' => 'UsrController@jobs'
	]);

	Route::post('validate_dp', [
	    'as' => 'validate_dp', 'uses' => 'UsrController@validate_dp'
	]);
	Route::post('upload_dp', [
	    'as' => 'upload_dp', 'uses' => 'UsrController@upload_dp'
	]);

	Route::post('upload_resume', [
	    'as' => 'upload_resume', 'uses' => 'UsrController@upload_resume'
	]);

	Route::post('delete_record', [
	    'as' => 'delete_record', 'uses' => 'UsrController@delete_record'
	]);
	Route::prefix('user')->group(function () {
		Route::get('dashboard', [
		    'as' => 'usr_dashboard', 'uses' => 'UsrController@dashboard'
		]);
		Route::get('profile', [
		    'as' => 'usr_profile', 'uses' => 'UsrController@profile'
		]);
		Route::get('account_settings', [
		    'as' => 'usr_acctsttngs', 'uses' => 'UsrController@acctsttngs'
		]);
		Route::get('logout', [
		    'as' => 'usr_logout', 'uses' => 'UsrController@logout'
		]);

		Route::post('save_personal_info', [
		    'as' => 'save_personal_info', 'uses' => 'UsrController@save_personal_info'
		]);

		Route::get('personal_info', [
		    'as' => 'personal_info', 'uses' => 'UsrController@get_personal_info'
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
