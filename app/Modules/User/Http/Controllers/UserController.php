<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataTables\User\UsersDataTable;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Module\ModuleInterface;
use App\Repositories\Permission\PermissionInterface;
use Auth;

class UserController extends Controller
{
    private $role;
    private $permission;
    private $module;
    private $user;

    public function __construct(RoleInterface $role, UserInterface $user, PermissionInterface $permission, ModuleInterface $module)
    {
        $this->role         = $role;
        $this->user         = $user;
        $this->permission   = $permission;
        $this->module       = $module;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user::user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'method'        => 'store',
            'module'        => request('module'),
            'id'            => request('id'),
            'roles'         => $this->role->list(),
            'modules'       => $this->module->list(),
            'permissions'   => $this->permission->list()
        ];
        return view('user::modal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'                 => 'required',
            'middlename'                => 'nullable',
            'lastname'                  => 'required',
            'username'                  => 'required|unique:users',
            'email'                     => 'required|email|unique:users',
            'employee_no'               => 'required|unique:users',
            'sss_no'                    => 'nullable|unique:users',
            'password'                  => 'required|confirmed|min:6',
            'password_confirmation'     => 'required',
            'roles'                     => 'required',
            'modules'                   => 'required',
            'permissions'               => 'required',
            'status'                    => 'required',
        ]);

        $data  = $this->user->store($request->all());

        if($data)
        {
            $user_modules       = [];
            $user_permissions   = [];

            foreach ($request->modules as $key => $m) 
            {
                $user_modules[$key] = [
                    'module_id'     => $m,
                    'user_id'       => $data['id'],
                    'status'        => 'active',
                    'created_by'    => Auth::user()->id,
                    'created_at'    => date(now())
                ];
            }

            foreach ($request->permissions as $key => $p) 
            {
                $user_permissions[$key] = [
                    'permission_id' => $p,
                    'user_id'       => $data['id'],
                    'status'        => 'active',
                    'created_by'    => Auth::user()->id,
                    'created_at'    => date(now())
                ]; 
            }

            $user_roles = [
                'role_id'       => $request->roles,
                'user_id'       => $data['id'],
                'status'        => 'active',
                'created_by'    => Auth::user()->id,
                'created_at'    => date(now())
            ];

            $this->role->storeUserRoles($user_roles);
            $this->module->storeUserModules($user_modules);
            $this->permission->storeUserPermissions($user_permissions);
        }

        return response()->json([
            'message'   => 'Successfully Added', 
            'data'      => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data           = $this->user->show($id);
        $roles          = $this->role->showUserRoles($id);
        $modules        = $this->module->showUserModules($id);
        $permissions    = $this->permission->showUserPermissions($id);
        $created_by     = $this->user->show($data['created_by'])['name'];
        $updated_by     = $this->user->show($data['updated_by'])['name'];

        return view('user::modal.show', [
            'data'          => $data,
            'modules'       => $modules,
            'roles'         => $roles[0],
            'permissions'   => $permissions,
            'updated_by'    => $updated_by,
            'created_by'    => $created_by,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data'              => $this->user->show($id),
            'method'            => ''.$id.'/update',
            'module'            => request('module'),
            'id'                => request('id'),
            'roles'             => $this->role->list(),
            'modules'           => $this->module->list(),
            'permissions'       => $this->permission->list(),
            'user_roles'        => $this->role->showUserRoles($id),
            'user_permissions'  => $this->permission->showUserPermissions($id),
            'user_modules'      => $this->module->showUserModules($id),
        ];

        return view('user::modal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unique_username    = '|unique:users';
        $unique_email       = '|unique:users';
        $unique_employee_no = '|unique:users';
        $unique_sss_no      = '|unique:users';
        $password_require   = '|required';
        
        $user_check = $this->user->show($id);

        if($user_check['username']      == $request->username) $unique_username = '';
        if($user_check['email']         == $request->email) $unique_email = '';
        if($user_check['employee_no']   == $request->employee_no) $unique_employee_no = '';
        if($user_check['sss_no']        == $request->sss_no) $unique_sss_no = '';

        if($request->password == '' && $request->password_confirmation == '') $password_require = '|nullable';

        $request->validate([
            'firstname'                 => 'required',
            'middlename'                => 'nullable',
            'lastname'                  => 'required',
            'username'                  => 'required'.$unique_username.'',
            'email'                     => 'required|email'.$unique_email.'',
            'employee_no'               => 'required'.$unique_employee_no.'',
            'sss_no'                    => 'nullable'.$unique_sss_no.'',
            'password'                  => 'confirmed|min:6'.$password_require.'',
            'password_confirmation'     => ''.$password_require.'',
            'roles'                     => 'required',
            'modules'                   => 'required',
            'permissions'               => 'required',
            'status'                    => 'required',
       ]);

       $data  = $this->user->update($id, $request->all());

        if($data)
        {
            $user_modules       = [];
            $user_permissions   = [];

            foreach ($request->modules as $key => $m) 
            {
                $user_modules[$key] = [
                    'module_id'     => $m,
                    'user_id'       => $data['id'],
                    'status'        => 'active',
                    'created_by'    => Auth::user()->id,
                    'created_at'    => date(now())
                ];
            }

            foreach ($request->permissions as $key => $p) 
            {
                $user_permissions[$key] = [
                    'permission_id' => $p,
                    'user_id'       => $data['id'],
                    'status'        => 'active',
                    'created_by'    => Auth::user()->id,
                    'created_at'    => date(now())
                ]; 
            }

            $user_roles = [
                'role_id'       => $request->roles,
                'user_id'       => $data['id'],
                'status'        => 'active',
                'created_by'    => Auth::user()->id,
                'created_at'    => date(now())
            ];

            $this->role->updateUserRoles($id, $user_roles);
            $this->module->updateUserModules($id, $user_modules);
            $this->permission->updateUserPermissions($id, $user_permissions);
        }

        return response()->json([
            'message'   => 'Successfully Updated', 
            'data'      => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->user->show($id);

        if(!$data)
        {
            return response()->json([
                'message'   => 'No data found to delete. Please contact software developer.', 
            ], 422);
        }
        else
        {
            $delete = $this->user->destroy($id);

            if(!$delete)
            {
                return response()->json([
                    'message'   => 'Unable to deleted data. Contact software developer.', 
                ], 422);
            }
        }

        return response()->json([
            'message'   => 'Successfully Deleted', 
        ], 200);
    }
}
