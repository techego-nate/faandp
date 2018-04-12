<?php

namespace App\DataTables;

use App\Reclass;
use Yajra\DataTables\Services\DataTable;

class ReclassDataTable extends DataTable
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
            ->setRowId('id')
//            ->editColumn('Change Amount To', function(Reclass $reclass){return "$".number_format($reclass->{"Change Amount To"}, 2); })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ARSR $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Reclass $model)
    {
        return $model->newQuery()->select('original-arsr-item', 'Change Task To_title', 'Change Org To_title', 'Change Obj Class To_title', 'Change Project To_title', 'Change Amount To', 'Approval');
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
            'original-arsr-item', 
            'Change Task To_title', 
            'Change Org To_title', 
            'Change Obj Class To_title', 
            'Change Project To_title', 
            'Change Amount To', 
            'Approval'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ReclassExport_' . time();
    }
}
