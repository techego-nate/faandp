<?php

namespace App\DataTables;

use Illuminate\Support\Facades\DB;
use App\Reclass;
use Yajra\DataTables\Services\DataTable;

class ReclassDataTable_Approval extends DataTable
{
   public function dataTable($query)
    {
        return datatables($query)
            ->setRowId('id')
            ->editColumn('Amount', function(Reclass $reclass){return "$".number_format($reclass->{"Amount"}, 2); })
            ;
    }

    
    public function query(Reclass $model)
    {
        return $model::join('ARSR', 'Reclass.original-arsr-item', '=', 'ARSR.item_id')
            ->select('ARSR.Project Number', 'ARSR.Task Number_title', 'ARSR.OBJ Class_title', 'ARSR.Amount',  'Reclass.Approval', 'Reclass.Change Task To_title','Reclass.Change Org To_title','Reclass.Change Obj Class To_title','Reclass.Change Project To_title','Reclass.Change Amount To');
    }

    
    public function html()
    {
        return $this->builder()
                    ->ajax(['data' => 'function(d) { d.type = "approval"; }'])
                    ->columns($this->getColumns())
//                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }
    
    
    public function getBuilderParameters()
    {
        return [
                    'dom' => 'Bfrtip',
                    'order' => [1, 'asc'],
                    'select' => [
                        'style' => 'multi+shift',
                        'selector' => 'td:first-child',
                    ],
                    'buttons' => [
                        'excel',
//                        ['extend' => 'edit', 'editor' => 'editor'],
                        'colvis'
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
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false
            ],
            [ 'title'=> 'Approval Project Number', 'data'=> 'Project Number', 'name'=> "ARSR.Project Number" ],
            [ 'title'=> 'Task', 'data'=> 'Task Number_title', 'name'=> "ARSR.Task Number_title" ],
            [ 'title'=> 'Obj Class', 'data'=> 'OBJ Class_title', 'name'=> "ARSR.OBJ Class_title" ],
            [ 'title'=> 'Amount', 'data'=> 'Amount', 'name'=> "ARSR.Amount" ],
            [ 'title'=> 'Reclass Approval', 'data'=> 'Approval', 'name'=> 'Reclass.Approval' ],
            [ 'title'=> 'Change Task', 'data'=> 'Change Task To_title', 'name'=> "Reclass.Change Task To_title" ],
            [ 'title'=> 'Change Org', 'data'=> 'Change Org To_title', 'name'=> 'Reclass.Change Org To_title' ],
            [ 'title'=> 'Chagnge Obj Class', 'data'=> 'Change Obj Class To_title', 'name'=> 'Reclass.Change Obj Class To_title' ],
            [ 'title'=> 'Change Project', 'data'=> 'Change Project To_title', 'name'=> 'Reclass.Change Project To_title' ],
            [ 'title'=> 'Change Amount', 'data'=> 'Change Amount To', 'name'=> 'Reclass.Change Amount To' ],
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
