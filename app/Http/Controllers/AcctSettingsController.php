<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcctSettingsController extends Controller
{
	public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_ngmotion, c_fawesome, c_bootstrap, c_global, c_usr_masterpage],
            'scripts' => [j_jquery, j_popper, j_bootstrap, j_velocity, j_velocity_ui],
            'ngular'    => [n_ng, n_ngsanitize, n_ngresource, n_nganimate, n_ngvertilize, n_user]
        ];
        date_default_timezone_set('Asia/Manila');
        $this->msg = [];
    }
    
    public function acctsttngs(){
        return view('users.account_settings', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_acct_settings]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_user_job_list])
            
        ]);
    }
}
