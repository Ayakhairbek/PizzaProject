<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
   return view('pages.home');
}); 


Route::get('/bootstrap/{name}/{id}', function ($name,$id) {
    
    return 'Hello :'.$name.'your id is :'.$id;
    // return view('test');
});
Route::get('/bootstrap', function () {
        return view('test'); });
 Route::get('/myinformation','UserController@myinformation'); 
 Route::get('/hello','UserController@hello'); 
 Route::get('/showupdateinfo','UserController@showupdateinfo'); 
 Route::post('/updateinfo','UserController@updateinfo'); 
 Route::get('/showchangepassword','UserController@showchangepassword'); 
 Route::post('/changepassword','UserController@changepassword'); 

 Route::get('/deleteuser/{id}','UserController@deleteuser');
 Route::get('/deletepizza/{id}','PizzaController@deletepizza'); 
 Route::get('/deleteorder/{id}','PizzaController@deleteorder');
 Route::get('/showadduser','UserController@showadduser');
 Route::post('/adduser','UserController@adduser'); 
 Route::get('/showaddpizza','PizzaController@showaddpizza');
 Route::post('/addpizza','PizzaController@addpizza');
 Route::get('/accept/{id}','HomeController@acceptorder'); 
//  Route::get('/upgraduser/{id}','UserController@upgraduser');
 Route::get('/showupdate/{id}','UserController@showupdate'); 
 Route::post('/update','UserController@update');

 Route::get('/showupdatepizza/{id}','PizzaController@showupdatepizza'); 
 Route::post('/updatepizza','PizzaController@updatepizza');

Route::get('/allusers', 'UserController@allusers')->middleware('isAdmin')->name('allusers');
Route::get('/all', 'UserController@all')->middleware('isAdmin')->name('all');
 
 Route::get('/assignto/{id}' ,'HomeController@assignto');
 Route::post('/assign' ,'HomeController@assign' ); 


 Route::get('/contactus','ContactController@showcontact');
 Route::post('/send','ContactController@send'); 
 Route::get('/allusers', 'UserController@allusers')->middleware('isAdmin')->name('allusers');

 Route::get('/Check','CheckController@showCheck');
 ///password

 
 ///CheckPassword 
 Route::get('/password','PasswordController@ResetPasswordView');
 Route::post('/CheckPassword','PasswordController@ChangePassword');
 Route::get('/reset_password','PasswordController@CheckPassword');
 Route::post('/password1','PasswordController@password');
Route::get('/about', function () {
    return view('pages.about');
}); 
// })->middleware('auth'); 

Route::get('/allpizza', 'PizzaController@minue')->name('allpizza'); 
Route::get('/orderto/{id}' ,'HomeController@orderto');
 Route::post('/order' ,'HomeController@order' );
Route::resource('orders','OrderController');
 Route::get('/myorder', 'HomeController@myorder');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

