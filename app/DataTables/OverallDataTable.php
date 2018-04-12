<?php

namespace App\DataTables;

use App\Overall;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class OverallDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return DataTables::of($query)
            ->setRowId('id')
            ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
            ->editColumn('YTD_est_daily', function(Overall $overall){return "$".number_format($overall->{"YTD_est_daily"}, 2); })
            ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
            ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
            ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
            ->skipPaging()
            ->setTotalRecords(1)
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ARSR $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Overall $model)
    {
        return $model->newQuery()->select('Overall.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                ->ajax(['data' => 'function(d) { d.type = "overall"; }'])
                ->columns($this->getColumns())
                ->parameters($this->getBuilderParameters());
    }
    
    
    public function getBuilderParameters()
    {
        return [
                    'dom' => "<'row'<'col-sm-6'<'inject-header'>><'col-sm-6 text-right'B>>rt",
                    'ordering' => false,
                    'paging' => false,
                    'buttons' => [
                        'excel'
                    ],
                    'language' => [
                        'buttons' => [
                            'excel' => "Excel Export"
                        ]
                    ]
                ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['title' => 'Annual Budget', 'data' => 'Annual Budget'], 
            ['title' => 'YTD Estimate (Even % Daily)', 'data' => 'YTD_est_daily'], 
            ['title' => 'YTD Actual', 'data' => 'YTD Actual'], 
            ['title' => 'YTD Surplus', 'data' => 'YTD Surplus'], 
            ['title' => 'YTD Remaining', 'data' => 'YTD Remaining']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'OverallExport_' . time();
    }
}
