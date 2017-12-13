<?php

namespace App\Modules\Request\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataTables\Request\RequestsDatatable;
use App\Http\Controllers\Controller;
use App\Repositories\Request\RequestInterface;
use App\Repositories\Request\EmployeeInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Log\LogInterface;

class RequestController extends Controller
{
    private $requestRepository;
    private $employee;
    private $user;
    private $log;

    public function __construct(RequestInterface $requestRepository, EmployeeInterface $employee, UserInterface $user, LogInterface $log)
    {
        $this->requestRepository = $requestRepository;
        $this->employee          = $employee;
        $this->user              = $user;
        $this->log               = $log;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequestsDatatable $dataTable)
    {
        return $dataTable->render('request::request.request');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'method'    => 'store',
            'module'    => request('module'),
            'id'        => request('id'),
        ];
        return view('request::request.modal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'request_number'  => 'required|numeric|min:1',
            'company'         => 'required',
            'branch'          => 'required'
        ]);

        $data  = $this->requestRepository->store($request->all());

        /*LOG ACTION*/
        $log_data = [
            'module'        => 'request',
            'table'         => 'requests',
            'object_id'     => $data->id,
            'action'        => 'store',
            'new_data'      => $data,
            'old_data'      => null,
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->server('HTTP_USER_AGENT')
        ];
        $this->log->store($log_data);
        /*END LOG ACTION*/

        /*ADD NEW EMPLOYEE NUMBERS*/
        if($data)
        {
            $request_number = $data['request_number'];

            for($a = 1; $a <= $request_number ; $a++)
            {
                $request_data = [
                    'request_id'        => $data['id'],
                    'branch'            => $data['branch'],
                    'company'           => $data['company'],
                    'employee_number'   => $this->employee->generateEmployeeNumber()[0]
                ];

                $data_emp = $this->requestRepository->addEmployees($request_data);

                /*LOG ACTION*/
                $log_data = [
                    'module'        => 'request',
                    'table'         => 'employees',
                    'object_id'     => $data_emp->id,
                    'action'        => 'store',
                    'new_data'      => $data_emp,
                    'old_data'      => null,
                    'ip_address'    => $request->ip(),
                    'user_agent'    => $request->server('HTTP_USER_AGENT')
                ];
                $this->log->store($log_data);
                /*END LOG ACTION*/
            }
        }
        /*END ADD NEW EMPLOYEE NUMBERS*/

        return response()->json([
            'message'   => 'Successfully Added', 
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
        $data = $this->requestRepository->show($id);
        $created_by = $this->user->show($data['created_by'])['name'];
        $updated_by = $this->user->show($data['updated_by'])['name'];

        return view('request::request.modal.show', [
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
            'data'      => $this->requestRepository->show($id),
            'method'    => ''.$id.'/update',
            'module'    => request('module'),
            'id'        => request('id'),
        ];

        return view('request::request.modal.edit', $data);
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
        $request_number     = $request->request_number;
        $employee_count     = $this->employee->count(['request_id' => $id]);

        if($request_number < $employee_count)
        {
            return response()->json(['message' => 'Lower number to its original request value cannot be processed.'], 422);
        }

       $request->validate([
            'request_number'    => 'required|numeric|min:1',
            'company'           => 'required',
            'branch'            => 'required'
       ]);

       $old_data    = $this->requestRepository->show($id);
       $data        = $this->requestRepository->update($id, $request->all());

       /*LOG ACTION*/
        $log_data = [
            'module'        => 'request',
            'table'         => 'requests',
            'object_id'     => $id,
            'action'        => 'update',
            'new_data'      => $data,
            'old_data'      => $old_data,
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->server('HTTP_USER_AGENT')
        ];
        $this->log->store($log_data);
        /*END LOG ACTION*/

        /*ADD ADDIONAL EMPLOYEE NUMBERS IF REQUEST NUMBER CHANGE TO HIGHER VALUE*/
        if($request_number > $employee_count)
        {
            if($data)
            {
                for($a = $employee_count + 1; $a <= $request_number ; $a++)
                {
                    $request_data = [
                        'request_id'        => $data['id'],
                        'branch'            => $data['branch'],
                        'company'           => $data['company'],
                        'employee_number'   => $this->employee->generateEmployeeNumber()[0]
                    ];

                    $data_emp = $this->requestRepository->addEmployees($request_data);

                    /*LOG ACTION*/
                    $log_data = [
                        'module'        => 'request',
                        'table'         => 'employees',
                        'object_id'     => $data_emp->id,
                        'action'        => 'store',
                        'new_data'      => $data_emp,
                        'old_data'      => null,
                        'ip_address'    => $request->ip(),
                        'user_agent'    => $request->server('HTTP_USER_AGENT')
                    ];
                    $this->log->store($log_data);
                    /*END LOG ACTION*/
                }
            }
        }
        /*END ADD NEW EMPLOYEE*/

        return response()->json([
            'message'   => 'Successfully Updated', 
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
        $data = $this->requestRepository->show($id);

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
                'table'         => 'requests',
                'object_id'     => $id,
                'action'        => 'destroy',
                'new_data'      => null,
                'old_data'      => $data,
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->server('HTTP_USER_AGENT')
            ];
            $this->log->store($log_data);
            /*END LOG ACTION*/

            $delete = $this->requestRepository->destroy($id);

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
