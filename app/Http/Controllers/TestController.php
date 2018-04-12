<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ARSR;

class TestController extends Controller
{    
    public function index()
    {
        return view('tests.index');
    }
    
    public function store()
    {
//        dd(request('variablenameintherequest'));
        $arsr = new \App\ARSR;
        $arsr->body = request('body');
        $arsr->item_id = 32142525251;
        $arsr->save();
        return back();
    }
}
