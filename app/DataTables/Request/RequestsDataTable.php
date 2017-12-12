<?php

namespace App\DataTables\Request;

use App\Modules\Request\Models\Request;
use Yajra\DataTables\Services\DataTable;

class RequestsDataTable extends DataTable
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
            ->addColumn('action', function($data) {
                $request = ['data' => $data->id];
                return view('request::request.button.request', $request);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Request $model)
    {
        return $model->newQuery()
            //->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select(
                'id', 
                'request_number', 
                'company', 
                'branch', 
                //'created_by', 
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
                    ->addAction(['width' => '12%'])
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
            'request_number',  
            'company', 
            'branch', 
            //'created_by', 
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
        return 'request';//'requestsdatatable_' . time();
    }
}
