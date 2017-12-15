<?php

namespace App\Repositories\Module;

use App\Repositories\Module\ModuleInterface as ModuleInterface;
use App\Modules\Module\Models\Module;
use App\Modules\Module\Models\User_module;
use Auth, DB;

class ModuleRepository implements ModuleInterface
{
    private $module;
    private $user_module;

    public function __construct(Module $module, User_module $user_module)
    {
        $this->module       = $module;
        $this->user_module  = $user_module;
    }

    public function all()
    {
        return $this->module
            //->where('prefix', '!=', 'dashboard')
            //->where('prefix', '!=', 'account')
            ->all();
    }

    public function get($where, $rows)
    {
        return $this->module->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        $id = $this->module->insertGetId([
            'title'             => $data['title'],
            'description'       => $data['description'],
            'prefix'            => $data['prefix'],
            'icon'              => $data['icon'],
            'sort_order'        => $this->countList() + 1,
            'status'            => $data['status'],
            'created_at'        => date('Y-m-d H:i:s'),
            'created_by'        => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->module->find($id);
    }

    public function update($id, $data)
    {
        $this->module->where('id', $id)->update([
            'title'             => $data['title'],
            'description'       => $data['description'],
            'prefix'            => $data['prefix'],
            'icon'              => $data['icon'],
            'sort_order'        => ($data['sort_order'] == 0 || $data['sort_order'] == '' || $data['sort_order'] == null) ? $this->get(['id' => $id], ['sort_order'])[0]['sort_order'] : $data['sort_order'] ,
            'status'            => $data['status'],
            'updated_by'        => Auth::user()->id,
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        return $this->show($id);
    }

    public function show($id)
    {
        return $this->module->find($id);
    }

    public function destroy($id)
    {
        return $this->module->destroy($id);
    }

    public function count($where)
    {
        return $this->module->where($where)->count();
    }

    public function countList()
    {
        return $this->module->count();
    }

    public function storeUserModules($data)
    {
        return $this->user_module->insert($data);
    }

    public function showUserModules($id)
    {
        return DB::table('user_modules')
        ->join('modules', 'user_modules.module_id', '=', 'modules.id')
        ->select('modules.*', 'user_modules.module_id', 'user_modules.user_id')
        ->where('user_modules.user_id', '=', $id)
        ->orderBy('modules.sort_order', 'ASC')
        ->get(); 
    }

    public function updateUserModules($id, $data)
    {
        $this->user_module->where(['user_id' => $id])->delete();
        return $this->storeUserModules($data);
    }

    public function destroyUserModules($id)
    {
        return $this->user_module->destroy($id);
    }

}