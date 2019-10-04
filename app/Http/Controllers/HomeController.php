<?php

namespace App\Http\Controllers;

use App\Branding;
use App\FeatureProduct;
use App\GalaryMenu;
use App\Product;
use App\Slider;
use App\SliderVideo;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // FrontEnd Home Page
    public function index()
    {
        $prams['feature_products'] = FeatureProduct::where('publicationStatus',1)->orderBy('position','ASC')->get();
        $prams['brands'] = Branding::all();
        $prams['slider']  = Slider::where('publicationStatus',1)->get();
        $prams['sliderVideo'] = SliderVideo::first();
        $prams['products'] = Product::where('publicationStatus',1)->orderBy('id','desc')->paginate(20);
        
        return view('frontEnd.home.index',$prams);
    }

    // BackEnd Home Page
    public function backEndIndex(){
        return view('backEnd.dashboard.index');
    }

    // Show Galary
    public function showGalary(){
        $prams['galaryMenus'] = GalaryMenu::where('publicationStatus',1)->get();
        return view('frontEnd.galary.galary',$prams);
    }

    //Show Contact Page
    public function showContactPage(){
        return view('frontEnd.contact.contact');
    }
}
