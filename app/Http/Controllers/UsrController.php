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
            'ngular'    => [n_ng, n_ngresource, n_nganimate, n_user]
        ];
        date_default_timezone_set('Asia/Manila');
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
            'ngular'        =>  array_merge($this->import['ngular'], array(n_user_edit_profile))
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
        // $current_img = Usr::where('genid', Auth::user()->genid)->count();
        $current_img = DB::table('primary_info')->select('dp')->where('genid', Auth::user()->genid);
        $rqst = $request->all();
        $coordinate = json_decode($rqst['coordinates']);

        if($request->hasFile('file')):
            $dp = [];
            $dp['folder'] = 'display_pic';
            $dp['file'] = $request->file('file')->getClientOriginalName();
            $dp['extension'] = $request->file('file')->getClientOriginalExtension();
            

            if($current_img->count()):
                $dp['location'] = public_path($dp['folder']).'/'.$current_img->first()->dp;
                
                if(file_exists($dp['location'])):
                    unlink($dp['location']);
                    $request->file('file')->move(public_path($dp['folder']), $current_img->first()->dp);
                endif;
                DB::table('primary_info')
                    ->where('genid', Auth::user()->genid)
                    ->update(['dp' => $current_img->first()->dp]);
            else:
                $dp['imgname'] = Auth::user()->genid.Carbon::now()->format('mdy');
                // Storage::putFile('resumes', $request->file('file'));
                $request->file('file')->move(public_path($dp['folder']), $dp['imgname'].'.'.$dp['extension']);
                DB::table('primary_info')->insert([
                    'genid' => Auth::user()->genid,
                    'fname' => '',
                    'mname' => '',
                    'lname' => '',
                    'dp'    => $dp['imgname'].'.'.$dp['extension']
                ]);
                $dp['location'] = $dp['folder'].'/'.$dp['imgname'].'.'.$dp['extension'];
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
        endif;
    }

    public function logout(){
        Auth::guard('jp_user')->logout();
        Session::forget('usr_role');
    	return redirect()->route('home_index');
    }


    public function get_current_user(){
        $users = DB::table('users')
            ->join('primary_info', 'users.genid', '=', 'primary_info.genid')
            // ->join('personal_information', 'users.genid', '=', 'personal_information.genid')
            ->select(
                'email', 'act_created', 'dp'
            )->where('users.genid', Auth::user()->genid)
            ->orderBy('users.id', 'desc')->get();
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
        // echo json_encode($users, JSON_PRETTY_PRINT);
        // dd($users);
        return response()->json($users);
    }
}
