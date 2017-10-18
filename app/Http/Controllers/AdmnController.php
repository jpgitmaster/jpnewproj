<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdmnController extends Controller
{
    public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_fawesome, c_bootstrap, c_global, c_admn_masterpage],
            'scripts' => [j_jquery, j_popper, j_bootstrap],
            'ngular'    => []
        ];
    }

    public function dashboard(){
    	return view('admin.dashboard', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function jobs(){
    	return view('admin.jobs', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function users(){
    	return view('admin.users', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function logout(){
        Auth::guard('jp_admin')->logout();
        Session::forget('usr_role');
    	return redirect()->route('home_index');
    }
}
