<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class AdminMiddleware
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
        if(!Auth::guard('admin')->check()){
            return redirect ()->back ()->with ('error','You dont have permission.');
        }
        return $next($request);
    }
}
