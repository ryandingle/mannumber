<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Module\ModuleInterface;
use App\Repositories\Permission\PermissionInterface;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $role;
    private $permission;
    private $module;

    public function __construct(RoleInterface $role, ModuleInterface $module, PermissionInterface $permission)
    {
        $this->middleware('guest')->except('logout');

        $this->role             = $role;
        $this->module           = $module;
        $this->permission       = $permission;
    }

    public function login(Request $request)
    {
        if(\Auth::attempt(['email' => request('username'), 'password' => request('password')]) || \Auth::attempt(['username' => request('username'), 'password' => request('password')]) || \Auth::attempt(['employee_no' => request('username'), 'password' => request('password')])|| \Auth::attempt(['sss_no' => request('username'), 'password' => request('password')]))
        {
            $roles          = $this->role->showUserRoles(Auth::user()->id);
            $modules        = $this->module->showUserModules(Auth::user()->id);
            $permissions    = $this->permission->showUserPermissions(Auth::user()->id);

            $request->session()->put('role', $roles);
            $request->session()->put('modules', $modules);
            $request->session()->put('permissions', $permissions);

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }
}
