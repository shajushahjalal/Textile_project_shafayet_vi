<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\SystemInfo;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use PDF;

class OrderController extends Controller
{
    protected $index;
    // All New Order
    public function newOrder(Request $request)
    {        
        if($request->ajax()){
            $system = SystemInfo::first();
            $data = Order::withTrashed()->where('orderStatus', '=', 'pending')
                ->orWhere('orderStatus', '=', 'approve')->orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('date',function($data)use($system){
                    return Carbon::parse($data->created_at)->format($system->dateFormat);
                })->editColumn('orderStatus',function($data){
                    if($data->orderStatus == 'pending'){
                        return '<label class="label bg-warning">Approve</label>';
                    }elseif($data->orderStatus == 'approve'){
                        return '<label class="label label-inverse">Approve</label>';
                    }elseif($data->orderStatus == 'shipping'){
                        return '<label class="label bg-info">Shipping</label>';
                    }else{
                        return '<label class="label bg-success">Delivered</label>';
                    }
                })->editColumn('paymentStatus',function($data){
                    if($data->paymentStatus == 'pending'){
                        return '<label class="label bg-primary">Pending</label>';
                    }elseif($data->paymentStatus == 'unpaid'){
                        return '<label class="label bg-danger">Unpaid</label>';
                    }else{
                        return '<label class="label bg-success">Paid</label>';
                    }
                })->editColumn('user_id',function($data){
                    return $data->user->name;
                })
                ->editColumn('total',function($data)use($system){
                    return number_format($data->total,2).' '.$system->currency;
                })
                ->editColumn('discount',function($data)use($system){
                    return number_format($data->discount,2).' '.$system->currency;
                })
                ->editColumn('shippingCost',function($data)use($system){
                    return number_format($data->shippingCost,2).' '.$system->currency;
                })
                ->editColumn('subTotal',function($data)use($system){
                    return number_format($data->subTotal,2).' '.$system->currency;
                })
                ->editColumn('paid',function($data)use($system){
                    return number_format($data->paid,2).' '.$system->currency;
                })
                ->addColumn('action',function($data){
                    return '<div class="btn-group">
                            <button class="btn btn-info btn-sm btn-square dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/view-details').'" > <span class="fa fa-eye"></span> View Details </a>
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/edit-status').'" > <span class="fa fa-edit"></span> Edit Status</a>
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/view-invoice').'" > <i class="fas fa-file-invoice"></i> Download Invoice</a>
                            </div>
                        </div>'; 
                })
                ->RawColumns(['action','orderStatus','paymentStatus'])
                ->make(true);
        }
        return view('backEnd.order.index',['title' => 'New Order']);
    }

    // View Order Details
    public function orderDetails($order_id){
        $data = Order::withTrashed()->find($order_id);
        return view('backEnd.order.partial.orderDetails',['order'=>$data])->render();
    }

    // View Order Details
    public function editStatus($order_id){
        $data = Order::withTrashed()->find($order_id);
        return view('backEnd.order.partial.editStatus',['order' => $data])->render();
    }

    // Update Status
    public function updateStatus(Request $request)
    {
        $data = Order::withTrashed()->find($request->order_id);
        $data->orderStatus = $request->orderStatus;
        $data->paymentType = $request->paymentType;
        $data->paymentStatus = $request->paymentStatus;
        $data->save();
        return response()->json('Information Update Successfully');
    }

