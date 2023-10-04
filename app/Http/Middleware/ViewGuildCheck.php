<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Closure;

class ViewGuildCheck
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
        $guilds = User::select("guilds")->where('id', Auth::user()->id)->first()->guilds;
        $current_guild_id = Settings::select("id")->where('guild_id', $request->id)->first()->id;
        if(!in_array($current_guild_id, json_decode($guilds))){
            return redirect('/403');
        }

        return $next($request);
    }
}
