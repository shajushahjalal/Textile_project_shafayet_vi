<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
use App\Product;
use App\ProductReview;
use DB;
use Illuminate\Support\Facades\Validator;
use App\ProductVariation;
use App\SubCategory;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    // View Product Details
    public function viewProductDetails($pnm){
        $product = Product::where('productName','=',$pnm)->first();
        if( !empty($product) ){
            $related_products = Product::where('products.publicationStatus',1)
                ->where('categoryId',$product->categoryId)->orderBy('id','DESC')->paginate(12);
            return view('frontEnd.product.productDetails',['product' => $product,'products'=>$related_products]);
        }else{
            abort(404);
        }    	
    }
    
    //View All Product From Category and SubCategory
    public function showAllProducts($cnm = null, $scnm = null) {        
        $products = DB::table('products')
            ->leftjoin('categories','categories.id','=','products.categoryId')        
            ->where('products.publicationStatus',1)->where('products.is_delete',0);
            if(!empty($cnm)){
                $products->where('categories.categoryName','=',$cnm); 
                $seo_data =  Category::where('categoryName','=',$cnm)->first(); 
            }
            if(!empty($scnm)){
                $products->leftjoin('sub_categories','sub_categories.id','=','products.subCategoryId');
                $products->where('sub_categories.subCategoryName','=',$scnm);  
                $seo_data =  SubCategory::where('subCategoryName','=',$scnm)->first();
            }
        $products = $products->select('products.*')->paginate(40);
        $recentProducts = Product::where('products.publicationStatus',1)->orderBy('id','DESC')->paginate(10);

        $title = $cnm .( !empty($scnm)?' | '.$scnm:'');
        return view('frontEnd.product.viewProducts',['products'=>$products,'title' => $title,'seo_data' => $seo_data,'recentProducts' => $recentProducts]);
    }

    //get Product Quantity
    public function getQuantity(Request $request){
        $validation = Validator::make($request->all(),[
            'color' => 'required', 'variation_id' => 'required|numeric', 'size' =>'required'
        ]);
        if ($validation->fails()) {
            return response()->json('fail');
        }

        $data = ProductVariation::where('id',$request->variation_id)->where('productColor','=',$request->color)
                ->where('productSize','=',$request->size)->first();
        return response()->json($data);
    }

    // Add Product Review
    /*
    public function addReview(Request $request){  
        $order_details = OrderDetails::where('id',$request->order_details_id)->where('is_review',0)
        ->whereHas('order',function($query){
            $query->whereHas('user',function($qry){
                $qry->where('user_id',Auth::user()->id);
            });
        })->first();  
        try{
            DB::beginTransaction();
            if( !empty($request->rating) ){
                $data = new ProductReview();
                $data->rating       = $request->rating;
                $data->user_id      = Auth::user()->id;
                $data->product_id   = $order_details->productVariation->product->id;
                $data->review       = $request->review;
                $data->publicationStatus = 0;
                $data->save();
                OrderDetails::where('id',$request->order_details_id)->update([
                    'status'        => $request->status, 
                    'is_received'   => $request->status == 'delivered' ? 1 : 0,
                    'is_review'     => 1,
                ]);                 
                $output = ['status'=>'success','message'=>'Review add Successfully','call_method'=> 'getOrder()'];           
            }else{
                OrderDetails::where('id',$request->order_details_id)->update([
                    'status'        => $request->status, 
                    'is_received'   => $request->status == 'delivered' ? 1 : 0,
                ]);
                $output = ['status'=>'success','message'=>'Information Add Successfully','call_method'=> 'getOrder()'];
            }
            
            if($request->status == 'delivered'){
                Order::where('id',$order_details->order->id)->update(['orderStatus' => $request->status]);
            }                

            DB::commit();
            return response()->json($output);            

        }catch(\Exception $ex){
            DB::rollback();
            $output = ['status'=>'error','message'=>'Something Went Wrong'];
            return response()->json($output);     
        }
               
        
    }
    */

    // Search Product
    public function searchProduct(Request $request){
        $search = $request->search;
        $products = DB::table('products')
            ->leftjoin('categories','categories.id','=','products.categoryId')    
            ->leftjoin('product_reviews','products.id','product_reviews.id')      
            ->leftjoin('sub_categories','sub_categories.id','=','products.subCategoryId')  
            ->where('products.publicationStatus',1)->where('products.is_delete',0)
            ->where(function($query)use($search){
                $query->orWhere('productName','Like','%'.$search.'%')
                ->orWhere('categories.categoryName','Like','%'.$search.'%')
                ->orWhere('sub_categories.subCategoryName','Like','%'.$search.'%');
            })  
            ->select('products.*', DB::Raw('avg(product_reviews.rating) as rating'),
            DB::Raw('count(product_reviews.id) as total_review') )->groupBy('products.id')->paginate(40);
            $title = $search;
            return view('frontEnd.product.viewProducts',['products'=>$products,'title' => $title]);
    }
}
