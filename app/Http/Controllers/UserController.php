<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\Pizza;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    //myinformation : 
    public function myinformation () {
     $user=auth()->user();
     //dd($user); 
     $orders=Order::where('user_id',$user->id)->get();
     // dd($orders);
     
     return view('user.myinformation')->with('user',$user)->with('orders',$orders);

    } 
    // 
    public function showupdateinfo () {
        $user=auth()->user(); 
        return view('user.showupdateinfo')->with('user',$user);
   
       } 
       public function updateinfo (Request $request) 
       { 
         $this->validate($request,[ 
           'name'=>'required',
           'email'=>'required'
         ]);

        //dd($request); 
        $user=auth()->user();
        $user->name=$request->name; 
        $user->email=$request->email; 
        $user->save();
        return redirect('/myinformation')->with('success','your information updated');


       } 
       public function showchangepassword(){
        $user=auth()->user(); 
        if($user
        !=null)
        return view('user.showchangepassword');
   
       } 
       public function changepassword(Request $request){  
        $user=auth()->user(); 
        if(hash::check($request->oldpassword,$user->password)) {
          $user->password=Hash::make($request->newpassword);
          $user->save();
        return redirect('/myinfo');

        } 
        return redirect()->back();
        
 
        //dd($request); 
        //dd(hash::check($request->oldpassword,$user->password),$user->password,$request->oldpassword);

        

       } 
       public function allusers(){ 
        $user=auth()->user();
        if($user->role=='admin'){
         $allusers=User::where('role','user')->get(); 
         $orders=Order::all();
        return View('user.allusers')->with('allusers',$allusers)->with('orders',$orders); 
      }
        return redirect()->back();
      } 
        public function deleteuser($id){ 
          $user=auth()->user();
          if($user->role=='admin'){
        $user=User::where('id',$id)->first();
       // $user=User::find($id); 
       $user->delete();
       return redirect('/all')->with('success','user deleted');
          } 
          return redirect()->back();
        } 
        public function upgraduser($id){ 
          $user=auth()->user();
          if($user->role=='admin'){
        $user=User::where('id',$id)->first(); 
        $user->role="admin"; 
       // $user=User::find($id); 
       $user->save();
       return redirect('/all')->with('success','user upgraded');
          } 
          return redirect()->back();
        }
        public function showupdate($id){ 
          $user=auth()->user();
          if($user->role=='admin'){ 
            $userinfo=User::where('id',$id)->first();
       return view('user.showupdate')->with('userinfo',$userinfo);
          } 
          return redirect()->back();
        } 
        public function update( Request $request) {
        //dd($request); 
        $user=User::where('id',$request->id)->first();
        $user->name=$request->name;
        $user->save();
        return redirect('/all')->with('success','user updated');
        } 
        //printname'
      
        public function showadduser() 
        {
          return view('user.adduser');
        } 

        public function adduser(Request $request)
        {
          $user=new User;
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role=$request->role;
          $user->password=Hash::make($request->password);
          $user->save();
          return redirect('/all')->with('success','user added');
        }
        
        public function all()
        { 
          $user=auth()->user();
          if($user->role=='admin'){
           $allusers=User::where('role','user')->get(); 
           $pizzas=Pizza::all(); 
           $orders=Order::all();
          return View('user.all')->with('allusers',$allusers)->with('pizzas',$pizzas)->with('orders',$orders); 
        }
          return redirect()->back();
        } 
         
} 
