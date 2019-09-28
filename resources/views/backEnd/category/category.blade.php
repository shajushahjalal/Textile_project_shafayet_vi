@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Category List</div>
                    <div class="col-6 text-right">                        
                        <button class="btn btn-sm btn-primary" id="addCategory" >Add Category</button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="category-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Meta Tag</th>
                            <th>Position</th>
                            <th>Sub Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="edit-category"></div>
@include('backEnd.category.partial.createCategory')

<script>
    var categoryTable;
    $(function() {    
        $('#addCategory').click(function(){
            $('#category').modal('show');
        });
        
        // Load Data via datatable
        categoryTable = $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('category/show') !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'categoryImage', name: 'categoryImage' },
                { data: 'categoryName', name: 'categoryName' },
                { data: 'pageTitle', name: 'pageTitle' },
                { data: 'metaTag', name: 'metaTag' },
                { data: 'position', name: 'position' },
                { data: 'haveSubCategory', name: 'haveSubCategory' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 5, "ASC" ]] 
        }); 
        
        // Submit Add Category Form
        $('form#add-category-form').on('submit', function (e) {
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
                            title: 'Category Create Successfylly',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#add-category-form").trigger("reset");
                        $('#category').modal('hide');
                        categoryTable.ajax.reload();
                    }else {
                        $('#category').modal('hide');
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
    
    // Show Edit Category Modal
    function editCategory(id){
        $.ajax({
            url:'{{url('category/edit')}}',
            type:'get',
            data:{id:id},
            dataType: 'html',
            success:function(data){                  
                $('#edit-category').html(data);
                $('#edit-category-modal').modal('show');   
            }
        });
    }
    
</script>
@endsection

