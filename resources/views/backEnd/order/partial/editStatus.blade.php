<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Order Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url' => 'order/status-update', 'method' => 'post' ]) !!}
        <div class="modal-body">
            <div class="from-group">
                <div class="row">
                    <div class="col-4">
                        <input type="hidden" value="{{$order->id}}" name="order_id">
                        <label>Order Status <span class="text-danger">*</span></label>
                        <select class=" form-control" name="orderStatus">
                            <option value="pending" {{$order->orderStatus == 'pending'?'selected':null}} >Pending</option>
                            <option value="approve" {{$order->orderStatus == 'approve'?'selected':null}} >Approve</option>
                            <option value="shipping" {{$order->orderStatus == 'shipping'?'selected':null}} >Shipping</option>
                            <option value="delivered" {{$order->orderStatus == 'delivered'?'selected':null}} >Delivered</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Payment Status <span class="text-danger">*</span></label>
                        <select class=" form-control" name="paymentStatus">
                            <option value="pending" {{$order->paymentStatus == 'pending'?'selected':null}} >Pending</option>
                            <option value="paid" {{$order->paymentStatus == 'approve'?'selected':null}} >Paid</option>
                            <option value="unpaid" {{$order->paymentStatus == 'unpaid'?'selected':null}} >Unpaid</option>                                
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Payment Method <span class="text-danger">*</span></label>
                        <input type="text" class=" form-control" name="paymentType" value="{{$order->paymentType}}">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit" class="btn btn-primary">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>