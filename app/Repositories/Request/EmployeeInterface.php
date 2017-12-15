<?php

namespace App\Repositories\Request;

interface EmployeeInterface {
    public function all();
    public function get($where, $rows);
    public function store($id, $data);
    public function edit($id);
    public function update($id, $data);
    public function show($id);
    public function destroy($id);
    public function count($where);
    public function countList();
    public function generateEmployeeNumber();
}