@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">{{$title}}</div>
                    <div class="col-6 text-right">                        
                        
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="order" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Order Id</th> 
                            <th>Date</th>                           
                            <th>Name</th>                            
                            <th>Total</th>
                            <th>Discount</th>                            
                            <th>Shipping</th>
                            <th>Sub Total</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
    
</div>

@stop
@section('script')
<script>
    $(function() {         
        // Load Data via datatable
        var table = $('#order').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url()->current()}}',
            columns: [
                { data: 'id', name: 'id' },                
                { data: 'date', name: 'date' },
                { data: 'user_id', name: 'user_id' },
                { data: 'total', name: 'total' },
                { data: 'discount', name: 'discount' },
                { data: 'shippingCost', name: 'shippingCost' },
                { data: 'subTotal', name: 'subTotal' },
                { data: 'paid', name: 'paid' },
                { data: 'orderStatus', name: 'orderStatus'},
                { data: 'paymentStatus', name: 'paymentStatus'},
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "desc" ]] 
        }); 

        $('#order').on('click','.dropdown-menu a',function(e){
            e.preventDefault();
            $.ajax({
                url     : $(this).attr('href'),
                method  : 'GET',
                dataType: 'html',
                success:function(html){
                    $('.modal').html(html);
                    $('.modal').modal('show');
                },
                error:function(){
                    errorMessage();
                }
            });
        });

        $(document).on('submit','form',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data : data,
                processData: false,
                cache: false,
                success:function(messge){
                    $('.modal').modal('hide');
                    successMessage(messge);
                    table.ajax.reload();
                },
                error:function(){
                    $('.modal').modal('hide');
                    errorMessage();
                }
            });
        });
    });        
    
</script>
@endsection

