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
use App\SystemInfo;
use App\VisitorHistory;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Mail;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected $index;

     // FrontEnd Home Page
    public function index(){
        $prams['feature_products'] = FeatureProduct::where('publicationStatus',1)->orderBy('position','ASC')->get();
        $prams['brands'] = Branding::all();
        $prams['slider']  = Slider::where('publicationStatus',1)->get();
        $prams['sliderVideo'] = SliderVideo::first();
        $prams['products'] = Product::where('publicationStatus',1)->where('is_delete',0)->orderBy('id','desc')->paginate(28);
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
            $this->index = 0;
            $data = VisitorHistory::orderBy('id','DESC')->get();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })->make(true);
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
        $prams['services'] = Services::all();
        $prams['recentProducts'] = Product::where('publicationStatus',1)->orderBy('id','DESC')->where('products.is_delete',0)->paginate(5);
        return view('frontEnd.other.aboutus',$prams);
    }

    // Send contact Message 
    public function sendContactMessage(Request $request){
        try{
            $system =  SystemInfo::first();
            $receiver = [
                'customer_email' => $request->email,
                'messagebody' => 'Message From : '.$request->email.'<br> Contact No: '.$request->phone.'<br>'.$request->message
            ];
            Mail::send('email.email',$receiver,function($message) use ($request, $system ){
                $message->to($system->email)
                ->subject($request->subject);
                $message->from('support@trendlink.com.bd');
            });
            $output = ['status'=>'success','message' => 'Message Send successfully'];
            return response()->json($output);
        }catch(Exception $e){
            $output = ['status'=>'error','message' => $e->getMessage()];
            return response()->json($output);
        }
    }

    //Show Certificate Page
    public function showCertificatePage(){
        return view('frontEnd.other.certificate');
    }

    // Show Voyager Apparels 
    public function ShowVoyagerApparels(){
        return view('frontEnd.other.voyagerApparels');
    }

    public function showFarseeing(){
        return view('frontEnd.other.farseeing');
    }
   
}
