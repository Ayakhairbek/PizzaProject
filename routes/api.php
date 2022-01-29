<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); 

}); 
Route::get('pizzas','api\ProductController@index');
Route::post('register','api\AuthController@register'); 
Route::post('login','api\AuthController@login');


Route::group(['middleware' => 'auth:api'], function () {
   
    Route::post('edit/{id}','api\ProductController@edit');
    Route::post('product/{id}','api\ProductController@store');
    Route::get('user','api\AuthController@user'); 
}); 