<?php

namespace App\DataTables\Module;

use App\Modules\Module\Models\Module;
use Yajra\DataTables\Services\DataTable;

class ModulesDataTable extends DataTable
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
                return view('module::button.module', ['data' => $data->id]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Module $model)
    {
        return $model->newQuery()
            //->where('prefix', '!=', 'dashboard')
            //->where('prefix', '!=', 'account')
            ->select(
                'id', 
                'title',
                'description',
                'prefix',
                'icon',
                'status' ,
                'sort_order',
                'created_at', 
                'updated_at'
            );
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
                    ->addAction(['width' => '80px']);
                    //->parameters($this->getBuilderParameters());
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
            'description',
            'prefix',
            'icon',
            'sort_order',
            'status' ,
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
        return 'modules_' . time();
    }
}
