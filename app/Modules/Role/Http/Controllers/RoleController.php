<?php

namespace App\Modules\Role\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataTables\Role\RolesDataTable;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Log\LogInterface;

class RoleController extends Controller
{
    private $role;
    private $user;
    public $log;
    
    public function __construct(RoleInterface $role, UserInterface $user, LogInterface $log)
    {
        $this->role = $role;
        $this->user = $user;
        $this->log  = $log;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('role::role');
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
        return view('role::modal.create', $data);
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
            'title'         => 'required',
            'prefix'        => 'required',
            'description'   => 'nullable',
        ]);

        $data  = $this->role->store($request->all());

        /*LOG ACTION*/
        $log_data = [
            'module'        => 'role',
            'table'         => 'roles',
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
        $data       = $this->role->show($id);
        $created_by = $this->user->show($data['created_by'])['name'];
        $updated_by = $this->user->show($data['updated_by'])['name'];

        return view('role::modal.show', [
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
            'data'      => $this->role->show($id),
            'method'    => ''.$id.'/update',
            'module'    => request('module'),
            'id'        => request('id'),
        ];

        return view('role::modal.edit', $data);
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
            'title'         => 'required',
            'prefix'        => 'required',
            'description'   => 'nullable',
        ]);

        $old_data   = $this->role->show($id);
        $data       = $this->role->update($id, $request->all());

       /*LOG ACTION*/
        $log_data = [
            'module'        => 'role',
            'table'         => 'roles',
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
        $data = $this->role->show($id);

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
                'module'        => 'role',
                'table'         => 'roles',
                'object_id'     => $id,
                'action'        => 'destroy',
                'new_data'      => null,
                'old_data'      => $data,
                'ip_address'    => $request->ip(),
                'user_agent'    => $request->server('HTTP_USER_AGENT')
            ];
            $this->log->store($log_data);
            /*END LOG ACTION*/

            $delete = $this->role->destroy($id);

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
