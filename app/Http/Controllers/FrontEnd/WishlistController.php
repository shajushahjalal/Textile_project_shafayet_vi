<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WishList;
use Exception;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show wishlist
    public function index(){
        $data = WishList::where('user_id', Auth::user()->id)->get();
        return view('frontEnd.wishlist.index',['datas' => $data])->render();
    }

    // Store Wishlist
    public function store($product_id)
    {
        try{
            $exists = WishList::where('user_id', Auth::user()->id)->where('product_id',$product_id)->first();
            if(!empty($exists)){
                $output = ['status' =>'error','message'=>'This Product is already exists in your wishlish'];
                return response()->json($output);
            }
            $data = new WishList();
            $data->user_id = Auth::user()->id;
            $data->product_id = $product_id;
            $data->save();

            $output = ['status' =>'success','message'=>'Product Add to Wishlist Successfully'];
            return response()->json($output);

        }catch(\Exception $ex){
            $output = ['status' =>'error','message'=>'Something Went Wrong'];
            return response()->json($output);
        }
    }

    public function remove($product_id){
        $data = WishList::where('user_id', Auth::user()->id)->where('product_id',$product_id)->delete();
        $output = ['status' =>'success','message'=>'Delete From Wishlist, Successfully'];
        return response()->json($output);
    }

}
