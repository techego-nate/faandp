<?php

namespace App\DataTables;

use App\Element;
use App\IndexViews;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class ElementServiceAreasDataTable extends DataTable
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
            ->addColumn('Name', 'HQMS')
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ARSR $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IndexViews $model)
    {
        
        $requestType = request()->get('type');
        
//        if ($requestType == 'l1lm') {
            $elementViews = $model::selectRaw('
                    service_area_text,
                    SUM(Items) as item_count,
                    SUM(exp_element_split) as total_exp,
                    SUM(udo_element_split) as total_udos,
                    SUM(split_total_element) as total_amount
                ')
//                ->where('Element_Title', ' "1st Level Maintenance" ')
                ->groupBy('service_area_text')
                ;
//        }
        
        return $elementViews;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                ->ajax(['data' => 'function(d) { d.element = "l1lm"; }'])
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
            ['title' => 'Name', 'data' => 'service_area_text'], 
            ['title' => 'Item Count', 'data' => 'item_count'], 
            ['title' => 'Total EXP', 'data' => 'total_exp'], 
            ['title' => 'Total UDOs', 'data' => 'total_udos'], 
            ['title' => 'Total Amount', 'data' => 'total_amount']
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
