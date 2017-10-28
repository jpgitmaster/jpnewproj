<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $import = [
    	'stylesheet' 	=> [],
    	'scripts' 		=> [],
    	'ngular' 		=> []
    ];

    public function __construct(){
    	$this->import_css();
    	$this->import_js();
    	$this->import_ng();
    }

    public function import_css(){
        define('c_ngmotion', 'plugins/angular-motion/dist/angular-motion.min.css');
    	define('c_bootstrap', 'plugins/bootstrap/dist/css/bootstrap.min.css');
        define('c_fawesome', 'plugins/font-awesome/css/font-awesome.min.css');

        define('c_global', 'css/app/global.css');
        
        define('c_admn_masterpage', 'css/app/admin/masterpage.css');
        
        define('c_usr_masterpage', 'css/app/user/masterpage.css');
        define('c_usr_edit_profile', 'css/app/user/edit_profile.css');
        define('c_jcrop', 'plugins/jcrop/css/jquery.jcrop.min.css');

        define('c_home', 'css/app/web/home.css');
    }

    public function import_js(){
        define('j_jquery', 'plugins/jquery/jquery.min.js');
        define('j_popper', 'plugins/popperjs/popper.min.js');
        define('j_jcrop', 'plugins/jcrop/js/jquery.jcrop.min.js');
        define('j_velocity', 'plugins/velocity/velocity.min.js');
        define('j_velocity_ui', 'plugins/velocity/velocity.ui.min.js');
        define('j_bootstrap', 'plugins/bootstrap/dist/js/bootstrap.min.js');
    }

    public function import_ng(){
        define('n_ng', 'plugins/angular/angular.min.js');
        define('n_ngresource', 'plugins/angular/angular-resource.min.js');
        define('n_nganimate', 'plugins/angular/angular-animate.min.js');

        define('n_home', 'app/web/home.js');

        // USER
        define('n_user', 'app/user.js');
        define('n_user_edit_profile', 'app/user/edit_profile.js');
    }
}
