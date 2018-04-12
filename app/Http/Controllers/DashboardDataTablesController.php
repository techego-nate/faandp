<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DashboardDataTable;
use App\DataTables\DashboardDataTablesEditor;

class DashboardDataTablesController extends Controller
{
    public function index(DashboardDataTable $dataTable)
    {
        return $dataTable->render('dashboard.index');
    }
    public function store(ARSRDataTablesEditor $editor)
    {
        return $editor->process(request());
    }
}
