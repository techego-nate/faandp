<?php

namespace App\DataTables;

use App\Element;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class ElementL1LMDataTable extends DataTable
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
            ->editColumn('Budget_amount', function(Element $element){return "$".number_format($element->{"Budget_amount"}, 2); })
            ->editColumn('YTD_Daily_Calc', function(Element $element){return "$".number_format($element->{"YTD_Daily_Calc"}, 2); })
            ->editColumn('YTD Actual', function(Element $element){return "$".number_format($element->{"YTD Actual"}, 2); })
            ->editColumn('Surplus', function(Element $element){return "$".number_format($element->{"Surplus"}, 2); })
            ->editColumn('Remaining', function(Element $element){return "$".number_format($element->{"Remaining"}, 2); })
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
    public function query(Element $model)
    {
        return $model::select('Elements.*')
            ->where('Element Name', "1st Level Maintenance")
            ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                ->ajax(['data' => 'function(d) { d.type = "l1lm"; }'])
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
            ['title' => 'Budget Amount', 'data' => 'Budget_amount'], 
            ['title' => 'YTD Estimate Amount (Even % Daily)', 'data' => 'YTD_Daily_Calc'], 
            ['title' => 'YTD Actual', 'data' => 'YTD Actual'], 
            ['title' => 'Surplus', 'data' => 'Surplus'], 
            ['title' => 'Remaining Budget', 'data' => 'Remaining']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '1stLevelMaintentance_Export_' . time();
    }
}
