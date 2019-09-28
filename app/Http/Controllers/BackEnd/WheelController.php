<?php

namespace App\Http\Controllers\BackEnd;

use App\DiscountWheel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WheelConfig;
use Yajra\DataTables\Facades\DataTables;

class WheelController extends Controller
{
    
    // index
    public function index(Request $request){
        if($request->ajax()){
            $data = DiscountWheel::all();
            return DataTables::of($data)
                ->editColumn('publicationStatus',function($data){
                    return $data->publicationStatus == 1 ?'<label class="label btn-success">Published</label>':'<label class="label btn-warning">Unpublished</label>';
                })
                ->editColumn('value',function($data){
                    return $data->discountType == 0 ? $data->value.'%': $data->value;
                })
                ->addColumn('action', function($data){
                    return '<a href="'.url('wheel/edit/'.$data->id).'" class="edit-wheel" ><i class="far fa-edit"></i> Edit </a>';
                })
                ->RawColumns(['publicationStatus','action'])
                ->make(true);
        }
        $wheelConfig = WheelConfig::first(); 
        return view('backEnd.wheel.index',['wheelConfig' => $wheelConfig ]);
    }

    // Save Wheel Configuration Settings
    public function StoreConfiguration(Request $request)
    {
        if($request->id == 0){
            $data = new WheelConfig();
        }else{
            $data = WheelConfig::find($request->id);
        }
        $data->heading = $request->heading;
        $data->show_time = $request->show_time;
        $data->text = $request->text;
        $data->logo = $this->UploadImage($request,'logo',$this->whileImage,150,80,$data->logo);
        $data->save();
        $output = [ 'status' => 'success','message' => 'Save Successfully'];
        return response()->json($output);
    }

    // Show Configuration create Page
    public function componentCreate()
    {
        return view('backEnd.wheel.partial.createComponent');
    }

    // Component Store
    public function componentStore(Request $request)
    {
        if($request->id == 0){
            $data = new DiscountWheel();            
        }else{
            $data = DiscountWheel::find($request->id);    
        }
        $data ->text = $request->text;
        $data->value = $request->value;
        $data->discountType = $request->discountType;
        $data->message = $request->message;
        $data->publicationStatus = $request->publicationStatus;
        $data->save();
        $output = [ 'status' => 'success','message' => 'Save Successfully'];
        return response()->json($output);
    }

    // Edit Component
    public function editComponent($id)
    {
        $data = DiscountWheel::findOrFail($id);
        return view('backEnd.wheel.partial.createComponent',['data' => $data]);
    }
}
