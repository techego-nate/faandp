<?php

namespace App\DataTables;

use App\Overall;
use App\Element;
use Yajra\DataTables\Services\DataTable;

class DashboardDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function zdataTable($query)
    {
        return datatables($query)
            ->setRowId('id');
    }
    
//    public function overallData($query)
//    {         
//        $datatables = Datatables::of(Overall::query())
//                ->setRowId('id')
//                ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
//                ->editColumn('Annual Estimate', function(Overall $overall){return "$".number_format($overall->{"Annual Estimate"}, 2); })
//                ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
//                ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
//                ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
//                ->skipPaging()
//                ->setTotalRecords(1)
//                ;
//        return $datatables->make(true);
//    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ARSR $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Overall $model)
    {
        return $model->newQuery()->select('id', 'Annual Budget', 'Annual Estimate', 'YTD Actual', 'YTD Surplus', 'YTD Remaining');
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
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'order' => [1, 'asc'],
                        'select' => [
                            'style' => 'os',
                            'selector' => 'td:first-child',
                        ],
                        'buttons' => [
                            'excel',
                            ['extend' => 'create', 'editor' => 'editor'],
                            ['extend' => 'edit', 'editor' => 'editor'],
                            ['extend' => 'remove', 'editor' => 'editor'],
                            'colvis'
                        ]
//                        $this->getBuilderParameters()
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
            'id',
            'Annual Budget', 
            'Annual Estimate', 
            'YTD Actual', 
            'YTD Surplus', 
            'YTD Remaining',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'DashboardExport_' . time();
    }
}
