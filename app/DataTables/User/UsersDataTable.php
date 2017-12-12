<?php

namespace App\DataTables\User;

use App\User;
use Yajra\DataTables\Services\DataTable;
use Auth;

class UsersDataTable extends DataTable
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
                return view('user::button.user', ['data' => $data->id]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        if(Auth::user()->username !== 'super-admin'):
            return $model->newQuery()->select(
                'id', 
                'name',
                'email',
                'username',
                'employee_no',
                'sss_no',
                'created_at', 
                'updated_at'
            )->where('username', '!=', 'super-admin');
        else:
            return $model->newQuery()->select(
                'id', 
                'name',
                'email',
                'username',
                'employee_no',
                'sss_no',
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
            'name',
            'email',
            'username',
            'employee_no',
            'sss_no',
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
        return 'users_' . time();
    }
}
