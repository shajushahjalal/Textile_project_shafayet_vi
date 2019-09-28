@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Coupon List</div>
                    <div class="col-6 text-right">                        
                        <button class="btn btn-sm btn-primary" id="add-coupon" >Add Coupon</button>
                        <a href="{{url('coupon/show/delete-coupon/')}}" class="btn btn-danger btn-sm">Deleted Coupons</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="coupon-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>Expire Date</th>
                            <th>Status</th>
                            <th>Cteate By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="coupon"></div>
@stop
@section('script')
    <script>
        var coupon;
        $(function(){
            coupon = $('#coupon-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'couponCode', name: 'couponCode' },
                    { data: 'couponPrice', name: 'couponPrice' },
                    { data: 'startDate', name: 'startDate' },
                    { data: 'expireDate', name: 'expireDate' },                    
                    { data: 'status', name: 'status' },
                    { data: 'create_by', name: 'create_by' },
                    { data: 'action', name: 'action' }
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
                "order": [[ 4, "ASC" ]] 
            });

            $('#add-coupon').click(function(){
                $.ajax({
                    url:'{{url('coupon/create')}}',
                    method: 'GET',
                    dataType : "html",
                    success:function(html){
                        $('#coupon').html(html);
                        $('#coupon').find('.modal').modal('show');
                    }
                });
            }); 

            // From Submit
            $('#coupon').on('submit','form',function(e){
                e.preventDefault();
                $(this).find('#submit').text('loading...');
                $(this).find('#submit').attr('disabled',true);
                var data = new FormData($(this)[0]); 
                $.ajax({
                    method: "POST",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(output){
                        if(output.status == 'success'){
                            successMessage(output.message);
                            $(this).trigger("reset");
                            $('#coupon').find('.modal').modal('hide');
                            coupon.ajax.reload();
                        }else{
                            errorMessage(output.message);
                        }
                    }
                });
            });
        });

        function editCoupon(id){
            $.ajax({
                url:'{{url('coupon/edit')}}'+'/'+id,
                method: 'GET',
                dataType : "html",
                success :function(html){
                    $('#coupon').html(html);
                    $('#coupon').find('.modal').modal('show');
                }
            });
        }

        function deleteCoupon(id){
            if(confirm('Are you sure ???')){
                $.ajax({
                    url:'{{url('coupon/delete')}}'+'/'+id,
                    method: 'GET',
                    dataType : "json",
                    success :function(message){
                        if(message == "success"){
                            successMessage("Delete Successfully");
                        }else{
                            errorMessage(message);
                        } 
                        coupon.ajax.reload();                       
                    },
                    error:function(){
                        errorMessage();
                    }
                });                
            }            
        }
        
    </script>
@endsection