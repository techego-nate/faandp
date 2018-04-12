<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;

class HomeController_newAttempt extends Controller
{
        protected $htmlBuilder;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Builder $htmlBuilder)
    {
        $this->middleware('auth');
        $this->htmlBuilder = $htmlBuilder;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overall = \App\Overall::get();
        $elements = \App\Element::get();
        return view('dashboard.index',compact('overall','elements'));
    }
    public function element_dashboard()
    {
        return view('dashboard.element');
    }
    public function view_dashboard()
    {
        return view('dashboard.view');
    }
    public function dashboard_one()
    {
        return view('dashboard.l1lm');
    }
}
