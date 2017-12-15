<?php

namespace App\Modules\Request\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataTables\Request\EmployeesDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Request\EmployeeInterface;
use App\Repositories\Request\RequestInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Log\LogInterface;

class EmployeeController extends Controller
{
    private $employee;
    private $requestRepository;
    private $user;
    private $log;

    public function __construct(EmployeeInterface $employee, RequestInterface $requestRepository, UserInterface $user, LogInterface $log)
    {
        $this->employee             = $employee;
        $this->requestRepository    = $requestRepository;
        $this->user                 = $user;
        $this->log                  = $log;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesDatatable $dataTable, $id)
    {
        $data = ['data' => $this->requestRepository->show($id)];
        return $dataTable->filter_batch_id($id)->render('request::employee.employee', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = [
            'method'    => 'employee/'.$id.'/store',
            'module'    => request('module'),
            'id'        => $id,
            'data'      => $this->requestRepository->get(['id' => $id],['branch', 'company'])[0],
        ];
        return view('request::employee.modal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $employee_batch_count   = $this->employee->count(['request_id'=> $id]);
        $request_batch_count    = $this->requestRepository->get(['id' => $id], ['request_number'])[0]['request_number'];

        if($employee_batch_count >= $request_batch_count)
        {
            return response()->json([
                'message'   => 'Unable to add new employee.', 
                'errors'    => ['This request batch can only encode <b>`'.$request_batch_count.'`</b> Employees.', 'Please make new request batch.'],
            ], 422);
        }

        $request->validate([
            'company'           => 'required',
            'date_hired'        => 'nullable|date',
            'first_name'        => 'required',
            'middle_name'       => 'required',
            'age'               => 'required|numeric',
            'last_name'         => 'required',
            'birth_date'        => 'required|date',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'address'           => 'required',
            'religion'          => 'nullable|required',
            'contact'           => 'nullable|numeric',
            'zip_code'          => 'nullable|numeric',
            'post_code'         => 'nullable|numeric',
            'tin_number'        => 'nullable|numeric',
            'sss_number'        => 'nullable|numeric',
            'hdmf_number'       => 'nullable|numeric',
            'phic_number'       => 'nullable|numeric',
            'pagibig_number'    => 'nullable|numeric',
            'date_regularized'  => 'nullable|date',
            'department'        => 'nullable',
            'previous_branch'   => 'nullable',
            'daily_rate'        => 'nullable|numeric',
            'hourly_rate'       => 'nullable|numeric',
        ]);

        $data = $this->employee->store($id, $request->all());

        /*LOG ACTION*/
        $log_data = [
            'module'        => 'request',
            'table'         => 'employees',
            'object_id'     => $data->id,
            'action'        => 'store',
            'new_data'      => $data,
            'old_data'      => null,
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->server('HTTP_USER_AGENT')
        ];
        $this->log->store($log_data);
        /*END LOG ACTION*/

        return response()->json([
            'message'   => 'Successfully Added.', 
            'data'      => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data       = $this->employee->show($id);
        $created_by = $this->user->show($data['created_by'])['name'];
        $updated_by = $this->user->show($data['updated_by'])['name'];
        return view('request::employee.modal.show', [
            'data' => $data,
            'updated_by' => $updated_by,
            'created_by' => $created_by
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data'      => $this->employee->show($id),
            'method'    => 'employee/'.$id.'/update',
            'module'    => request('module'),
            'id'        => request('id'),
        ];

        return view('request::employee.modal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company'           => 'required',
            'date_hired'        => 'nullable|date',
            'first_name'        => 'required',
            'middle_name'       => 'required',
            'last_name'         => 'required',
            'age'               => 'required|numeric',
            'birth_date'        => 'required|date',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'address'           => 'required',
            'religion'          => 'nullable|required',
            'contact'           => 'nullable|numeric',
            'zip_code'          => 'nullable|numeric',
            'post_code'         => 'nullable|numeric',
            'tin_number'        => 'nullable|numeric',
            'sss_number'        => 'nullable|numeric',
            'hdmf_number'       => 'nullable|numeric',
            'phic_number'       => 'nullable|numeric',
            'pagibig_number'    => 'nullable|numeric',
            'date_regularized'  => 'nullable|date',
            'department'        => 'nullable',
            'previous_branch'   => 'nullable',
            'daily_rate'        => 'nullable|numeric',
            'hourly_rate'       => 'nullable|numeric',
        ]);

        $old_data   = $this->employee->show($id);
        $data       = $this->employee->update($id, $request->all());

        /*LOG ACTION*/
        $log_data = [
            'module'        => 'request',
            'table'         => 'employees',
            'object_id'     => $id,
            'action'        => 'update',
            'new_data'      => $data,
            'old_data'      => $old_data,
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->server('HTTP_USER_AGENT')
        ];
        $this->log->store($log_data);
        /*END LOG ACTION*/

        return response()->json([
            'message'   => 'Successfully Updated.', 
            'data'      => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->employee->show($id);

        if(!$data)
        {
            return response()->json([
                'message'   => 'No data found to delete. Please contact software developer.', 
            ], 422);
        }
        else
        {
            /*LOG ACTION*/
            $log_data = [
                'module'        => 'request',
                'table'         => 'employees',
                'object_id'     => $id,
                'action'        => 'destroy',
                'new_data'      => null,
                'old_data'      => $data,
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->server('HTTP_USER_AGENT')
            ];
            $this->log->store($log_data);
            /*END LOG ACTION*/

            $delete = $this->employee->destroy($id);

            if(!$delete)
            {
                return response()->json([
                    'message'   => 'Unable to deleted data. Contact software developer.', 
                ], 422);
            }
        }

        return response()->json([
            'message'   => 'Successfully Deleted', 
        ], 200);
    }
}
