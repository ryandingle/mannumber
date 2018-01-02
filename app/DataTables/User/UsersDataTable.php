<?php

namespace App\DataTables\User;

//use App\User;
use Yajra\DataTables\Services\DataTable;
use Auth;
use DB;

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
            ->filterColumn('role', function($query, $keyword) {
                $query->whereRaw("CONCAT(roles.title) like ?", ["%{$keyword}%"]);
            })
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
    public function query(/*User $model*/)
    {
        if(Auth::user()->username !== 'super-admin'):
            return DB::table('users')
                ->join('user_roles', 'user_roles.user_id' ,'=', 'users.id')
                ->join('roles', 'roles.id' ,'=', 'user_roles.role_id')
                ->select(
                    'users.id', 
                    'users.name',
                    'users.email',
                    'users.username',
                    'users.employee_no',
                    'users.sss_no',
                    'users.created_at', 
                    'users.updated_at',
                    'roles.title as role'
                )->where('users.username', '!=', 'super-admin');
        else:
            return DB::table('users')
                ->join('user_roles', 'user_roles.user_id' ,'=', 'users.id')
                ->join('roles', 'roles.id' ,'=', 'user_roles.role_id')
                ->select(
                    'users.id', 
                    'users.name',
                    'users.email',
                    'users.username',
                    'users.employee_no',
                    'users.sss_no',
                    'users.created_at', 
                    'users.updated_at',
                    'roles.title as role'
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
            'name',
            'role',
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
