<?php

namespace App\DataTables;

use App\Element;
use Yajra\DataTables\Services\DataTable;

class ElementDataTable extends DataTable
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
            ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
            ->editColumn('Annual Estimate', function(Overall $overall){return "$".number_format($overall->{"Annual Estimate"}, 2); })
            ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
            ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
            ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
            ->skipPaging()
            ->setTotalRecords(1)
            ;
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
    public function query(Element $model, $element_name)
    {
        return $model->newQuery()->select('id', 'Annual Budget', 'Annual Estimate', 'YTD Actual', 'YTD Surplus', 'YTD Remaining')->where('Element Name', $element_name);
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
                        'dom' => 'Bt',
                        'buttons' => [
                            'excel'
                        ],
                        'ordering' => false
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
                'title' => '',
                'orderable' => false
            ],
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
