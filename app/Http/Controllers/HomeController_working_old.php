<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController_working_old extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('dashboard.index');
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
