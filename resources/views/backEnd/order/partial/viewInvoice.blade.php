<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Invoice</h5>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <section class="invoice-preview-show">                
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-borderless table-responsive text-white">
                            <thead class=" table-borderless">
                                <tr>
                                    <th>Order Issued date</th>
                                    <th>:</th>
                                    <th>{{ Carbon\Carbon::parse($order->created_at)->format($system->dateFormat .' H:i:s') }}</th>                                            
                                </tr>
                                <tr>
                                    <th>INVOICE Number</th>
                                    <th>:</th>
                                    <th>#{{$order->id}}</th>
                                </tr>
                            </thead>
                        </table>                                
                    </div>
                    <div class="col-sm-6 text-right" style="padding-top:25px;padding-right: 50px;">
                        <a href="{{url('make-pdf/'.$order->id)}}" target="_blank" class="btn btn-info btn-sm"><span class="fa fa-print"></span> print</a>
                    </div>
                </div>                
            </section>

            <!-- Address Part -->
            <section class="invoice-preview-address">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-2 text-center">
                                <div class="location-address" style="border-right:1px solid #bbb; min-height: 70px;">
                                    To :
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="location-address">
                                    {{$order->shipping->name}}<br>
                                    {{$order->shipping->address}}<br>
                                    {{$order->shipping->city}}<br>
                                    {{$order->shipping->phoneNo}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-4 text-center">
                                <div class="location-address" style="border-right:1px solid #bbb; min-height: 70px;">From : </div>
                            </div>
                            <div class="col-8 ">
                                <div class="location-address">                                    
                                    <address>
                                        {{$system->applicationName}}<br>
                                        {{$system->address}}<br>
                                        {{$system->city}} - {{$system->zipCode }} <br>
                                        {{$system->country}}<br> 
                                    </address>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Order Details Part -->
            <section class="main-invoice">
	            <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Item Name</th>
                                <th>Rate</th>                    
                                <th>Quantity</th>
                                <th>Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $orderDetails = $order->orderDetails;     
                            @endphp
                            @foreach($orderDetails as $details)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$details->productVariation->product->productName}}</td> 
                                    <td>{{number_format($details->sellingPrice,2)}} {{$system->currency}}</td>
                                    <td>{{$details->soldQuantity}}</td>
                                    <td> {{number_format($details->sellingPrice * $details->soldQuantity,2)}} {{$system->currency}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <section style="margin-top:10px;">
                <div class="row">                    
                    <div class="col-3 invoice-sum text-right ml-auto">
                        <table class="table table-borderless table-responsive">
                            <tbody class=" table-borderless">                                
                                <tr>
                                    <th>Sub-Total </th>
                                    <th>:</th>
                                    <td>{{$order->total}} {{$system->currency}}</td>
                                </tr>
                                <tr>
                                    <th>Discount </th>
                                    <th>:</th>
                                    <td>{{$order->discount}} {{$system->currency}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Cost </th>
                                    <th>:</th>
                                    <td>{{$order->shippingCost}} {{$system->currency}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-bottom:1px solid #999;"> </td>
                                </tr>
                                <tr>
                                    <th>In Total</th>
                                    <th>:</th>
                                    <td>{{$order->subTotal}} {{$system->currency}}</td>
                                </tr>
                                <tr>
                                    <th>Total Paid</th>
                                    <th>:</th>
                                    <td>{{$order->paid}} {{$system->currency}}</td>
                                </tr>
                                <tr>
                                    <th>Total Due</th>
                                    <th>:</th>
                                    <td>{{$order->subTota - $order->paid}} {{$system->currency}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal-footer">
            <a href="{{url('make-pdf/'.$order->id)}}" class="btn btn-info btn-sm text-right"> <i class="fas fa-print"></i> Print</a>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<style>
    .invoice-preview-show{
        width: 98%;
        margin:0px auto;
        background-color: #253443;
        border-radius: 5px;
    }
    .invoice-preview-show .invoice-num2{
            margin-top: 10px;
            margin-bottom: 10px;
    }
    .invoice-preview-show h4, .invoice-preview-show h5{
            color: #FFF;                    
    }
    .invoice-preview-show h4{
        font-size: 16px;
    }
    .invoice-preview-show h5{
        font-size: 14px;
    }
    .invoice-preview-show .invoice-num
    {
            margin-top: 10px;
            margin-bottom: 10px;
            border-right: 1px solid #eee;
    }
    .invoice-preview-address{
            background-color: #eee;
            width: 98%;
            margin:0px auto;
            padding-top:2%;
            padding-bottom: 2%;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;

    }
    .invoice-preview-address .location-address{
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 12px;
    }
    .main-invoice{
            width: 95%;
            margin: 0px auto;
            margin-top:2%;

    }
    .main-invoice table{
            border: 1px solid #eee;
    }
    .invoice-sum table tr td{
            padding: 7px 10px;
    }
    .invoice-sum table tr th{
            padding: 7px 10px;
    }
</style>

