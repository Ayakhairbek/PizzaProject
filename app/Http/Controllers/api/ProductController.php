<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/pizzas",
     * summary="get all pizzas",
     * description="get all pizzas",
     * tags={"pizzas"},
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Created",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     */
    public function index()
    {
        // 
        
        $pizzas=Pizza::all();
        return response()->json($pizzas,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
        // 
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Post(
     * path="/api/product/{id}",
     * summary="Add new order",
     * description="Add new order",
     * tags={"pizzas"}, 
     * security={{ "apiAuth": {} }},
     * @OA\RequestBody(
    *    required=true,
    *    description="Add",
    *    @OA\MediaType(
    *      mediaType="multipart/form-data",
    *    @OA\Schema(
    *      required={"name","description","price","size"},
    *       @OA\Property(property="name", type="string", example="season"),
    *       @OA\Property(property="description", type="string", example="nice"),
    *       @OA\Property(property="price", type="string",example="30000"), 
    *       @OA\Property(property="size", type="string",example="big"),
     *       @OA\Property(property="image", type="file",example=""),
    
    *       
    *      )
    *    )
    *  ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ), 
     *   @OA\Response(
     *      response=201,
     *       description="Created",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     */
    public function store($id)
    {
        // 
        $user=auth('api')->user();
        // dd($user);
        $pizza=Pizza::find($id);
        
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
        
       
        return response()->json(["status"=>"created","order"=>$order],201);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 

    
    /**
         * @OA\post(
         * path="/api/edit/{id}",
         * summary="edit information",
         * description="edit information",
         * tags={"pizzas"},
         * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="user_id",
     * ),
         * @OA\RequestBody(
    *    required=true,
    *    description="Add",
    *    @OA\MediaType(
    *      mediaType="multipart/form-data",
    *    @OA\Schema(
    *      
    *       @OA\Property(property="name", type="string", example="marwa"),
    *       @OA\Property(property="email", type="email", example="marwaaaashh@gmail.com"),
    *       @OA\Property(property="password", type="password",example="12345678"),
     
    
    *       
    *      )
    *    )
    *  ),
         
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=201,
         *       description="Created",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         */
    public function edit($id)
    {
        // 
        $user=User::find($id);
        return response()->json(["status"=>"Updated","user"=>$user],200);
      
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
    }
}
