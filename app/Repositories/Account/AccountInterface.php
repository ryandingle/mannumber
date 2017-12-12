<?php

namespace App\Repositories\Account;

interface AccountInterface {
    public function list();
    public function get($where, $rows);
    public function store($data);
    public function edit($id);
    public function update($id, $data);
    public function show($id);
    public function destroy($id);
    public function count($where);
    public function countList();
    public function update_profile_picture($id, $data);
}