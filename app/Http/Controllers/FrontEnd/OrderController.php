<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendOrderNotificationEmail;
use Illuminate\Support\Facades\DB;
use App\Coupon;
use Carbon\Carbon;
use App\UsedCoupon;
use App\Country;
use App\Order;
use App\SystemInfo;
use App\OrderDetails;
use App\ProductVariation;
use App\Shipping;
use App\UsedWheelDiscount;

class OrderController extends Controller
{
    // Order Confirm
    public function confirmOrder($order_id) {
        $order = Order::where('id', $order_id)->where('user_id', Auth::user()->id)->first();
        if( !empty($order) ){
            return view('frontEnd.order.orderConfirm',['order'=>$order]);
        }else{
            abort(404);
        }        
    }

    //Check Coupon Code
    public function checkCoupon(Request $request){
        $validate = Validator::make($request->all(),[
            'couponCode' => 'required'
        ]);
        if( $validate->fails() ){
            $output = ['status'=>'error','message' => $validate->error->first() ];
            return response($output);
        }
        try{
            DB::beginTransaction();
            $data = Coupon::where('couponCode','=',$request->couponCode)
                    ->where('startDate', '<=', Carbon::now()->format('Y-m-d'))
                    ->where('expireDate', '>=', Carbon::now()->format('Y-m-d'))
                    ->where('status', '=', 'active')->first();
            if( empty($data)){
                $output = ['status'=>'error','message' => 'Invalid Coupon Code' ];
                return response($output);
            }else{
                $usedCoupon = UsedCoupon::where('coupon_id',$data->id)
                    ->where('user_id',Auth::user()->id)->first();
                if(!empty($usedCoupon)){
                    $output = ['status'=>'error','message' => 'You already used this coupon Code' ];
                    return response($output);
                }else{
                    $this->addUsedCoupon($data);
                    Session::put('discount',$data->couponPrice);
                    $output = ['status'=>'success','message' => $data->couponPrice ];
                    $countries = Country::all();
                    $page = view('frontEnd.cart.checkoutAction',['countries'=>$countries])->render();
                    $output = ['status'=>'success','message' => $page ];
                    DB::commit();
                    return response($output);
                }
                
            }
        }catch(\Exception $ex){
            DB::rollback();
            $output = ['status'=>'error','message' => 'Something Went Wrong'];
            return response($output);
        }
        
    }

    // Store used Coupon Info
    protected function addUsedCoupon($coupon){
        $data = new UsedCoupon();
        $data->user_id = Auth::user()->id;
        $data->coupon_id = $coupon->id;
        $data->useTime = Carbon::now();
        $data->save();
    }

    //User Order List
    public function userOrderList(){
        $orderlist = Order::where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('frontEnd.order.orderList',['orderlist' => $orderlist])->render();
    }


    //place order
    public function placeOrder(Request $request){
        try{
            DB::beginTransaction();

            //Store Order Info  
            $cart = Session::get('cart');  
            $order_id = $this->addNewOrder($request,Auth::user()->id,$cart);

            //Store Order Details
            $this->addOrderDetails($order_id,$cart);

            //Add Shipping Info
            $this->addShippingInfo($order_id,$request);

            //Send OrderConfirmation Notification / Email
            $this->sendNotification($order_id);

            //Remove Cart Items & check Discount Type
            if(Session::has('use_wheel_discount')){
                $use_id = Session::get('use_wheel_discount');
                UsedWheelDiscount::where('id', $use_id)->update(['is_used' => 1]);
            }
            $cart = Session::forget('cart');  
            DB::commit();            
            
            // Payments section
            switch( $request->paymentType ){
                case 'paypal':{
                    return redirect('payment/'.$order_id.'/paypal');
                    break;
                }
                default:{
                     // Redirect Order Confirmation Page
                    return redirect('order/'.$order_id.'/confirm');
                }
            }
            
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
        
    }

    // 
    public function orderDetails($order_id)
    {
        $order = order::where('id', $order_id)->where('user_id', Auth::user()->id)->first();
        return view('frontEnd.order.orderDetails',['order' => $order])->render();
    }

    //Delete Order
    public function orderDelete($order_id)
    {
        try{
            $data = Order::where('id', $order_id)->where('user_id', Auth::user()->id)->delete();
            $output = ['status' =>'success','message'=>'Delete Successfully'];
            return response()->json($output);
        }catch(\Exception $ex){
            $output = ['status' =>'success','message'=>'Something Went Wrong'];
            return response()->json($output);
        }
        
    }

    // Order Status Confirmation
    public function orderConfirmation($id)
    { 
        $order_details = OrderDetails::find($id); 
        return view('frontEnd.order.orderStatusConfirmation',['order_details'=>$order_details]);
    }

    //Add Order Info
    protected function addNewOrder($request,$user_id,$cart){
        $system = SystemInfo::first();
        $data = new Order();
        $data->user_id = $user_id;
        $data->total = $cart->total_price;
        $data->discount = Session::has('discount')?Session::get('discount'):0;
        $data->shippingCost = $system->shippingCost;
        $data->subTotal = ( $cart->total_price + $system->shippingCost ) - $data->discount;
        $data->created_by = Auth::user()->id;
        $data->paymentType = $request->paymentType;
        $data->save();
        return $data->id;
    }

    // Add Order details
    protected function addOrderDetails($order_id,$cart){
        foreach($cart->items as $variation){
            if( $this->adjustStock($variation['id'],$variation['qty']) ){
                $data = new OrderDetails();
                $data->order_id = $order_id;
                $data->product_variation_id = $variation['id'];
                $data->soldQuantity = $variation['qty'];
                $data->sellingPrice = $variation['price'];
                $data->save();
            }
            
        }
    }

    // Adjust Product Stock
    protected function adjustStock($variation_id,$sold_qty){
        $data = ProductVariation::findOrFail($variation_id);
        if($data->currentStock >= $sold_qty){
            $data->currentStock -= $sold_qty;
            $data->sellingCount += $sold_qty;
            $data->save();
            return true;
        }
        return false;
    }

    //Add Shippinf Info
    protected function addShippingInfo($order_id,$request){
        $data =  new Shipping();
        $data->order_id = $order_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->city = $request->city;
        $data->zip = $request->zip;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->phoneNo = $request->phoneNo;
        $data->address = $request->address;
        $data->note = isset($request->note)?$request->note:null;
        $data->save();
    }

    // send Notification 
    protected function sendNotification($order_id){
        SendOrderNotificationEmail::dispatch($order_id)->delay(1);
    }
    
}
