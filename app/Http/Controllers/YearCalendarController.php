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
            'stylesheet'    => $this->import['stylesheet']
        ]);
    }
}
