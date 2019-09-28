@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5> Product Stock </h5>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-stock">
                                + Add New Stock 
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-striped" id="product-stock">
                            <thead>
                                <tr class="table-borderless bg-primary">
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Available Size</th>
                                    <th>Current Stock</th>
                                    <th>Sold </th>  
                                    <th>Action</th>               
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
    </div>    
</div>
<div id="edit-stock"></div>
@include('backEnd.product.partial.stockCreate')

<script>
    var stock;
    $(function(){

        stock = $('#product-stock').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'image', name: 'image' },
                { data: 'productName', name: 'productName' },
                { data: 'productColor', name: 'productColor' },
                { data: 'productSize', name: 'productSize' },
                { data: 'currentStock', name: 'currentStock' },
                { data: 'sellingCount', name: 'sellingCount' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            //"order": [[ 0, "desc" ]] 
        });

        $(document).on('submit','form', function (e) {
                e.preventDefault();
                $('.submit').text('Loodaing...');
                var data = new FormData($(this)[0]);
                $.ajax({
                    method: "POST",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function (message) {
                        if(message == 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Stock Add Successfylly',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            stock.ajax.reload();
                            $(this).trigger("reset");   
                            $('.modal').modal('hide');    
                        }else {
                            $('.modal').modal('hide');
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: message,
                            });
                        }
                        $('.submit').text('Submit');
                    }
                });
        });
    });

        function editStock(id){            
            $.ajax({
                url:'{{url('product-stock/edit')}}'+'/'+id,
                method:'GET',
                dataType:'html',
                success:function(html){
                    $('#edit-stock').html(html);
                    $('#edit-stock-modal').modal('show');
                },
                error:function(){
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went Wrong',
                    });
                }
            });
        }
        

        function deleteStock(id){            
            if( confirm("Are you Sure to delete it???") ){
                $.ajax({
                    url:'{{url('product-stock/delete')}}'+'/'+id,
                    method:'GET',
                    success:function(message){
                        Swal.fire({
                            type: 'success',
                            title: 'Stock Add Successfylly',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        stock.ajax.reload();
                    },
                    error:function(message){
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went Wrong',
                        });
                    }
                });
            }
        }
    

        

</script>
@endsection