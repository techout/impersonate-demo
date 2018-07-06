<?php

namespace App\Http\Middleware;

use App\Impersonate;
use App\User;
use Auth;
use Closure;
use DB;

class ImpersonateMiddleware
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
        $manager = app('impersonate');
        $route = $request->route();

        if($route->uri == 'impersonate/take/{id}'){
            if($manager->isImpersonating())
                app('impersonate')->leave();

            $url_arr = preg_split("/\//", $request->url());
            $impersonated_user_id = array_pop($url_arr);

            if(Auth::user()->canImpersonate() && User::find($impersonated_user_id)->canBeImpersonated()){
                // save the impersonation
                $impersonate = new Impersonate;
                $impersonate->user_id = Auth::id();
                $impersonate->imp_user_id = $impersonated_user_id;
                $impersonate->save();
    
                // keep only the 5 most recent impersonations
                $impersonations = Impersonate::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
                if($impersonations->count() > Impersonate::MAX){
                    $index = 1;
                    foreach($impersonations as $impersonation){
                        if($index > Impersonate::MAX) $impersonation->delete();
                        $index++;
                    }
                }
            }
        }

        return $next($request);
    }
}
