<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class IsAdmin
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
       // if(Session::has('login'))
        //{
            if(auth()->user()->is_admin==1)
            {
            return $next($request);
            }
            Toastr::error('You are not Admin !  Our team follow all user, Please return back !', 'Warning', ["positionClass" => "toast-top-right"]);
            return redirect()->route('fontend.index');
            // return redirect()->route('fontend.index')->with('error', 'you are not Admin');
        //}
        
    }

    
}
