<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->utype == '1') {
                return $next($request);
            } else {
                return redirect()->route('pages.home');
            }
        } else {
            return redirect()->route('/login');
        }
        
    }
}
