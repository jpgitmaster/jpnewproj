<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        // Auth::guard('jp_user')->logout();
        // Session::forget('usr_role');
        if($request->session()->get('usr_role') != null):
            if($role == 'vwr' && $request->session()->get('usr_role') == 1):
                return redirect()->route('usr_jobs');
            endif;
            if($role == 'vwr' && $request->session()->get('usr_role') == 2):
                return redirect()->route('admn_dashboard');
            endif;
        endif;
        return $next($request);


    }
}
