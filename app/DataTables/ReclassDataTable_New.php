<?php

namespace App\DataTables;

use Illuminate\Support\Facades\DB;
use App\Reclass;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class ReclassDataTable_New extends DataTable
{
    public function dataTable($query)
    {
        return DataTables::of($query)
            ->setRowId('id')
            ->editColumn('arsr.Amount', function(Reclass $reclass){return "$".number_format($reclass->arsr->Amount, 2); })
            ;
    }

    public function query(Reclass $model)
    {
        return $model::with('arsr')->select('Reclass.*')
            ;
    }
    
    public function html()
    {
        return $this->builder()
                ->ajax(['data' => 'function(d) { d.type = "new"; }'])
                ->columns($this->getColumns())
                ->parameters($this->getBuilderParameters());
    }
    
    public function getBuilderParameters()
    {
        return [
                    'dom' => "<'row'<'col-sm-8'B><'col-sm-4'f>><'row top-row-2'<'col-sm-2'l><'col-sm-4'i>>rt<'row'<'col-sm-2'l><'col-sm-4'i><'col-sm-6'p>>",
                    'order' => [[1, 'asc']],
                    'colReorder' => true,
                    'select' => [
                        'style' => 'multi+shift',
                        'selector' => 'td:first-child',
                    ],
                    "lengthMenu" => [ [10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"] ],
                    'buttons' => [
                        'selectAll',
                        'selectNone',
                        'reset',
                        ['extend' => 'colvis', 'columns' => ':gt(0)', 'className' => 'colvis-style'],
                        ['extend' => 'excel', 'exportOptions' => ['options' => ['columns' => 'visible' ] ] ],
                        ['extend' => 'edit', 'editor' => 'newEditor'],
                        ['extend' => 'selectedSingle', 'text' => "Split", 'action' => "function ( e, dt, button, config ) {
                            var rowData = dt.row( { selected: true } ).data();
                            $('.modal-body .current-line-project').each(function(i) {
                                $(this).text( rowData['arsr']['Project Number'] );
                            });
                            $('.modal-body .current-line-task').each(function(i) {
                                $(this).text( rowData['arsr']['Task Number_title'] );
                            });
                            $('.modal-body .current-line-org').each(function(i) {
                                $(this).text( rowData['arsr']['Org_title'] );
                            });
                            $('.modal-body .current-line-objclass').each(function(i) {
                                $(this).text( rowData['arsr']['OBJ Class_title'] );
                            });
                            $('.modal-body .current-line-amount').each(function(i) {
                                var amount = rowData['arsr']['Amount'];
                                var moneyAmount = parseFloat(amount).toFixed(2);
                                $(this).text( rowData['arsr']['Amount'] );
                            });
                            $('.modal-body #split-line-amount').val( rowData['arsr']['Amount'] );
                            updateSplitTotalRemaining();
                            $('#reclassSplit').modal('show');
                        }"]
                    ],
                    'language' => [
                        'buttons' => [
                            'excel' => "Excel Export",
                            'selectAll' => "Select All",
                            'selectNone' => "Select None"
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
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false,
                'targets' => 0
            ],
//            [ 'title'=> 'ID', 'data'=> 'id', 'name'=> "Reclass.id" ],
            [ 'title'=> 'Project Number', 'data'=> 'arsr.Project Number', 'name'=> "arsr.Project Number" ],
            [ 'title'=> 'Task', 'data'=> 'arsr.Task Number_title', 'name'=> "arsr.Task Number_title" ],
            [ 'title'=> 'Org', 'data'=> 'arsr.Org_title', 'name'=> "arsr.Org_title" ],
            [ 'title'=> 'Obj Class', 'data'=> 'arsr.OBJ Class_title', 'name'=> "arsr.OBJ Class_title" ],
            [ 'title'=> 'Amount', 'data'=> 'arsr.Amount', 'name'=> "arsr.Amount" ],
            [ 'title'=> 'Change Task', 'data'=> 'Change_task_title', 'name'=> "Reclass.Change_task_title" ],
            [ 'title'=> 'Change Org', 'data'=> 'Change_org_title', 'name'=> 'Reclass.Change_org_title' ],
            [ 'title'=> 'Change Obj Class', 'data'=> 'Change_obj_title', 'name'=> 'Reclass.Change_obj_title' ],
            [ 'title'=> 'Change Project', 'data'=> 'Change_project_title', 'name'=> 'Reclass.Change_project_title' ],
            [ 'title'=> 'Change Amount', 'data'=> 'Change_amount', 'name'=> 'Reclass.Change_amount' ],
            [ 'title'=> 'Reclass Approval', 'data'=> 'Approval_title', 'name'=> 'Reclass.Approval_title' ],
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