<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeatureProduct;
use App\FileUpload;
use DB;

class FeatureProductController extends Controller
{
    use FileUpload;
    
    //Show Index Page
    public function index() {
        $datas = FeatureProduct::orderBy('position','ASC')->get();
        return view('backEnd.featureProduct.index',['fproducts'=>$datas]);
    }
    
    //Save Or Update Social Media info
    public function store(Request $request) {
        
        if($request->id == 0){            
            $data = new FeatureProduct();
        }else{
            $data = FeatureProduct::find($request->id);
        }        
        try{
            DB::beginTransaction();            
            $data->buttonText = $request->buttonText;
            $data->link = $request->link;
            $data->position = $request->position;
            $data->publicationStatus = $request->publicationStatus;
            $data->image = $this->UploadImage($request, 'image', $this->featureImageDir, 360, 480, $data->image);
            $data->save();
            DB::commit(); 
            return redirect('/feature-products')->with('success','Add Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
    }
    
    //Edit Social Media info
    public function edit($id) {
        $data = FeatureProduct::find($id);
        $datas = FeatureProduct::orderBy('position','ASC')->get();
        return view('backEnd.featureProduct.index',['fproducts'=>$datas,'data'=>$data]);
    }
    
    //Delete Social Media Icon
    public function delete($id) {
        $data = FeatureProduct::find($id);
        $this->RemoveFile($data->image);
        $data->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
