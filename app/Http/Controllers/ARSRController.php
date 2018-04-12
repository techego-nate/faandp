<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ARSRDataTable;
use App\DataTables\ARSRDataTablesEditor;

class ARSRController extends Controller
{
    public function index(ARSRDataTable $dataTable)
    {
        return $dataTable->render('arsr.index');
    }
    public function store(ARSRDataTablesEditor $editor)
    {
        return $editor->process(request());
    }
    public function getAddEditRemoveColumnData()
    {
        $arsr = \App\ARSR::select(['id', 'item_id', 'Project Number', 'Amount']);
        return Datatables::of($arsr)
            ->addColumn('action', function ($arsr) {
                return '<a href="#edit-'.$arsr->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }
}
