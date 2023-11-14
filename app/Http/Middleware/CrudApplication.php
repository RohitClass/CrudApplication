<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CrudApplication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    // Check if the email and password are correct for an admin user
    // $email = "rohit@gmail.com";

    // $credentials = [
    //     'email' => $email
    // ];

    // if (Auth::attempt($credentials)) {
    //     echo "welcome";
        return $next($request);
    // }

    // // Authentication failed, redirect to '/'
    // return redirect('/');
}
}
