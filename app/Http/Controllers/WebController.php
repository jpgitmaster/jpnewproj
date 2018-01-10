<?php

namespace App\Http\Controllers;
use Session;
use DB;

use App\Usr;
use App\Mail\MailNewRegistrants;

use Carbon\Carbon;

use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class WebController extends Controller
{
    public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_ngmotion, c_fawesome, c_bootstrap, c_global],
            'scripts' => [j_jquery, j_popper, j_bootstrap, j_velocity, j_velocity_ui],
            'ngular'    => [n_ng, n_ngresource, n_nganimate, n_home]
        ];
        $this->replace_names = [
            'email' => 'Email',
            'pword' => 'Password',
            'pword_confirmation' => 'Confirm Password'
        ];

        // date_default_timezone_set('America/Los_Angeles');
        date_default_timezone_set('Asia/Manila');
    }    

    public function index(Request $request){
        return view('home', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], array(c_home)),
            'ngular'        => $this->import['ngular']
            // 'login'        => $this->login
        ]);
    }

    public function login_v(Request $request){
    	return view('forms.login');
    }
    
    public function login(Request $request){
        $input = $request->all();
        $messages = [
            'email.exists' => "Couldn't find your email."
        ];
    	$validate = Validator::make($input, [
            'email' => 'required|email|exists:users,email',
            'pword' => 'required'
        ], $messages);
        $validate->setAttributeNames($this->replace_names);
    	$usr = Usr::where('email', $input['email'])->first();
       	
        if(isset($usr->role)):
	    	switch ($usr->role):
	    		case 1:
	    			$guard = 'jp_user';
	    			$redirect = 'usr_jobs';
	    			break;
	    		case 2:
	    			$guard = 'jp_admin';
	    			$redirect = 'admn_dashboard';
	    			break;
	    	endswitch;
	    endif;
    	if(!$validate->fails()):
            if($usr->activated == 1):
    	    	if(Auth::guard($guard)->attempt([
    	    		'email' 	=> $input['email'],
    	    		'password' 	=> $input['pword'],
    				'activated' => 1,
    				'role' 		=> $usr->role
    	    	])):
                    Session::put('usr_role', $usr->role);
        			return redirect()->route($redirect);
        		endif;
                return back()
                        ->withInput()
                        ->withErrors(['pword' => 'Incorrect password.'], 'login');
            endif;
            return back()
                        ->withInput()
                        ->withErrors(['email' => 'Your account is not yet activated.'], 'login');
    	else:
    		return back()
                    ->withInput()
                    ->withErrors($validate, 'login');
        endif;
    }
    
    public function register(Request $request, Mailer $mailer){
        $usr = $request->all();

        $user = json_decode($usr['user'], true);

        // generated id
        $gen_id  = $this->get_genid(20);

        if($user['token'] == Session::token()):
            $validate = Validator::make($user, [
                'email' => 'required|email|max:80|unique:users,email',
                'pword' => 'required|confirmed',
                'pword_confirmation' => 'required'
            ]);
            $validate->setAttributeNames($this->replace_names);
            $has_error = $this->hasError($validate);

            if($has_error == true):
                $msg['has_error'] = true;
                $msg['error'] = $validate->messages()->toArray();
            else:
                $usr = new Usr;
                $usr->genid          = $gen_id;
                $usr->email          = $user['email'];
                $usr->password       = Hash::make($user['pword']);
                $usr->remember       = 0;
                $usr->activated      = 0;
                $usr->act_activated  = NULL;
                $usr->role           = 1;
                $usr->remember_token = $user['token'];

                DB::table('primary_info')->insert([
                    'genid' => $gen_id
                ]);
                DB::table('profile_forms')->insert([
                    'genid' => $gen_id,
                    'personalinfo'     => 1,
                    'contactdetails'   => 0,
                    'educationalbg'    => 0,
                    'emphistory'       => 0,
                    'charreference'    => 0
                ]);
                $usr->save();
                if( count($mailer->failures()) > 0 ):
                    print_r(count($mailer->failures()));
                else:
                    $mailer->to($user['email'])
                        ->send(new MailNewRegistrants($user));
                endif;
                $msg['has_error'] = false;
            endif;
            print_r(json_encode($msg, JSON_PRETTY_PRINT));
        endif;
        // print_r($request->session()->all());
        // return redirect('profile');
    }

    public function email_confirmation($token){
        $user = Usr::where('remember_token', $token)->first();
        if(!is_null($user)):
            $user->activated    = 1;
            $user->act_activated = Carbon::now();
            $user->save();

            if(isset($user->role)):
                switch ($user->role):
                    case 1:
                        $guard = 'jp_user';
                        $redirect = 'usr_profile';
                        break;
                    case 2:
                        $guard = 'jp_admin';
                        $redirect = 'admn_dashboard';
                        break;
                endswitch;
            endif;
            Auth::guard($guard)->login($user);
            Session::put('usr_role', $user->role);
            return redirect()->route($redirect)->with('new_activated_user', true);
        endif;
        return view('errors.404');
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
