<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsrController extends Controller
{
    public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_fawesome, c_bootstrap, c_global, c_usr_masterpage],
            'scripts' => [j_jquery, j_popper, j_bootstrap],
            'ngular'    => []
        ];
    }

    public function dashboard(){
    	return view('users.dashboard', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function profile(){
    	return view('users.profile', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], array(c_usr_edit_profile)),
            'ngular'        => $this->import['ngular']
            
        ]);
    }

    public function jobs(){
        return view('users.jobs', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function logout(){
		// if (Auth::guard('jp_user')->check()):
  //   		Auth::guard('jp_user')->logout();
  //      	elseif (Auth::guard('jp_admin')->check()):
  //      		Auth::guard('jp_admin')->logout();
  //       endif;
        Auth::guard('jp_user')->logout();
        Session::forget('usr_role');
    	return redirect()->route('home_index');
    }
}
