<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductReview;
use Yajra\DataTables\DataTables;
use Auth;
use DB;
use App\ProductVariation;
use Exception;

class ProductController extends Controller
{
    protected $index;
    
    // Index Function
    public function index(Request $request) {        
        if($request->ajax()){
            $this->index = 0;
            $data = DB::table('products')
                    ->leftjoin('categories','categories.id','=','products.categoryId')
                    ->where('products.is_delete','=',0)
                    ->select('products.*','categories.categoryName')->orderBy('position','ASC')->get();
            return DataTables::of($data)
                    ->addColumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->editColumn('publicationStatus',function($data){
                        return $data->publicationStatus ==1?'Published':'Unpublished';
                    })->editColumn('image',function($data){           
                        return '<img src="'.asset($data->image).'" width="60px" height="45">';
                    })->addColumn('action',function($data){
                        return '<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="'.url('product/'.$data->id.'/view-details').'" > <span class="fa fa-eye"></span> View Details </a>
                            <a class="dropdown-item" href="'.url('product/'.$data->id.'/edit').'" > <span class="fa fa-edit"></span> Edit </a>
                            <a class="dropdown-item ajax-click" onclick="return confirm(\'Are you sure to delete?\')" href="'.url('product/'.$data->id.'/delete').'" > <i class="fas fa-trash-alt"></i> Delete </a>
                        </div>
                      </div>';                         
                    })
                    ->RawColumns(['image','action'])
                    ->make(true);
        }        
        return view('backEnd.product.index'); 
    }
    
    //Show Product Create Page
    public function create() {
        $categoris = Category:: where('is_delete',0)->orderBy('position','ASC')->get();
        return view('backEnd.product.partial.productCreate',['allCategories' =>$categoris]); 
    }
    
    // Save Product Info
    public function store(Request $request){   
        $this->validate($request,[
            'image' => ['required','image','mimes:jpeg,png,jpg'],
        ]);     
        try{
            DB::beginTransaction();
            $data = new Product();
            $this->SaveProductInfo($data, $request);
            DB::commit();
            return back()->with('success','Product Add Successfully');            
        } catch (Exception $ex) {            
            DB::rollback();
            return response()->with('error','Something went wrong');
        }
        
    }
    
    // Insert or Update Product Info
    protected function SaveProductInfo($data,$request) {
        $data->productName = $request->productName;
        $data->categoryId = $request->categoryId;
        $data->pageTitle = $request->pageTitle;
        $data->metaTag = $request->metaTag;
        $data->metaDescription = $request->metaDescription;
        $data->subCategoryId = $request->subCategoryId;
        $data->buyPrice = $request->buyPrice;
        $data->sellingPrice = $request->sellingPrice;
        $data->sellingPriceWithDiscount = $request->sellingPriceWithDiscount;
        $data->publicationStatus = $request->publicationStatus;
        $data->description = $request->description;
        $data->position = $request->position;
        $data->video = $request->video;
        $data->create_by = Auth::user()->id;
        $data->image = $this->UploadImage($request,'image', $this->productDir, null, 320 , $data->image);
        $data->image1 = $this->UploadImage($request,'image1', $this->productDir, null, 320 , $data->image1);
        $data->image2 = $this->UploadImage($request,'image2', $this->productDir, null, 320 ,$data->image2);
        $data->image3 = $this->UploadImage($request,'image3', $this->productDir, null, 320 ,$data->image3);
        $data->image4 = $this->UploadImage($request,'image4', $this->productDir, null, 320 ,$data->image4);
        $data->save();
        return $data->id;
    }
    
    //Edit Product
    public function editProduct($id) {
        $data = Product::find($id);
        $categoris = Category:: where('is_delete',0)->orderBy('position','ASC')->get();
        return view('backEnd.product.partial.editProduct',['allCategories' =>$categoris,'data'=>$data]);
    }
    
    //update Product Info
    public function updateProduct(Request $request) {
        try{
            DB::beginTransaction();
            $data = Product::find($request->id);
            $this->SaveProductInfo($data, $request);
            DB::commit();
            return redirect('/product')->with('success','Product Update Successfully');            
        } catch (Exception $ex) {            
            DB::rollback();
            return response()->with('error','Something went wrong');
        }
    }
    
    // Delete Product Info
    public function deleteProduct($id) {
        try{
            $data = Product::findOrFail($id);
            $data->is_delete =1;
            $data->save();
            $output = ['status'=>'success','message'=>'Product Delete Successfully','table'=>1];
            return response()->json($output);
        } catch (\Exception $ex) {
            $output = ['status'=>'error','message'=>'Something went Wrong','table'=>1];
            return response()->json($output);
        }
    }
    
    //Show Delete Product
    public function showDeleteProduct(Request $request) {
        if($request->ajax()){
            $this->index = 0;
            $data = DB::table('products')
                    ->leftjoin('categories','categories.id','=','products.categoryId')
                    ->where('products.is_delete','=',1)
                    ->select('products.*','categories.categoryName')->get();
            return DataTables::of($data)
                    ->addColumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->editColumn('publicationStatus',function($data){
                        return $data->publicationStatus ==1?'Published':'Unpublished';
                    })->editColumn('image',function($data){           
                        return '<img src="'.asset($data->image).'" width="60px" height="45">';
                    })->addColumn('action',function($data){
                        return '<a class="btn btn-danger btn-sm ajax-click" href="'.url('product/'.$data->id.'/restore').'" title="Restore" > <i class="fas fa-reply-all"></i> </a>';                         
                    })
                    ->RawColumns(['image','action'])
                    ->make(true);
        }        
        return view('backEnd.product.deleteProduct');
    }
    
