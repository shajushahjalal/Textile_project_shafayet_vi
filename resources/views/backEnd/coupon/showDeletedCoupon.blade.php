@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Deleted Coupon List</div>
                    <div class="col-6 text-right">                        
                        <a href="{{url('/coupon')}}" class="btn btn-success btn-sm"> &larr; Back</a>
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
        });
        function restoreCoupon(id){
            if(confirm('Are you sure ???')){
                $.ajax({
                    url:'{{url('coupon/restore')}}'+'/'+id,
                    method: 'GET',
                    dataType : "json",
                    success :function(message){
                        if(message == "success"){
                            Swal.fire({
                                type: 'success',
                                title: 'Coupon Restore Successfylly',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }else{
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: message
                            });
                        }
                        coupon.ajax.reload();
                    },
                });
            }            
        }
    </script>
@endsection