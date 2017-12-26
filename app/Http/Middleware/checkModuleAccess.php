<?php

namespace App\Http\Middleware;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Module\ModuleInterface;
use App\Repositories\Permission\PermissionInterface;
use Auth;

use Closure;

class checkModuleAccess
{
    private $role;
    private $permission;
    private $module;

    public function __construct(RoleInterface $role, ModuleInterface $module, PermissionInterface $permission)
    {
        $this->role             = $role;
        $this->module           = $module;
        $this->permission       = $permission;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('modules') && session('roles') && session('permissions')) 
        {
            $prefix     = str_replace('/', '', $request->route()->getPrefix());
            $modules    = [];

            foreach(session('modules') as $module){$modules[] = $module->prefix;}

            $access = in_array($prefix, $modules);
            
            if(!$access) abort(404);
        }
        else
        {
            $roles          = $this->role->showUserRoles(Auth::user()->id);
            $modules        = $this->module->showUserModules(Auth::user()->id);
            $permissions    = $this->permission->showUserPermissions(Auth::user()->id);

            $request->session()->put('role', $roles);
            $request->session()->put('modules', $modules);
            $request->session()->put('permissions', $permissions);
        }

        return $next($request);
    }
}
