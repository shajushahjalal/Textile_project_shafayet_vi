@extends('backEnd.masterPage')
@section('mainPart')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>Product Stock Report</h5>
        </div>
        <div class="card-body">
            <div class="dt-plugin-buttons"></div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead class="bg-success">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th title="Product Name">Name</th>
                                <th title="Product Size">Size</th>
                                <th title="Product Color">Color</th>
                                <th title="current Stock">Current Stock</th>
                                <th title="Sold quantity">Sold Item</th>
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
                { data: 'image', name: 'image' },
                { data: 'productName', name: 'productName' },
                { data: 'productSize', name: 'productSize' },
                { data: 'productColor', name: 'productColor' },
                { data: 'currentStock', name: 'currentStock' },
                { data: 'sellingCount', name: 'sellingCount' },
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "ASC" ]] 
        });
    });
</script>
@endsection

