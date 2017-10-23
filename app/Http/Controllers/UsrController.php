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
            'stylesheet' => [c_ngmotion, c_fawesome, c_bootstrap, c_global, c_usr_masterpage],
            'scripts' => [j_jquery, j_popper, j_bootstrap],
            'ngular'    => [n_ng, n_ngresource, n_nganimate, n_user]
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
            'scripts'       => array_merge($this->import['scripts'], array(j_jcrop)),
            'stylesheet'    => array_merge($this->import['stylesheet'], array(c_jcrop, c_usr_edit_profile)),
            'ngular'        =>  array_merge($this->import['ngular'], array(n_user_edit_profile))
            
        ]);
    }

    public function jobs(){
        return view('users.jobs', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function validate_dp(Request $request){
        $msg = [];
        $validate = Validator::make(
            ['file' => $request->file('file')],
            ['file' => 'required|image|mimes:jpeg,png,jpg|max:2048']
        );
        $msg = $validate->messages()->toArray();
        print_r(json_encode($msg, JSON_PRETTY_PRINT));
    }

    public function upload_dp(Request $request){
        // $coodinates = json_decode($request->all());
        print_r($request->all());
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
