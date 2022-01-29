<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Order;
use App\User; 
use App\Pizza;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        // 
        return view('Orders.addorder')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $user=Auth::user();
        // dd($user);
        
        $pizza=Pizza::where('name',$request->name)->get();
        $order=new Order;
        //   dd($pizza);
        $order->name=$pizza->name;
        //  dd($order);
        $order->description=$pizza->description;
        // dd($order);
        $order->price=$pizza->price;
        $order->user_id=$user->id;
        $order->pizza_id=$pizza->id;
        $order->image=$pizza->image;
        $order->save();
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        $order=Order::find($id);
        return view('orders.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        $order=Order::find($id);
        Storage::delete('public/product_images/',$order->image);
        $order->delete();
        $user=Auth::user();
        $order=Order::where('user_id',$user->id)->get();
        return redirect('/myorder')->with('products',$order)->with('success','Order deleted')  ;   
        //
    }
}
