<?php

namespace App\Repositories\Log;

use App\Repositories\Log\LogInterface;
use App\Modules\Log\Models\Log;
use Auth;

class LogRepository implements LogInterface
{
    private $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function store($data)
    {
        return $this->log->insertGetId([
            'user_id'       => Auth::user()->id,
            'module'        => $data['module'],
            'table'         => $data['table'],
            'object_id'     => $data['object_id'],
            'method'        => $data['action'],
            'new_data'      => $data['new_data'],
            'old_data'      => $data['old_data'],
            'ip_address'    => $data['ip_address'],
            'user_agent'    => $data['user_agent'],
            'created_at'    => date(now()),
            'updated_at'    => date(now())
        ]);

        return $this->show($id);
    }

    public function show($id)
    {
        return $this->log->find($id);
    }

    public function destroy($id)
    {
        return $this->log->destroy($id);
    }

}