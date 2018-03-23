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
      'scripts'    => array_merge($this->import['scripts'], [j_summernote, j_jcrop]),
      'stylesheet' => array_merge($this->import['stylesheet'], [c_ngselect, c_summernote, c_jcrop, c_usr_edit_profile]),
      'ngular'     =>  array_merge($this->import['ngular'], [n_summernote, n_ngselect, n_ngfilter, n_ngmask, n_user_edit_profile])      
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
    $usr = json_decode($usr['frmusr'], true);
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
      'objectives'   => 'required|max:200'
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
            'permanent_address'  => isset($usr['permanent_address']) ? $usr['permanent_address'] : '',
            'age'         => $usr['age'],
            'bday'        => $usr['bday'],
            'bplace'      => $usr['bplace'],
            'gender'      => $usr['gender'],
            'cstatus'     => $usr['cstatus'],
            'country'     => $usr['country'],
            'nationality' => $usr['nationality'],
            'objectives'   => $usr['objectives']
          ]);
        $this->msg['success']['prsnl']['updated'] = 'Personal Information is successfully updated!';
      else:
        DB::table('personal_information')->insert([
            'genid' => Auth::user()->genid,
            'mobile'      => $usr['mobile'],
            'phone'       => $usr['phone'],
            'present_address' => $usr['present_address'],
            'permanent_address'  => isset($usr['permanent_address']) ? $usr['permanent_address'] : '',
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
        $this->msg['success']['prsnl']['added'] = 'Personal Information is successfully added!';
      endif;
    endif;
    print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
  }

  public function save_educational_bg(Request $request){
    $exist = DB::table('educational_background')->where('genid', Auth::user()->genid)->count();
    $replace_names = [
      'school'       => 'School',
      'course'     => 'Course',
      'sdate'         => 'Start Date',
      'edate'         => 'End Date',
      'awardsrecognition' => 'Awards and Recoginition'
    ];
    $usr = $request->all();
    $usr = json_decode($usr['schl'], true);
    $usr = $usr ? $usr : [];
    $validate = Validator::make($usr, [
      'school'   => 'required|max:150',
      'course' => 'required|max:150',
      'sdate'  => 'required|date|date_format:m/d/Y',
      'edate'  => 'required|date|date_format:m/d/Y',
      'awardsrecognition' => 'max:800'
    ]);
    $validate->setAttributeNames($replace_names);
    $has_error = $this->hasError($validate);
    if($has_error == true):
      $this->msg['error']['educbg'] = $validate->messages()->toArray();
    else:
      if(isset($usr['sdate'])):
        $usr['sdate'] = date('Y-m-d', strtotime($usr['sdate']));
      endif;
      if(isset($usr['edate'])):
        $usr['edate'] = date('Y-m-d', strtotime($usr['edate']));
      endif;
      if($exist):
        DB::table('educational_background')
          ->where('genid', Auth::user()->genid)
          ->update([
            'school'    => $usr['school'],
            'course'  => $usr['course'],
            'sdate'   => $usr['sdate'],
            'edate'   => $usr['edate'],
            'awardsrecognition' => isset($usr['awardsrecognition']) ? $usr['awardsrecognition'] : ''
          ]);
        $this->msg['success']['educbg']['updated'] = 'Educational Background is successfully updated!';
      else:
        DB::table('educational_background')
          ->where('genid', Auth::user()->genid)
          ->insert([
            'genid' => Auth::user()->genid,
            'school'    => $usr['school'],
            'course'  => $usr['course'],
            'sdate'   => $usr['sdate'],
            'edate'   => $usr['edate'],
            'awardsrecognition' => isset($usr['awardsrecognition']) ? $usr['awardsrecognition'] : ''
          ]);
        DB::table('profile_forms')
          ->where('genid', Auth::user()->genid)
          ->update([
              'educationalbg'     => 1
          ]);
        $this->msg['success']['educbg']['added'] = 'Educational Background is successfully added!';
      endif;
    endif;
    print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
  }
  
  public function save_employment_history(Request $request){
    $to_char_ref = DB::table('employment_history')->where('genid', Auth::user()->genid)->count();
    $replace_names = [
      'company'       => 'Company',
      'position'      => 'Position',
      'salary'        => 'Salary',
      'sdate'         => 'Start Date',
      'edate'         => 'End Date',
      'jbdescription' => 'Job Description',
      'reasonforleaving' => 'Reason for Leaving'
    ];
    $usr = [];
    $rqst = $request->all();
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
          'jbdescription'  => 'required|min:50|max:800',
          'reasonforleaving'  => 'required|min:50|max:800'
      ], $messages);
      $validate->setAttributeNames($replace_names);
      $this->msg['error']['emp'][] = $validate->messages()->toArray();
      $has_error = $this->hasError($validate);
      $loop_error += count($validate->messages()->toArray());
    endfor;
    if($has_error == true || $loop_error > 0):
      $this->msg['has_error'] = true;
    else:
      $usr['emp'] = array_reverse($usr['emp']);
      for ($m = 0; $m < count($usr['emp']); $m++):
        
        if(!empty($usr['emp'][$m]['sdate'])):
          $usr['emp'][$m]['sdate'] = date('Y-m-d', strtotime($usr['emp'][$m]['sdate']));
        else:
          $usr['emp'][$m]['sdate'] = NULL;
        endif;
        if(!empty($usr['emp'][$m]['edate'])):
          $usr['emp'][$m]['edate'] = date('Y-m-d', strtotime($usr['emp'][$m]['edate']));
        else:
          $usr['emp'][$m]['edate'] = NULL;
        endif;
        if(empty($usr['emp'][$m]['ispresent'])):
          $usr['emp'][$m]['ispresent'] = 0;
        endif;
        DB::table('employment_history')->insert([
          'genid'    => Auth::user()->genid,
          'company'  => $usr['emp'][$m]['company'],
          'position' => $usr['emp'][$m]['position'],
          'currency' => $usr['emp'][$m]['currency'],
          'salary'   => $usr['emp'][$m]['salary'],
          'sdate'    => $usr['emp'][$m]['sdate'],
          'edate'    => $usr['emp'][$m]['edate'],
          'ispresent' => $usr['emp'][$m]['ispresent'],
          'jbdescription' => $usr['emp'][$m]['jbdescription'],
          'reasonforleaving' => $usr['emp'][$m]['reasonforleaving']
        ]);
      endfor;
      if(empty($to_char_ref)):
        $this->msg['to_char_ref'] = true;
        DB::table('profile_forms')
        ->where('genid', Auth::user()->genid)
        ->update([
            'emphistory' => 1
        ]);
      else:
        $this->msg['to_char_ref'] = false;
      endif;
      $this->msg['success']['emphistory'] = 'You have successfully added your employment history!';
    endif;
    print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
  }

  public function update_employment_history(Request $request){
    $ispresent_exist = DB::table('employment_history')->where('genid', Auth::user()->genid)->where('ispresent', 1)->count();
    $replace_names = [
      'company'       => 'Company',
      'position'      => 'Position',
      'salary'        => 'Salary',
      'sdate'         => 'Start Date',
      'edate'         => 'End Date',
      'jbdescription' => 'Job Description',
      'reasonforleaving' => 'Reason for Leaving'
    ];
    $usr = [];
    $rqst = $request->all();
    $usr['emp'] = json_decode($rqst['emp'], true);
    $usr['idx'] = json_decode($rqst['idx'], true);
    $usr = $usr ? $usr : [];
    $messages = [];

    if(isset($usr['emp']['ispresent'])):
      if($usr['emp']['ispresent'] == 1):
        $validate_edate = '';
      else:
        $validate_edate = 'required|date|date_format:m/d/Y';
      endif;
    endif;

    $validate = Validator::make($usr['emp'], [
        'company'   => 'required|max:200',
        'position'  => 'required|max:100',
        'salary'    => 'required|numeric|min:10',
        'sdate'  => 'required|date|date_format:m/d/Y',
        'edate'  => $validate_edate ? $validate_edate : '',
        'jbdescription'  => 'required|min:50|max:800',
        'reasonforleaving'  => 'required|min:50|max:800'
    ], $messages);
    
    $validate->setAttributeNames($replace_names);
    $has_error = $this->hasError($validate);

    if($has_error == true):
      $this->msg['error']['emp'] = $validate->messages()->toArray();
    else:
      if(!empty($ispresent_exist) && empty($usr['emp']['ispresent']) || empty($ispresent_exist)):
        if(!empty($usr['emp']['sdate'])):
          $usr['emp']['sdate'] = date('Y-m-d', strtotime($usr['emp']['sdate']));
        endif;
        if(!empty($usr['emp']['edate'])):
          $usr['emp']['edate'] = date('Y-m-d', strtotime($usr['emp']['edate']));
        else:
          $usr['emp']['edate'] = NULL;
        endif;
        if(empty($usr['emp']['ispresent'])):
          $usr['emp']['ispresent'] = 0;
        endif;
        DB::table('employment_history')
        ->where('genid', Auth::user()->genid)
        ->where('id', $usr['emp']['id'])
        ->update([
          'company' => $usr['emp']['company'],
          'position' => $usr['emp']['position'],
          'currency' => $usr['emp']['currency'],
          'salary' => $usr['emp']['salary'],
          'sdate' => $usr['emp']['sdate'],
          'edate' => $usr['emp']['edate'],
          'ispresent' => $usr['emp']['ispresent'],
          'jbdescription' => $usr['emp']['jbdescription'],
          'reasonforleaving' => $usr['emp']['reasonforleaving']
        ]);
        $this->msg['success_emp'][$usr['idx']] = 'You have successfully updated your employment history in '.$usr['emp']['company'].'!';
      else:
        $this->msg['error']['emp']['edate'][0] = 'You already have present employer';
      endif;
    endif;
    print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
  }

  public function delete_employment_history(Request $request){
    $usr = [];
    $rqst = $request->all();
    $usr['emp'] = json_decode($rqst['emp'], true);
    $usr = $usr ? $usr : [];
    DB::table('employment_history')
      ->where('id', $usr['emp']['id'])
      ->where('genid', $usr['emp']['genid'])
      ->delete();
    $this->msg['success']['emphistory'] = 'You have successfully deleted your employment history!';
    print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
  }

  public function save_work_experience(Request $request){
    $existing = DB::table('personal_information')->where('genid', Auth::user()->genid)->where('wrkexperience', NULL)->count();
    $existing_emp = DB::table('employment_history')->where('genid', Auth::user()->genid)->count();

    $existing_form = DB::table('profile_forms')->where('genid', Auth::user()->genid)->where('emphistory', 1)->count();
    $usr = $request->all();
    $wrkexperience = json_decode($usr['wrkexperience'], true);
    $wrkexperience = $wrkexperience ? $wrkexperience : [];
    
    DB::table('personal_information')
    ->where('genid', Auth::user()->genid)
    ->update([
        'wrkexperience' => $wrkexperience
    ]);

    if($wrkexperience == 1 && empty($existing_emp) && empty($existing_form)):
      DB::table('profile_forms')
      ->where('genid', Auth::user()->genid)
      ->update([
          'emphistory' => 1
      ]);
      $this->msg['success']['emphistory'] = 'You have successfully update your employment history!';
      print_r(json_encode($this->msg, JSON_PRETTY_PRINT));
    endif;
  }

  public function emp_history(){
    $users = DB::table('employment_history')
      ->select(
        'id', 'genid', 'company', 'position', 'currency', 'salary', 'sdate', 'edate', 'ispresent', 'jbdescription', 'reasonforleaving'
      )->where('genid', Auth::user()->genid)
      ->orderBy('id', 'desc')
      ->get();
    if(isset($users)):
      for ($i = 0; $i < count($users); $i++):
        if(isset($users[$i]->sdate)):
          $users[$i]->sdate = date('m/d/Y', strtotime($users[$i]->sdate));
        endif;
        if(isset($users[$i]->edate)):
          $users[$i]->edate = date('m/d/Y', strtotime($users[$i]->edate));
        endif;
        if(isset($users[$i]->ispresent)):
          $users[$i]->ispresent = $users[$i]->ispresent ? true : false;
        endif;
      endfor;
      $json = json_encode($users, JSON_PRETTY_PRINT);
    else:
      $json = json_encode([], JSON_PRETTY_PRINT);
    endif;
    return $json;
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
        'users.genid', 'email', 'fname', 'mname', 'lname', 'present_address', 'permanent_address', 'mobile', 'phone', 'bday', 'bplace', 'age',
        'gender', 'cstatus', 'country', 'nationality', 'objectives', 'wrkexperience',
        'act_created', 'imgname', 'rsmname', 'rsmext', 'rsmsize'
      )->where('users.genid', Auth::user()->genid)
      ->orderBy('users.id', 'desc')
      ->get();
      // $edcs = DB::table('educational_bg')
      //     ->select(
      //         'genid', 'educ_type', 'school', 'sdate', 'edate',
      //         'course', 'awrdsnrcgntn'
      //     )->get();
      $emps = DB::table('employment_history')
          ->select(
              'genid', 'company', 'position', 'currency', 'salary', 'sdate', 'edate', 'ispresent', 'jbdescription', 'reasonforleaving'
          )->get();
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

          foreach ($emps as $emp):
            $emp = json_decode(json_encode($emp), true);
            if($user['genid'] === $emp['genid']):
              $users[$key]['emps'][] = $emp;
            endif;
          endforeach;

          // foreach ($chrs as $chr):
          //     $chr = json_decode(json_encode($chr), true);
          //     if($user['genid'] === $chr['genid']):
          //         $users[$key]['chrs'][] = $chr;
          //     endif;
          // endforeach;
      endforeach;
      if(isset($users[0]['bday'])):
        $users[0]['bday'] = date('m/d/Y', strtotime($users[0]['bday']));
      endif;
      return json_encode($users, JSON_PRETTY_PRINT);
      // dd($users);
      // return response()->json($users);
  }

  public function get_personal_info(){
    $exist = DB::table('personal_information')->where('genid', Auth::user()->genid)->count();
    $users = DB::table('users')
      ->leftJoin('personal_information', 'users.genid', '=', 'personal_information.genid')
      ->select(
          'fname', 'mname', 'lname', 'present_address', 'permanent_address', 'mobile', 'phone', 'bday', 'bplace', 'age',
          'gender', 'cstatus', 'country', 'nationality', 'objectives', 'wrkexperience'
      )->where('users.genid', Auth::user()->genid)
      ->orderBy('users.id', 'desc')
      ->get();
    $users = $exist ? $users : [];
    if(isset($users[0]->bday)):
      $users[0]->bday = date('m/d/Y', strtotime($users[0]->bday));
    endif;

    return json_encode($users, JSON_PRETTY_PRINT);
  }

  public function get_educational_bg(){
    $exist = DB::table('educational_background')->where('genid', Auth::user()->genid)->count();
    $users = DB::table('educational_background')
      ->select(
          'school', 'course', 'sdate', 'edate', 'awardsrecognition'
      )->where('genid', Auth::user()->genid)
      ->orderBy('id', 'desc')
      ->get();
    $users = $exist ? $users : [];
    if(isset($users[0]->sdate)):
      $users[0]->sdate = date('m/d/Y', strtotime($users[0]->sdate));
    endif;
    if(isset($users[0]->edate)):
      $users[0]->edate = date('m/d/Y', strtotime($users[0]->edate));
    endif;
    return json_encode($users, JSON_PRETTY_PRINT);
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
  public function lbl_educational_bg(){
    return view('users.form_labels.educational_bg', []);
  }

  public function resume(){
    return view('tpls.resumes.resume', []);
  }
}