<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OverallDataTable;
use App\DataTables\ElementL1LMDataTable;
use App\DataTables\Element2LEDataTable;
use App\DataTables\ElementUtilitiesDataTable;
use App\DataTables\ElementLogisticsDataTable;
use App\DataTables\ElementUISDataTable;
use App\DataTables\ElementFacilitiesDataTable;
use App\DataTables\ElementTrainingDataTable;

use Datatables;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(OverallDataTable $overallTable, ElementL1LMDataTable $element_l1lmTable, Element2LEDataTable $element_2leTable, ElementUtilitiesDataTable $element_utilitiesTable, ElementLogisticsDataTable $element_logisticsTable, ElementUISDataTable $element_uisTable, ElementFacilitiesDataTable $element_facilitiesTable, ElementTrainingDataTable $element_trainingTable)
        {
        
        if (request()->get('type') == 'l1lm') {
            return $element_l1lmTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == '2le') {
            return $element_2leTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == 'utilities') {
            return $element_utilitiesTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == 'logistics') {
            return $element_logisticsTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == 'uis') {
            return $element_uisTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == 'facilities') {
            return $element_facilitiesTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        if (request()->get('type') == 'training') {
            return $element_trainingTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
        }
        return $overallTable->render('dashboard.index', compact('overallTable', 'element_l1lmTable', 'element_2leTable', 'element_utilitiesTable', 'element_logisticsTable', 'element_uisTable', 'element_facilitiesTable', 'element_trainingTable'));
    }
    
    
}
