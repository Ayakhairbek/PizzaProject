<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User; 
use Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticated(){ 
        if(Auth::user()->role==='admin'){ 
           // $allusers=User::where('role','user')->get(); 
           // return redirect()->route('allusers')->with('allusers',$allusers);
           return redirect('/all');  
             
        } 
        else{ 
            return redirect('/allpizza'); 
       
         
    }}
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } 

}