<?php

namespace App\Http\Controllers\FrontEnd;

use App\DiscountWheel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use App\Subscribe;
use App\UsedWheelDiscount;
use App\UserLog;
use Exception;

class SubscribeController extends Controller
{
    // Save Subscribe Information
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|unique:subscribes'
        ]);

        $agent = new Agent();

        if($validate->fails() || $agent->isRobot()){
            $error = $validate->errors()->first();
            $error .= $agent->isRobot()?'Or Robot Found':null;
            $output = ['status'=>'error','message'=>$error];
            return response()->json($output);
        }
        $data = new Subscribe();
        $user = new UserLog;        
        try{
            $data->email = $request->email;
            $data->ip = $request->ip();
            $data->countryCode = $user->getLocation($request->ip());
            $data->browser =  $agent->browser().$agent->version($agent->browser());
            $data->device = $agent->isDesktop() == 1?'Desktop':$agent->device();
            $data->os = $agent->platform().'-'.$agent->version($agent->platform());
            $data->save();
            $output = ['status'=>'success','message'=>'Thank you for Subscribe Us.'];
            return response()->json($output);
        }catch(Exception $ex){
            $output = ['status'=>'error','message'=>'Something went wrong'];
            return response()->json($output);
        }
        
    }

    // Get Discount And Store Email
    public function getDiscount(Request $request)
    {
        // Validate Input Data
        $validate = Validator::make($request->all(),[
            'wheel_id' => ['required','numeric','min:1'],
            'email' => ['required','email','unique:used_wheel_discounts']
        ]);
        $agent = new Agent();

        if($validate->fails() || $agent->isRobot() ){
            $output = [
                'status' => 'error',
                'message' => $validate->errors()->first(),
            ];
            return response()->json($output);
        }

        $data = new UsedWheelDiscount();
        $whill_info = DiscountWheel::findOrFail($request->wheel_id);

        $data->email        = $request->email;
        $data->discount     = $whill_info->value;
        $data->discountType = empty($whill_info->discountType)?'%':0;
        $data->ip           = $request->ip();
        $data->browser      = $agent->browser().$agent->version($agent->browser());
        $data->device       = $agent->isDesktop() == 1?'Desktop':$agent->device();
        $data->os           = $agent->platform().'-'.$agent->version($agent->platform());
        $data->is_used      = 0;
        $data->save();

        $output = [
            'status' => 'success',
            'message' => 'Congratulation! Your Discount Amount will Applicable For your First Order',
            'modal_id' => 'spin'
        ];
        return response()->json($output);
    }
}
