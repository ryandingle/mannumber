<?php

namespace App\Repositories\Role;

use App\Repositories\Role\RoleInterface as RoleInterface;
use App\Modules\Role\Models\Role;
use App\Modules\Role\Models\User_role;
use Auth, DB;

class RoleRepository implements RoleInterface
{
    private $role;

    public function __construct(Role $role, User_role $user_role)
    {
        $this->role         = $role;
        $this->user_role    = $user_role;
    }

    public function list()
    {
        if(Auth::user()->username !== 'super-admin')
            return $this->role->where('prefix', '!=', 'super-admin')->get();
        return $this->role->all();
    }

    public function get($where, $rows)
    {
        return $this->role->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        $id = $this->role->insertGetId([
            'title'             => $data['title'],
            'prefix'            => $data['prefix'],
            'description'       => $data['description'],
            'created_at'        => date(now()),
            'created_by'        => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->role->find($id);
    }

    public function update($id, $data)
    {
        $this->role->where('id', $id)->update([
            'title'             => $data['title'],
            'prefix'            => $data['prefix'],
            'description'       => $data['description'],
            'updated_by'       => Auth::user()->id,
            'updated_at'       => date(now()),
        ]);

        return $this->show($id);
    }

    public function show($id)
    {
        return $this->role->find($id);
    }

    public function destroy($id)
    {
        return $this->role->destroy($id);
    }

    public function count($where)
    {
        return $this->role->where($where)->count();
    }

    public function countList()
    {
        return $this->role->count();
    }

    public function storeUserRoles($data)
    {
        return $this->user_role->insertGetId($data);
    }

    public function showUserRoles($id)
    {
        return DB::table('user_roles')
        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
        ->select('roles.*', 'user_roles.role_id', 'user_roles.user_id')
        ->where('user_roles.user_id', '=', $id)
        ->get(); 
    }

    public function updateUserRoles($id, $data)
    {
        $this->user_role->where(['user_id' => $id])->delete();
        return $this->storeUserRoles($data);
    }

    public function destroyUserRoles($id)
    {
        return $this->user_role->destroy($id);
    }

}