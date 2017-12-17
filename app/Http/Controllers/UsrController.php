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
            'ngular'    => [n_ng, n_ngsanitize, n_ngresource, n_nganimate, n_summernote, n_ngselect, n_ngfilter, n_user]
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
            'ngular'        =>  array_merge($this->import['ngular'], [n_user_edit_profile])
            
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
            'gender'      => 'Gender',
            'bdate'       => 'Birthdate',
            'bplace'      => 'Birthplace',
            'cstatus'     => 'Civil Status',
            'country'     => 'Country',
            'nationality' => 'Nationality',
            'cobjctves'   => 'Career Objectives'
        ];
        $usr = $request->all();
        $usr = json_decode($usr['user'], true);
        $usr = $usr ? $usr : [];
        $validate = Validator::make($usr, [
            'fname'       => 'required|max:20',
            'mname'       => 'required|max:20',
            'lname'       => 'required|max:20',
            'bdate'       => 'required|date|date_format:m/d/Y',
            'bplace'      => 'required',
            'gender'      => 'required',
            'cstatus'     => 'required',
            'country'     => 'required',
            'nationality' => 'required',
            'cobjctves'   => 'required|max:200',
        ]);
        $validate->setAttributeNames($replace_names);
        $has_error = $this->hasError($validate);

        if($has_error == true):
            $this->msg['error']['prsnl'] = $validate->messages()->toArray();
        else:
            if($current_user):
                DB::table('primary_info')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'fname'     => $usr['fname'],
                        'mname'     => $usr['mname'],
                        'lname'     => $usr['lname']
                    ]);
                DB::table('personal_information')
                    ->where('genid', Auth::user()->genid)
                    ->update([
                        'bdate'       => $usr['bdate'],
                        'bplace'      => $usr['bplace'],
                        'gender'      => $usr['gender'],
                        'cstatus'     => $usr['cstatus'],
                        'country'     => $usr['country'],
                        'nationality' => $usr['nationality'],
                        'cobjctves'   => $usr['cobjctves']
                    ]);
            else:
                DB::table('primary_info')->insert([
                    'genid' => Auth::user()->genid,
                    'fname'         => $usr['fname'],
                    'mname'         => $usr['mname'],
                    'lname'         => $usr['lname']
                ]);
                DB::table('personal_information')->insert([
                    'genid' => Auth::user()->genid,
                    'bdate'         => $usr['bdate'],
                    'bplace'        => $usr['bplace'],
                    'gender'        => $usr['gender'],
                    'cstatus'       => $usr['cstatus'],
                    'country'       => $usr['country'],
                    'nationality'   => $usr['nationality'],
                    'cobjctves'     => $usr['cobjctves']
                ]);
            endif;
        endif;
        print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    }

    public function get_countries(){
        $countries = DB::table('countries')->get();
        return json_encode($countries, JSON_PRETTY_PRINT);
    }

    public function get_current_user(){
        $count_avatars = DB::table('avatars')->where('genid', Auth::user()->genid)->count();
        $users = DB::table('users')
            ->leftJoin('avatars', function ($join) {
                $join->on('users.genid', '=', 'avatars.genid');
            })
            ->leftJoin('resumes', function ($join) {
                $join->on('users.genid', '=', 'resumes.genid');
            })
            // ->join('avatars', 'users.genid', '=', 'avatars.genid')->whereNotNull('avatars.genid')
            // ->join('resumes', 'users.genid', '=', 'resumes.genid')
            // ->join('personal_information', 'users.genid', '=', 'personal_information.genid')
            ->select(
                'email', 'act_created', 'imgname', 'rsmname', 'rsmext', 'rsmsize'
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
}
