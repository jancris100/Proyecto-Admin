<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    //FUNCION DEL INDEX
    public function index()
    {
        return view('FrontEnd.Modernize-Admin.html.dashboard');
    }
    //FUNCIOND DEL ABOUT
    public function about()
    {
        return view('FrontEnd.Modernize-Admin.html.about');
    }
    //FUNCI

}

