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
        define('c_jcrop', 'plugins/jcrop/css/jquery.jcrop.min.css');
        define('c_summernote', 'plugins/summernote/dist/summernote.css');
        define('c_fullcalendar', 'plugins/fullcalendar/fullcalendar.min.css');

        define('c_ngselect', 'plugins/ng-custom-select/css/style.css');

        define('c_global', 'css/app/global.css');
        
        define('c_admn_masterpage', 'css/app/admin/masterpage.css');
        
        define('c_usr_masterpage', 'css/app/user/masterpage.css');
        define('c_usr_job_list', 'css/app/user/job_list.css');
        define('c_usr_acct_settings', 'css/app/user/acct_settings.css');
        define('c_usr_edit_profile', 'css/app/user/edit_profile.css');
        

        define('c_home', 'css/app/web/home.css');
    }

    public function import_js(){
        define('j_jquery', 'plugins/jquery/jquery.min.js');
        define('j_popper', 'plugins/popperjs/popper.min.js');
        define('j_jcrop', 'plugins/jcrop/js/jquery.jcrop.min.js');
        define('j_velocity', 'plugins/velocity/velocity.min.js');
        define('j_velocity_ui', 'plugins/velocity/velocity.ui.min.js');
        define('j_bootstrap', 'plugins/bootstrap/dist/js/bootstrap.min.js');
        define('j_summernote', 'plugins/summernote/dist/summernote.min.js');
        define('j_chart', 'plugins/chart/src/chart.js');
        define('j_moment', 'plugins/moment/min/moment.min.js');
        define('j_moment_timezone', 'plugins/moment/moment-timezone.js');
        define('j_fullcalendar', 'plugins/fullcalendar/fullcalendar.min.js');
    }

    public function import_ng(){
        define('n_ng', 'plugins/angular/angular.min.js');
        define('n_ngresource', 'plugins/angular/angular-resource.min.js');
        define('n_ngsanitize', 'plugins/angular/angular-sanitize.min.js');
        define('n_nganimate', 'plugins/angular/angular-animate.min.js');
        define('n_summernote', 'plugins/angular-summernote/dist/angular-summernote.js');
        define('n_chart', 'plugins/angular-chart/angular-chart.min.js');
        define('n_uicalendar', 'plugins/ui-calendar/src/calendar.js');
        define('n_ngmoment', 'plugins/angular-moment/angular-moment.min.js');
        

        define('n_ui_bootstrap', 'plugins/ui-bootstrap-tpls-2.5.0.min.js');

        define('n_ngselect', 'plugins/ng-custom-select/js/customselect.js');
        define('n_ngfilter', 'plugins/ng-custom-select/angular-filter.js');
        define('n_ngvertilize', 'plugins/angular-vertilize/angular-vertilize.min.js');
        define('n_ngmask', 'plugins/ui-mask/dist/mask.js');

        define('n_home', 'app/web/home.js');

        // USER
        define('n_user', 'app/user.js');
        define('n_user_edit_profile', 'app/user/edit_profile.js');
        define('n_user_job_list', 'app/user/job_list.js');
        define('n_user_calendar', 'app/user/usr_calendar.js');
    }
}
