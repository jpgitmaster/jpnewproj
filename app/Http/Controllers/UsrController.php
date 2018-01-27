<?php

namespace App\Http\Controllers;

use Session;
use DB;

use App\Usr;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsrController extends Controller
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

    public function dashboard(){
    	return view('users.dashboard', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => $this->import['stylesheet'],
            'ngular'        => $this->import['ngular']
        ]);
    }

    public function profile(){
    	return view('users.profile', [
            'scripts'       => array_merge($this->import['scripts'], [j_summernote, j_jcrop]),
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_ngselect, c_summernote, c_jcrop, c_usr_edit_profile]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_summernote, n_ngselect, n_ngfilter, n_ngmask, n_user_edit_profile])
            
        ]);
    }

    public function acctsttngs(){
        return view('users.account_settings', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_acct_settings]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_user_job_list])
            
        ]);
    }
    
    public function jobs(){
        return view('users.jobs', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_job_list]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_user_job_list])
        ]);
    }

    public function validate_dp(Request $request){
        $validate = Validator::make(
            ['file' => $request->file('file')],
            ['file' => 'required|image|mimes:jpeg,png,jpg|max:2048']
        );
        $this->msg['dp']['error'] = $validate->messages()->toArray();
        print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    }

    public function upload_dp(Request $request){
        $current_img = DB::table('avatars')->select('imgext', 'imgadded', 'imgchanged')->where('genid', Auth::user()->genid);
        $rqst = $request->all();
        $coordinate = json_decode($rqst['coordinates']);

        if($request->hasFile('file')):
            $dp = [];
            $dp['folder'] = 'avatars';
            // $dp['file'] = $request->file('file')->getClientOriginalName();
            $dp['extension'] = $request->file('file')->getClientOriginalExtension();
            

            if($current_img->count()):
                $changed_date = '';
                if($current_img->first()->imgchanged):
                    $changed_date = Carbon::parse($current_img->first()->imgchanged)->format('mdy');
                endif;

                $dp['old_dpname'] = Auth::user()->genid.Carbon::parse($current_img->first()->imgadded)->format('mdy').$changed_date.'.'.$current_img->first()->imgext;
                $dp['new_dpname'] = '';
                $dp['location'] = public_path($dp['folder']).'/'.$dp['old_dpname'];
                
                if(file_exists($dp['location'])):
                    unlink($dp['location']);
                endif;

                // NEW LOCATION
                $dp['new_dpname'] = Auth::user()->genid.Carbon::parse($current_img->first()->imgadded)->format('mdy').Carbon::now()->format('mdy').'.'.$dp['extension'];
                $request->file('file')->move(public_path($dp['folder']), $dp['new_dpname']);

                $dp['location'] = public_path($dp['folder']).'/'.$dp['new_dpname'];

                $txt = 'added';
                if($current_img->first()->imgext):
                    $txt = 'changed';
                endif;

                DB::table('avatars')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'imgname'     => $dp['new_dpname'],
                        'imgext'      => $dp['extension'],
                        'imgfolder'   => $dp['folder'],
                        'imgchanged'  => Carbon::now()
                    ]);
                $this->msg['dp']['success'] = 'You have successfully '.$txt.' your display picture.';
            else:
                $dp['dpname'] = Auth::user()->genid.Carbon::now()->format('mdy').'.'.$dp['extension'];
                $dp['location'] = $dp['folder'].'/'.$dp['dpname'];
                DB::table('avatars')->insert([
                    'genid' => Auth::user()->genid,
                    'imgname'         => $dp['dpname'],
                    'imgext'          => $dp['extension'],
                    'imgfolder'       => $dp['folder'],
                    'imgadded'        => Carbon::now(),
                    'imgchanged'      => NULL
                ]);
                $this->msg['dp']['success'] = 'You have successfully added your display picture.';
                $request->file('file')->move(public_path($dp['folder']), $dp['dpname']);
            endif;


            $jpeg_quality = 100;

            
            if($dp['extension'] == 'png'):
                $img_r = imagecreatefrompng($dp['location']);
            else:
                $img_r = imagecreatefromjpeg($dp['location']);
            endif;

            $dst_r = ImageCreateTrueColor( $coordinate->imgw2, $coordinate->imgh2 );

            imagecopyresampled($dst_r, $img_r, 0, 0, $coordinate->imgx, $coordinate->imgy,
                $coordinate->imgw2, $coordinate->imgh2, $coordinate->imgw, $coordinate->imgh);

            if($dp['extension'] == 'png'):
                imagecolortransparent($dst_r, imagecolorallocate($dst_r, 0, 0, 0));
                imagepng($dst_r, $dp['location'], 0);
            else:
                imagejpeg($dst_r, $dp['location'], $jpeg_quality);
            endif;
            print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
        endif;
    }

    public function upload_resume(Request $request){
        $current_resume = DB::table('resumes')->select('rsmext', 'rsmadded', 'rsmchanged')->where('genid', Auth::user()->genid);
        $validate = Validator::make(
            ['file' => $request->file('file')],
            ['file' => 'required|mimes:doc,docx,pdf|max:2048']
        );
        $has_error = $this->hasError($validate);

        if($request->hasFile('file')):
            $rsm = [];
            $rsm['folder'] = 'resumes';
            // $rsm['file'] = $request->file('file')->getClientOriginalName();
            $rsm['size'] = $request->file('file')->getClientSize();
            $rsm['extension'] = $request->file('file')->getClientOriginalExtension();

            if($has_error == true):
                $this->msg['resume']['error'] = $validate->messages()->toArray();
            else:
                $this->msg['resume']['success'] = true;

                if($current_resume->count()):
                    $changed_date = '';
                    if($current_resume->first()->rsmchanged):
                        $changed_date = Carbon::parse($current_resume->first()->rsmchanged)->format('mdy');
                    endif;
                    $rsm['old_rsmname'] = Auth::user()->genid.Carbon::parse($current_resume->first()->rsmadded)->format('mdy').$changed_date.'.'.$current_resume->first()->rsmext;
                    $rsm['location'] = public_path($rsm['folder']).'/'.$rsm['old_rsmname'];

                    if(file_exists($rsm['location'])):
                        unlink($rsm['location']);
                    endif;

                    $rsm['new_rsmname'] = Auth::user()->genid.Carbon::parse($current_resume->first()->rsmadded)->format('mdy').Carbon::now()->format('mdy').'.'.$rsm['extension'];
                    $request->file('file')->move(public_path($rsm['folder']), $rsm['new_rsmname']);

                    $txt = 'added';
                    if($current_resume->first()->rsmext):
                        $txt = 'changed';
                    endif;
                    DB::table('resumes')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'rsmname'           => $rsm['new_rsmname'],
                        'rsmext'            => $rsm['extension'],
                        'rsmsize'           => $rsm['size'],
                        'rsmfolder'         => $rsm['folder'],
                        'rsmchanged'   => Carbon::now()
                    ]);
                    $this->msg['resume']['success'] = 'You have successfully '.$txt.' your resume.';
                else:
                    $rsm['rsmname'] = Auth::user()->genid.Carbon::now()->format('mdy').'.'.$rsm['extension'];
                    DB::table('resumes')->insert([
                        'genid' => Auth::user()->genid,
                        'rsmname'           => $rsm['rsmname'],
                        'rsmext'            => $rsm['extension'],
                        'rsmsize'           => $rsm['size'],
                        'rsmfolder'         => $rsm['folder'],
                        'rsmadded'     => Carbon::now(),
                        'rsmchanged'   => NULL
                    ]);
                    $this->msg['resume']['success'] = 'You have successfully added your resume.';
                    $request->file('file')->move(public_path($rsm['folder']), $rsm['rsmname']);
                endif;
            endif;
            print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
        endif;
    }

    public function delete_record(Request $request){
        switch ($request->num):
            case 0:
                $current_img = DB::table('avatars')->select('imgext', 'imgadded', 'imgchanged', 'imgfolder')->where('genid', Auth::user()->genid);
                $changed_date = '';
                
                if($current_img->first()->imgchanged):
                    $changed_date = Carbon::parse($current_img->first()->imgchanged)->format('mdy');
                endif;

                $img['imgname'] = Auth::user()->genid.Carbon::parse($current_img->first()->imgadded)->format('mdy').$changed_date.'.'.$current_img->first()->imgext;
                $img['location'] = public_path($current_img->first()->imgfolder).'/'.$img['imgname'];

                if(file_exists($img['location'])):
                    unlink($img['location']);
                endif;
                
                DB::table('avatars')
                ->where('genid', Auth::user()->genid)
                ->update([
                    'imgname'           => '',
                    'imgext'            => '',
                    'imgfolder'         => ''
                ]);
                $this->msg['dpimg']['dlt']['success'] = 'You have successfully deleted your display picture.';
                break;
            case 1:
                $current_resume = DB::table('resumes')->select('rsmext', 'rsmadded', 'rsmchanged', 'rsmfolder')->where('genid', Auth::user()->genid);
                $changed_date = '';
                
                if($current_resume->first()->rsmchanged):
                    $changed_date = Carbon::parse($current_resume->first()->rsmchanged)->format('mdy');
                endif;

                $rsm['rsmname'] = Auth::user()->genid.Carbon::parse($current_resume->first()->rsmadded)->format('mdy').$changed_date.'.'.$current_resume->first()->rsmext;
                $rsm['location'] = public_path($current_resume->first()->rsmfolder).'/'.$rsm['rsmname'];

                if(file_exists($rsm['location'])):
                    unlink($rsm['location']);
                endif;
                DB::table('resumes')
                ->where('genid', Auth::user()->genid)
                ->update([
                    'rsmname'           => '',
                    'rsmext'            => '',
                    'rsmsize'           => '',
                    'rsmfolder'         => ''
                ]);
                $this->msg['rsm']['dlt']['success'] = 'You have successfully deleted your resume.';
                break;
        endswitch;
        print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    }

    public function save_personal_info(Request $request){
        $current_user = DB::table('personal_information')->where('genid', Auth::user()->genid)->count();
        
        $replace_names = [
            'fname'       => 'First Name',
            'mname'       => 'Middle Name',
            'lname'       => 'Last Name',
            'mobile'      => 'Mobile No.',
            'phone'       => 'Telephone No.',
            'present_address'   => 'Present Address',
            'permanent_address' => 'Permanent Address',
            'gender'      => 'Gender',
            'bday'       => 'Birthdate',
            'bplace'      => 'Birthplace',
            'cstatus'     => 'Civil Status',
            'country'     => 'Country',
            'nationality' => 'Nationality',
            'objectives'   => 'Career Objectives'
        ];
        $usr = $request->all();
        $usr = json_decode($usr['user'], true);
        $usr = $usr ? $usr : [];
        $validate = Validator::make($usr, [
            'fname'       => 'required|max:20',
            'mname'       => 'required|max:20',
            'lname'       => 'required|max:20',
            'mobile'      => 'required|max:20',
            'phone'       => 'max:20',
            'present_address'        => 'required|max:250',
            'permanent_address'      => 'max:250',
            'bday'        => 'required|date|date_format:m/d/Y',
            'bplace'      => 'required',
            'gender'      => 'required',
            'cstatus'     => 'required',
            'country'     => 'required',
            'nationality' => 'required',
            'objectives'   => 'required|max:200',
        ]);
        $validate->setAttributeNames($replace_names);
        $has_error = $this->hasError($validate);

        if($has_error == true):
            $this->msg['error']['prsnl'] = $validate->messages()->toArray();
        else:
            DB::table('users')
            ->where('genid', Auth::user()->genid)
            ->update([
                'fname'     => $usr['fname'],
                'mname'     => $usr['mname'],
                'lname'     => $usr['lname']
            ]);
            if(isset($usr['bday'])):
                $usr['bday'] = date('Y-m-d', strtotime($usr['bday']));
            endif;
            if($current_user):
                DB::table('personal_information')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'mobile'      => $usr['mobile'],
                        'phone'       => $usr['phone'],
                        'present_address' => $usr['present_address'],
                        'permanent_address'  => $usr['permanent_address'],
                        'age'         => $usr['age'],
                        'bday'        => $usr['bday'],
                        'bplace'      => $usr['bplace'],
                        'gender'      => $usr['gender'],
                        'cstatus'     => $usr['cstatus'],
                        'country'     => $usr['country'],
                        'nationality' => $usr['nationality'],
                        'objectives'   => $usr['objectives']
                    ]);
                $this->msg['success']['prsnl']['updated'] = 'Successfully Updated';
            else:
                DB::table('personal_information')->insert([
                    'genid' => Auth::user()->genid,
                    'mobile'      => $usr['mobile'],
                    'phone'       => $usr['phone'],
                    'present_address' => $usr['present_address'],
                    'permanent_address'  => $usr['permanent_address'],
                    'age'           => $usr['age'],
                    'bday'         => $usr['bday'],
                    'bplace'        => $usr['bplace'],
                    'gender'        => $usr['gender'],
                    'cstatus'       => $usr['cstatus'],
                    'country'       => $usr['country'],
                    'nationality'   => $usr['nationality'],
                    'objectives'     => $usr['objectives']
                ]);
                DB::table('profile_forms')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'personalinfo'     => 1
                    ]);
                $this->msg['success']['prsnl']['added'] = 'Successfully Added';
            endif;
        endif;
        print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    }

    public function save_employment_history(Request $request){
        // $current_user = DB::table('employment_history')->where('genid', Auth::user()->genid)->count();

        $replace_names = [
            
        ];
        $usr = [];
        $rqst = $request->all();
        $usr['wrk'] = json_decode($rqst['wrk'], true);
        $usr['emp'] = json_decode($rqst['emp'], true);
        $usr = $usr ? $usr : [];
        $messages = [];
        $loop_error = 0;

        for ($i = 0; $i < count($usr['emp']); $i++):
            if(isset($usr['emp'][$i]['ispresent'])):
                if($usr['emp'][$i]['ispresent'] == 1):
                    $validate_edate[$i] = '';
                else:
                    $validate_edate[$i] = 'required|date|date_format:m/d/Y';
                endif;
            endif;
            $validate = Validator::make($usr['emp'][$i], [
                'company'   => 'required|max:200',
                'position'  => 'required|max:100',
                'salary'    => 'required|numeric|min:10',
                'sdate'  => 'required|date|date_format:m/d/Y',
                'edate'  => $validate_edate[$i] ? $validate_edate[$i] : '',
            ], $messages);
            $validate->setAttributeNames($replace_names);
            $this->msg['error']['emp'][] = $validate->messages()->toArray();
            $has_error = $this->hasError($validate);
            $loop_error += count($validate->messages()->toArray());
        endfor;
        if($has_error == true || $loop_error > 0):
            $this->msg['has_error'] = true;
        else:
        endif;
        // print_r($usr['emp']);
        // $validate = Validator::make($usr, []);
        // $validate->setAttributeNames($replace_names);
        // $has_error = $this->hasError($validate);
        // if($has_error == true):
        //     $this->msg['error']['emphstry'] = $validate->messages()->toArray();
        // else:
        // endif;
        print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    }  

    public function get_countries(){
        $countries = DB::table('countries')->get();
        return json_encode($countries, JSON_PRETTY_PRINT);
    }

    public function get_profile_forms(){
        $users = DB::table('profile_forms')
            ->select(
                'personalinfo', 'educationalbg', 'emphistory', 'charreference'
            )->where('genid', Auth::user()->genid)
            ->get();
        return json_encode($users[0], JSON_PRETTY_PRINT);
    }

    public function get_current_user(){
        $users = DB::table('users')
            ->leftJoin('avatars', function ($join) {
                $join->on('users.genid', '=', 'avatars.genid');
            })
            ->leftJoin('resumes', function ($join) {
                $join->on('users.genid', '=', 'resumes.genid');
            })
            ->leftJoin('personal_information', 'users.genid', '=', 'personal_information.genid')
            ->select(
                'email', 'fname', 'mname', 'lname', 'present_address', 'permanent_address', 'mobile', 'phone', 'bday', 'bplace', 'age',
                'gender', 'cstatus', 'country', 'nationality', 'objectives',
                'act_created', 'imgname', 'rsmname', 'rsmext', 'rsmsize'
            )->where('users.genid', Auth::user()->genid)
            ->orderBy('users.id', 'desc')
            ->get();
        // $edcs = DB::table('educational_bg')
        //     ->select(
        //         'genid', 'educ_type', 'school', 'sdate', 'edate',
        //         'course', 'awrdsnrcgntn'
        //     )->get();
        // $emps = DB::table('employment_history')
        //     ->select(
        //         'genid', 'company', 'position', 'currency', 'salary', 'empsdate', 'empedate',
        //         'supname', 'canwecontact', 'contctby',
        //         'empemail', 'empphone', 'empmobile', 'empskype', 'empviber', 'empym',
        //         'jbdscrptn', 'rsnfrlvng', 'ispresent'
        //     )->get();
        // $chrs = DB::table('character_reference')
        //     ->select(
        //         'genid', 'chrname', 'chrrelation', 'chremployer', 'chrposition', 'contctby',
        //         'chremail', 'chrphone', 'chrmobile', 'chrskype', 'chrviber', 'chrym'
        //     )->get();
        foreach ($users as $key => $user):
            $users = json_decode(json_encode($users), true);
            $user = json_decode(json_encode($user), true);

            // foreach ($edcs as $edc):
            //     $edc = json_decode(json_encode($edc), true);
            //     if($user['genid'] === $edc['genid']):
            //         $users[$key]['edcs'][] = $edc;
            //     endif;
            // endforeach;

            // foreach ($emps as $emp):
            //     $emp = json_decode(json_encode($emp), true);
            //     if($user['genid'] === $emp['genid']):
            //         $users[$key]['emps'][] = $emp;
            //     endif;
            // endforeach;

            // foreach ($chrs as $chr):
            //     $chr = json_decode(json_encode($chr), true);
            //     if($user['genid'] === $chr['genid']):
            //         $users[$key]['chrs'][] = $chr;
            //     endif;
            // endforeach;
        endforeach;
        return json_encode($users, JSON_PRETTY_PRINT);
        // dd($users);
        // return response()->json($users);
    }

    public function get_personal_info(){
        $users = DB::table('users')
            ->leftJoin('personal_information', 'users.genid', '=', 'users.genid')
            ->select(
                'fname', 'mname', 'lname', 'present_address', 'permanent_address', 'mobile', 'phone', 'bday', 'bplace', 'age',
                'gender', 'cstatus', 'country', 'nationality', 'objectives'
            )->where('users.genid', Auth::user()->genid)
            ->orderBy('users.id', 'desc')
            ->get();
        if(isset($users[0]->bday)):
            $users[0]->bday = date('m/d/Y', strtotime($users[0]->bday));
        endif;
        return json_encode($users[0], JSON_PRETTY_PRINT);
    }

    public function hasError($validate){
        if(isset($validate)):
            if($validate->fails()):
                $result = true;
            else:
                $result = false;
            endif;
            return $result;
        endif;
    }

    public function logout(){
        Auth::guard('jp_user')->logout();
        Session::forget('usr_role');
        return redirect()->route('home_index');
    }

    public function lbl_personal_info(){
        return view('users.form_labels.personal_info', []);
    }

    public function calendar(){
        return view('users.calendar', [
            'scripts'       => array_merge([j_moment, j_moment_timezone], $this->import['scripts'], [j_fullcalendar, j_colorpicker]),
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_usr_calendar, c_fullcalendar, c_colorpicker]),
            'ngular'        =>  array_merge($this->import['ngular'], [n_ui_bootstrap, n_uicalendar, n_user_calendar])
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
