<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FooterMenu;

class OtherController extends Controller
{
    // Show Footer Menu Page
    public function showfooterPage($id){
        $data = FooterMenu::findOrFail($id);        
        return view('frontEnd.other.viewFooterPage',['data' => $data]);
    }
}
