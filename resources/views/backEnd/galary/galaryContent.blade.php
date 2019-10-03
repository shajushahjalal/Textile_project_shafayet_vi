@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Galary Content</div>
                    <div class="col-6 text-right">                        
                        <a href="{{url('galary/content/create')}}" class="btn btn-primary btn-sm ajax-click-page">Add New Content</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Menu Name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var categoryTable;
    $(function() {        
        // Load Data via datatable
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'image', name: 'image' },
                { data: 'menuName', name: 'menuName' },
                { data: 'link', name: 'link' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 4, "ASC" ]] 
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

