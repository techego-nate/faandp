<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OverallDataTable;


use Datatables;

class HomeController_New extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(OverallDataTable $overallTable)
        {
        
        if (request()->get('type') == 'l1lm') {
            return; 
//            $approvalReclassTable->render('tools.reclass', compact('newReclassTable', 'approvalReclassTable', 'projectDropdownOptionsJSON', 'taskDropdownOptionsJSON', 'orgDropdownOptionsJSON', 'objClassDropdownOptionsJSON', 'reclassTotal'));
        }
        return $overallTable->render('dashboard.index', compact('overallTable'));
    }
    
    
}
