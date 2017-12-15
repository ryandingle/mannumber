<?php

namespace App\Repositories\Log;

interface LogInterface {
    public function store($data);
    public function show($id);
    public function destroy($id);
}