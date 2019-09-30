<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Category;
use App\SubCategory;
use DB;
use Exception;

class CategoryController extends Controller
{
   
    
    protected $index;

    /*
     * -------------------------------------------------------------------------
     * 
     * Category Part
     * 
     * -------------------------------------------------------------------------
     */
    
    // Show All Category
    public function showCategory(Request $request) {
        if($request->ajax()){
            $this->index = 0;
            $data = Category:: where('is_delete',0)->orderBy('position','ASC')->get();
            return DataTables::of($data)
                    ->addcolumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->addColumn('action',function($data){
                        $text ='<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" onclick="editCategory('.$data->id.')" > <span class="fa fa-edit"></span> Edit </a>
                            <a class="dropdown-item" onclick="return confirm(\'Are you sure to delete?\')" href="'.url('category/'.$data->id.'/delete').'" > <i class="fas fa-trash-alt"></i> Delete </a>
                        </div>
                      </div>';
                        return $text;                        
                    })
                    ->editColumn('categoryImage',function($data){
                        return '<img src="'.asset($data->categoryImage).'" width="40" height="40" >';
                    })
                    ->editColumn('haveSubCategory',function($data){
                        return $data->haveSubCategory == 1?'Yes':'No';
                    })
                    ->editColumn('publicationStatus',function($data){
                        return $data->publicationStatus ==1?'Published':'Unpublished';
                    })
                    ->RawColumns(['action','categoryImage'])
                    ->make(true);
        }
        return view('backEnd.category.category');
    }
    
    public function storeCategory(Request $request)
    {
        try {
            DB::beginTransaction();
            if(empty($request->id)){
                $category = new Category();
            }else{
                $category =  Category::find($request->id);
            }            
            $category->categoryName = $request->categoryName;
            $category->pageTitle = $request->pageTitle;
            $category->metaTag = $request->metaTag;
            $category->metaDescription = $request->metaDescription;
            $category->haveSubCategory = $request->haveSubCategory;
            $category->publicationStatus = $request->publicationStatus;
            $category->position = $request->position;
            $category->categoryImage = $this->UploadImage($request, 'categoryImage', $this->categoryDir, 300, null, $category->categoryImage);
            $category->save();
            DB::commit();
            return response()->json('success');               
        } catch (Exception $ex) {            
            DB::rollback();
            return response()->json('error');    
        }
    }
    
    //Edit Category
    public function editCategory(Request $request)
    {
        $data = Category::where('id',$request->id)->first();
        return view('backEnd.category.partial.editCategory',['data'=>$data])->render();
    }
    
    //Delete Category
    public function deleteCategory($id) {
        try{
            DB::beginTransaction();
            $category =  Category::find($id);
            $category->is_delete  = 1;
            $this->RemoveFile($category->categoryImage);
            $category->save();
            DB::Commit();
            return back()->with('success','Save Successfully');            
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
    }
    
    /*
     * -------------------------------------------------------------------------
     * 
     * Sub-category Part
     * 
     * -------------------------------------------------------------------------
     */
    public function showSubCategory(Request $request) {
        $categoris = Category:: where('publicationStatus',1)
                ->where('haveSubCategory',1)->where('is_delete',0)
                ->orderBy('position','ASC')->get();
        $this->index = 0;
        if($request->ajax()){
            $data = DB::table('sub_categories')
                    ->leftjoin('categories','categories.id','=','sub_categories.categoryId')
                    ->where('sub_categories.is_delete',0)->orderBy('position','ASC')
                    ->select('sub_categories.*','categories.categoryName')->get();
            
            return DataTables::of($data)
                    ->addcolumn('index',function(){
                        $this->index++;
                        return $this->index;
                    })
                    ->addColumn('action',function($data){
                        $text ='<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick="editSubCategory('.$data->id.')" > <span class="fa fa-edit"></span> Edit </a>
                            <a class="dropdown-item" onclick="return confirm(\'Are you sure to delete?\')" href="'.url('sub-category/'.$data->id.'/delete').'" > <i class="fas fa-trash-alt"></i> Delete </a>
                        </div>
                      </div>';
                        return $text;                        
                    })
                    ->editColumn('subCategoryImage',function($data){
                        return '<img src="'.asset($data->subCategoryImage).'" width="40" height="40" >';
                    })
                    ->editColumn('publicationStatus',function($data){
                        return $data->publicationStatus ==1?'Published':'Unpublished';
                    })
                    ->RawColumns(['action','subCategoryImage'])
                    ->make(true);
        }
        
        return view('backEnd.category.subCategory',[ 'allCategories' => $categoris ]);
    }
    
    //Save Sub Category Information
    public function storeSubCategory(Request $request) {
        try {
            DB::beginTransaction();
            if(empty($request->id)){
                $data = new SubCategory();
            }else{
                $data =  SubCategory::find($request->id);
            } 
            $data->subCategoryName = $request->subCategoryName;
            $data->pageTitle = $request->pageTitle;
            $data->metaTag = $request->metaTag;
            $data->metaDescription = $request->metaDescription;
            $data->categoryId = $request->categoryId;
            $data->publicationStatus = $request->publicationStatus;
            $data->position = $request->position;
            $data->subCategoryImage = $this->UploadImage($request, 'subCategoryImage', $this->categoryDir, 268, 185, $data->subCategoryImage);
            $data->save();
            DB::commit();            
            return response()->json('success');          
        } catch (Exception $ex) {            
            DB::rollback();
            return response()->json('error'); 
        }
    }
    
    // Edit SubCategory
    public function EditSubCategory($id) {
        $data = SubCategory::where('id',$id)->first();
        $categoris = Category:: where('publicationStatus',1)
                ->where('haveSubCategory',1)->where('is_delete',0)
                ->orderBy('position','ASC')->get();
        return view('backEnd.category.partial.editSubCategory',['allCategories' =>$categoris,'subCategories'=>$data])->render();
    }
    
    //Delete SubCategory
    public function DeleteSubCategory($id) {
        try{
            DB::beginTransaction();
            $data =  SubCategory::find($id);
            $data->is_delete  = 1;
            $this->RemoveFile($data->subCategoryImage);
            $data->save();
            DB::Commit();
            return back()->with('success','Save Successfully');            
        } catch (Exception $ex) {
            DB::rollback();
            return back()->with('error','Something Went Wrong');
        }
    }
    
    //Get SubCategory
    public function getSubCategory($id) {
        $subCategory = DB::table('categories')
                ->join('sub_categories','sub_categories.categoryId','=','categories.id')
                ->where('categories.id','=',$id)
                ->where('sub_categories.publicationStatus','=',1)->get();
        
        $option ='<option selected value=""> Select Sub Category</option>';
        foreach($subCategory as $menu)
        {
            $option =$option.'<option value="'.$menu->id.'">'.$menu->subCategoryName.'</option>';
        }     
        return response()->json($option);  
    }
    
}
