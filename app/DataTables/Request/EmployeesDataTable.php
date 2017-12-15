<?php

namespace App\DataTables\Request;

use App\Modules\Request\Models\Employee;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
{
    protected $batch;

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
                $employee = ['data' => $data->id];
                return view('request::employee.button.employee', $employee);
            });
    }

    /*
     Filter id for query
    */
    public function filter_batch_id($batch)
    {
        $this->batch = $batch;
        return $this;
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery()
            ->select(
                'id',
                'employee_number', 
                'full_name', 
                'company', 
                'branch', 
                'sss_number',
                'pagibig_number',
                'phic_number', 
                'hdmf_number', 
                'created_at'
            )->where('request_id', $this->batch);
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
                    ->addAction(['width' => '8%']);
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
            'employee_number', 
            'full_name', 
            'company', 
            'branch', 
            'sss_number',
            'pagibig_number',
            'phic_number', 
            'hdmf_number', 
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'employee';//'employeesdatatable_' . time();
    }
}
