<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class MustbeAuthor
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

       if(Auth::user()->user_group_id==1)
        {
          return $next($request);

        }
        if(Auth::user()->user_group_id==2)
        {
          return  redirect()->route('post');
        }
       

    }
}
