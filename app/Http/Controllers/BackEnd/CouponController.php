<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\UsedCoupon;
use App\SystemInfo;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $index;

    // Show Coupon page
    public function index(Request $request){
        if($request->ajax()){
            $system = SystemInfo::find(1);
            $data = Coupon::all();
            return DataTables::of($data)
                ->addColumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('startDate',function($data)use($system){
                    return Carbon::parse($data->startDate)->format($system->dateFormat);
                })
                ->editColumn('expireDate',function($data)use($system){
                    return Carbon::parse($data->expireDate)->format($system->dateFormat);
                })
                ->editColumn('create_by',function($data){
                    return $data->user->name;
                })
                ->addColumn('action',function($data){
                    $text ='<div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:" onclick="editCoupon('.$data->id.')" > <span class="fa fa-edit"></span> Edit </a>
                            <a class="dropdown-item" href="javascript:" onclick="deleteCoupon('.$data->id.')" > <i class="fas fa-trash-alt"></i> Delete </a>
                        </div>
                    </div>';
                    return $text; 
                })
                ->RawColumns(['action'])
                ->make(true);
        }
        return view('backEnd.coupon.coupon');
    }

    //Coupon creae
    public function create(){
        return view('backEnd.coupon.create')->render();
    }

    // Coupon Store
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'couponCode' => 'required', 'couponPrice' => 'required',
            'startDate' => 'required', 'expireDate' => 'required',
        ]);
        if($validate->fails()){
            $error = $validate->errors()->first();
            $output = ['status'=>'error','message'=>$error];
            return response()->json($output);
        }
        if( isset($request->id) && !empty($request->id) ){
            $data = Coupon::findOrFail($request->id);            
        }else{
            $data = new Coupon();
        }
        $data->couponCode = strtoupper($request->couponCode);
        $data->couponPrice = $request->couponPrice;
        $data->startDate = $request->startDate;
        $data->expireDate = $request->expireDate;
        $data->status = $request->status; 
        $data->create_by = Auth::user()->id; 
        $data->save();
        $output = ['status'=>'success','message'=>'Coupon Info Add Successfully'];
        return response()->json($output);
    }

    // Coupon edit
    public function edit($id){
        $data = Coupon::findOrFail($id);
        return view('backEnd.coupon.create',['data'=>$data])->render();
    }

    // Coupon delete
    public function delete($id){
        $data = Coupon::find($id);
        if(!empty($data)){
            $data->delete();
            return response()->json('success');
        }
        return response()->json('something went wrong');
    }

    // show Deleted Coupon 
    public function showDeleteCoupon(Request $request){
        if($request->ajax()){
            $system = SystemInfo::find(1);
            $data = Coupon::onlyTrashed()->get();
            return DataTables::of($data)
                ->addColumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('startDate',function($data)use($system){
                    return Carbon::parse($data->startDate)->format($system->dateFormat);
                })
                ->editColumn('expireDate',function($data)use($system){
                    return Carbon::parse($data->expireDate)->format($system->dateFormat);
                })
                ->editColumn('create_by',function($data){
                    return $data->user->name;
                })
                ->addColumn('action',function($data){                    
                    return '<a href="javascript:" onclick="restoreCoupon('.$data->id.')" class="btn btn-danger btn-sm" title="Restore"> <i class="fas fa-undo"></i> </a>';
                })
                ->RawColumns(['action'])
                ->make(true);
        }
        return view('backEnd.coupon.showDeletedCoupon');
    }

     // Restore Deleted Coupon 
     public function restoreCoupon($id){
        $data = Coupon::withTrashed()->findOrfail($id);
        $data->restore();
        return response()->json('success');
    }

    //Show Used Coupon
    public function showUsedCoupon(Request $request){
        if($request->ajax()){
            $system = SystemInfo::find(1);
            $data = UsedCoupon::all();
            return DataTables::of($data)
                ->addColumn('index',function(){
                    $this->index++;
                    return $this->index;
                })
                ->editColumn('useTime',function($data)use($system){
                    return Carbon::parse($data->useTime)->format($system->dateFormat .' H:i:s');
                })
                ->editColumn('user_id',function($data){
                    return $data->user->name;
                })
                ->editColumn('coupon_id',function($data){
                    return $data->coupon->couponCode;
                })
                ->addColumn('couponPrice',function($data){
                    return $data->coupon->couponPrice;
                })
                ->make(true);
        }
        return view('backEnd.coupon.showUsedCoupon');
    }

}

