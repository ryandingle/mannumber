<?php

namespace App\Repositories\Role;

interface RoleInterface {
    public function all();
    public function get($where, $rows);
    public function store($data);
    public function edit($id);
    public function update($id, $data);
    public function show($id);
    public function destroy($id);
    public function count($where);
    public function countList();

    /*user roles*/
    public function storeUserRoles($data);
    public function showUserRoles($id);
    public function updateUserRoles($id, $data);
    public function destroyUserRoles($id);
}