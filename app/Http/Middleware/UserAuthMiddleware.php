<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       

        // Check if the authenticated user is an admin
        if (Auth::user()->role == 'admin') {
            // If the user is an admin, abort with a 404 error
            abort(404, 'Unauthorized');
        }
        // if($request->route()->named('auth#loginPage') && Auth::check()){
        //     return redirect()->route('user#home');
        //   } 

        // Allow authenticated users with the role of user to proceed
        return $next($request);
    }
}
