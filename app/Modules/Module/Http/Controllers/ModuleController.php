<?php

namespace App\Modules\Module\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataTables\Module\ModulesDataTable;
use App\Repositories\Module\ModuleInterface;
use App\Repositories\User\UserInterface;

class ModuleController extends Controller
{
    private $module;
    private $user;

    public function __construct(ModuleInterface $module, UserInterface $user)
    {
        $this->module   = $module;
        $this->user     = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModulesDataTable $dataTable)
    {
        return $dataTable->render('module::module');
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
        return view('module::modal.create', $data);
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
            'description'   => 'nullable',
            'prefix'        => 'required',
            'icon'          => 'nullable',
            'status'        => 'required',
        ]);

        $data  = $this->module->store($request->all());

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
        $data       = $this->module->show($id);
        $created_by = $this->user->show($data['created_by'])['name'];
        $updated_by = $this->user->show($data['updated_by'])['name'];

        return view('module::modal.show', [
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
            'data'      => $this->module->show($id),
            'method'    => ''.$id.'/update',
            'module'    => request('module'),
            'id'        => request('id'),
        ];

        return view('module::modal.edit', $data);
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
            'description'   => 'nullable',
            'prefix'        => 'required',
            'icon'          => 'nullable',
            'sort_order'    => 'nullable',
            'status'        => 'required',
       ]);

       $data = $this->module->update($id, $request->all());

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
        $data = $this->module->show($id);

        if(!$data)
        {
            return response()->json([
                'message'   => 'No data found to delete. Please contact software developer.', 
            ], 422);
        }
        else
        {
            $delete = $this->module->destroy($id);

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