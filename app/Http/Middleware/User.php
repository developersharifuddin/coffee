<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //if(Session::has('login'))
        //{
            if(auth()->user()->is_admin==0)
            {
            return $next($request);
            }
            Toastr::error('You are Admin !  Do not permission to admin for home access. Return back !', 'Warning', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.dashboard');
      // }
        //Toastr::error('Session Experied!', 'danger', ["positionClass" => "toast-top-right"]);
        //return redirect()->route('user.login')->with('error', 'Session experied!');
    }

 
}
