<?php

namespace App\Http\Controllers\BackEnd;

use App\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Management;
use App\Services;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    protected $index;
    /**
     * Client Part Setup
     */
    public function index(){
        $about_us = AboutUs::first();
        return view('backEnd.about.index',['about_us' => $about_us]);
    }

    /**
     * Store Client Info
     */
    public function store(Request $request){
        $data = AboutUs::find($request->id);
        if( empty($data->id)){
            $data = new AboutUs();
        }
        $data->text = $request->text;
        $data->image = $this->UploadImage($request, 'image', $this->contentImage,null,250, $data->image);
        $data->save();
        $output = ['status' => 'success','message' => 'Save Successfully',];
        Return response()->json($output);
    }

    /**
     * Get All Services
     */

    public function serviceList(Request $request){
        if($request->ajax()){
            $this->index= 0;
            $data = Services::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->editColumn('image',function($row){
                return '<img src="'.asset($row->image).'" width="80" >';
            })
            ->editColumn('link',function($row){
                return '<a href="'.$row->link.'" target="_blank">link</a>';
            })
            ->addColumn('action',function($row){
                $li = '<a href="'.url('about/service/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('about/service/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->RawColumns(['image','action','link','text'])
            ->make(true);
        }
    }


    /**
     *  Create Service List 
     * 
     */
    public function createService(){
        return view('backEnd.about.partial.createService')->render();
    }

    /**
     * Save or Update 
     * Service List
     */
    public function serviceStore(Request $request){
        try{
            if($request->id == 0){
                $data = new Services();
            }else{
                $data = Services::findOrFail($request->id);
            }
            $data->heading = $request->heading;
            $data->text = $request->text;
            $data->link = $request->link;
            $data->image    = $this->UploadImage($request, 'image', $this->contentImage, null, 150, $data->image);
            $data->save();
            $output = ['status' => 'success','message' => 'Save Successfully','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }catch(Exception $ex){
            $output = ['status' => 'error','message' => 'Something went Wrong','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }
    }

    /**
     * Edit Service List Content
     */
    public function editServiceList($id){
        $data = Services::findOrFail($id);
        return view('backEnd.about.partial.createService',['data'=>$data])->render();
    }

    /**
     * Delete Service List 
     */
    public function deleteServiceList($id){
        $data = Services::findOrFail($id);
        $this->RemoveFile($data->image);
        $data->delete();
        $output = ['status' => 'success','message' => 'Delete Successfully','table' => 1, ];
        Return response()->json($output);
    }

    /**
     * Management
     */
    public function management(Request $request){
        if($request->ajax()){
            $this->index= 0;
            $data = Management::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
                $this->index++;
                return $this->index;
            })
            ->editColumn('image',function($row){
                return '<img src="'.asset($row->image).'" width="80" >';
            })            
            ->addColumn('action',function($row){
                $li = '<a href="'.url('about/management/edit/'.$row->id).'" class="ajax-click-page btn btn-info btn-sm">Edit</a> &nbsp; ';
                $li .= '<a href="'.url('about/management/delete/'.$row->id).'" class="ajax-click btn btn-danger btn-sm" >Delete</a>';
                return $li;
            })
            ->RawColumns(['image','action','link','text'])
            ->make(true);
        }
        return view('backEnd.about.managementIndex');
    }

    /**
     *  Create Client List 
     * 
     */
    public function createManagement(){
        return view('backEnd.about.partial.createManagement')->render();
    }

    /**
     * Save or Update 
     * Management List
     */
    public function storeManagement(Request $request){
        try{
            if($request->id == 0){
                $data = new Management();
            }else{
                $data = Management::findOrFail($request->id);
            }
            $data->name = $request->name;
            $data->text = $request->text;
            $data->image    = $this->UploadImage($request, 'image', $this->contentImage, null, 420, $data->image);
            $data->save();
            $output = ['status' => 'success','message' => 'Save Successfully','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }catch(Exception $ex){
            $output = ['status' => 'error','message' => 'Something went Wrong','table' => 1, 'modal'=>1 ];
            Return response()->json($output);
        }
    }

    /**
     * Edit Management List Content
     */
    public function editManagement($id){
        $data = Management::findOrFail($id);
        return view('backEnd.about.partial.createManagement',['data'=>$data])->render();
    }

    /**
     * Delete Management List Content
     */
    public function deleteManagement($id){
        $data = Management::findOrFail($id);
        $this->RemoveFile($data->image);
        $data->delete();
        $output = ['status' => 'success','message' => 'Delete Successfully','table' => 1, ];
        Return response()->json($output);
    }
}
