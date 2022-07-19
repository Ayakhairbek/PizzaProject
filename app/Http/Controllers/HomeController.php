<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Product;
use App\user;
use App\Order;
use App\Pizza; 
use App\Mail\ContactMail;
use Mail;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } 
     
    public function orderto ($id) { 
        $user=Auth::user();
       
        $pizzas=Pizza::all();
        $pizz=Pizza::find($id); 
        return view('admin.assignto')->with('pizzas',$pizzas)->with('pizz', $pizz);
        
    } 
    public function order (Request $request){ 
        //dd($request); 
        $user=Auth::user();
        // dd($user);
        $pizza=Pizza::find($request->pizz_id);
        
        $order=new Order;
        //  dd($pizza);
        $order->name=$pizza->name;
        $order->size=$pizza->size;
        //  dd($order);
        $order->description=$pizza->description;
        // dd($order);
        $order->price=$pizza->price;
        $order->user_id=$user->id;
        $order->pizza_id=$pizza->id;
        
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
           $order->image=$fileNameToStore;
           $order->save();
           return redirect('myinformation')->with('success','Order Completed ');

    } 
    public function acceptorder($id , Request $request){  

        $order=Order::find($id); 
        $idd= $order->user_id; 
        // dd($user); 
        $user=User::find($idd); 
        // dd($user); 
        $name=$user->name; 
        // dd($name);
            $email=$user->email;
            $message='your order completed just wait a few time ';
        Mail::to($email)
        ->send(new ContactMail($name,$email,$message));
        
        $order->delete();
        return  redirect('/all')->with('success','Order Accepted ');

    } 
    public function myorder () {
        $user=auth()->user();
        //dd($user); 
        $orders=Order::where('user_id',$user->id)->get();
        // dd($orders);
        
        return view('Orders.myorder')->with('orders',$orders);
   
       } 
   
} 

