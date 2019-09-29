<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontEnd.home.index');
    }

    public function backEndIndex(){
        return view('backEnd.dashboard.index');
    }
}
