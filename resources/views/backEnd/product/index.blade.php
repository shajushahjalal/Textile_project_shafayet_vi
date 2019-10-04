@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Product List</div>
                    <div class="col-6 text-right">                        
                        <a class="btn btn-sm btn-primary" href="{{url('product/create')}}" >Add Product</a>
                        <a class="btn btn-sm btn-danger" href="{{url('product/delete')}}" >Delete Products</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped ">
                    <thead class="bg-success">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Meta Tag</th>
                            <th>Buy Price</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script> 
    var table;
    $(function(){    
        // Load Data via datatable
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('product') !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'image', name: 'image' },
                { data: 'productName', name: 'productName' },
                { data: 'categoryName', name: 'categoryName' },
                { data: 'pageTitle', name: 'pageTitle' },
                { data: 'metaTag', name: 'metaTag' },
                { data: 'buyPrice', name: 'buyPrice' },
                { data: 'sellingPrice', name: 'sellingPrice' },
                { data: 'sellingPriceWithDiscount', name: 'sellingPriceWithDiscount' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "desc" ]] 
        });         
    });
    
</script>
@endsection

