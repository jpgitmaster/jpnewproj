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
		Route::get('profile_forms', [
		    'as' => 'profile_forms', 'uses' => 'UsrController@get_profile_forms'
		]);
		Route::get('dashboard', [
		    'as' => 'usr_dashboard', 'uses' => 'UsrController@dashboard'
		]);
		
		Route::get('profile', [
		    'as' => 'usr_profile', 'uses' => 'UsrController@profile'
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
		Route::get('lbl_personal_info', [
		    'as' => 'lbl_personal_info', 'uses' => 'UsrController@lbl_personal_info'
		]);
		
		Route::post('save_educational_bg', [
		    'as' => 'save_educational_bg', 'uses' => 'UsrController@save_educational_bg'
		]);
		Route::get('educational_bg', [
		    'as' => 'educational_bg', 'uses' => 'UsrController@get_educational_bg'
		]);
		Route::get('lbl_educational_bg', [
		    'as' => 'lbl_educational_bg', 'uses' => 'UsrController@lbl_educational_bg'
		]);
		
		Route::post('save_employment_history', [
		    'as' => 'save_employment_history', 'uses' => 'UsrController@save_employment_history'
		]);
		Route::post('delete_employment_history', [
	    'as' => 'delete_employment_history', 'uses' => 'UsrController@delete_employment_history'
		]);
		Route::post('work_experience', [
		    'as' => 'work_experience', 'uses' => 'UsrController@save_work_experience'
		]);
		Route::get('emp_history', [
		    'as' => 'emp_history', 'uses' => 'UsrController@emp_history'
		]);

		Route::get('account_settings', [
		    'as' => 'usr_acctsttngs', 'uses' => 'AcctSettingsController@acctsttngs'
		]);

		// CALENDAR CONTROLLERS
		Route::get('calendar', [
		    'as' => 'usr_calendar', 'uses' => 'CalendarController@calendar'
		]);
		Route::get('views_scheds', [
		    'as' => 'views_scheds', 'uses' => 'CalendarController@views_scheds'
		]);

		Route::get('views_activity_type', [
		    'as' => 'views_activity_type', 'uses' => 'CalendarController@views_activity_type'
		]);

		Route::post('save_calendar', [
		    'as' => 'save_calendar', 'uses' => 'CalendarController@save_calendar'
		]);
		Route::post('drop_resize_sched', [
		    'as' => 'drop_resize_sched', 'uses' => 'CalendarController@drop_resize_sched'
		]);
		Route::post('save_activity_type', [
		    'as' => 'save_activity_type', 'uses' => 'CalendarController@save_activity_type'
		]);

		// YEAR CALENDAR CONTROLLERS
		Route::get('year_calendar', [
		    'as' => 'year_calendar', 'uses' => 'YearCalendarController@year_calendar'
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
