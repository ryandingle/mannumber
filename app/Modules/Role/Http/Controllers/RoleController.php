<?php

namespace App\Modules\Role\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataTables\Role\RolesDataTable;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;

class RoleController extends Controller
{
    private $role;
    private $user;
    
    public function __construct(RoleInterface $role, UserInterface $user)
    {
        $this->role = $role;
        $this->user = $user;
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

       $data = $this->role->update($id, $request->all());

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
