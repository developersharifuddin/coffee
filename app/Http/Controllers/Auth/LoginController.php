<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr; 
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
 

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
     
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email'=> $request->email, 'password'=> $request->password,'is_admin' =>'1'))){
        
            if(auth()->user()->is_admin==1)
            {
                Toastr::success('Admin Dashboard.', 'Logged in Success!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.dashboard');

            }else{ return redirect()->route('fontend.index');
            }
        }else{
            //Toastr::error('Invalid email or password', 'Wrong', ["positionClass" => "toast-top-right"]);
            //return redirect()->back();
           return redirect()->back()->with('error','Invalid email or password !');
        }
          
    }


    public function userslogin(Request $request)
    {
     
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email'=> $request->email, 'password'=> $request->password,))){
           
            if(auth()->user()->is_admin==1)
            {
                $this->guard()->logout();
                $request->session()->invalidate();
                Toastr::warning('Wrong! You are user, Redirect to back!', 'Invalid actions!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('user.login');

            }else if(auth()->user()->is_admin==0)
            {
                Toastr::success( 'Welcome '. @Auth::user()->name, 'Logged in!', ["positionClass" => "toast-top-right"]);
                 return redirect()->route('fontend.profile');

            }else{ return redirect()->route('fontend.index');
            }
        }else{
            //Toastr::error('Invalid email or password', 'Wrong', ["positionClass" => "toast-top-right"]);
            //return redirect()->back();
           return redirect()->back()->with('error','Invalid email or password !');
        }
          
    }
 
      //admin login here
      public function userLogin()
     {
        return view('auth.userlogin');
      }

          //admin login here
      public function adminLogin()
     {
        return view('auth.login');
      }


 


}
