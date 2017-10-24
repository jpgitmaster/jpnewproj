<?php

namespace App\Http\Controllers;

use App\Usr;
use Session;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function __construct(){
    	parent::__construct();
    	$this->import = [
            'stylesheet' => [c_ngmotion, c_fawesome, c_bootstrap, c_global],
            'scripts' => [j_jquery, j_popper, j_bootstrap],
            'ngular'    => [n_ng, n_ngresource, n_nganimate, n_home]
        ];
        $this->replace_names = [
            'email' => 'Email',
            'pword' => 'Password',
            'pword_confirmation' => 'Confirm Password'
        ];
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
	    	if(Auth::guard($guard)->attempt([
	    		'email' 	=> $input['email'],
	    		'password' 	=> $input['pword'],
				'activated' => 1,
				'role' 		=> $usr->role
	    	])):
	    		// Auth::guard($guard)->login($usr);
	    		Session::put('usr_role', $usr->role);
    			return redirect()->route($redirect);
    		endif;
            return back()
                    ->withInput()
                    ->withErrors(['pword' => 'Please check your email and password.'], 'login');
    	else:
    		return back()
                    ->withInput()
                    ->withErrors($validate, 'login');
    	endif;
    }
    
    public function register(Request $request, Mailer $mailer){
        $usr = $request->all();

        $user = json_decode($usr['user'], true);

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
            //     // $usr = new User;
            //     // $usr->genid          = '';
            //     // $usr->email          = $user['email'];
            //     // $usr->password       = Hash::make($user['pword']);
            //     // $usr->remember       = 0;
            //     // $usr->activated      = 0;
            //     // $usr->act_created    = Carbon::now();
            //     // $usr->last_login     = Carbon::now();
            //     // $usr->role           = 1;
            //     // $usr->remember_token = $user['token'];
            //     // $usr->save();
            //     // if( count($mailer->failures()) > 0 ):
            //     //     print_r(count($mailer->failures()));
            //     // else:
            //     //     $mailer->to($user['email'])
            //     //         ->send(new MailNewRegistrants($user));
            //     // endif;
            //     $msg['has_error'] = false;
            endif;
            print_r(json_encode($msg, JSON_PRETTY_PRINT));
        endif;
        // print_r($request->session()->all());
        // return redirect('profile');
    }

    public function email_confirmation($token){
        $user = User::where('remember_token', $token)->first();
        
        // if(!is_null($user)){
        //     $user->activated = 1;
        //     $user->save();

        //     Auth::login($user);
        //     // $active_user = User::find($token);
        //     if (Auth::check()):
        //         return redirect()->route('home_index')->with('status', 'completed');
        //     endif;
            
        // }
        // return redirect()->route('login')->with('status', $user);
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
}
