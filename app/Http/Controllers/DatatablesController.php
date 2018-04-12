<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\ARSR;
use App\Element;
use App\Overall;
use App\IndexViews;
//use App\php\DataTables;
use DataTables;


class DatatablesController extends Controller
{
//        public function datatable()
//        {
//           return view('datatable');
//        }
        public function getIndex()
        {
            return view('datatables.index');
        }
        /**
        * Process datatables ajax request.
        *
        * @return \Illuminate\Http\JsonResponse
        */
        public function anyData()
        {
           return Datatables::of(ARSR::query())->make(true);
        }
//        public function getColumns(Datatables $datatables)
//        {
//            $columns = ['Project Number', 'Index_View_title', 'Type_text', 'BPAC_title', 'Amount'];
//            if ($datatables->getRequest()->ajax()) {
//                return $datatables->of(ARSR::select($columns))->make(true);
//            }
//            $html = $datatables->getHtmlBuilder()->columns($columns);
//            return view('datatables.columns', compact('html'));
//        }      
        public function elementsData($element_name){         
            if($element_name !== "Overall"){               
                $datatables = Datatables::of(Element::query()
                        ->where('Element Name', $element_name))
                        ->editColumn('Budget_amount', '${{ number_format($Budget_amount, 2) }}')
                        ->editColumn('YTD_Daily_Calc', function(Element $element){return "$".number_format($element->{"YTD_Daily_Calc"}, 2); })
                        ->editColumn('YTD Actual', function(Element $element){return "$".number_format($element->{"YTD Actual"}, 2); })
                        ->editColumn('Surplus', '${{ number_format($Surplus, 2) }}')
                        ->editColumn('Remaining', '${{ number_format($Remaining, 2) }}')
                        ->skipPaging()
                        ->setTotalRecords(1)
                        ;      
            } else{
                $datatables = Datatables::of(Element::query())
                        ->editColumn('Budget_amount', '${{ number_format($Budget_amount, 2) }}')
                        ->editColumn('YTD_Daily_Calc', function(Element $element){return "$".number_format($element->{"YTD_Daily_Calc"}, 2); })
                        ->editColumn('YTD Actual', function(Element $element){return "$".number_format($element->{"YTD Actual"}, 2); })
                        ->editColumn('Surplus', '${{ number_format($Surplus, 2) }}')
                        ->editColumn('Remaining', '${{ number_format($Remaining, 2) }}')
                        ->skipPaging()
                        ->setTotalRecords(1)
                        ;
            }
            return $datatables->make(true);
        }       
        public function overallData()
        {         
            $datatables = Datatables::of(Overall::query())
                    ->editColumn('Annual Budget', function(Overall $overall){return "$".number_format($overall->{"Annual Budget"}, 2); })
                    ->editColumn('Annual Estimate', function(Overall $overall){return "$".number_format($overall->{"Annual Estimate"}, 2); })
                    ->editColumn('YTD Actual', function(Overall $overall){return "$".number_format($overall->{"YTD Actual"}, 2); })
                    ->editColumn('YTD Surplus', function(Overall $overall){return "$".number_format($overall->{"YTD Surplus"}, 2); })
                    ->editColumn('YTD Remaining', function(Overall $overall){return "$".number_format($overall->{"YTD Remaining"}, 2); })
                    ->skipPaging()
                    ->setTotalRecords(1)
                    ;
            return $datatables->make(true);
        }
        public function viewsData($element_name)
        {   
            $elementURL = str_replace(" ", "-", strtolower($element_name));
            $datatables = Datatables::of(IndexViews::query()
                    ->where('Element_title', 'like', "%$element_name%")
                    )
                    ->editColumn('Dashboard Title', function(IndexViews $indexView) use($elementURL){$viewItemID = $indexView->item_id; $viewTitle = $indexView->{'Dashboard Title'}; return "<a href=\"/view?view_id=$viewItemID&view_title=$viewTitle&from_element_url=$elementURL\" class=\"table-link\">$viewTitle</a>"; })
                    ->rawColumns(['Dashboard Title'])
                    ->editColumn('Items', '{{ number_format($Items, 0) }}')
                    ->editColumn('split_total_element', '${{ number_format($split_total_element, 2) }}')
                    ;
            return $datatables->make(true);
        }
        public function arsrData($view_item_id)
        {               
            $datatables = Datatables::of(ARSR::query()
                ->where('Index_View', 'like', "%$view_item_id%"))
                ->rawColumns(['GL Date_startdate'])
                ->editColumn('Amount', '${{ number_format($Amount, 2) }}')
                ;
            return $datatables->make(true);
        }
}
