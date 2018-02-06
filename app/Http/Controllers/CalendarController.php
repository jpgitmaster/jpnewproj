<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CalendarController extends Controller
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

    public function calendar(){
        return view('users.calendar', [
            'scripts'       => array_merge([j_moment, j_moment_timezone], $this->import['scripts'], [j_fullcalendar, j_colorpicker]),
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_calendar, c_fullcalendar, c_colorpicker, c_ngselect]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_ui_bootstrap, n_uicalendar, n_ngselect, n_ngfilter, n_user_calendar])
        ]);
    }

    public function save_calendar(Request $request){
        $schd = $request->all();
        $schd = json_decode($schd['sched'], true);
        $schd = $schd ? $schd : [];
        if(isset($schd['start'])):
            $schd['start'] = date('Y-m-d', strtotime($schd['start']));
        endif;
        if(isset($schd['end'])):
            $schd['end'] = date('Y-m-d', strtotime($schd['end']));
        endif;


        DB::table('calendar_schedules')->insert([
            'genid' => $this->get_genid(20),
            'title'        => $schd['title'],
            'start'        => $schd['start'],
            'end'          => $schd['end'],
            'textColor'    => $schd['textColor'],
            'color'         => $schd['color'],
            'activity_type'  => $schd['activity_type'],
            'room_type'       => $schd['room_type'],
            'reason'          => $schd['reason']
        ]);
        print_r($schd);
    }

    public function save_activity_type(Request $request){
        $actvty = $request->all();
        $actvty = json_decode($actvty['actvty'], true);
        DB::table('activity_type')->insert([
            'name'        => $actvty['name'],
            'color'        => $actvty['bgcolor'],
            'textColor'    => $actvty['txtcolor'],
            'description'  => $actvty['description']
        ]);
        print_r($actvty);
    }

    public function drop_resize_sched(Request $request){
        $evnt = $request->all();
        $evnt = json_decode($evnt['evnt'], true);
        $evnt = $evnt ? $evnt : [];
        
        if(isset($evnt['start'])):
            $evnt['start'] = date('Y-m-d', strtotime($evnt['start']));
        endif;
        if(isset($evnt['end'])):
            $evnt['end'] = date('Y-m-d', strtotime($evnt['end']));
        endif;
        DB::table('calendar_schedules')
            ->where('genid', $evnt['genid'])
            ->update([
                'start'     => $evnt['start'],
                'end'       => $evnt['end']
            ]);
    }

    public function views_scheds(){
        $scheds = DB::table('calendar_schedules')
            ->select(
                'genid', 'title', 'start', 'end', 'textColor', 'color', 'activity_type', 'room_type', 'reason')
            ->orderBy('calendar_schedules.id', 'desc')
            ->get();
        return json_encode($scheds, JSON_PRETTY_PRINT);
    }

    public function views_activity_type(){
        $actvty = DB::table('activity_type')
            ->select(
                'id', 'name', 'textColor', 'color', 'description')
            ->orderBy('activity_type.id', 'desc')
            ->get();
        return json_encode($actvty, JSON_PRETTY_PRINT);
    }

    
    public function crypto_rand_secure($min, $max){
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public function get_genid($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }
}
