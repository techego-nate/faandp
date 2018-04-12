<?php

namespace App\DataTables;

use App\ARSR;
use Yajra\DataTables\Services\DataTable;

class ARSRDataTable extends DataTable
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
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ARSR $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ARSR $model)
    {
        return $model->newQuery()->select('Task Number_title', 'OBJ Class_title', 'Org_title', 'Type_text', 'GL Date_startdate', 'Vendor_title', 'Inv Num_title', 'Amount');
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
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'order' => [1, 'asc'],
                        'select' => true,
                        'buttons' => [
                            'excel',
                            ['extend' => 'create', 'editor' => 'editor'],
                            ['extend' => 'edit', 'editor' => 'editor'],
                            ['extend' => 'remove', 'editor' => 'editor'],
                            'colvis'
                        ]                        
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false
            ],
            [ 'title'=> 'Task', 'data'=> 'Task Number_title', 'name'=> 'Task Number_title' ],
            [ 'title'=> 'Object Class', 'data'=> 'OBJ Class_title', 'name'=> 'OBJ Class_title' ],
            [ 'title'=> 'Org', 'data'=> 'Org_title', 'name'=> 'Org_title' ],
            [ 'title'=> 'Type', 'data'=> 'Type_text', 'name'=> 'Type_text' ],
            [ 'title'=> 'GL Date', 'data'=> 'GL Date_startdate', 'name'=> 'GL Date_startdate' ],
            [ 'title'=> 'Vendor', 'data'=> 'Vendor_title', 'name'=> 'Vendor_title' ],
            [ 'title'=> 'Invoice #', 'data'=> 'Inv Num_title', 'name'=> 'Inv Num_title' ],
            [ 'title'=> 'Amount', 'data'=> 'Amount', 'name'=> 'Amount' ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ARSR_' . time();
    }
}
