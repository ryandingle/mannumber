<?php

namespace App\Repositories\Log;
use Illuminate\Http\Request;

interface LogInterface {
    public function store($data);
    public function show($id);
    public function destroy($id);
}