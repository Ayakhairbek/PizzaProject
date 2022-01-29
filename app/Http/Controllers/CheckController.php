<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VerCourse;
use Carbon\Carbon;


class CheckController extends Controller
{
    public function showCheck ()
    {
        $token=$_GET['token'];
        $email=$_GET['email']; 
        $verify=VerCourse::where([['email',$email],['token',$token]])->first(); 
        if($verify) {
            if($verify->email==auth()->user()->email){
                $user=auth()->user();
                $user->email_verified_at=Carbon::now();
                $user->save();
                return redirect('user.showupdate');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }



    }
       
}