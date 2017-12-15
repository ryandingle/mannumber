<?php

namespace App\Repositories\Request;

use App\Repositories\Request\RequestInterface as RequestInterface;
use App\Modules\Request\Models\Request;
use App\Modules\Request\Models\Employee;
use Auth;

class RequestRepository implements RequestInterface
{
    private $request;
    private $employee;

    public function __construct(Request $request, Employee $employee)
    {
        $this->request  = $request;
        $this->employee = $employee;
    }

    public function all()
    {
        return $this->request->all();
    }

    public function get($where, $rows)
    {
        return $this->request->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        $id = $this->request->insertGetId([
            'request_number'    => $data['request_number'],
            'branch'            => $data['branch'],
            'company'           => $data['company'],
            'status'            => 'active',
            'created_at'        => date('Y-m-d H:i:s'),
            'created_by'        => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->request->find($id);
    }

    public function update($id, $data)
    {
        $this->request->where('id', $id)->update([
            'request_number'    => $data['request_number'],
            'branch'            => $data['branch'],
            'company'           => $data['company'],
            'status'            => 'active',
            'updated_by'        => Auth::user()->id,
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        return $this->show($id);
    }

    public function addEmployees($data)
    {
        $id = $this->employee->insertGetId([
            'request_id'       => $data['request_id'],
            'employee_number'  => $data['employee_number'],
            'branch'           => ($data['branch'] == '') ? NULL : $data['branch'],
            'company'          => $data['company'],
            'status'           => 'active',
            'created_at'       => date('Y-m-d H:i:s'),
            'created_by'       => Auth::user()->id
        ]);

        return $this->employee->find($id);
    }

    public function show($id)
    {
        return $this->request->find($id);
    }

    public function destroy($id)
    {
        return $this->request->destroy($id);
    }

    public function count($where)
    {
        return $this->request->where($where)->count();
    }

    public function countList()
    {
        return $this->request->count();
    }

}