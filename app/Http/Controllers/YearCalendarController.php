<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearCalendarController extends Controller
{
    public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_ngmotion, c_fawesome, c_bootstrap, c_global, c_usr_masterpage],
            'scripts' => [j_jquery, j_popper, j_bootstrap, j_velocity, j_velocity_ui],
            'ngular'    => [n_ng, n_ngsanitize, n_ngresource, n_nganimate, n_ngvertilize, n_user]
        ];
        $this->msg = [];
    }

    public function year_calendar(){
        return view('users.year_calendar', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_year_calendar])
        ]);
    }

    public function crm_dashboard(){
    	return view('users.crm_dashboard', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_year_calendar])
        ]);
    }
    public function crm_login(){
    	return view('users.crm_login', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_year_calendar])
        ]);
    }
}
