<?php

namespace App\Http\Controllers;
use App\User; 
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Hash;
use DB; 
use Mail;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // 
  public function ChangePassword(Request $request){
    $email=$request->email; 

    $verify=User::where('email',$email)->first(); 
    if($verify) {
        $token=\Str::random(10); 
        
        DB::table("password_resets")->insert(["email"=>$email,"token"=>$token]);
        Mail::to($email)
    ->send(new PasswordMail($token,$email));
    
        return redirect()->back()->with('success','Ok');
    }

  }
    public function CheckPassword (Request $request)
    {    
        $token=$_GET['token'];
        $email=$_GET['email']; 
        $reset=DB::table('password_resets')->where([['email',$email],['token',$token]])->first(); 
        if($reset) { 

        //  $user=User::where('email',$email)->first(); 
        // if(hash::check($request->newpassword,$request->checkpassword)) {
        //   $user->password=Hash::make($request->newpassword);
        //   $user->save(); 

            return view('CheckPassword'); 

        } 
       else
       { return redirect()->back() ; }
        
    }

    public function ResetPasswordView(){
        return view('ChangePassword');
    }
    public function Password (Request $request){
        $this->validate($request,[
            'password'=>'confirmed'
        ]);
          $user=User::where('email',$request->email)->first(); 
          $user->password=Hash::make($request->password);
          $user->save();
          return redirect()->back(); 


}}
