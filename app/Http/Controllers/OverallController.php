<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OverallDataTable;

class OverallController extends Controller
{
//    public function index(OverallDataTable $dataTable)
//    {
//        return $dataTable->render('dashboard.overall');
//    }
//    public function getData()
//    {
//        $datatables = Datatables::of(Overall::query())
//            ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
//            ->editColumn('Annual Estimate', function(Overall $overall){return "$".number_format($overall->{"Annual Estimate"}, 2); })
//            ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
//            ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
//            ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
//            ->skipPaging()
//            ->setTotalRecords(1)
//            ;
//        return $datatables->make(true);
//    }
    protected $htmlBuilder;

    public function __construct(Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;
    }

    public function getBasic(Request $request)
    {
        $html = $this->htmlBuilder
            ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
            ->editColumn('Annual Estimate', function(Overall $overall){return "$".number_format($overall->{"Annual Estimate"}, 2); })
            ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
            ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
            ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
            ->skipPaging()
            ->setTotalRecords(1)
            ;
        return view('datatables.html.basic', compact('html'));
    }
    public function getBasicObject()
    {
        return view('datatables.eloquent.basic-columns');
    }

    public function getBasicObjectData()
    {
        $overall = Overall::select(['Annual Budget', 'Annual Estimate', 'YTD Actual', 'YTD Surplus', 'YTD Remaining']);
        return $overall;
        return Datatables::of($overall)->make();
    }
}
