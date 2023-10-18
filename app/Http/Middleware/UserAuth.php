<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        //this rule makes sure that if you're already logged in, you don't need to go back to the login page because you're already inside the website. But if you're not logged in, it lets you go wherever you want.
        if($request->path()=="login" &&$request->session()->has('user'))
        {
            return redirect("/");    
        }
        return $next($request);
    }
}