    // On Shipping Orders
    public function onShipping(Request $request)
    {
        if($request->ajax()){
            $system = SystemInfo::first();
            $data = Order::withTrashed()->where('orderStatus', '=', 'shipping')
            ->orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('date',function($data)use($system){
                    return Carbon::parse($data->created_at)->format($system->dateFormat);
                })->editColumn('orderStatus',function($data){
                    if($data->orderStatus == 'pending'){
                        return '<label class="label bg-warning">Approve</label>';
                    }elseif($data->orderStatus == 'approve'){
                        return '<label class="label label-inverse">Approve</label>';
                    }elseif($data->orderStatus == 'shipping'){
                        return '<label class="label bg-info">Shipping</label>';
                    }else{
                        return '<label class="label bg-success">Delivered</label>';
                    }
                })->editColumn('paymentStatus',function($data){
                    if($data->paymentStatus == 'pending'){
                        return '<label class="label bg-primary">Pending</label>';
                    }elseif($data->paymentStatus == 'unpaid'){
                        return '<label class="label bg-danger">Unpaid</label>';
                    }else{
                        return '<label class="label bg-success">Paid</label>';
                    }
                })->editColumn('user_id',function($data){
                    return $data->user->name;
                })
                ->editColumn('total',function($data)use($system){
                    return number_format($data->total,2).' '.$system->currency;
                })
                ->editColumn('discount',function($data)use($system){
                    return number_format($data->discount,2).' '.$system->currency;
                })
                ->editColumn('shippingCost',function($data)use($system){
                    return number_format($data->shippingCost,2).' '.$system->currency;
                })
                ->editColumn('subTotal',function($data)use($system){
                    return number_format($data->subTotal,2).' '.$system->currency;
                })
                ->editColumn('paid',function($data)use($system){
                    return number_format($data->paid,2).' '.$system->currency;
                })
                ->addColumn('action',function($data){
                    return '<div class="btn-group">
                            <button class="btn btn-info btn-sm btn-square dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/view-details').'" > <span class="fa fa-eye"></span> View Details </a>
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/edit-status').'" > <span class="fa fa-edit"></span> Edit Status</a>
                                <a class="dropdown-item" href="'.url('view/'.$data->id.'/invoice').'" > <i class="fas fa-file-invoice"></i> Download Invoice</a>
                            </div>
                        </div>'; 
                })
                ->RawColumns(['action','orderStatus','paymentStatus'])
                ->make(true);
        }
        return view('backEnd.order.index',['title' => 'On Shipping']);
    }

    // Deliverd Orders
    public function deliverdOrders(Request $request)
    {
        if($request->ajax()){
            $system = SystemInfo::first();
            $data = Order::withTrashed()->where('orderStatus', '=', 'Delivered')
                ->orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('date',function($data)use($system){
                    return Carbon::parse($data->created_at)->format($system->dateFormat);
                })->editColumn('orderStatus',function($data){
                    if($data->orderStatus == 'pending'){
                        return '<label class="label bg-warning">Approve</label>';
                    }elseif($data->orderStatus == 'approve'){
                        return '<label class="label label-inverse">Approve</label>';
                    }elseif($data->orderStatus == 'shipping'){
                        return '<label class="label bg-info">Shipping</label>';
                    }else{
                        return '<label class="label bg-success">Delivered</label>';
                    }
                })->editColumn('paymentStatus',function($data){
                    if($data->paymentStatus == 'pending'){
                        return '<label class="label bg-primary">Pending</label>';
                    }elseif($data->paymentStatus == 'unpaid'){
                        return '<label class="label bg-danger">Unpaid</label>';
                    }else{
                        return '<label class="label bg-success">Paid</label>';
                    }
                })->editColumn('user_id',function($data){
                    return $data->user->name;
                })
                ->editColumn('total',function($data)use($system){
                    return number_format($data->total,2).' '.$system->currency;
                })
                ->editColumn('discount',function($data)use($system){
                    return number_format($data->discount,2).' '.$system->currency;
                })
                ->editColumn('shippingCost',function($data)use($system){
                    return number_format($data->shippingCost,2).' '.$system->currency;
                })
                ->editColumn('subTotal',function($data)use($system){
                    return number_format($data->subTotal,2).' '.$system->currency;
                })
                ->editColumn('paid',function($data)use($system){
                    return number_format($data->paid,2).' '.$system->currency;
                })
                ->addColumn('action',function($data){
                    return '<div class="btn-group">
                            <button class="btn btn-info btn-sm btn-square dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/view-details').'" > <span class="fa fa-eye"></span> View Details </a>
                                <a class="dropdown-item" href="'.url('order/'.$data->id.'/edit-status').'" > <span class="fa fa-edit"></span> Edit Status</a>
                                <a class="dropdown-item" href="'.url('view/'.$data->id.'/invoice').'" > <i class="fas fa-file-invoice"></i> Download Invoice</a>
                            </div>
                        </div>'; 
                })
                ->RawColumns(['action','orderStatus','paymentStatus'])
                ->make(true);
        }
        return view('backEnd.order.index',['title' => 'Delivered Orders']);
    }

    // Public function view Invoice
    public function viewInvoice($order_id)
    {
        $data = Order::withTrashed()->where('id',$order_id)->first();
        return view('backEnd.order.partial.viewInvoice',['order'=>$data]);
    }

    // Make PDF
    public function makePDf($order_id){
        $data = Order::withTrashed()->where('id',$order_id)->first();
        $page = view('backEnd.order.partial.invoicePDF',['order'=>$data]);
        $pdf = PDF::loadHtml($page);
        return $pdf->download('invoice.pdf');
    }

}
