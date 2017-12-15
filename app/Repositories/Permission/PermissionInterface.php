<?php

namespace App\Repositories\Permission;

interface PermissionInterface {
    public function all();
    public function get($where, $rows);
    public function store($data);
    public function edit($id);
    public function update($id, $data);
    public function show($id);
    public function destroy($id);
    public function count($where);
    public function countList();

    /*user permissions*/
    public function storeUserPermissions($data);
    public function showUserPermissions($id);
    public function updateUserPermissions($id, $data);
    public function destroyUserPermissions($id);
}