@extends('backEnd.masterPage')
@section('mainPart')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Product Sale Report</h5>
        </div>
        <div class="card-body">
            <div class="dt-plugin-buttons"></div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead class="bg-success">
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>Discount</th>
                                <th>Shopping</th>
                                <th>Sub Total</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
</div>
                                                  
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'date', name: 'date' },
                { data: 'order_By', name: 'order_By' },
                { data: 'total', name: 'total' },
                { data: 'discount', name: 'discount' },
                { data: 'shippingCost', name: 'shippingCost' },
                { data: 'subTotal', name: 'subTotal' },
                { data: 'orderStatus', name: 'orderStatus' },
                { data: 'paymentStatus', name: 'paymentStatus' },
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "DESC" ]] 
        });
    });
</script>
@endsection

