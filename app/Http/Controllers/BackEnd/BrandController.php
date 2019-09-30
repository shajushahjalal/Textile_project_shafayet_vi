<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branding;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    protected $index;
    // Show Branding Page
    public function index(Request $request){        
        if($request->ajax()){
            $this->index = 0;
            $data = Branding::orderBy('position','ASC')->get();
            return DataTables::of($data)
                ->addColumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('image',function($data){
                    return '<img src="'.asset($data->image).'" width="80" >';
                })
                ->editColumn('publicationStatus',function($data){
                    return $data->publicationStatus == 1 ? 'Published':'unpublished';
                })
                ->editColumn('link',function($data){
                    return '<a href="'.$data->link.'" target="_blank">link</a>';
                })
                ->addColumn('action',function($data){
                    $text ='<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:" onclick="editBrand('.$data->id.')" > <span class="fa fa-edit"></span> Edit </a>
                            <!--<a class="dropdown-item" href="javascript:" onclick="deleteBrand('.$data->id.')" > <i class="fas fa-trash-alt"></i> Delete </a>-->
                        </div>
                    </div>';
                    return $text; 
                })
                ->RawColumns(['image','action','link'])
                ->make(true);
        }
        return view('backEnd.brand.index');
    }

    // Show Create Page
    public function create(){
        return view('backEnd.brand.partial.create')->render();
    }

    //Store Brand info
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required', 'link' => 'required',
            'position' => 'required', 'publicationStatus' => 'required',
        ]);
        if($validate->fails()){
            $error = $validate->errors()->first();
            $output = ['status'=>'error','message'=>$error];
            return response()->json($output);
        }
        if( isset($request->id) && !empty($request->id) ){
            $data = Branding::findOrFail($request->id);            
        }else{
            $data = new Branding();
        }
        $data->name = $request->name;
        $data->link = $request->link;
        $data->position = $request->position;
        $data->publicationStatus = $request->publicationStatus;        
        $data->image = $this->UploadImage($request,'image',$this->brandingImage,null,'380',$data->image);
        $data->save();
        $output = ['status'=>'success','message'=>'Brand Information Add Successfully'];
        return response()->json($output);
    }

    // Edit Brand info
    public function edit($id){
        $data = Branding::findOrFail($id);
        return view('backEnd.brand.partial.create',['data'=>$data])->render(); 
    }


}
