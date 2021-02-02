<?php

namespace App\Http\Middleware;

use App\Models\Servico;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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

        if($request->route()->getName() == 'users.store'){
            return $next($request);
        }else{
            //$this->auth->guard($guard)->basic($field ?: 'email') ?: $next($request);
            if(Auth::onceBasic('telemovel')){
                return response()->json(['message'=>'Auth Failed']);
            }else{
                return $next($request);
        }
    }
    }
}
