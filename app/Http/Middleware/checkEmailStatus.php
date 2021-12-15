<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class checkEmailStatus
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()&& !$request->user()->hasVerifiedEmail()){
            session()->flash('must verify your email',true);
        }
      return $next($request) ;
    }
}
