<?php

namespace App\Repositories\Request;

use App\Repositories\Request\EmployeeInterface as EmployeeInterface;
use App\Modules\Request\Models\Employee;
use Auth;

class EmployeeRepository implements EmployeeInterface
{
    private $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function all()
    {
        return $this->employee->all();
    }

    public function get($where, $rows)
    {
        return $this->employee->select($rows)->where($where)->get();
    }

    public function store($id, $data)
    {
        $id = $this->employee->insertGetId([
            'request_id'       => $id,
            'employee_number'  => $this->generateEmployeeNumber()[0],
            'branch'           => ($data['branch'] == '') ? NULL : $data['branch'],
            'company'          => $data['company'],
            'date_hire'        => ($data['date_hired'] == '') ? NULL : date('Y-m-d H:i:s', strtotime($data['date_hired'])),
            'full_name'        => ucwords($data['first_name'].'&nbsp;'.$data['middle_name'].'&nbsp;'.$data['last_name']),
            'first_name'       => ucfirst($data['first_name']),
            'middle_name'      => ucfirst($data['middle_name']),
            'last_name'        => ucfirst($data['last_name']),
            'age'              => $data['age'],
            'birth_date'       => date('Y-m-d H:i:s', strtotime($data['birth_date'])),
            'gender'           => $data['gender'],
            'marital_status'   => $data['marital_status'],
            'address'          => $data['address'],
            'contact'          => $data['contact'],
            'religion'         => ucfirst($data['religion']),
            'zip_code'         => $data['zip_code'],
            'post_code'        => $data['post_code'],
            'tin_number'       => $data['tin_number'],
            'sss_number'       => $data['sss_number'],
            'hdmf_number'      => $data['hdmf_number'],
            'phic_number'      => $data['phic_number'],
            'pagibig_number'   => $data['pagibig_number'],
            'date_regularized' => ($data['date_regularized'] == '') ? NULL : date('Y-m-d H:i:s', strtotime($data['date_regularized'])),
            'department'       => $data['department'],
            'previous_branch'  => $data['previous_branch'],
            'daily_rate'       => $data['daily_rate'],
            'hourly_rate'      => $data['hourly_rate'],
            'status'           => 'active',
            'created_at'       => date('Y-m-d H:i:s'),
            'created_by'       => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->employee->find($id);
    }

    public function update($id, $data)
    {
        $this->employee->where('id', $id)->update([
            'branch'           => $data['branch'],
            'company'          => $data['company'],
            'date_hire'        => ($data['date_hired'] == '') ? NULL : date('Y-m-d H:i:s', strtotime($data['date_hired'])),
            'full_name'        => ucwords($data['first_name'].'&nbsp;'.$data['middle_name'].'&nbsp;'.$data['last_name']),
            'first_name'       => ucfirst($data['first_name']),
            'middle_name'      => ucfirst($data['middle_name']),
            'last_name'        => ucfirst($data['last_name']),
            'age'              => $data['age'],
            'birth_date'       => date('Y-m-d H:i:s', strtotime($data['birth_date'])),
            'gender'           => $data['gender'],
            'marital_status'   => $data['marital_status'],
            'address'          => $data['address'],
            'contact'          => $data['contact'],
            'religion'         => ucfirst($data['religion']),
            'zip_code'         => $data['zip_code'],
            'post_code'        => $data['post_code'],
            'tin_number'       => $data['tin_number'],
            'sss_number'       => $data['sss_number'],
            'hdmf_number'      => $data['hdmf_number'],
            'phic_number'      => $data['phic_number'],
            'pagibig_number'   => $data['pagibig_number'],
            'date_regularized' => ($data['date_regularized'] == '') ? NULL : date('Y-m-d H:i:s', strtotime($data['date_regularized'])),
            'department'       => $data['department'],
            'previous_branch'  => $data['previous_branch'],
            'daily_rate'       => $data['daily_rate'],
            'hourly_rate'      => $data['hourly_rate'],
            'status'           => 'active',
            'updated_by'       => Auth::user()->id,
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);

        return $this->show($id);
    }

    public function show($id)
    {
        return $this->employee->find($id);
    }

    public function destroy($id)
    {
        return $this->employee->destroy($id);
    }

    public function count($where)
    {
        return $this->employee->where($where)->count();
    }

    public function countList()
    {
        return $this->employee->count();
    }

    /**
     * Generate Employee Number
     *
     * @param  start  $start - is the number for your first invoice
     * @param  count  $count - how many invoice numbers you want to generate
     * @param  digit  $digits - how many digits the generated numbers should be
     * @return 9 digit employee number, first 2digit represents to year
     */
    public function generateEmployeeNumber(/*$start, $count, $digits*/) 
    {
        $start  = $this->employee->count() == 0 ? 1 : $this->employee->count() + 1;
        $count  = 1;
        $digits = 7;

        $result = array();
        for ($n = $start; $n < $start + $count; $n++)
        {
            $result[] = date('y').''.str_pad($n, $digits, "0", STR_PAD_LEFT);
        }

        return $result;
    }

}