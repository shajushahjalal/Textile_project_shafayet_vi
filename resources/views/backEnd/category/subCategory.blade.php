@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Sub Category List</div>
                    <div class="col-6 text-right">                        
                        <button class="btn btn-sm btn-primary" id="show-modal" >Add Sub-Category</button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="category-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Sub Category</th>
                            <th>Category </th>
                            <th>Title</th>
                            <th>Meta Tag</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="edit-sub-category"></div>
@include('backEnd.category.partial.subCreateCategory')

<script>
    var SubcategoryTable;
    $(function() {    
        $('#show-modal').click(function(){
            $('#sub-catefory-modal').modal('show');
        });
        
         SubcategoryTable = $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('sub-category/show') !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'subCategoryImage', name: 'subCategoryImage' },
                { data: 'subCategoryName', name: 'subCategoryName' },
                { data: 'categoryName', name: 'categoryName' },
                { data: 'pageTitle', name: 'pageTitle' },
                { data: 'metaTag', name: 'metaTag' },
                { data: 'position', name: 'position' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 6, "ASC" ]] 
        });        
        $('form#sub-catefory-form').on('submit', function (e) {
            e.preventDefault();
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
                            title: 'Save Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#sub-catefory-form").trigger("reset");
                        $('#sub-catefory-modal').modal('hide');
                        SubcategoryTable.ajax.reload();
                    }else {
                        $('#sub-catefory-modal').modal('hide');
                        Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                      });
                    }
                }
            });
        });        
        
    });
    function editSubCategory(id){
        var url = "{{url('sub-category/edit')}}/"+id;
        $.ajax({
            url:url,
            type:'get',
            dataType: 'html',
            success:function(data){                  
                $('#edit-sub-category').html(data);
                $('#edit-subcategory-modal').modal('show');   
            }
        });
    }        
    
    
</script>
@endsection

