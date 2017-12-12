<?php

namespace App\Http\Middleware;

use Closure;

class checkModuleAccess
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
        $prefix     = str_replace('/', '', $request->route()->getPrefix());
        $modules    = [];

        foreach(session('modules') as $module){$modules[] = $module->prefix;}

        $access = in_array($prefix, $modules);
        
        if(!$access) abort(404);

        return $next($request);
    }
}
