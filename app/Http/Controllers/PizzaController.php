<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza; 
use App\Order;
use App\User;
use App\Mail\ContactMail;
use Mail;
class PizzaController extends Controller
{
    // 


    public function minue(){ 
         $types=Pizza::all();
        return View('Pizza.allpizza')->with('types',$types); 
       
      
} 
public function showaddpizza() 
        {
          return view('pizza.addpizza');
        } 

        public function addpizza(Request $request)
        {
          $pizza=new Pizza;
          $pizza->name=$request->name;
          $pizza->description=$request->description;
          $pizza->size=$request->size;
          $pizza->price=$request->price;
          if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/product_images',$fileNameToStore);
        } else {
               $fileNameToStore = 'noimage.jpg';
           }
          $pizza->image=$fileNameToStore;
          $pizza->save();
          return redirect('/all')->with('success','pizza added');
        }
        public function deletepizza($id){ 
          $user=auth()->user();
          if($user->role=='admin'){
        $pizza=Pizza::where('id',$id)->first();
       // $user=User::find($id); 
       $pizza->delete();
       return redirect('/all')->with('success','pizza deleted');
          } 
          return redirect()->back();
        } 

        public function showupdatepizza($id){ 
          $user=auth()->user();
          if($user->role=='admin'){ 
            $pizza=Pizza::where('id',$id)->first();
       return view('Pizza.showupdatepizza')->with('pizza',$pizza);
          } 
          return redirect()->back();
        } 
        public function updatepizza( Request $request) {
        //dd($request); 
        $pizza=Pizza::where('id',$request->id)->first();
        $pizza->name=$request->name;
        $pizza->description=$request->description;
          $pizza->size=$request->size;
          $pizza->price=$request->price;
          if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/product_images',$fileNameToStore);
        } else {
               $fileNameToStore = 'noimage.jpg';
           }
          $pizza->image=$fileNameToStore;
        $pizza->save();
        return redirect('/all')->with('success','pizza updated');
        } 
        public function deleteorder($id){ 
          $order=Order::find($id); 
          $idd= $order->user_id; 
          // dd($user); 
          $user=User::find($idd); 
          // dd($user); 
          $name=$user->name; 
          // dd($name);
              $email=$user->email;
              $message='Sorry your order faild';
          Mail::to($email)
          ->send(new ContactMail($name,$email,$message));
          
          $order->delete();
          return  redirect('/all')->with('success','Order deleted  ');
        
}}