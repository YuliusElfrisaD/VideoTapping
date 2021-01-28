<?php

namespace App\Http\Middleware;

use Closure;


class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if ($request->session()->exists('nomorinduk')){
            return $next($request);
        }
        else{
            return response()->view('templates.login');
        }
    }
}