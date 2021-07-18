<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

       $str = substr($request->path(), strpos($request->path(), '/tenant/') + 8, 1);
       session(['tenant_id' => intval($str)]);
       return $next($request);
    }
}