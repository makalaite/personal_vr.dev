<?php

namespace App\Http\Middleware;

use App\Models\VrUsers;
use Closure;

class AdminCheck
{
    /**
     * check if our user has a super admin role and if not, redirect to login page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(in_array('super-admin', auth()->user()->roles->pluck('id')->toArray()))
        {
            return $next($request);
//        } else {
//            return redirect('login');
        }
    }
}
