<?php

namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionInterface as PermissionInterface;
use App\Modules\Permission\Models\Permission;
use App\Modules\Permission\Models\User_permission;
use Auth, DB;

class PermissionRepository implements PermissionInterface
{
    private $permission;
    private $user_permission;

    public function __construct(Permission $permission,User_permission $user_permission)
    {
        $this->permission       = $permission;
        $this->user_permission  = $user_permission;
    }

    public function all()
    {
        if(Auth::user()->username !== 'super-admin')
            return $this->permission->where('prefix', '!=', 'delete')->get();
        return $this->permission->all();
    }

    public function get($where, $rows)
    {
        return $this->permission->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        $id = $this->permission->insertGetId([
            'title'             => $data['title'],
            'prefix'            => $data['prefix'],
            'description'       => $data['description'],
            'created_at'        => date('Y-m-d H:i:s'),
            'created_by'        => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->permission->find($id);
    }

    public function update($id, $data)
    {
        $this->permission->where('id', $id)->update([
            'title'             => $data['title'],
            'prefix'            => $data['prefix'],
            'description'       => $data['description'],
            'updated_by'        => Auth::user()->id,
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        return $this->show($id);
    }

    public function show($id)
    {
        return $this->permission->find($id);
    }

    public function destroy($id)
    {
        return $this->permission->destroy($id);
    }

    public function count($where)
    {
        return $this->permission->where($where)->count();
    }

    public function countList()
    {
        return $this->permission->count();
    }

    public function storeUserPermissions($data)
    {
        return $this->user_permission->insert($data);
    }

    public function showUserPermissions($id)
    {
        return DB::table('user_permissions')
        ->join('permissions', 'user_permissions.permission_id', '=', 'permissions.id')
        ->select('permissions.*', 'user_permissions.permission_id', 'user_permissions.user_id')
        ->where('user_permissions.user_id', '=', $id)
        ->get(); 
    }

    public function updateUserPermissions($id, $data)
    {
        $this->user_permission->where(['user_id' => $id])->delete();
        return $this->storeUserPermissions($data);
    }

    public function destroyUserPermissions($id)
    {
        return $this->user_permission->destroy($id);
    }

}