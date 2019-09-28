<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Location;
use DB;

class UserLog extends Model
{
    /*
     * Store User Login Info
    */
    public function store($userId,$request){
        $data = new UserLog();
        $data->userId = $userId;
        $data->ip = $request->ip();
        $data->country  = $this->getLocation($request->ip());
        $data->login = Carbon::now(); 
        $data->save();
    }
    
    /*
     * Get User Information Using Ip
     */
    public function getLocation($ip) {
        $data = Location::get($ip);
        return $data->countryCode.','.$data->cityName;
    }
    
    /*
     * Store Logout Info
    */
    public function UpdateUserLog($id) {
        DB::table('user_logs')
                ->where('id','=',$id)
                ->update(['logout' => Carbon::now()]);
    }
    
}
