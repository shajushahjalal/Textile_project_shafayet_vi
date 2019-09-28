<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendGroupEmail;
use App\Subscribe;
use App\SystemInfo;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;

class NewslatterController extends Controller
{
    protected $index;
    // show all subscribe newslater
    public function index(Request $request){
        if($request->ajax()){
            $data = Subscribe::all();
            $system = SystemInfo::first();

            return DataTables::of($data)
                ->addcolumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('created_at',function($data)use($system){
                    return Carbon::parse($data->created_at)->format($system->dateFormat.' H:i:s');
                })
                ->addColumn('action',function($data){
                    return '<a href="'.url('newslatter/subscribe/send-message/'.$data->id).'" class="btn btn-sm btn-primary"> <i class="fas fa-envelope-open-text"></i> </a>';
                })
                ->make(true);
        }
        return view('backEnd.newsletter.index');
    }

    //Send Group message
    public function sendGroupMessage(Request $request){
        $lists = Subscribe::all();
        return view('backEnd.newsletter.sendEmail', ['lists' => $lists] );
    }

    // Send Single Message Page
    Public function sendSingleMessage($id){
        $lists = Subscribe::where('id',$id)->get();
        return view('backEnd.newsletter.sendEmail', ['lists' => $lists] );
    }

    // Send Group Mail
    public function sendMail(Request $request){
        try{
            $data = ['subject' => $request->subject,'message' => $request->message];
            $email_list = [];
            foreach($request->email_list as $list){
            array_push($email_list,$list);
            }
            $data['emails'] = $email_list;
            SendGroupEmail::dispatch($data)->delay(5);

            $output = ['status' => 'success','message' => 'Message Sent Successfully'];
            return response()->json($output);
        }catch(Exception $ex){
            $output = ['status' => 'error','message' => 'Failed To sent Message'];
            return response()->json($output);
        }
        
    }
    
}
