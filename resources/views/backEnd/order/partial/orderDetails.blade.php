<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Order Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- Shipping Part-->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class=" card-title">Shipping Infommation</h5>
                                    </div>                        
                                </div>                    
                            </div>
                            <div class="card-body">  
                                @php 
                                    $shipping = $order->shipping;
                                    $orderDetails = $order->orderDetails;                        
                                @endphp 
                                                    
                                <address>
                                    {{$shipping->name }} <br>
                                    {{$shipping->address }} <br>
                                    {{$shipping->phoneNo }} <br>
                                    Zip / Postal Code: {{$shipping->zip }}<br>
                                    {{$shipping->city }}, {{$shipping->state }} <br>                        
                                    {{$shipping->country }}
                                </address>              
                            </div> 
                        </div>
                    </div>  
                    <!-- Payment part -->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class=" card-title">Payment Information</h5>
                                    </div>                        
                                </div>                    
                            </div>
                            <div class="card-body">  
                                Pending         
                            </div> 
                        </div>
                    </div>       
                </div>

                <div class="row">
                        <div class="col-12 mt-10">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class=" card-title">Order Details</h5>
                                </div>
                                <div class="card-body table-responsive">                             
                                    <table class="table table-striped">
                                    <thead class="text-white bg-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($orderDetails as $details)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td> <img src="{{asset($details->productVariation->image)}}" class=" img-thumbnail" style="height:60px" > </td>
                                                <td>{{$details->soldQuantity}}</td>
                                                <td>{{number_format($details->sellingPrice,2)}} {{$system->currency}}</td>
                                                <td> {{number_format($details->sellingPrice * $details->soldQuantity,2)}} {{$system->currency}} </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>


