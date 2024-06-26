<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('admin');
        } else if (isset(Auth::user()->type) && Auth::user()->type != 'admin') {
            return redirect('login');
        }
        //     	else{
        //     		return redirect('admin');
        //     	}

        return $next($request);
    }
}
