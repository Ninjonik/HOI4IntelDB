<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminDashboardCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->can("admin-dashboard")) {
            return redirect('/403');
        }

        return $next($request);
    }
}
