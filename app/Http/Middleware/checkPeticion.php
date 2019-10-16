<?php

namespace App\Http\Middleware;

use Closure;

class checkPeticion
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
        //dd($request);
        if($request->isMethod('GET')){
            echo 'Petición GET<br>';
            return $next($request);
        }
        if($request->isMethod('PUT')){
            echo 'Petición PUT<br>';
            return $next($request);
        }
        if($request->isMethod('DELETE')){
            echo 'Petición DELETE<br>';
            return $next($request);
        }
        if($request->isMethod('POST')){
            //dd('Peticion POST');
            echo 'Petición POST<br>';
            return $next($request);
        }
    }
}
