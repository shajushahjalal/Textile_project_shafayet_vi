<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use App\CartStore;
use App\ProductVariation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\UsedWheelDiscount;
use Exception;

class CartController extends Controller
{
    // Show Existing Cart Info
    public function index() {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('frontEnd.cart.cart',['cart' => $cart ]);
    }
    
    //Show Checkout Page
    public function checkout() {        
        if(Session::has('cart')){
            $discount = UsedWheelDiscount::where('email',Auth::user()->email)->where('is_used',0)->first();
            if( !empty($discount) ){
                if($discount->discountType == '%'){
                    $get_discount = Session::get('cart')->total_price * ($discount->discount / 100);
                    Session::put('discount',$get_discount);
                    Session::put('use_wheel_discount',$discount->id);
                }
            }
            $countries = Country::all();
            return view('frontEnd.cart.checkout',['countries'=>$countries]);
        }else{
            return redirect('/')->with('error','Your Shopping Cart is Empty');
        }        
    }

    //Add Cart
    public function addCart(Request $request) {
        $validate = Validator::make($request->all(),[
            'qty' => 'required',
            'productColor' => 'required',
            'productSize'  => 'required',
        ]);

        $productVariation = ProductVariation::where('id', $request->variation_id )
            ->where('currentStock', '>=', $request->qty)
            ->where('productColor', '=', $request->productColor)
            ->where('productSize', '=', $request->productSize )->first();

        if(  $validate->fails() || empty($productVariation) ){
            return back()->with('error','Sorry... you trying to direct access');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;        
        $cart = new Cart($oldCart);        
        
        $cart->addCart($productVariation,$productVariation->id,$request->qty);
        $request->session()->put('cart', $cart);
        return redirect('cart/view');
    }
            
    // Remove many quantity of an item
    public function removeItem(Request $request,$id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cartItem = $oldCart->items[$id];
        $itemPrice = $cartItem['price'];
        $itemQty = $cartItem['qty'];
        $oldCart->total_price = $oldCart->total_price -($itemPrice*$itemQty);
        $oldCart->total_qty = $oldCart->total_qty - $itemQty;
        unset($oldCart->items[$id]);
        $request->session()->put('cart', $oldCart); 
        return redirect()->back();
    }
    
    
    public function updateCart(Request $request) {
        $validate = Validator::make($request->all(),[
            'qty' => 'required',
            'variation_id' => 'required'
        ]);
        $stockInfo = ProductVariation::findOrFail($request->variation_id);
        if( $request->qty > $stockInfo->currentStock){
            return back()->with('error','you can add height '.$stockInfo->currentStock . ' Items');
        }
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cartItem = $oldCart->items[$request->variation_id];
        $itemPrice = $cartItem['price'];
        $diff = $request->qty - $cartItem['qty'];
        if( $diff != 0){
            $oldCart->total_price +=  $itemPrice * $diff;
            $oldCart->total_qty += $diff;
            $oldCart->items[$request->variation_id]['qty'] += $diff;
        }
        $request->session()->put('cart', $oldCart); 
        return redirect()->back();
    }

    // Store Cart Info into Database
    public function storeInDB(Request $request)
    {        
        try{
            $Cart = Session::has('cart') ? Session::get('cart') : null;
            foreach($Cart->items as $item){
                $data = new CartStore();
                $data->product_variations_id = $item['id'];
                $data->user_id = Auth::user()->id;
                $data->qty = $item['qty'];
                $data->save();
            }
            $output = [
                'status' => 'success',
                'message' => 'Cart Info Store Successfully',
            ];
            return Response()->json($output);
        }catch(\Exception $e){
            $output = [
                'status' => 'error',
                'message' => 'Something went wrong',
            ];
            return Response()->json($output);
        }
        
    }
    
}
