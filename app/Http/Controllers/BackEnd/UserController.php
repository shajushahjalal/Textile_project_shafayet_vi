<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\UserLog;
use App\User;
use Carbon\Carbon;
use App\SystemInfo;
use DB;

class UserController extends Controller
{
    protected $index;
    protected $system;
    
    function __construct(SystemInfo $system) {
        $this->system = $system;
    }


    /*
     * -------------------------------------------------------------------------
     * Show All Users 
     * Login and Logout 
     * History
     * -------------------------------------------------------------------------
     */
    public function showLoginDetails(Request $request) {
        if($request->ajax()){
           // $system = $this->system->getSystem();
            $this->index = 0;
            $data = DB::table('user_logs')
                    ->leftjoin('users','users.id','=','user_logs.userId')
                    ->select('user_logs.*','users.name','users.is_admin','users.email')
                    ->orderBy('user_logs.created_at')->get();
            return DataTables::of($data)
                    ->addColumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->addColumn('role',function($data){                        
                        return $data->is_admin ==1?'Admin':'Customer';
                    })
                    ->removeColumn(['is_admin'])
                    /*
                    ->editColumn('login',function($data)use($system){
                        return Carbon::parse($data->login)->format($system->dateFormat);
                    })
                    ->editColumn('logout',function($data)use($system){
                        return Carbon::parse($data->logout)->format($system->dateFormat);
                    }) */
                    ->make(true);
        }
        return view('backEnd.admin.userLog');        
    }
}
