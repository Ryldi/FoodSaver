<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($role === 'logged')
        {
            return $next($request);
        }

        if (!Auth::guard($role)->check()) {
            return redirect()->route('loginPage');
        }

        if(($role === "customer" || $role === "restaurant") && Auth::guard($role)->check()) 
        {
            return $next($request);
        }
        else{
            return redirect()->route('forbidden');
        }
        return $next($request);
    }
}
