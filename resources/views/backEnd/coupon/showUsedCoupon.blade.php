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
                            <th>Used By</th>
                            <th>User Time</th>
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
                    { data: 'coupon_id', name: 'coupon_id' },
                    { data: 'couponPrice', name: 'couponPrice' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'useTime', name: 'useTime' },
                ],
                "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]]
            });
            
        });

        
        
    </script>
@endsection