    //Restore Product
    public function restoreProduct($id) {
        try{
            $data = Product::find($id);
            $data->is_delete = 0;
            $data->save();
            $output = ['status'=>'success','message'=>'Restore Successfully','table'=>1];
            return response()->json($output);            
        } catch (\Exception $ex) {
            $output = ['status'=>'error','message'=>'Something went Wrong','table'=>1];
            return response()->json($output);
        }
    }
    
    // View Product Details
    public function viewProductDetails($id) {
        $data = DB::table('products')
                ->leftjoin('product_variations as pv','pv.product_id','=','products.id')
                ->leftjoin('categories','categories.id','=','products.categoryId')
                ->leftjoin('sub_categories as sc','sc.id','=','products.subCategoryId')
                ->where('products.id','=',$id)
                ->select('products.*','pv.*','categories.categoryName','sc.subCategoryName')->first();
        return view('backEnd.product.partial.ProductDetails',['product'=>$data]);
    }



    /*-------------------------------------------------------------------------
    | Product Stock Part
    *-------------------------------------------------------------------------*/

    public function stockIndex(Request $request){ 

        if($request->ajax()){
            $this->index = 0;
            $data = db::table('product_variations as PV')
                    ->join('products','products.id','=','PV.product_id')
                    ->where('PV.deleted_at','=',null)
                    ->select('PV.*','products.productName')->get();
            return DataTables::of($data)
                ->addColumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('image',function($data){
                    return '<img src="'.url($data->image).'" width="60">';
                })
                ->addColumn('productName',function($data){
                    return  $data->productName;
                })
                ->addColumn('action',function($data){
                    return '<div class="btn-group">
                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item btn" onclick="editStock('.$data->id.')" > <span class="fa fa-edit"></span> Edit </button>
                        <button class="dropdown-item btn text-danger" onclick="deleteStock('.$data->id.')" > <span class="fa fa-trash-alt"></span> Delete </button>                        
                    </div>
                  </div>';
                })
                ->RawColumns(['image','action'])
                ->make(true);
        }
        $products = Product::where('is_delete',0)->where('publicationStatus',1)->orderBy('id','DESC')->get();
        return view('backEnd.product.productStock',['products' => $products]);
    }

    public function addStock(Request $request){  
        
        //Check Validation
        if( empty($request->id) ){
            $p_variation = new ProductVariation();
            if( !$this->validateStock($request) ){
                return response()->json('This Information is already exists. you can edit this Stock info');
            }
        }else{
            $p_variation = ProductVariation::findOrfail($request->id);
        }
        try{
            DB::beginTransaction();           
            
            $p_variation->product_id = $request->product_id;
            $p_variation->productSize = $request->size;
            $p_variation->productColor = $request->color;
            $p_variation->currentStock = $request->stock;
            $p_variation->image = $this->UploadImage($request,'image', $this->productImageDir, 160, '', $p_variation->image);
            $p_variation->save();            
            DB::commit();
            return response()->json('success');
        }catch(Exception $e){
            DB::rollback();
            return response()->json('Something went Wrong');
        }
        
    }

    // Validate Stock
    protected function validateStock($request){
        $data = ProductVariation::where('product_id',$request->product_id)
                ->where('productSize','=',$request->size)
                ->where('productColor','=',$request->color)->first();
        if( empty($data) ){
            return true;
        }else{
            return false;
        }
    }

    public function deleteStock($id){
        $data = ProductVariation::findOrFail($id);
        $data->delete();
        return response()->json('Delete Successfully');
    }

    public function editStock($id){
        $data = ProductVariation::findOrFail($id);
        $products = Product::where('is_delete',0)->where('publicationStatus',1)->orderBy('id','DESC')->get();
        return view('backEnd.product.partial.editProductStock',['data' => $data,'products' => $products])->render();
    }

    //Product Review
    public function productReview(Request $request)
    {
        if($request->ajax()){
            $this->index = 0;
            $data = ProductReview::all();
            return DataTables::of($data)
                    ->addColumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->addColumn('productName',function($data){
                        return $data->product->productName;
                    })
                    ->editColumn('publicationStatus',function($data){
                        return $data->publicationStatus ==1?'<span class="badge badge-success font-13">Published</span>':'<span class="badge badge-warning font-13">Unpublished</span>';
                    })->editColumn('image',function($data){           
                        return '<img src="'.asset($data->product->image).'" width="60px" height="45">';
                    })->addColumn('action',function($data){
                        return '<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">                            
                            <a class="dropdown-item ajax-click-page" href="'.url('product/review/'.$data->id.'/edit').'" > <span class="fa fa-edit"></span> Edit </a>
                            <a class="dropdown-item ajax-click" onclick="return confirm(\'Are you sure to delete?\')" href="'.url('product/'.$data->id.'/delete').'" > <i class="fas fa-trash-alt"></i> Delete </a>
                        </div>
                      </div>';                         
                    })
                    ->RawColumns(['image','action','publicationStatus'])
                    ->make(true);
        }        
        return view('backEnd.product.productReview');
    }

    // Edit Review
    public function editReview($id){
        $review = ProductReview::find($id);
        return view('backEnd.product.partial.editReview',['review'=>$review])->render();
        
    }

    //update Review
    public function updateReview(Request $request)
    {
        $data = ProductReview::find($request->id);
        $data ->rating = $request->rating;
        $data->review = $request->review;
        $data->publicationStatus = $request->publicationStatus;
        $data->save();
        $output = [
            'status' => 'success', 'message' => 'Information Update Successfully',
        ];
        return response()->json($output);
    }

    //Delete Review
    public function deleteReview($id){
        $data = ProductReview::findOrFail($id);
        $data->delete();
        $output = [
            'status' => 'success', 'message' => 'Information Update Successfully','table'=>1,
        ];
        return response()->json($output);
    }


}
