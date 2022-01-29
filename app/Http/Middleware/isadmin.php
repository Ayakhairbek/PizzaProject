<?php

namespace App\Http\Middleware;
use App\User; 
use Closure;

class isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next){ 
        $user=auth()->user();
        if($user->role=='admin') {  
            return $next($request);
        } 
    return redirect()->back();
 }
}