<?php

namespace App\Http\Middleware;

use Closure;

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
        }

        return $next($request);
    }
}
