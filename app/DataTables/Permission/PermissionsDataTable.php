<?php

namespace App\DataTables\Permission;

use App\Modules\Permission\Models\Permission;
use Yajra\DataTables\Services\DataTable;
use Auth;

class PermissionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($data){
                return view('permission::button.permission', ['data' => $data->id]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
    {
        if(Auth::user()->username !== 'super-admin'):
            return $model->newQuery()->select(
                'id', 
                'title',
                'prefix',
                'description', 
                'created_at', 
                'updated_at'
            )->where('prefix', '!=', 'delete');
        else:
            return $model->newQuery()->select(
                'id', 
                'title',
                'prefix',
                'description', 
                'created_at', 
                'updated_at'
            );
        endif;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id', 
            'title',
            'prefix',
            'description', 
            'created_at', 
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissions_' . time();
    }
}
