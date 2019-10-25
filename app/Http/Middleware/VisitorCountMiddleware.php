<?php

namespace App\Http\Middleware;

use App\User;
use App\VisitorHistory;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class VisitorCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            if(Session::has('visitor_id')){
                $data = VisitorHistory::find(Session::get('visitor_id'));
                $data->visit_count += 1;
                $data->save();
            }else{
                try{
                    $data = $this->storeVisitorData($request, true);                
                }catch(Exception $e){
                    $data = $this->storeVisitorData($request, false);
                }
                Session::put('visitor_id',$data->id); 
                Session::save();               
            }
        }catch(Exception $ex){
            return $next($request);
        }
        return $next($request);
    }

    protected function storeVisitorData($request, $ck = null){
        $agent = new Agent();
        $data = new VisitorHistory();
        $data->ip = $request->ip();
        if($ck){
            $data->browser = $agent->browser().$agent->version($agent->browser());
            $data->device =  $agent->isDesktop() == 1?'Desktop':$agent->device();
            $data->os = $agent->platform().'-'.$agent->version($agent->platform());
            try{
                $data->countryCode = $this->getCountry($request->ip());
            }catch(Exception $ex){
                $data->countryCode = null;
            }  
        } 
        $data->visit_count = 1; 
        $data->date = Carbon::now()->format('Y-m-d');
        $data->save();
        return $data;
    }

    protected function getCountry($ip){
        $url = "http://ip-api.com/json/".$ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = json_decode(curl_exec($ch));
        return $data->country.','.$data->city;
    }
}
