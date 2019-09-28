<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\ProductVariation;
use App\SystemInfo;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    protected $index;
    // Stock Report
    public function stockReport (Request $request)
    {        
        if($request->ajax()){
            $this->index = 0;
            $data = ProductVariation::orderBy('product_id')->get();
            return DataTables::of($data)
            ->addColumn('index',function(){
               // $this->index++;
                return ++$this->index;
            })
            ->editColumn('image',function($data){
                return '<img src="'.asset($data->image).'" width="80">';
            })
            ->addColumn('productName',function($data){
                return $data->product->productName;
            })
            ->rawColumns(['image'])
            ->make(true);
        }
        return view('backEnd.report.stockReport');
    }

    // Sale Report
    public function saleReport(Request $request){
        if($request->ajax()){
            $system = SystemInfo::first();
            $this->index = 0;
            $data = Order::all();
            return DataTables::of($data)
            ->addColumn('index',function(){
               // $this->index++;
                return ++$this->index;
            })
            ->addColumn('date',function($data)use($system){
                return Carbon::parse($data->created_at)->format($system->dateFormat);
            })
            ->addColumn('order_By',function($data){
                return $data->user->name;
            })
            ->editColumn('orderStatus',function($data){
                if($data->orderStatus == 'pending' || $data->orderStatus == 'approve'){
                    return '<span class="badge badge-warning">'.$data->orderStatus.'</span>';
                }elseif($data->orderStatus == 'delivered'){
                    return '<span class="badge badge-success">'.$data->orderStatus.'</span>';
                }elseif($data->orderStatus == 'shipping'){
                    return '<span class="badge badge-primary">'.$data->orderStatus.'</span>';
                }else{
                    return '<span class="badge badge-danger">'.$data->orderStatus.'</span>';
                }
            })
            ->editColumn('paymentStatus',function($data){
                if($data->paymentStatus == 'pending'){
                    return '<span class="badge badge-primary">'.$data->paymentStatus.'</span>';
                }elseif($data->paymentStatus == 'paid'){
                    return '<span class="badge badge-success">'.$data->paymentStatus.'</span>';
                }else{
                    return '<span class="badge badge-danger">'.$data->paymentStatus.'</span>';
                }
            })
            ->rawColumns(['orderStatus','paymentStatus'])
            ->make(true);
        }
        
        return view('backEnd.report.saleReport');
    }
}
