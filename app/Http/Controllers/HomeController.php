<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Branding;
use App\Category;
use App\Client;
use App\ClientList;
use App\FeatureProduct;
use App\GalaryMenu;
use App\Goal;
use App\GoalsContent;
use App\Management;
use App\Product;
use App\Services;
use App\Slider;
use App\SliderVideo;
use App\VisitorHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $prams['goals'] = Goal::first();
        $prams['goals_content'] = GoalsContent::all();
        $prams['is_home'] = true;
        
        return view('frontEnd.home.index',$prams);
    }

    // BackEnd Home Page
    public function backEndIndex(Request $request){
        $prams['today_visitor'] = VisitorHistory::where('date', '=', Carbon::now()->format('Y-m-d'))
            ->select( DB::raw('count(`id`) as visitor'), DB::raw('sum(`visit_count`) as total_page_visit'))->first();

        $prams['yesterday_visitor'] = VisitorHistory::where('date', '=', Carbon::now()->subDays(1)->format('Y-m-d'))
            ->select( DB::raw('count(`id`) as visitor'), DB::raw('sum(`visit_count`) as total_page_visit'))->first();
        if($request->ajax()){

        }
        return view('backEnd.dashboard.index', $prams);
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

    // Show Clients Page
    public function showClientPage(){
        $prams['client'] = Client::first();
        $prams['client_lists'] = ClientList::all();
        
        return view('frontEnd.other.clients',$prams);
    }

    // Show About us page
    public function showAboutUSPage(){
        $prams['about'] = AboutUs::first();
        $prams['managements'] = Management::all();
        $prams['categories'] = Category::where('publicationStatus',1)->orderBy('position','ASC')->get();
        $prams['services'] = Services::all();

        return view('frontEnd.other.aboutus',$prams);
    }
}
